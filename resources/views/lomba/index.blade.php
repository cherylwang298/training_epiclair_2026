<!DOCTYPE html>
<html>
<head>
    <title>Data {{ ucfirst($type ?? 'Tugas') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #141e30, #243b55);
            min-height: 100vh;
        }

        .table-custom {
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h4>📋 Data {{ ucfirst($type ?? 'Tugas') }}</h4>
            <a href="{{ route('lomba-basket.create') }}" class="btn btn-warning">
                + Tambah {{ ucfirst($type ?? 'Tugas') }}
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive table-custom">
                <table class="table table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Tim / Tugas</th>
                            <th>Pelatih / Penanggung Jawab</th>
                            @if(($type ?? 'basket') == 'basket' || ($type ?? '') == 'futsal')
                                <th>Jumlah Pemain</th>
                            @endif
                            @if(($type ?? 'basket') == 'basket')
                                <th>Skor</th>
                                <th>Tanggal Pertandingan</th>
                            @elseif(($type ?? '') == 'futsal')
                                <th>Lapangan</th>
                            @elseif(($type ?? '') != '')
                                <th>Deskripsi</th>
                            @endif
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_tim }}</td>
                            <td>{{ $item->pelatih }}</td>
                            @if(($type ?? 'basket') == 'basket' || ($type ?? '') == 'futsal')
                                <td>{{ $item->jumlah_pemain ?? '-' }}</td>
                            @endif
                            @if(($type ?? 'basket') == 'basket')
                                <td>{{ $item->skor ?? '-' }}</td>
                                <td>{{ $item->tanggal_pertandingan ?? '-' }}</td>
                            @elseif(($type ?? '') == 'futsal')
                                <td>{{ $item->lapangan ?? '-' }}</td>
                            @elseif(($type ?? '') != '')
                                <td>{{ $item->deskripsi ?? '-' }}</td>
                            @endif
                            <td>
                                <a href="{{ route('lomba-basket.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('lomba-basket.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>