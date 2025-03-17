<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Fortify::loginView(function () {
            return view('auth.login'); // Menggunakan satu tampilan login
        });

        Fortify::authenticateUsing(function (Request $request) {
            $credentials = $request->only('user_id', 'password');
            $user_id = $credentials['user_id'];
            $password = $credentials['password'];

            // Cek apakah user adalah Admin
            $admin = Admin::where('id_admin', $user_id)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                Auth::login($admin);
                return $admin;
            }

            // Cek apakah user adalah Dosen
            $dosen = Dosen::where('nidn', $user_id)->first();
            if ($dosen && Hash::check($password, $dosen->password)) {
                Auth::login($dosen);
                return $dosen;
            }

            // Cek apakah user adalah Mahasiswa
            $mahasiswa = Mahasiswa::where('nim', $user_id)->first();
            if ($mahasiswa && Hash::check($password, $mahasiswa->password)) {
                Auth::login($mahasiswa);
                return $mahasiswa;
            }

            return null;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
