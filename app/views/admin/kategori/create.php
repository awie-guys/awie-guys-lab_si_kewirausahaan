<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - Laboratorium Kewirausahaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">
    

    <!-- Header Action -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Tambah Kategori Baru</h4>
            <p class="text-muted small">Masukkan informasi kategori produk baru ke dalam sistem.</p>
        </div>
        <a href="kategori.php" class="btn btn-outline-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <!-- Form Section -->
    <div class="table-container">
        <form action="proses_tambah_kategori.php" method="POST">
            <div class="row">
                <!-- Bagian Kiri: Detail Kategori -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label fw-bold">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Makanan Ringan" required>
                    </div>
                </div>

                <!-- Bagian Kanan: Status & Ikon -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status Kategori</label>
                        <select class="form-select" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Non-Aktif</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Ikon / Emoji</label>
                        <input type="text" class="form-control" name="icon" placeholder=" copy paste ikon disini, contoh:✏️">
                        <div class="form-text">Ikon ini akan muncul di daftar kategori.</div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-light px-4">Reset</button>
                <button type="submit" class="btn-add px-4">
                    <i class="fas fa-save me-2"></i> Simpan Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>