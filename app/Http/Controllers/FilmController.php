<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    // --- BARU: Menampilkan halaman form tambah ---
    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'     => 'required|string|max:255',
            'genre'     => 'required|string|max:255',
            'tahun'     => 'required|integer|min:1800|max:'.(date('Y') + 5),
            'sutradara' => 'required|string|max:255',
        ]);

        Film::create($validatedData);

        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
    }

    // --- BARU: Menampilkan halaman form edit ---
    public function edit(Film $film)
    {
        // $film otomatis dicari berdasarkan ID berkat fitur Route Model Binding Laravel
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $validatedData = $request->validate([
            'judul'     => 'required|string|max:255',
            'genre'     => 'required|string|max:255',
            'tahun'     => 'required|integer|min:1800|max:'.(date('Y') + 5),
            'sutradara' => 'required|string|max:255',
        ]);

        $film->update($validatedData);

        return redirect()->route('films.index')->with('info', 'Data film telah diperbarui.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('danger', 'Film telah dihapus.');
    }
}