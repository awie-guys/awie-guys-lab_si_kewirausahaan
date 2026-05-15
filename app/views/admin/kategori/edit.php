<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Laboratorium Kewirausahaan</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/style.css"> 
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">

    <!-- HEADER ACTION -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Edit Kategori</h4>
            <p class="text-muted small">Perbarui informasi kategori produk di sini.</p>
        </div>
        <a href="kategori.php" class="btn btn-outline-secondary btn-sm rounded-3">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <!-- FORM EDIT SECTION -->
    <div class="table-container" style="max-width: 1500px;">
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="1"> <!-- Contoh ID Kategori -->

            <div class="mb-4 text-center">
                <div class="cat-icon-box mx-auto mb-2" style="width: 60px; height: 60px; font-size: 24px;">
                    🍔
                </div>
                <p class="small text-muted">Ikon Kategori: Makanan</p>
            </div>

            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label small fw-bold text-uppercase">Nama Kategori</label>
                    <input type="text" class="form-control rounded-3" name="nama_kategori" value="Makanan" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-bold text-uppercase">Pilih Ikon (Emoji)</label>
                    <div class="d-flex gap-2">
                        <input type="text" class="form-control rounded-3" name="ikon" value="🍔" placeholder="Tempel emoji di sini">
                        <button type="button" class="btn btn-light border small">Pilih</button>
                    </div>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-bold text-uppercase">Status Kategori</label>
                    <select class="form-select rounded-3" name="status">
                        <option value="aktif" selected>Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="col-md-12 mt-4">
                    <hr class="text-muted opacity-25">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-light px-4 fw-bold small">Reset</button>
                        <button type="submit" class="btn-add px-4">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="footer">
    &copy; 2026 LABORATORIUM KEWIRAUSAHAAN MTsN 8 BANYUWANGI
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>