<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('icon')->nullable();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('pembina')->nullable();
            $table->string('jadwal')->nullable();
            $table->string('lokasi')->nullable();
            $table->boolean('status_aktif')->default(true);
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikuler');
    }
};
