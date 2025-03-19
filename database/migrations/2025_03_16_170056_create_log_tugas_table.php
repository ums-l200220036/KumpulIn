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
        Schema::create('log_tugas', function (Blueprint $table) {
            $table->id('idlog_tugas');
            $table->unsignedBigInteger('tugas_id_tugas');
            $table->timestamps();
            $table->foreign('tugas_id_tugas')->references('id_tugas')->on('tugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_tugas');
    }
};
