<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- Tampilkan error jika ada -->
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <!-- User ID -->
            <div>
                <x-label for="user_id" value="User ID" />
                <x-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" required autofocus placeholder="Masukkan User ID Anda" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Password" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
                </label>
            </div>

            <!-- Tombol Login -->
            <div class="flex items-center justify-between mt-4">
                <!-- Link Lupa Password -->
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

                <!-- Tombol Login -->
                <x-button class="ms-4">
                    Masuk
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>