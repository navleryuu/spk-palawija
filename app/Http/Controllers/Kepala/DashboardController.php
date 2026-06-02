<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 Ambil rekomendasi terbaik berdasarkan ORESTE
        // Nilai terkecil = terbaik
        $rekomendasi = DB::table('hasil_oreste')
            ->orderBy('total_nilai', 'asc')
            ->first();

        // 🔹 Ambil data grafik berdasarkan ranking ORESTE
        // Nilai terkecil = ranking terbaik
        $grafik = DB::table('alternatif AS a')
            ->leftJoin('hasil_oreste AS o', 'o.alternatif', '=', 'a.nama')
            ->select(
                'a.nama AS alternatif',
                DB::raw('COALESCE(o.total_nilai, 0) AS nilai_akhir')
            )
            ->orderBy('nilai_akhir', 'asc')
            ->get();

        // 🔹 Siapkan data chart
        $chartLabels = $grafik->pluck('alternatif')->toArray();

        $chartValues = $grafik->pluck('nilai_akhir')
            ->map(fn($v) => (float)$v)
            ->toArray();

        return view('kepala.dashboard', [
            'rekomendasi' => $rekomendasi->alternatif ?? 'Belum Ada Data',
            'chartLabels' => $chartLabels,
            'chartValues' => $chartValues
        ]);
    }
}