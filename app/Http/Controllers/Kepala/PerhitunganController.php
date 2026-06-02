<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        // Ambil gabungan hasil MOORA dan ORESTE
        $hasil_gabungan = DB::table('perangkingans as p')
            ->join('alternatif as a', 'p.alternatif_id', '=', 'a.id')
            ->leftJoin('hasil_oreste as o', 'o.alternatif', '=', 'a.nama')
            ->select(
                'a.nama as alternatif',
                'p.rank_moora',
                DB::raw('COALESCE(p.skor_moora, 0) as skor_moora'),
                DB::raw('COALESCE(o.total_nilai, 0) as nilai_oreste')
            )

            // Ranking mengikuti ORESTE
            // Nilai terkecil = ranking terbaik
            ->orderBy('nilai_oreste', 'asc')

            ->get();

        return view('kepala.perhitungan.index', compact('hasil_gabungan'));
    }
}