<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->string('ridn')->primary();
            $table->string('nama_dosen');
            $table->date('tanggal_lahir');
            $table->string('prodi_dosen');
            $table->string('email_dosen')->unique();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};