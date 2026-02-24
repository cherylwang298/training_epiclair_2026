@push('styles')
<style>
    * { font-family: 'Poppins', sans-serif; }
</style>
@endpush

@extends('layouts.form')


@section('form')
<div class="mb-6 p-4 bg-purple-100 shadow-md rounded-lg">
    <h2 class="text-xl font-bold mb-4">List Film</h2>
    <a href="{{ route('films.create') }}" class="bg-purple-500 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition duration-300">
        + Tambah Film Baru
    </a>
</div>
@endsection

@section('table')
<div class="overflow-x-auto bg-purple-100 rounded-lg shadow">
    <table class="min-w-full table-auto border-collapse">
        <thead class="bg-purple-200">
            <tr>
                <th class="px-4 py-2 text-left text-gray-700">Judul</th>
                <th class="px-4 py-2 text-left text-gray-700">Genre</th>
                <th class="px-4 py-2 text-left text-gray-700">Tahun</th>
                <th class="px-4 py-2 text-left text-gray-700">Sutradara</th>
                <th class="px-4 py-2 text-center text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($films as $film)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3">{{ $film->judul }}</td>
                <td class="px-4 py-3">{{ $film->genre }}</td>
                <td class="px-4 py-3 text-sm text-gray-600">{{ $film->tahun }}</td>
                <td class="px-4 py-3">{{ $film->sutradara }}</td>
                <td class="px-4 py-3 text-center">
                    <a href="{{ route('films.edit', $film->id) }}" class="text-blue-400 hover:text-pink-700 font-medium mr-3">Edit</a>
                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus film ini?')" class="text-red-600 hover:text-red-900 font-medium">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection