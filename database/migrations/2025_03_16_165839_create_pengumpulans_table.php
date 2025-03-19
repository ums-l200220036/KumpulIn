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
            $table->bigIncrements('id_pt');
            $table->unsignedBigInteger('dosen_has_log_login_log_login_id_log')->nullable();
            $table->string('dosen_has_log_login_dosen_nidn')->nullable();
            $table->string('mahasiswa_nim')->nullable();
            $table->string('file_url');
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulans');
    }
};
