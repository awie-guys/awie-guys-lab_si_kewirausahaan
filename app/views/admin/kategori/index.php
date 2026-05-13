<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<div class="main-content">

   <?php include 'layout/navbar1.php'; ?>

    <!-- HEADER ACTION -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Daftar Kategori</h4>
            <p class="text-muted small">Kelola semua kategori produk di laboratorium kewirausahaan.</p>
        </div>
        <a href="kategori-tambah.php"><button class="btn btn-success px-4" style="background: var(--primary-green); border-radius: 10px; border:none;"><i class="fas fa-plus me-2"></i> Tambah Kategori</button></a>
    </div>

    <!-- SUMMARY CARDS (Sesuai Layout Gambar) -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="summary-card">
                <div class="summary-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-folder"></i></div>
                <div>
                    <p class="text-muted small mb-0 uppercase fw-bold">Total Kategori</p>
                    <h4 class="fw-bold mb-0">12</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="summary-card">
                <div class="summary-icon" style="background: #e0f2f1; color: #00796b;"><i class="fas fa-box"></i></div>
                <div>
                    <p class="text-muted small mb-0 uppercase fw-bold">Total Barang</p>
                    <h4 class="fw-bold mb-0">120</h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="summary-card">
                <div class="summary-icon" style="background: #e3f2fd; color: #1565c0;"><i class="fas fa-check-circle"></i></div>
                <div>
                    <p class="text-muted small mb-0 uppercase fw-bold">Kategori Aktif</p>
                    <h4 class="fw-bold mb-0">12</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-card">
                <div class="summary-icon" style="background: #ffebee; color: #c62828;"><i class="fas fa-times-circle"></i></div>
                <div>
                    <p class="text-muted small mb-0 uppercase fw-bold">Kategori Nonaktif</p>
                    <h4 class="fw-bold mb-0">0</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="table-container">
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex align-items-center gap-2 small text-muted">
                Tampilkan <select class="form-select form-select-sm" style="width:70px;"><option>10</option></select> data
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr style="font-size: 12px; text-transform: uppercase; color: #555;">
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Barang</th>
                        <th class="text-center">Status</th>
                        <th>Dibuat Pada</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody style="font-size: 14px;">
                    <?php
                    $data = [
                        ['id' => 1, 'icon' => '🍱', 'nama' => 'Makanan', 'stok' => '45 Barang', 'date' => '20 Mei 2026 09:15'],
                        ['id' => 2, 'icon' => '🥤', 'nama' => 'Minuman', 'stok' => '28 Barang', 'date' => '20 Mei 2026 09:20'],
                        ['id' => 3, 'icon' => '✏️', 'nama' => 'Alat Tulis', 'stok' => '18 Barang', 'date' => '20 Mei 2026 09:25'],
                        ['id' => 4, 'icon' => '👔', 'nama' => 'Seragam', 'stok' => '12 Barang', 'date' => '20 Mei 2026 09:30'],
                    ];
                    foreach($data as $row): ?>
                    <tr>
                        <td class="text-muted"><?= $row['id'] ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="cat-icon-box"><?= $row['icon'] ?></div>
                                <span class="fw-bold"><?= $row['nama'] ?></span>
                            </div>
                        </td>
                        <td><?= $row['stok'] ?></td>
                        <td class="text-center"><span class="status-badge">Aktif</span></td>
                        <td class="text-muted small"><?= $row['date'] ?></td>
                        <td class="text-center">

                            <a href="kategori-edit.php?id=<?= $row['id'] ?>"><button class="btn btn-sm btn-success shadow-sm"><i class="fas fa-edit"></i></button></a>

                            <a href="kategori-hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                <button class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>