<!DOCTYPE html>
<html>
<head>
    <title>Edit {{ ucfirst($type ?? 'Tugas') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
        }

        .card-custom {
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="d-flex align-items-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <h4>✏️ Edit {{ ucfirst($type ?? 'Tugas') }}</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('tugas.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Tim / Tugas</label>
                            <input type="text" name="nama_tim" class="form-control" value="{{ old('nama_tim', $data->nama_tim) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pelatih / Penanggung Jawab</label>
                            <input type="text" name="pelatih" class="form-control" value="{{ old('pelatih', $data->pelatih) }}" required>
                        </div>

                        @if(($type ?? 'basket') == 'basket')
                            <div class="mb-3">
                                <label class="form-label">Jumlah Pemain</label>
                                <input type="number" name="jumlah_pemain" class="form-control" value="{{ old('jumlah_pemain', $data->jumlah_pemain) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Skor</label>
                                <input type="number" name="skor" class="form-control" value="{{ old('skor', $data->skor) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pertandingan</label>
                                <input type="date" name="tanggal_pertandingan" class="form-control" value="{{ old('tanggal_pertandingan', $data->tanggal_pertandingan) }}" required>
                            </div>
                        @elseif(($type ?? '') == 'futsal')
                            <div class="mb-3">
                                <label class="form-label">Jumlah Pemain</label>
                                <input type="number" name="jumlah_pemain" class="form-control" value="{{ old('jumlah_pemain', $data->jumlah_pemain) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lapangan</label>
                                <input type="text" name="lapangan" class="form-control" value="{{ old('lapangan', $data->lapangan) }}">
                            </div>
                        @else
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Tugas</label>
                                <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between mt-3">
                            <!-- Tombol Kembali ke list -->
                            <a href="{{ route('tugas.index', ['type' => $type ?? 'basket']) }}" class="btn btn-secondary">
                                ← Kembali
                            </a>

                            <button class="btn btn-warning fw-bold">
                                Update {{ ucfirst($type ?? 'Tugas') }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>