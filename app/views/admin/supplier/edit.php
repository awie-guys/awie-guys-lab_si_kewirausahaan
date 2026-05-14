<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - Laboratorium Kewirausahaan</title>

</head>
<body>
<div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Supplier</h1>
        <a href="/admin/supplier" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-chevron-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-left-warning">
                <div class="card-header py-3 bg-light">
                    <h6 class="m-0 font-weight-bold text-warning">Perbarui Informasi: <?= htmlspecialchars($supplier['nama']) ?></h6>
                </div>
                <div class="card-body">
                    <form action="/admin/supplier/update/<?= $supplier['id'] ?>" method="POST">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Perusahaan/Supplier <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control font-weight-bold" value="<?= htmlspecialchars($supplier['nama']) ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Kontak Person <span class="text-danger">*</span></label>
                                    <input type="text" name="kontak_person" class="form-control" value="<?= htmlspecialchars($supplier['kontak_person']) ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Nomor HP/WA <span class="text-danger">*</span></label>
                                    <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($supplier['no_hp']) ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($supplier['alamat']) ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Status Pemasok</label>
                            <select name="status" class="form-control">
                                <option value="Aktif" <?= ($supplier['status'] ?? '') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="Nonaktif" <?= ($supplier['status'] ?? '') == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2"><?= htmlspecialchars($supplier['keterangan'] ?? '') ?></textarea>
                        </div>

                        <hr>
                        <div class="text-right">
                            <button type="submit" class="btn btn-warning px-5 shadow-sm font-weight-bold text-dark">
                                <i class="fas fa-sync-alt mr-2"></i> Perbarui Supplier
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>