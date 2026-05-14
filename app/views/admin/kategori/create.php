<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - Laboratorium Kewirausahaan</title>

</head>
<body>
    <div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
        <a href="/admin/kategori" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Formulir Kategori Baru</h6>
                </div>
                <div class="card-body">
                    <form action="/admin/kategori/store" method="POST">
                        <div class="form-group mb-4">
                            <label for="nama" class="font-weight-bold text-dark">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   class="form-control" 
                                   placeholder="Contoh: Alat Tulis Kantor, Makanan Ringan" 
                                   required>
                            <small class="text-muted">Gunakan nama yang spesifik untuk mempermudah klasifikasi barang.</small>
                        </div>

                        <div class="form-group mb-4">
                            <label for="deskripsi" class="font-weight-bold text-dark">Deskripsi</label>
                            <textarea name="deskripsi" 
                                      id="deskripsi" 
                                      rows="4" 
                                      class="form-control" 
                                      placeholder="Tambahkan keterangan tambahan mengenai kategori ini..."></textarea>
                        </div>

                        <div class="border-top pt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save mr-2"></i> Simpan Kategori
                            </button>
                            <button type="reset" class="btn btn-light ml-2">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4 border-left-info">
                <div class="card-body">
                    <h6 class="font-weight-bold text-info"><i class="fas fa-info-circle mr-2"></i> Petunjuk</h6>
                    <p class="small text-muted mt-2">
                        Pastikan nama kategori belum pernah terdaftar sebelumnya untuk menghindari duplikasi data di database.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>