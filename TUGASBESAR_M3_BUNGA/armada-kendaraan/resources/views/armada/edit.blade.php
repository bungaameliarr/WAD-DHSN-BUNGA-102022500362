<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Armada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">Edit Data Armada</div>
                    <div class="card-body">
                        <form action="{{ route('armada.update', $armada->id_armada) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nomor Plat</label>
                                <input type="text" name="nomor_plat" value="{{ $armada->nomor_plat }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input type="text" name="unit" value="{{ $armada->unit }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Pembuatan</label>
                                <input type="number" name="tahun_pembuatan" value="{{ $armada->tahun_pembuatan }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Merek</label>
                                <textarea name="merek" class="form-control" rows="2" required>{{ $armada->merek }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transmisi</label>
                                <select name="tipe_transmisi" class="form-control" required>
                                    <option value="Manual" {{ $armada->transmisi == 'Manual' ? 'selected' : '' }}>Manual</option>
                                    <option value="Automatic" {{ $armada->transmisi == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
                            <a href="{{ route('armada.index') }}" class="btn btn-secondary w-100 mt-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>