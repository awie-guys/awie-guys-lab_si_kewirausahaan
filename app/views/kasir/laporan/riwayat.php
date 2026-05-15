<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
   
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">   
    
    <?php include 'layout/navbar1.php'; ?>

    <p class="text-muted small mb-4">Kelola dan lihat semua riwayat penjualan.</p>

    <!-- FILTER SECTION -->
    <div class="card-custom mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="small fw-bold mb-2">Periode</label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white"><i class="far fa-calendar-alt"></i></span>
                    <input type="text" class="form-control" value="01/05/2026 - 20/05/2026">
                </div>
            </div>
            <div class="col-md-2">
                <label class="small fw-bold mb-2">Kasir</label>
                <select class="form-select form-select-sm"><option>Semua Kasir</option></select>
            </div>
            <div class="col-md-2">
                <label class="small fw-bold mb-2">Metode Pembayaran</label>
                <select class="form-select form-select-sm"><option>Semua Metode</option></select>
            </div>
            <div class="col-md-3">
                <label class="small fw-bold mb-2">Cari</label>
                <input type="text" class="form-control form-control-sm" placeholder="Cari transaksi...">
            </div>
            <div class="col-md-2">
                <button class="btn btn-sm btn-outline-success w-100"><i class="fas fa-filter me-2"></i> Filter</button>
            </div>
        </div>
    </div>

    <!-- SUMMARY STATS -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-shopping-cart"></i></div>
                <div>
                    <div class="small text-muted">Total Transaksi</div>
                    <h4 class="fw-bold mb-0">58</h4>
                    <span style="font-size: 10px; color: #999;">Transaksi</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-dollar-sign"></i></div>
                <div>
                    <div class="small text-muted">Total Penjualan</div>
                    <h4 class="fw-bold mb-0">Rp2.845.000</h4>
                    <span style="font-size: 10px; color: #999;">Total omzet</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #e3f2fd; color: #1976d2;"><i class="fas fa-file-invoice"></i></div>
                <div>
                    <div class="small text-muted">Total Modal (Harga Beli)</div>
                    <h4 class="fw-bold mb-0">Rp1.725.000</h4>
                    <span style="font-size: 10px; color: #999;">Total modal</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #fff3e0; color: #ef6c00;"><i class="fas fa-chart-line"></i></div>
                <div>
                    <div class="small text-muted">Total Laba</div>
                    <h4 class="fw-bold mb-0 text-success">Rp1.120.000</h4>
                    <span style="font-size: 10px; color: #999;">Total laba</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN TABLE CARD -->
    <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center gap-2 small">
                Tampilkan <select class="form-select form-select-sm w-auto"><option>10</option></select> data
            </div>
            <button class="btn btn-sm btn-outline-secondary px-3"><i class="fas fa-download me-2"></i> Export</button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover table-custom align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Metode</th>
                        <th>Total Penjualan</th>
                        <th>Total Modal</th>
                        <th>Laba</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = [
                        ['no' => 1, 'kode' => 'TRX-2026-0058', 'tgl' => '20 Mei 2026 09:15', 'kasir' => 'Admin', 'metode' => 'Cash', 'jual' => '24.500', 'modal' => '14.000', 'laba' => '10.500'],
                        ['no' => 2, 'kode' => 'TRX-2026-0057', 'tgl' => '20 Mei 2026 09:10', 'kasir' => 'Admin', 'metode' => 'QRIS', 'jual' => '18.000', 'modal' => '11.500', 'laba' => '6.500'],
                        ['no' => 3, 'kode' => 'TRX-2026-0056', 'tgl' => '20 Mei 2026 09:05', 'kasir' => 'Admin', 'metode' => 'Transfer', 'jual' => '37.500', 'modal' => '23.000', 'laba' => '14.500'],
                        ['no' => 4, 'kode' => 'TRX-2026-0055', 'tgl' => '20 Mei 2026 08:58', 'kasir' => 'Kasir 1', 'metode' => 'Cash', 'jual' => '21.000', 'modal' => '12.800', 'laba' => '8.200'],
                    ];
                    foreach($data as $row):
                    ?>
                    <tr>
                        <td><?= $row['no'] ?></td>
                        <td class="fw-bold"><?= $row['kode'] ?></td>
                        <td class="text-muted"><?= $row['tgl'] ?></td>
                        <td><?= $row['kasir'] ?></td>
                        <td><?= $row['metode'] ?></td>
                        <td class="fw-bold">Rp<?= $row['jual'] ?></td>
                        <td class="text-muted">Rp<?= $row['modal'] ?></td>
                        <td class="text-success fw-bold">Rp<?= $row['laba'] ?></td>

                        <td class="text-center">
                            <button class="btn-icon" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $row['kode'] ?>">
                            <i class="far fa-eye"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted small">Menampilkan 1 sampai 10 dari 58 data</span>
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

<!-- Modal Detail Transaksi -->
<?php foreach($data as $row): ?>
<div class="modal fade" id="modalDetail<?= $row['kode'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl"> <!-- Gunakan modal-xl agar lebar sesuai gambar -->
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="modal-title fw-bold">Detail Riwayat Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <!-- Bagian Kiri: Detail Transaksi -->
                    <div class="col-md-4">
                        <div class="card-custom-riwayat h-100 shadow-none border">
                            <h6 class="fw-bold mb-4">Detail Transaksi</h6>
                            <div class="d-flex mb-2"><div class="detail-label">Kode Transaksi</div><div class="detail-value">: <?= $row['kode'] ?></div></div>
                            <div class="d-flex mb-2"><div class="detail-label">Tanggal</div><div class="detail-value">: <?= $row['tgl'] ?></div></div>
                            <div class="d-flex mb-2"><div class="detail-label">Kasir</div><div class="detail-value">: <?= $row['kasir'] ?></div></div>
                            <div class="d-flex mb-2"><div class="detail-label">Metode Pembayaran</div><div class="detail-value">: <?= $row['metode'] ?></div></div>
                            <div class="d-flex mb-2"><div class="detail-label">Nominal Bayar</div><div class="detail-value">: Rp30.000</div></div>
                            <div class="d-flex mb-4"><div class="detail-label">Kembalian</div><div class="detail-value">: Rp5.500</div></div>
                            
                            <hr>
                            <div class="d-flex justify-content-between mb-2"><span class="small text-muted">Total Penjualan</span><span class="fw-bold">Rp<?= $row['jual'] ?></span></div>
                            <div class="d-flex justify-content-between mb-2"><span class="small text-muted">Total Modal</span><span class="fw-bold">Rp<?= $row['modal'] ?></span></div>
                            <div class="d-flex justify-content-between"><span class="small text-muted">Total Laba</span><span class="fw-bold text-success">Rp<?= $row['laba'] ?></span></div>
                        </div>
                    </div>

                    <!-- Bagian Kanan: Detail Item -->
                    <div class="col-md-8">
                        <div class="card-custom-riwayat h-100 shadow-none border">
                            <h6 class="fw-bold mb-4">Detail Item</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless align-middle" style="font-size: 13px;">
                                    <thead class="border-bottom">
                                        <tr class="text-muted">
                                            <th>No.</th>
                                            <th>Barang</th>
                                            <th>Harga Jual</th>
                                            <th>Harga Beli</th>
                                            <th>Qty</th>
                                            <th>Subtotal Jual</th>
                                            <th>Subtotal Beli</th>
                                            <th>Laba</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Ini nantinya diisi data item dari database berdasarkan kode transaksi -->
                                        <tr>
                                            <td>1</td>
                                            <td><div class="d-flex align-items-center gap-2"><span>📓</span> Buku Tulis 38 Lembar</div></td>
                                            <td>Rp2.000</td>
                                            <td>Rp1.200</td>
                                            <td>2</td>
                                            <td>Rp4.000</td>
                                            <td>Rp2.400</td>
                                            <td class="text-success fw-bold">Rp1.600</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="border-top fw-bold">
                                        <tr>
                                            <td colspan="4">Total</td>
                                            <td>5</td>
                                            <td>Rp8.500</td>
                                            <td>Rp5.100</td>
                                            <td class="text-success">Rp3.400</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pb-4 px-4">
                <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success rounded-3 px-4" style="background: var(--primary-green); border: none;">
                    <i class="fas fa-print me-2"></i> Cetak Struk
                </button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</body>
</html>