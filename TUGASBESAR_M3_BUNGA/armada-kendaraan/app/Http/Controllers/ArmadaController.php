<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;

class ArmadaController extends Controller
{
    public function index()
    {
        $armada = Armada::all();
        return view('armada.index', compact('armada'));
    }

    public function store(Request $request)
    {
        Armada::create([
            'nomor_plat'      => $request->nomor_plat,
            'unit'            => $request->unit,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'merek'           => $request->merek,
            'transmisi'       => $request->tipe_transmisi,
        ]);

        return redirect()->route('armada.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $armada = Armada::findOrFail($id);
        return view('armada.edit', compact('armada'));
    }

    public function update(Request $request, $id)
    {
        $armada = Armada::findOrFail($id);
        $armada->update([
            'nomor_plat'      => $request->nomor_plat,
            'unit'            => $request->unit,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'merek'           => $request->merek,
            'transmisi'       => $request->tipe_transmisi,
        ]);

        return redirect()->route('armada.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $armada = Armada::findOrFail($id);
        $armada->delete();

        return redirect()->route('armada.index')->with('success', 'Data berhasil dihapus!');
    }
}