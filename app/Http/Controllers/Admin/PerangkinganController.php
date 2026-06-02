<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perangkingan;
use Illuminate\Support\Facades\DB;

class PerangkinganController extends Controller
{
    public function index()
    {
        // Ambil ranking MOORA
        $data = Perangkingan::with('alternatif')
            ->orderBy('rank_moora')
            ->get();

        if ($data->isEmpty()) {
            return view('admin.perangkingan.index', [
                'ranking' => [],
                'preferensi' => [],
                'totalPreferensi' => [],
                'hasil_oreste' => [],
                'message' => 'Belum ada data hasil perhitungan.'
            ]);
        }

        // ==============================
        // 1. MATRKS PREFERENSI (rank MOORA)
        // ==============================
        $preferensi = [];
        foreach ($data as $d1) {
            foreach ($data as $d2) {
                $selisih = $d2->rank_moora - $d1->rank_moora;
                $preferensi[$d1->alternatif->nama][$d2->alternatif->nama] =
                    $selisih > 0 ? $selisih : 0;
            }
        }

        // ==============================
        // 2. TOTAL PREFERENSI
        // ==============================
        $totalPreferensi = [];
        foreach ($preferensi as $alt => $nilai) {
            $totalPreferensi[$alt] = array_sum($nilai);
        }

        // ==============================
        // 3. NORMALISASI ORESTE
        // ==============================
        $max = max($totalPreferensi);
        $hasil_oreste = [];

        foreach ($totalPreferensi as $alt => $val) {
            $hasil_oreste[$alt] =
                $max > 0 ? round((1 - ($val / $max)), 4) : 0;
        }

        // ==============================
        // 4. RANKING ORESTE
        // ==============================
        asort($hasil_oreste);

        $rankingOreste = [];
        $no = 1;

        foreach ($hasil_oreste as $alt => $skor) {
            $rankingOreste[] = [
                'no' => $no++,
                'alternatif' => $alt,
                'skor' => $skor
            ];
        }

        // ==============================
        // 5. SIMPAN KE TABEL hasil_oreste
        // ==============================

        DB::table('hasil_oreste')->truncate(); // reset agar tidak double

        foreach ($hasil_oreste as $alt => $skor) {

            $moora = $data->firstWhere('alternatif.nama', $alt)->skor_moora ?? 0;

            DB::table('hasil_oreste')->insert([
                'alternatif' => $alt,
                'nilai_moora' => $moora,
                'nilai' => $skor,
                'total_nilai' => $skor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return view('admin.perangkingan.index', [
            'ranking' => $data,
            'preferensi' => $preferensi,
            'totalPreferensi' => $totalPreferensi,
            'hasil_oreste' => $rankingOreste,
            'message' => null
        ]);
    }
}
