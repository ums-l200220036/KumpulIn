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
        Schema::create('dosen_has_log_logins', function (Blueprint $table) {
            $table->string('dosen_nidn');
            $table->unsignedBigInteger('log_login_id_log');
            $table->foreign('dosen_nidn')->references('nidn')->on('dosen')->onDelete('cascade');
            $table->foreign('log_login_id_log')->references('id_log')->on('log_login')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_has_log_logins');
    }
};
