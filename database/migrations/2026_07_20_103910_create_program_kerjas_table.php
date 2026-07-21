<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('program_kerjas');
        Schema::create('program_kerjas', function (Blueprint $table) {
            $table->id();
            $table->enum('bidang', [
                'Pendidikan, keagamaan da penguatan karakter masyarakat',
                'Pemberdayaan ekomoni masyarakat, umkm, koperasi dan ekonomi kreatif',
                'Sosial, hukum, dan pemberdayaan masyarakat',
                'Lingkungan hidup, ketahanan pangan, dan Kesehatan masyarakat',
                'Tata Kelola pemerintah desa/kelurahan, pelayanan public dan inovasi teknologi'
            ]);
            $table->string('program');
            $table->enum('status', ['Selesai', 'Sedang Berjalan', 'Rencana']);
            $table->integer('progress')->default(0);
            $table->text('laporan_hasil')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_kerjas');
    }
};
