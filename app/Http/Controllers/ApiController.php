<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\ProgramKerja;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Cloudinary\Cloudinary;

class ApiController extends Controller
{
    private $cloudinary;

    public function __construct()
    {
        // Inisialisasi Cloudinary dari variabel CLOUDINARY_URL di file .env
        $this->cloudinary = new Cloudinary(env('CLOUDINARY_URL'));
    }

    // ==========================================
    // --- FITUR AUTENTIKASI ---
    // ==========================================

    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $admin = Admin::where('username', $request->username)->first();

            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return response()->json(['message' => 'Username atau password salah!'], 401);
            }

            return response()->json([
                'message' => 'Login berhasil!',
                'user' => ['id' => $admin->id, 'username' => $admin->username]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal melakukan login: ' . $e->getMessage()], 500);
        }
    }

    // ==========================================
    // --- FITUR ANGGOTA ---
    // ==========================================

    public function getAnggota()
    {
        try {
            return response()->json(Anggota::orderBy('urutan', 'asc')->get(), 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }

    public function storeAnggota(Request $request)
    {
        try {
            $request->validate([
                'nama'  => 'required',
                'nim'   => 'required',
                'peran' => 'required',
                'foto'  => 'nullable'
            ]);

            $fotoPath = $request->foto;
            if ($request->hasFile('foto')) {
                $uploadApi = $this->cloudinary->uploadApi();
                $result = $uploadApi->upload($request->file('foto')->getRealPath(), [
                    'folder' => 'kkm/anggota'
                ]);
                $fotoPath = $result['secure_url'];
            }

            $anggota = Anggota::create([
                'nama'   => $request->nama,
                'nim'    => $request->nim,
                'peran'  => $request->peran,
                'foto'   => $fotoPath,
                'urutan' => $request->urutan ?? 99,
            ]);

            return response()->json($anggota, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambah anggota: ' . $e->getMessage()], 500);
        }
    }

    public function updateAnggota(Request $request, $id)
    {
        try {
            $anggota = Anggota::find($id);

            if (!$anggota) {
                return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
            }

            $request->validate([
                'nama'  => 'required',
                'nim'   => 'required',
                'peran' => 'required'
            ]);

            $fotoPath = $request->foto ?? $anggota->foto;
            if ($request->hasFile('foto')) {
                $uploadApi = $this->cloudinary->uploadApi();
                $result = $uploadApi->upload($request->file('foto')->getRealPath(), [
                    'folder' => 'kkm/anggota'
                ]);
                $fotoPath = $result['secure_url'];
            }

            $anggota->update([
                'nama'   => $request->nama,
                'nim'    => $request->nim,
                'peran'  => $request->peran,
                'foto'   => $fotoPath,
                'urutan' => $request->urutan ?? $anggota->urutan,
            ]);

            return response()->json($anggota, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui anggota: ' . $e->getMessage()], 500);
        }
    }

    public function deleteAnggota($id)
    {
        try {
            $anggota = Anggota::find($id);

            if (!$anggota) {
                return response()->json(['message' => 'Anggota tidak ditemukan'], 404);
            }

            $anggota->delete();
            return response()->json(['message' => 'Anggota berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus anggota: ' . $e->getMessage()], 500);
        }
    }

    // ==========================================
    // --- FITUR BERITA & DETAIL ---
    // ==========================================

    public function getBerita()
    {
        try {
            $berita = Berita::orderBy('id', 'desc')->get();
            return response()->json($berita, 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }

    public function getBeritaDetail($id)
    {
        try {
            $berita = Berita::find($id);

            if (!$berita) {
                return response()->json(['message' => 'Berita tidak ditemukan'], 404);
            }

            return response()->json($berita, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengambil detail berita: ' . $e->getMessage()], 500);
        }
    }

    public function storeBerita(Request $request)
    {
        try {
            $request->validate([
                'judul'     => 'required|string',
                'tanggal'   => 'required|date',
                'ringkasan' => 'required|string',
            ]);

            $gambarPath = null;
            if ($request->hasFile('gambar')) {
                $uploadApi = $this->cloudinary->uploadApi();
                $result = $uploadApi->upload($request->file('gambar')->getRealPath(), [
                    'folder' => 'kkm/berita'
                ]);
                $gambarPath = $result['secure_url'];
            } elseif ($request->filled('gambar') && !str_starts_with($request->gambar, 'blob:')) {
                $gambarPath = $request->gambar;
            }

            $berita = Berita::create([
                'judul'     => $request->judul,
                'tanggal'   => $request->tanggal,
                'ringkasan' => $request->ringkasan,
                'isi'       => $request->isi ?? $request->ringkasan,
                'gambar'    => $gambarPath,
                'kategori'  => $request->kategori ?? 'Pendidikan',
                'penulis'   => $request->penulis ?? 'Humas KKM 61',
                'blocks'    => [],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil disimpan!',
                'data'    => $berita
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateBerita(Request $request, $id)
    {
        try {
            $berita = Berita::find($id);

            if (!$berita) {
                return response()->json(['message' => 'Berita tidak ditemukan'], 404);
            }

            $request->validate([
                'judul'     => 'required|string',
                'tanggal'   => 'required|date',
                'ringkasan' => 'required|string',
            ]);

            $gambarPath = $berita->gambar;
            if ($request->hasFile('gambar')) {
                $uploadApi = $this->cloudinary->uploadApi();
                $result = $uploadApi->upload($request->file('gambar')->getRealPath(), [
                    'folder' => 'kkm/berita'
                ]);
                $gambarPath = $result['secure_url'];
            } elseif ($request->filled('gambar') && !str_starts_with($request->gambar, 'blob:')) {
                $gambarPath = $request->gambar;
            }

            $berita->update([
                'judul'     => $request->judul,
                'tanggal'   => $request->tanggal,
                'ringkasan' => $request->ringkasan,
                'isi'       => $request->isi ?? $berita->isi,
                'gambar'    => $gambarPath,
                'kategori'  => $request->kategori ?? $berita->kategori,
                'penulis'   => $request->penulis ?? $berita->penulis,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil diperbarui!',
                'data'    => $berita
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteBerita($id)
    {
        try {
            $berita = Berita::find($id);

            if (!$berita) {
                return response()->json(['message' => 'Berita tidak ditemukan'], 404);
            }

            $berita->delete();
            return response()->json(['message' => 'Berita berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus berita: ' . $e->getMessage()], 500);
        }
    }

    // ==========================================
    // --- FITUR PROGRAM KERJA ---
    // ==========================================

    public function getProgramKerja()
    {
        try {
            return response()->json(ProgramKerja::all(), 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }

    public function storeProgramKerja(Request $request)
    {
        try {
            $data = $request->validate([
                'bidang'        => 'required',
                'program'       => 'required',
                'status'        => 'required',
                'progress'      => 'required|numeric|min:0|max:100',
                'laporan_hasil' => 'nullable'
            ]);

            $proker = ProgramKerja::create($data);
            return response()->json($proker, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menambah program kerja: ' . $e->getMessage()], 500);
        }
    }

    public function updateProgramKerja(Request $request, $id)
    {
        try {
            $proker = ProgramKerja::find($id);

            if (!$proker) {
                return response()->json(['message' => 'Program kerja tidak ditemukan'], 404);
            }

            $data = $request->validate([
                'bidang'        => 'required',
                'program'       => 'required',
                'status'        => 'required',
                'progress'      => 'required|numeric|min:0|max:100',
                'laporan_hasil' => 'nullable'
            ]);

            $proker->update($data);
            return response()->json($proker, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui program kerja: ' . $e->getMessage()], 500);
        }
    }

    public function deleteProgramKerja($id)
    {
        try {
            $proker = ProgramKerja::find($id);

            if (!$proker) {
                return response()->json(['message' => 'Program kerja tidak ditemukan'], 404);
            }

            $proker->delete();
            return response()->json(['message' => 'Program kerja berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus program kerja: ' . $e->getMessage()], 500);
        }
    }

    // ==========================================
    // --- FITUR KEGIATAN LAPANGAN ---
    // ==========================================

    public function getKegiatan()
    {
        try {
            return response()->json(Kegiatan::orderBy('tanggal', 'desc')->get(), 200);
        } catch (\Exception $e) {
            return response()->json([], 200);
        }
    }
}
