<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa_has_log_logins', function (Blueprint $table) {
            $table->string('mahasiswa_nim');
            $table->unsignedBigInteger('log_login_id_log');
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('log_login_id_log')->references('id_log')->on('log_logins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_has_log_logins');
    }
};
