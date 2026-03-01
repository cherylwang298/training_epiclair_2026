<!DOCTYPE html>
<html>
<head>
    <title>Detail {{ ucfirst($type ?? 'Tugas') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #141e30, #243b55);
            min-height: 100vh;
        }

        .card-custom {
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="d-flex align-items-center">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <h4>📋 Detail {{ ucfirst($type ?? 'Tugas') }}</h4>
                </div>
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nama Tim / Tugas:</strong> {{ $data->nama_tim }}</li>
                        <li class="list-group-item"><strong>Pelatih / Penanggung Jawab:</strong> {{ $data->pelatih }}</li>

                        @if(($type ?? 'basket') == 'basket')
                            <li class="list-group-item"><strong>Jumlah Pemain:</strong> {{ $data->jumlah_pemain }}</li>
                            <li class="list-group-item"><strong>Skor:</strong> {{ $data->skor }}</li>
                            <li class="list-group-item"><strong>Tanggal Pertandingan:</strong> {{ $data->tanggal_pertandingan }}</li>
                        @elseif(($type ?? '') == 'futsal')
                            <li class="list-group-item"><strong>Jumlah Pemain:</strong> {{ $data->jumlah_pemain }}</li>
                            <li class="list-group-item"><strong>Lapangan:</strong> {{ $data->lapangan }}</li>
                        @else
                            <li class="list-group-item"><strong>Deskripsi:</strong> {{ $data->deskripsi }}</li>
                        @endif
                    </ul>

                    <div class="mt-3 d-flex justify-content-between">
                        <a href="{{ route('tugas.index', ['type' => $type ?? 'basket']) }}" class="btn btn-warning">Kembali</a>
                        <a href="{{ route('tugas.edit', $data->id) }}?type={{ $type ?? 'basket' }}" class="btn btn-primary">Edit</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>