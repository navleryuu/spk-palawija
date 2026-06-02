<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::with(['nilai.kriteria'])->get();
        $kriterias = Kriteria::all();

        // 1️⃣ Matriks Keputusan
        $matriks = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $k) {
                $matriks[$alt->nama][$k->nama_kriteria] =
                    $alt->nilai->where('kriteria_id', $k->id)->first()->nilai ?? 0;
            }
        }

        // 2️⃣ Normalisasi Matriks
        $pembagi = [];
        foreach ($kriterias as $k) {
            $sum = 0;
            foreach ($alternatifs as $alt) {
                $val = $alt->nilai->where('kriteria_id', $k->id)->first()->nilai ?? 0;
                $sum += pow($val, 2);
            }
            $pembagi[$k->id] = sqrt($sum);
        }

        $normalisasi = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $k) {
                $val = $alt->nilai->where('kriteria_id', $k->id)->first()->nilai ?? 0;
                $normalisasi[$alt->nama][$k->nama_kriteria] =
                    $pembagi[$k->id] ? $val / $pembagi[$k->id] : 0;
            }
        }

        // 3️⃣ Matriks Terbobot
        $terbobot = [];
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $k) {
                $terbobot[$alt->nama][$k->nama_kriteria] =
                    ($normalisasi[$alt->nama][$k->nama_kriteria] ?? 0) * $k->bobot;
            }
        }

        // 4️⃣ Hasil Akhir (Benefit - Cost)
        $hasil = [];
        foreach ($alternatifs as $alt) {
            $benefit = 0;
            $cost = 0;
            foreach ($kriterias as $k) {
                $val = $terbobot[$alt->nama][$k->nama_kriteria] ?? 0;
                if ($k->tipe == 'benefit') $benefit += $val;
                else $cost += $val;
            }
            $hasil[$alt->nama] = $benefit - $cost;
        }

        // Urutkan hasil
        arsort($hasil);
        $ranking = [];
        $no = 1;
        foreach ($hasil as $alt => $skor) {
            $ranking[] = [
                'no' => $no++,
                'alternatif' => $alt,
                'skor' => number_format($skor, 4)
            ];
        }

        // Simpan hasil MOORA ke tabel perangkingan
        \DB::table('perangkingans')->truncate(); // hapus data lama biar gak dobel
        $no = 1;
        foreach ($hasil as $alt => $skor) {
            $alternatif = Alternatif::where('nama', $alt)->first();
            \DB::table('perangkingans')->insert([
                'alternatif_id' => $alternatif->id,
                'skor_moora' => $skor,
                'rank_moora' => $no++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        return view('admin.perhitungan.index', compact(
            'alternatifs',
            'kriterias',
            'matriks',
            'normalisasi',
            'terbobot',
            'ranking'
        ));
    }

    // 🟩 Tambahkan method ini di bawah index()
    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required',
            'nilai' => 'required|array',
        ]);

        // Simpan nilai untuk setiap kriteria
        foreach ($request->nilai as $kriteria_id => $nilai) {
            Nilai::updateOrCreate(
                [
                    'alternatif_id' => $request->alternatif_id,
                    'kriteria_id' => $kriteria_id
                ],
                [
                    'nilai' => $nilai
                ]
            );
        }

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('perhitungan.index')
            ->with('success', 'Data perhitungan berhasil ditambahkan!');
    }
}
