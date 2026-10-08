<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu', 100);
            $table->string('kategori', 50);
            $table->integer('harga');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_makanans');
    }
};