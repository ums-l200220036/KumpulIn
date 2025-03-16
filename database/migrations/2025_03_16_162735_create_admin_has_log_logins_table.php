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
        Schema::create('admin_has_log_logins', function (Blueprint $table) {
            $table->string('admin_id_admin');
            $table->unsignedBigInteger('log_login_id_log');
            $table->foreign('admin_id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
            $table->foreign('log_login_id_log')->references('id_log')->on('log_login')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_has_log_logins');
    }
};
