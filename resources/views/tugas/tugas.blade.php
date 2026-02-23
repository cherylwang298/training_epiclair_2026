@extends('layouts.form')

@section('form')
<form action="{{ $task ? '/tugas/'.$task->id : '/tugas' }}" method="POST" class="space-y-4">
    @csrf
    @if($task)
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Mata Kuliah</label>
            <input type="text" name="matkul" value="{{ $task ? $task->matkul : '' }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" 
                placeholder="Misal: Basis Data">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Tugas</label>
            <input type="text" name="tugas" value="{{ $task ? $task->tugas : '' }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" 
                placeholder="Misal: Bikin ERD">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Deadline</label>
            <input type="date" name="deadline" value="{{ $task ? $task->deadline : '' }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
        </div>
    </div>
    <div class="flex justify-end gap-2 mt-4">
        @if($task)
            <a href="/tugas" class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-xl">Batal</a>
        @endif
        <button type="submit" class="bg-blue-600 hover:bg-blue-300 text-white hover:text-blue-600 font-bold py-2 px-6 rounded-xl shadow-md transition duration-300">
            {{ $task ? 'Update Data' : '+ Simpan Data' }}
        </button>
    </div>
</form>
@endsection

@section('table')
<div class="overflow-x-auto">
    <table class="w-full text-left">
        <thead>
            <tr class="text-gray-400 border-b">
                <th class="pb-3 font-semibold uppercase text-xs">Mata Kuliah</th>
                <th class="pb-3 font-semibold uppercase text-xs">Tugas</th>
                <th class="pb-3 font-semibold uppercase text-xs">Deadline</th>
                <th class="pb-3 font-semibold uppercase text-xs text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($tasks as $task)
            <tr class="hover:bg-gray-50 transition">
                <td class="py-4 text-gray-700">{{ $task->matkul }}</td>
                <td class="py-4 text-gray-900 font-medium">{{ $task->tugas }}</td>
                <td class="py-4 text-gray-600">
                    <span class="bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded-lg">
                        {{ $task->deadline }}
                    </span>
                </td>
                <td class="py-4 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="/tugas/{{ $task->id }}/edit" 
                           class="bg-amber-400 hover:bg-amber-600 text-white px-4 py-1.5 rounded-lg text-xs font-bold shadow-sm transition">
                            Edit
                        </a>
                        
                        <form action="/tugas/{{ $task->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-rose-700 hover:bg-rose-300 text-white hover:text-rose-700 px-4 py-1.5 rounded-lg text-xs font-bold shadow-sm transition" 
                                    onclick="return confirm('yakin mau hapus tugas ini?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($tasks->isEmpty())
        <div class="text-center py-10">
            <p class="text-gray-400 italic text-sm">Belum ada data tugas nih...</p>
        </div>
    @endif
</div>
@endsection