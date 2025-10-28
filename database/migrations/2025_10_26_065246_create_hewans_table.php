<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hewan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->unsignedBigInteger('id_kategori');
            $table->text('deskripsi')->nullable();
            $table->string('status')->default('Tersedia'); // Pastikan ini ada
            $table->timestamps();

            // Foreign key
            $table->foreign('id_kategori')
                  ->references('id')
                  ->on('kategori')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hewan');
    }
};