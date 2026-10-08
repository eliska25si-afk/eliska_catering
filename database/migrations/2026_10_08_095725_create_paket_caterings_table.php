<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_caterings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 100);
            $table->string('jenis', 50);
            $table->integer('harga');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_caterings');
    }
};