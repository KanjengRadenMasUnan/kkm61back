<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('beritas');
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique(); // Tambahan kolom slug untuk SEO
            $table->date('tanggal');
            $table->text('ringkasan');
            $table->longText('isi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('kategori')->default('Pendidikan');
            $table->string('penulis')->default('Humas KKM 61');
            $table->json('blocks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
