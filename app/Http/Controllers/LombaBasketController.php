<?php

namespace App\Http\Controllers;

use App\Models\LombaBasket;
use Illuminate\Http\Request;

class LombaBasketController extends Controller
{
    // Menampilkan semua tim
    public function index()
    {
        $data = LombaBasket::all();
        return view('lomba.index', compact('data'));
    }

    // Form create
    public function create()
    {
        return view('lomba.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'pelatih' => 'required|string|max:255',
            'jumlah_pemain' => 'required|integer',
            'skor' => 'nullable|integer',
            'tanggal_pertandingan' => 'nullable|date',
            'asal_sekolah' => 'nullable|string|max:255',
        ]);

        $tim = LombaBasket::create($request->all());

        return redirect()->route('lomba-basket.index')
                         ->with('success', "Tim $tim->nama_tim berhasil didaftarkan!");
    }

    // Detail tim
    public function show(LombaBasket $lomba_basket)
    {
        return view('lomba.show', ['data' => $lomba_basket]);
    }

    // Form edit
    public function edit(LombaBasket $lomba_basket)
    {
        return view('lomba.edit', ['data' => $lomba_basket]);
    }

    // Update data
    public function update(Request $request, LombaBasket $lomba_basket)
    {
        $request->validate([
            'nama_tim' => 'required|string|max:255',
            'pelatih' => 'required|string|max:255',
            'jumlah_pemain' => 'required|integer',
            'skor' => 'nullable|integer',
            'tanggal_pertandingan' => 'nullable|date',
            'asal_sekolah' => 'nullable|string|max:255',
        ]);

        $lomba_basket->update($request->all());

        return redirect()->route('lomba-basket.index')
                         ->with('success', 'Data berhasil diupdate!');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = \App\Models\LombaBasket::findOrFail($id);
        $data->delete();

        return redirect()->route('lomba-basket.index')
                        ->with('success','Data berhasil dihapus');
    }
}