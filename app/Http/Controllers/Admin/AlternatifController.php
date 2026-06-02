<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('admin.alternatif.index', compact('alternatif'));
    }

    public function create()
    {
        return view('admin.alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:alternatif,code',
            'nama' => 'required',
        ]);

        Alternatif::create($request->all());
        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('admin.alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $request->validate([
            'code' => 'required|unique:alternatif,code,' . $alternatif->id,
            'nama' => 'required',
        ]);

        $alternatif->update($request->all());
        return redirect()->route('alternatif.index')->with('success', 'Data alternatif berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Alternatif::findOrFail($id)->delete();
        return redirect()->route('alternatif.index')->with('success', 'Data alternatif berhasil dihapus.');
    }
}
