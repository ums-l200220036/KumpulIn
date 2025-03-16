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
            $table->string('nidn');
            $table->unsignedBigInteger('log_login_id_log');
            $table->foreign('nidn')->references('nidn')->on('dosens')->onDelete('cascade');
            $table->foreign('log_login_id_log')->references('id_log')->on('log_logins')->onDelete('cascade');
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
