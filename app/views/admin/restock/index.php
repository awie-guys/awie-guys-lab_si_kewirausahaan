<?php
$title = $title ?? 'Restock';
$restocks = $restocks ?? [];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Laboratorium Kewirausahaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold text-success mb-1">Restock</h3>
                <p class="text-muted mb-0">Catat barang masuk dari supplier untuk menambah stok.</p>
            </div>

            <a href="form.php" class="btn btn-success rounded-3 px-4">
                + Restock Baru
            </a>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <small class="text-muted">Total Restock (Hari Ini)</small>
                        <h3 class="fw-bold text-success mt-2">8</h3>
                        <small class="text-muted">Transaksi</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <small class="text-muted">Total Item Masuk</small>
                        <h3 class="fw-bold text-primary mt-2">156</h3>
                        <small class="text-muted">Item</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <small class="text-muted">Total Nilai Pembelian</small>
                        <h3 class="fw-bold text-warning mt-2">Rp1.875.000</h3>
                        <small class="text-muted">Total harga beli</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <small class="text-muted">Restock Terakhir</small>
                        <h5 class="fw-bold mt-2">RCK-2026-0058</h5>
                        <small class="text-muted">20 Mei 2026, 09:40</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <div class="row g-3 mb-4 align-items-center">
                    <div class="col-md-2">
                        <select class="form-select rounded-3">
                            <option>10 data</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control rounded-3" name="tanggal_mulai">
                    </div>

                    <div class="col-md-3">
                        <select class="form-select rounded-3">
                            <option>Semua Supplier</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" class="form-control rounded-3" placeholder="Cari no. restock, barang...">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>No. Restock</th>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Jumlah Item</th>
                                <th>Total Item Masuk</th>
                                <th>Total Nilai Beli</th>
                                <th>Dibuat Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($restocks)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($restocks as $restock) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($restock['kode_restock'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($restock['tanggal'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($restock['supplier'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($restock['jumlah_item'] ?? 0) ?></td>
                                        <td><?= htmlspecialchars($restock['qty'] ?? 0) ?></td>
                                        <td>
                                            Rp<?= number_format($restock['total'] ?? 0, 0, ',', '.') ?>
                                        </td>
                                        <td><?= htmlspecialchars($restock['admin'] ?? '-') ?></td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-success btn-sm rounded-circle">
                                                    <i class="bi bi-eye"></i>
                                                </button>

                                                <button class="btn btn-primary btn-sm rounded-circle">
                                                    <i class="bi bi-printer"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="text-center py-5 text-muted">
                                            Data restock belum tersedia.
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>