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
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id_tugas');
            $table->string('mahasiswa_nim')->nullable();
            $table->unsignedBigInteger('dosen_has_log_login_log_login_id_log')->nullable();
            $table->string('dosen_has_log_login_dosen_nidn')->nullable();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('file');
            $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('dosen_has_log_login_log_login_id_log')->references('id_log')->on('log_login')->onDelete('cascade');
            $table->foreign('dosen_has_log_login_dosen_nidn')->references('nidn')->on('dosen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
