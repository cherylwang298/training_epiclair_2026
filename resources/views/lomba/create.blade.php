<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas / Tim</title>
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
                    <h4>📋 Form Pendaftaran {{ ucfirst($type ?? 'Tugas') }}</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('lomba-basket.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Tim / Tugas</label>
                            <input type="text" name="nama_tim" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pelatih / Penanggung Jawab</label>
                            <input type="text" name="pelatih" class="form-control" required>
                        </div>

                        @if(($type ?? 'basket') == 'basket')
                            <div class="mb-3">
                                <label class="form-label">Jumlah Pemain</label>
                                <input type="number" name="jumlah_pemain" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Skor</label>
                                <input type="number" name="skor" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pertandingan</label>
                                <input type="date" name="tanggal_pertandingan" class="form-control" required>
                            </div>
                        @elseif(($type ?? '') == 'futsal')
                            <div class="mb-3">
                                <label class="form-label">Jumlah Pemain</label>
                                <input type="number" name="jumlah_pemain" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lapangan</label>
                                <input type="text" name="lapangan" class="form-control">
                            </div>
                        @else
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Tugas</label>
                                <textarea name="deskripsi" class="form-control"></textarea>
                            </div>
                        @endif

                        <div class="d-grid">
                            <button class="btn btn-warning fw-bold">
                                Daftarkan {{ ucfirst($type ?? 'Tugas') }}
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