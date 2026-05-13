<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang - Laboratorium Kewirausahaan</title>

    <!-- Bootstrap & Font Awesome -->
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
            <h4 class="fw-bold mb-0">Tambah Barang Baru</h4>
            <p class="text-muted small">Input data barang baru untuk stok koperasi sekolah.</p>
        </div>
        <a href="barang.php" class="btn btn-sm btn-light border rounded-3 px-3">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <!-- FORM SECTION -->
    <div class="table-container shadow-sm border-0">
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            <div class="row g-4">
                
                <!-- Kiri: Informasi Dasar -->
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3 text-success"><i class="fas fa-info-circle me-2"></i>Informasi Barang</h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Kode Barang</label>
                        <input type="text" class="form-control rounded-3" name="kode_barang" placeholder="Contoh: BRG001" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Nama Barang</label>
                        <input type="text" class="form-control rounded-3" name="nama_barang" placeholder="Masukkan nama barang" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Kategori</label>
                        <select class="form-select rounded-3" name="id_kategori">
                            <option selected disabled>Pilih Kategori</option>
                            <option value="1">Alat Tulis</option>
                            <option value="2">Makanan</option>
                            <option value="3">Minuman</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Satuan</label>
                        <input type="text" class="form-control rounded-3" name="satuan" placeholder="Contoh: pcs, pack, botol">
                    </div>
                </div>

                <!-- Kanan: Harga & Stok -->
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3 text-success"><i class="fas fa-coins me-2"></i>Harga & Stok</h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Harga Jual (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">Rp</span>
                            <input type="number" class="form-control rounded-3 border-start-0" name="harga_jual" placeholder="0">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-uppercase">Stok Awal</label>
                                <input type="number" class="form-control rounded-3" name="stok" value="0">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-uppercase">Stok Minimal</label>
                                <input type="number" class="form-control rounded-3" name="stok_min" value="10">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Foto Barang</label>
                        <input type="file" class="form-control rounded-3" name="foto">
                        <p class="text-muted" style="font-size: 10px; margin-top: 5px;">Format: JPG, PNG. Maksimal 2MB.</p>
                    </div>
                </div>

                <!-- Tombol Action -->
                <div class="col-12 mt-2">
                    <hr class="opacity-25">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-light px-4 fw-bold small rounded-3">Reset</button>
                        <button type="submit" class="btn-add px-4 ">
                            <i class="fas fa-save me-2"></i> Simpan Barang
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