<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Kriteria;
use App\Models\Alternatif;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalKriteria = Kriteria::count();
        $totalAlternatif = Alternatif::count();

        // Ambil nilai ORESTE
        // Nilai terkecil = terbaik
        $grafik = DB::table('hasil_oreste')
            ->join('alternatif', 'hasil_oreste.alternatif', '=', 'alternatif.nama')
            ->select(
                'alternatif.nama as alternatif',
                'hasil_oreste.total_nilai as nilai_oreste'
            )
            ->orderBy('nilai_oreste', 'asc')
            ->limit(5)
            ->get();

        // Rekomendasi terbaik
        $benihTerbaik = $grafik->first();

        // Data Chart.js
        $chartLabels = $grafik->pluck('alternatif');

        $chartValues = $grafik->pluck('nilai_oreste');

        return view('admin.dashboard', compact(
            'totalKriteria',
            'totalAlternatif',
            'benihTerbaik',
            'chartLabels',
            'chartValues'
        ));
    }
}