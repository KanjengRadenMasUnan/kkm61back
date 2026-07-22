<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            // Ubah tipe kolom foto menjadi LONGTEXT agar muat menyimpan gambar Base64
            $table->longText('foto')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->string('foto')->nullable()->change();
        });
    }
};
