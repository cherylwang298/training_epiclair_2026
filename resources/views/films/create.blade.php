@extends('layouts.form')

@section('form')
<div class="mb-6 p-4 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-bold mb-4">Tambah Film</h2>
    <form action="{{ route('films.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Judul</label>
            <input type="text" name="judul" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Genre</label>
            <input type="text" name="genre" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Tahun</label>
            <input type="number" name="tahun" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Sutradara</label>
            <input type="text" name="sutradara" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">
            Simpan
        </button>
        <a href="{{ route('films.index') }}" class="ml-3 text-gray-600 hover:text-gray-900">Batal</a>
    </form>
</div>
@endsection

@section('table')
@endsection