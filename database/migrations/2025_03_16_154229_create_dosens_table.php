<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->string('nidn')->primary();
            $table->string('nama');
            $table->string('password_ds');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};