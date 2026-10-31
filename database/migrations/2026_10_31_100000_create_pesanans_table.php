<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();

            // relasi ke tabel pelanggans & paket_caterings
            $table->foreignId('pelanggan_id')
                  ->constrained('pelanggans')
                  ->cascadeOnDelete();

            $table->foreignId('paket_catering_id')
                  ->constrained('paket_caterings')
                  ->cascadeOnDelete();

            $table->date('tanggal_acara');
            $table->unsignedInteger('jumlah_porsi');
            $table->unsignedBigInteger('total_harga');
            $table->string('status', 20)->default('Menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
