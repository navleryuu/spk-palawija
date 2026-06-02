<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = DB::table('perangkingans as p')
            ->join('alternatif as a', 'p.alternatif_id', '=', 'a.id')
            ->leftJoin('hasil_oreste as o', 'o.alternatif', '=', 'a.nama')
            ->select(
                'a.nama as alternatif',
                'p.rank_moora',
                DB::raw('COALESCE(p.skor_moora, 0) as skor_moora'),
                DB::raw('COALESCE(o.total_nilai, 0) as nilai_oreste')
            )

            // Nilai ORESTE terkecil = ranking terbaik
            ->orderBy('nilai_oreste', 'asc')

            ->get();

        return view('kepala.laporan.index', compact('laporan'));
    }

    public function cetak()
    {
        $laporan = DB::table('perangkingans as p')
            ->join('alternatif as a', 'p.alternatif_id', '=', 'a.id')
            ->leftJoin('hasil_oreste as o', 'o.alternatif', '=', 'a.nama')
            ->select(
                'a.nama as alternatif',
                'p.rank_moora',
                DB::raw('COALESCE(p.skor_moora, 0) as skor_moora'),
                DB::raw('COALESCE(o.total_nilai, 0) as nilai_oreste')
            )

            // Urutan cetak mengikuti ranking ORESTE
            ->orderBy('nilai_oreste', 'asc')

            ->get();

        $pdf = Pdf::loadView('kepala.laporan.cetak', compact('laporan'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('laporan_hasil_rekomendasi.pdf');
    }
}