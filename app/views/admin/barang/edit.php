<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Laboratorium Kewirausahaan</title>

</head>
<body>
<div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Barang</h1>
        <a href="/admin/barang" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left mr-1"></i> Batal
        </a>
    </div>

    <div class="card shadow mb-4 border-left-warning">
        <div class="card-body">
            <form action="/admin/barang/update/<?= $barang['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <label class="d-block font-weight-bold text-left">Foto Saat Ini</label>
                        <?php if (!empty($barang['foto'])): ?>
                            <img src="/public/uploads/barang/<?= $barang['foto'] ?>" class="img-fluid rounded border mb-2 shadow-sm" style="max-height: 250px;">
                        <?php else: ?>
                            <div class="bg-light rounded d-flex align-items-center justify-content-center border" style="height: 200px;">
                                <i class="fas fa-box fa-4x text-gray-300"></i>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="foto" class="form-control-file mt-2">
                        <small class="text-muted text-left d-block mt-1">Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Barang <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" class="form-control font-weight-bold" value="<?= htmlspecialchars($barang['nama']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Kategori <span class="text-danger">*</span></label>
                                    <select name="kategori_id" class="form-control" required>
                                        <?php foreach ($kategoris as $k): ?>
                                            <option value="<?= $k['id'] ?>" <?= $barang['kategori_id'] == $k['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($k['nama']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Harga Jual (Rp) <span class="text-danger">*</span></label>
                                    <input type="number" name="harga_jual" class="form-control text-primary font-weight-bold" value="<?= $barang['harga_jual'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Stok Tersedia</label>
                                    <input type="number" name="stok" class="form-control" value="<?= $barang['stok'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Satuan</label>
                                    <input type="text" name="satuan" class="form-control" value="<?= htmlspecialchars($barang['satuan'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($barang['deskripsi'] ?? '') ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-right">
                    <button type="submit" class="btn btn-warning px-5 shadow-sm font-weight-bold">
                        <i class="fas fa-check-circle mr-2"></i> Perbarui Data Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>