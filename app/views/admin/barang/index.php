<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../../../../public/assets/css/style.css">

</head>
<body>

<?php include '../../layouts/sidebar.php'; ?>

<div class="main-content">
<?php include '../views/layouts/navbar1.php'?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Daftar Barang</h4>
            <p class="text-muted small">Kelola semua data barang yang tersedia di koperasi.</p>
        </div>
        <a href="barang-tambah.php"><button class="btn btn-success px-4" style="background: var(--primary-green); border-radius: 10px; border:none;"> <i class="fas fa-plus me-2"></i> Tambah Barang
        </button></a>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="row g-3">
        <div class="col-md-3">
            <div class="summary-card">
                <div class="icon-box" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-box"></i></div>
                <div>
                    <div style="font-size: 12px; color: #666;">Total Barang</div>
                    <h4 class="fw-bold mb-0">120</h4>
                    <span style="font-size: 10px; color: #999;">Semua Barang</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-card">
                <div class="icon-box" style="background: #e1f5fe; color: #0288d1;"><i class="fas fa-check-circle"></i></div>
                <div>
                    <div style="font-size: 12px; color: #666;">Barang Aktif</div>
                    <h4 class="fw-bold mb-0">115</h4>
                    <span style="font-size: 10px; color: #999;">Aktif</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-card">
                <div class="icon-box" style="background: #f3e5f5; color: #7b1fa2;"><i class="fas fa-toggle-off"></i></div>
                <div>
                    <div style="font-size: 12px; color: #666;">Barang Nonaktif</div>
                    <h4 class="fw-bold mb-0">5</h4>
                    <span style="font-size: 10px; color: #999;">Nonaktif</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-card">
                <div class="icon-box" style="background: #fff3e0; color: #ef6c00;"><i class="fas fa-exclamation-triangle"></i></div>
                <div>
                    <div style="font-size: 12px; color: #666;">Stok Menipis</div>
                    <h4 class="fw-bold mb-0">8</h4>
                    <span style="font-size: 10px; color: #999;">Perlu Restock</span>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTER SECTION -->
    <div class="filter-section">
        <div class="row g-2">
            <div class="col-md-3 position-relative">
                <input type="text" class="form-control form-control-sm ps-4" placeholder="Cari barang...">
                <i class="fas fa-search position-absolute top-50 translate-middle-y ms-2 text-muted" style="font-size: 12px;"></i>
            </div>
            <div class="col-md-2">
                <select class="form-select form-select-sm"><option>Semua Kategori</option></select>
            </div>
            <div class="col-md-2">
                <select class="form-select form-select-sm"><option>Semua Status</option></select>
            </div>
            <div class="col-md-2">
                <select class="form-select form-select-sm"><option>Stok Menipis</option></select>
            </div>
            <div class="col-md-3 text-end">
                <button class="btn btn-sm btn-outline-success px-4"><i class="fas fa-filter me-2"></i> Filter</button>
            </div>
        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="table-section">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="30"><input type="checkbox"></th>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Stok Min.</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $items = [
                        ['id' => 1, 'kode' => 'BRG001', 'icon' => '🖊️', 'nama' => 'Pulpen Standard', 'kat' => 'Alat Tulis', 'sat' => 'pcs', 'harga' => 'Rp2.000', 'stok' => 120, 'min' => 20, 'status' => 'Aktif'],
                        ['id' => 2, 'kode' => 'BRG002', 'icon' => '📓', 'nama' => 'Buku Tulis 38 Lbr', 'kat' => 'Alat Tulis', 'sat' => 'pcs', 'harga' => 'Rp4.000', 'stok' => 85, 'min' => 15, 'status' => 'Aktif'],
                        ['id' => 3, 'kode' => 'BRG003', 'icon' => '✏️', 'nama' => 'Pensil 2B', 'kat' => 'Alat Tulis', 'sat' => 'pcs', 'harga' => 'Rp1.500', 'stok' => 30, 'min' => 10, 'status' => 'Aktif'],
                        ['id' => 4, 'kode' => 'BRG004', 'icon' => '🧼', 'nama' => 'Penghapus Karet', 'kat' => 'Alat Tulis', 'sat' => 'pcs', 'harga' => 'Rp1.000', 'stok' => 8, 'min' => 10, 'status' => 'Stok Menipis'],
                        ['id' => 5, 'kode' => 'BRG005', 'icon' => '💧', 'nama' => 'Air Mineral 600ml', 'kat' => 'Minuman', 'sat' => 'pcs', 'harga' => 'Rp3.000', 'stok' => 50, 'min' => 10, 'status' => 'Aktif'],
                        ['id' => 6, 'kode' => 'BRG006', 'icon' => '🍟', 'nama' => 'Snack Chitato 68g', 'kat' => 'Makanan', 'sat' => 'pcs', 'harga' => 'Rp6.000', 'stok' => 6, 'min' => 10, 'status' => 'Stok Menipis'],
                    ];

                    foreach($items as $row):
                        $statusClass = ($row['status'] == 'Aktif') ? 'status-aktif' : 'status-warning';
                        $stokColor = ($row['stok'] < $row['min']) ? 'color: #ef6c00; font-weight: bold;' : 'color: #2e7d32;';
                    ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><?= $row['id'] ?></td>
                        <td class="text-muted fw-bold"><?= $row['kode'] ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="img-item"><?= $row['icon'] ?></div>
                                <span><?= $row['nama'] ?></span>
                            </div>
                        </td>
                        <td><?= $row['kat'] ?></td>
                        <td><?= $row['sat'] ?></td>
                        <td><?= $row['harga'] ?></td>
                        <td style="<?= $stokColor ?>"><?= $row['stok'] ?></td>
                        <td><?= $row['min'] ?></td>
                        <td><span class="status-badge <?= $statusClass ?>"><?= $row['status'] ?></span></td>
                        <td class="text-center">

                            <a href="barang-edit.php?id=<?= $row['id'] ?>"><button class="btn btn-action btn-success me-1" style="background:#008a34; border:none;"><i class="fas fa-edit"></i></button></a>
                            <a href=""><button class="btn btn-action btn-danger" style="background:#dc3545; border:none;"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted small">Menampilkan 1 sampai 6 dari 120 data</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
<?php include 'layout/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>