<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = DB::table('perangkingans')
            ->leftJoin('alternatif', 'perangkingans.alternatif_id', '=', 'alternatif.id')
            ->leftJoin('hasil_oreste', 'alternatif.nama', '=', 'hasil_oreste.alternatif')
            ->select(
                'alternatif.nama as nama_alternatif',
                'perangkingans.rank_moora',
                'perangkingans.skor_moora',
                'hasil_oreste.nilai as nilai_oreste',
                'hasil_oreste.total_nilai as total_oreste'
            )

            // Nilai ORESTE terkecil = terbaik
            ->orderBy('total_oreste', 'asc')

            ->get();

        return view('admin.laporan.index', compact('laporan'));
    }

    public function cetak()
    {
        $laporan = DB::table('perangkingans')
            ->leftJoin('alternatif', 'perangkingans.alternatif_id', '=', 'alternatif.id')
            ->leftJoin('hasil_oreste', 'alternatif.nama', '=', 'hasil_oreste.alternatif')
            ->select(
                'alternatif.nama as nama_alternatif',
                'perangkingans.rank_moora',
                'perangkingans.skor_moora',
                'hasil_oreste.nilai as nilai_oreste',
                'hasil_oreste.total_nilai as total_oreste'
            )

            // Urutan cetak mengikuti ORESTE
            ->orderBy('total_oreste', 'asc')

            ->get();

        if ($laporan->isEmpty()) {
            return redirect()->route('admin.laporan.index')
                ->with('error', 'Tidak ada data untuk dicetak.');
        }

        $pdf = Pdf::loadView('admin.laporan.cetak', compact('laporan'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan-Hasil-Rekomendasi.pdf');
    }
}