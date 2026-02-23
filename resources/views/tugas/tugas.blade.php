{{-- boleh pakai ini langsung, atau mau dihapus semua terus kerja dari awal juga boleh --}}

@extends('layouts.form')

@section('form')
  {{-- boleh diisi pakai template form yang ada di folder template: form-template. atau mau bikin form sendiri juga boleh --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif
  <form class="grid grid-cols-1 md:grid-cols-2 gap-4" action="{{ route('members.store') }}" method="POST"
    enctype="multipart/form-data" class="">
    @csrf

    <div>
      <label
        class="@error('first_name')
        text-red-500
      @enderror block text-sm font-medium text-gray-600 mb-1">
        First Name:
      </label>
      <input type="text" value="{{ old('first_name') }}"
        class="@error('first_name') 
          border-red-500 ring-2 ring-red-500
        @enderror w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        name="first_name" placeholder="Enter first name">
      @error('first_name')
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label
        class="@error('last_name')
        text-red-500
      @enderror block text-sm font-medium text-gray-600 mb-1">
        Last Name:
      </label>
      <input type="text" value="{{ old('last_name') }}"
        class="@error('last_name')
          border-red-500 ring-2 ring-red-500
        @enderror w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        placeholder="Enter last name" name="last_name">
      @error('last_name')
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="@error('hobby')
        text-red-500
      @enderror block text-sm font-medium text-gray-600 mb-1">
        Hobby:
      </label>
      <input type="text" value="{{ old('hobby') }}"
        class="@error('hobby')
          border-red-500 ring-2 ring-red-500
        @enderror w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        placeholder="Enter hobby" name="hobby">
      @error('hobby')
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="@error('major')
        text-red-500
      @enderror block text-sm font-medium text-gray-600 mb-1">
        Major:
      </label>
      <select name="major" class="@error('major')
          border-red-500 ring-2 ring-red-500
        @enderror form-select border border-yellow-700 rounded-lg px-3 py-2">
        <option value="default" disabled selected>Select the major</option>
        <option value="Informatics">Informatics</option>
        <option value="Data Science & Analitics">Data Science & Analitics</option>
        <option value="Bussiness Information System">Bussiness Information System</option>

      </select>
       @error('major')
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label
        class="@error('profile_picture')
        text-red-500
      @enderror block text-sm font-medium text-gray-600 mb-1">
        Profile Picture:
      </label>
      <input type="file" name="profile_picture" value="{{ old('profile_picture') }}"
        class="@error('profile_picture')
          border-red-500 ring-2 ring-red-500
        @enderror border border-gray-300 rounded-lg px-3 py-2 file:mr-4 file:py-1 file:px-4 file:rounded-lg file:border-0 file:bg-gray-500 file:text-white">
      @error('profile_picture')
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div class="md:col-span-2">
      <label class="@error('bio')
        text-red-500
      @enderror block text-sm font-medium text-gray-600 mb-1">
        Bio:
      </label>
      <textarea value="{{ old('bio') }}"
        class="@error('bio')
          border-red-500 ring-2 ring-red-500
        @enderror w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
        name="bio" placeholder="Enter bio"></textarea>
      @error('bio')
        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
      @enderror
    </div>

    <div class="md:col-span-2 flex gap-3 mt-2">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
        Save
      </button>

      <button type="reset" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
        Clear
      </button>
    </div>

  </form>
@endsection

@section('table')
  {{-- ini tabel buat nampilin data dari db + buat actions nya (edit, delete, details). 
boleh copas dari template nya (folder template: table-template) 
kalau mau buat sendiri juga boleh. --}}
  <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
      <thead>
        <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
          <th class="p-3">No</th>
          <th class="p-3">First Name</th>
          <th class="p-3">Last Name</th>
          <th class="p-3">Major</th>
          <th class="p-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        @forelse ($members as $index => $member)
          <tr class="border-t hober:bg-gray-100">
            <td class="p-3">{{ $index + 1 }}</td>
            <td class="p-3">{{ $member->first_name }}</td>
            <td class="p-3">{{ $member->last_name ?? 'N/A' }}</td>
            <td class="p-3">{{ $member->major }}</td>
            <td class="p-3 text-center flex gap-2 justify-center">
              <button class="bg-blue-400 text-white px-3 py-1 rounded-lg text-sm"
                onclick="openEditModal({{ $member->id }})">
                Edit
              </button>
              <button class="bg-green-400 text-white px-3 py-1 rounded-lg text-sm hover:cursor-pointer"
                onclick="getMemberDetails({{ $member->id }})">
                Details
              </button>
              <button class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm"
                onclick="deleteMember({{ $member->id }})">
                Delete
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-red-500 py-4">No Members Available</td>
          </tr>
        @endforelse


      </tbody>
    </table>
  </div>
@endsection

{{-- kalau copy dari template coba ubah tampilannya dikit", kek warna/tulisan dll nya buat latihan tailwind nya jugaa --}}
