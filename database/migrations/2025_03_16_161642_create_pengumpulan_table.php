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
        Schema::create('pengumpulan', function (Blueprint $table) {
            $table->id('id_pt');
            $table->unsignedBigInteger('dosen_has_log_login_log_login_id_log');
            $table->string('dosen_has_log_login_dosen_nidn');
            $table->string('mahasiswa_nim');
            $table->string('file_url');
            $table->date('timestamp');
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan');
    }
};
