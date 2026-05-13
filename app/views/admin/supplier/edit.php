<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier - Laboratorium Kewirausahaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/style.css"> 
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Edit Data Supplier</h4>
            <p class="text-muted small">Perbarui informasi mitra pemasok barang koperasi.</p>
        </div>
        <a href="supplier.php" class="btn btn-sm btn-light border rounded-3 px-3">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <div class="supplier-container shadow-sm border-0" style="max-width: 900px; margin: 0 auto;">
        <form action="proses-edit-supplier.php" method="POST">
            <input type="hidden" name="id_supplier" value="SUP-001">

            <div class="row g-4">
                
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3 text-success"><i class="fas fa-store me-2"></i>Informasi Supplier</h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">NAMA SUPPLIER / PERUSAHAAN</label>
                        <input type="text" class="form-control rounded-3" name="nama_supplier" value="CV Sumber Makmur" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">ALAMAT LENGKAP</label>
                        <textarea class="form-control rounded-3" name="alamat" rows="4" required>Jl. Gajah Mada No. 12, Jember, Jawa Timur</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">STATUS KERJASAMA</label>
                        <select class="form-select rounded-3" name="status">
                            <option value="Aktif" selected>Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 border-start">
                    <h6 class="fw-bold mb-3 text-success"><i class="fas fa-user-tie me-2"></i>Kontak Person</h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">NAMA KONTAK (PIC)</label>
                        <input type="text" class="form-control rounded-3" name="kontak_person" value="Budi Santoso" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">NOMOR HP / WHATSAPP</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fab fa-whatsapp"></i></span>
                            <input type="text" class="form-control rounded-3 border-start-0" name="no_hp" value="081234567890" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">EMAIL (OPSIONAL)</label>
                        <input type="email" class="form-control rounded-3" name="email" value="budi@sumbermakmur.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">KATEGORI BARANG PASOKAN</label>
                        <input type="text" class="form-control rounded-3" name="kategori_pasokan" value="Alat Tulis Kantor">
                    </div>
                </div>

                <div class="col-12 mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-light px-4 fw-bold small">Reset</button>
                        <button type="submit" class="btn-add px-4">
                            <i class="fas fa-sync-alt me-2"></i> Update Data
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>