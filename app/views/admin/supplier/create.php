<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier - Laboratorium Kewirausahaan</title>

</head>
<body>
<div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Supplier Baru</h1>
        <a href="/admin/supplier" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm mr-1"></i> Batal
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pemasok</h6>
                </div>
                <div class="card-body">
                    <form action="/admin/supplier/store" method="POST">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Perusahaan/Supplier <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" placeholder="Contoh: CV. Sumber Makmur" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Kontak Person <span class="text-danger">*</span></label>
                                    <input type="text" name="kontak_person" class="form-control" placeholder="Nama PIC" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">Nomor HP/WA <span class="text-danger">*</span></label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Jl. Raya Jember No. 101..." required></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Keterangan Tambahan</label>
                            <textarea name="keterangan" class="form-control" rows="2" placeholder="Catatan opsional..."></textarea>
                        </div>

                        <hr>
                        <div class="text-right">
                            <button type="reset" class="btn btn-light mr-2">Reset</button>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save mr-2"></i> Simpan Supplier
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