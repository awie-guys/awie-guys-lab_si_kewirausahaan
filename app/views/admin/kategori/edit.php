<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Kopsis POS</title>
</head>
<body>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kategori</h1>
        <a href="/admin/kategori" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-warning">
                    <h6 class="m-0 font-weight-bold text-white">Ubah Data: <?= htmlspecialchars($kategori['nama']) ?></h6>
                </div>
                <div class="card-body">
                    <form action="/admin/kategori/update/<?= $kategori['id'] ?>" method="POST">
                        <div class="form-group mb-4">
                            <label for="nama" class="font-weight-bold text-dark">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   class="form-control" 
                                   value="<?= htmlspecialchars($kategori['nama']) ?>" 
                                   required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="deskripsi" class="font-weight-bold text-dark">Deskripsi</label>
                            <textarea name="deskripsi" 
                                      id="deskripsi" 
                                      rows="4" 
                                      class="form-control"><?= htmlspecialchars($kategori['deskripsi'] ?? '') ?></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold text-dark">Status Kategori</label>
                            <div class="mt-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status1" name="status" value="Aktif" class="custom-control-input" <?= ($kategori['status'] ?? 'Aktif') == 'Aktif' ? 'checked' : '' ?>>
                                    <label class="custom-control-label" for="status1">Aktif</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="status2" name="status" value="Nonaktif" class="custom-control-input" <?= ($kategori['status'] ?? '') == 'Nonaktif' ? 'checked' : '' ?>>
                                    <label class="custom-control-label" for="status2">Nonaktif</label>
                                </div>
                            </div>
                        </div>

                        <div class="border-top pt-4 text-right">
                            <a href="/admin/kategori" class="btn btn-light mr-2">Batal</a>
                            <button type="submit" class="btn btn-warning px-4 text-white">
                                <i class="fas fa-check-circle mr-2"></i> Perbarui Data
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