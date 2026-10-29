<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Armada Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Manajemen Data Armada Kendaraan</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <!-- Form Tambah Armada -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">Tambah Armada</div>
                    <div class="card-body">
                        <form action="{{ route('armada.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nomor Plat</label>
                                <input type="text" name="nomor_plat" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="text" name="unit" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Pembuatan</label>
                                <input type="number" name="tahun_pembuatan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Merek</label>
                                <textarea name="merek" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transmisi</label>
                                <select name="tipe_transmisi" class="form-control" required>
                                    <option value="Manual">Manual</option>
                                    <option value="Automatic">Automatic</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel Data Armada -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">Daftar Armada Kendaraan</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Plat</th>
                                        <th>Unit</th>
                                        <th>Tahun</th>
                                        <th>Merek</th>
                                        <th>Transmisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($armada as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nomor_plat }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->tahun_pembuatan }}</td>
                                        <td>{{ $item->merek }}</td>
                                        <td>{{ $item->transmisi }}</td>
                                        <td>
                                            <a href="{{ route('armada.edit', $item->id_armada) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('armada.delete', $item->id_armada) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>