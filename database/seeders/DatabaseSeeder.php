<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use App\Models\ProgramKerja;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::truncate();
        Anggota::truncate();
        Berita::truncate();
        Kegiatan::truncate();
        ProgramKerja::truncate();

        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        Anggota::insert([
            ['nama' => 'Andi Pratama', 'nim' => '12345678', 'peran' => 'Ketua', 'foto' => null],
            ['nama' => 'Bunga Lestari', 'nim' => '23456789', 'peran' => 'Sekretaris', 'foto' => null],
            ['nama' => 'Chandra Wijaya', 'nim' => '34567890', 'peran' => 'Bendahara', 'foto' => null],
            ['nama' => 'Dewi Sartika', 'nim' => '45678901', 'peran' => 'Koordinator Acara', 'foto' => null],
            ['nama' => 'Eko Nugroho', 'nim' => '56789012', 'peran' => 'Dokumentasi', 'foto' => null],
        ]);

        Kegiatan::insert([
            ['judul' => 'Survey Lokasi', 'deskripsi' => 'Mengidentifikasi potensi dan masalah desa sasaran.', 'tanggal' => '2026-07-10', 'ikon' => 'MapPin'],
            ['judul' => 'Penyuluhan Pertanian', 'deskripsi' => 'Pelatihan hidroponik untuk warga.', 'tanggal' => '2026-07-12', 'ikon' => 'Sprout'],
            ['judul' => 'Kerja Bakti', 'deskripsi' => 'Membersihkan fasilitas umum bersama masyarakat.', 'tanggal' => '2026-07-14', 'ikon' => 'Brush'],
            ['judul' => 'Bimbingan Belajar', 'deskripsi' => 'Membantu anak-anak belajar membaca dan berhitung.', 'tanggal' => '2026-07-15', 'ikon' => 'BookOpen'],
        ]);

        Berita::insert([
            ['judul' => 'Survey Awal dan Pemetaan Potensi Desa', 'tanggal' => '2026-07-10', 'ringkasan' => 'Tim melakukan survey menyeluruh untuk mengidentifikasi potensi pertanian, UMKM, dan kebutuhan pendidikan masyarakat.', 'gambar' => null],
            ['judul' => 'Pelatihan Hidroponik untuk Kelompok Tani', 'tanggal' => '2026-07-15', 'ringkasan' => 'Sebanyak 25 petani mengikuti pelatihan hidroponik sistem wick sebagai solusi lahan sempit.', 'gambar' => null],
            ['judul' => 'Bimbingan Belajar untuk Anak Sekolah', 'tanggal' => '2026-07-18', 'ringkasan' => 'Kegiatan bimbel di balai desa diikuti 40 anak SD. Fokus pada literasi dan numerasi dasar.', 'gambar' => null],
            ['judul' => 'Kerja Bakti Penghijauan', 'tanggal' => '2026-07-20', 'ringkasan' => 'Bersama warga, kami menanam 150 bibit pohon dan membuat 30 lubang biopori.', 'gambar' => null],
        ]);

        ProgramKerja::insert([
            [
                'bidang' => 'Pendidikan, keagamaan da penguatan karakter masyarakat',
                'program' => 'Bimbingan belajar gratis dan mengaji rutin anak-anak SD',
                'status' => 'Selesai',
                'progress' => 100,
                'laporan_hasil' => 'Telah terlaksana 12 pertemuan bimbel dan mengaji dengan total partisipasi 45 siswa.'
            ],
            [
                'bidang' => 'Pemberdayaan ekomoni masyarakat, umkm, koperasi dan ekonomi kreatif',
                'program' => 'Pelatihan digital marketing dan pendampingan kemasan produk UMKM desa',
                'status' => 'Sedang Berjalan',
                'progress' => 60,
                'laporan_hasil' => 'Tahap desain stiker kemasan selesai, pelatihan marketplace akan diadakan minggu depan.'
            ],
            [
                'bidang' => 'Sosial, hukum, dan pemberdayaan masyarakat',
                'program' => 'Penyuluhan kesadaran hukum dan bahaya judi online bagi remaja',
                'status' => 'Rencana',
                'progress' => 15,
                'laporan_hasil' => 'Proposal dan pemateri dari Kepolisian setempat telah terkonfirmasi.'
            ],
            [
                'bidang' => 'Lingkungan hidup, ketahanan pangan, dan Kesehatan masyarakat',
                'program' => 'Pembuatan lubang biopori dan penanaman 100 bibit pohon buah',
                'status' => 'Selesai',
                'progress' => 100,
                'laporan_hasil' => '100 bibit pohon telah tertanam di area lahan kritis desa beserta 25 lubang resapan biopori.'
            ],
            [
                'bidang' => 'Tata Kelola pemerintah desa/kelurahan, pelayanan public dan inovasi teknologi',
                'program' => 'Digitalisasi peta potensi desa dan pembuatan website profil KKM',
                'status' => 'Sedang Berjalan',
                'progress' => 80,
                'laporan_hasil' => 'Pengumpulan data wilayah selesai, sistem web profil sedang dalam tahap integrasi database.'
            ],
        ]);
    }
}
