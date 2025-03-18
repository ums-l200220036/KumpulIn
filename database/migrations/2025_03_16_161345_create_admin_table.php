<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('id_admin')->primary();
            $table->string('nama');
            $table->string('password');
            $table->timestamps();
        });

        DB::table('admin')->insert([
            'id_admin' => 'admin01',
            'nama' => 'Admin 1',
            'password' => Hash::make('admin111'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
