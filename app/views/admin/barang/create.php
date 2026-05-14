<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Laboratorium Kewirausahaan</title>

</head>
<body>

<div class="main-content">

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang Baru</h1>
        <a href="/admin/barang" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body">
            <form action="/admin/barang/store" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Barang <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" placeholder="Contoh: Pensil 2B" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategoris as $k): ?>
                                    <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['nama']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Harga Beli (Modal)</label>
                            <input type="number" name="harga_beli" class="form-control" placeholder="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Harga Jual <span class="text-danger">*</span></label>
                            <input type="number" name="harga_jual" class="form-control" placeholder="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Stok Awal</label>
                            <input type="number" name="stok" class="form-control" value="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Satuan (Pcs/Box/Unit)</label>
                            <input type="text" name="satuan" class="form-control" placeholder="Contoh: Pcs">
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Foto Barang</label>
                            <input type="file" name="foto" class="form-control-file border p-1 rounded w-100">
                            <small class="text-muted">Format: JPG, PNG. Maks: 2MB</small>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Deskripsi Barang</label>
                            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <button type="reset" class="btn btn-light mr-2">Reset</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-2"></i> Simpan Data Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>