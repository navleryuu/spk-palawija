<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('subkriteria')->get();
        $totalBobot = $kriterias->sum('bobot');
        return view('admin.kriteria.index', compact('kriterias', 'totalBobot'));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10|unique:kriteria,kode',
            'nama_kriteria' => 'required|string|max:100',
            'bobot' => 'required|numeric|min:0|max:1',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $validated['status'] = 1;
        $kriteria = Kriteria::create($validated);

        if ($request->has('subkriteria')) {
            foreach ($request->subkriteria as $sub) {
                SubKriteria::create([
                    'kriteria_id' => $kriteria->id,
                    'nama_subkriteria' => $sub['nama_subkriteria'],
                    'nilai' => $sub['nilai'],
                ]);
            }
        }

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan!');

    }

    public function edit($id)
    {
        $kriteria = Kriteria::with('subkriteria')->findOrFail($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $validated = $request->validate([
            'nama_kriteria' => 'required|string|max:100',
            'bobot' => 'required|numeric|min:0|max:1',
            'tipe' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($validated);

        $kriteria->subkriteria()->delete();
        if ($request->has('subkriteria')) {
            foreach ($request->subkriteria as $sub) {
                SubKriteria::create([
                    'kriteria_id' => $kriteria->id,
                    'nama_subkriteria' => $sub['nama_subkriteria'],
                    'nilai' => $sub['nilai'],
                ]);
            }
        }

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->subkriteria()->delete();
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus!');
    }
}
