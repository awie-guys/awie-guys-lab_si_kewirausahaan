<?php
$title = $title ?? 'Riwayat Transaksi';
$transaksis = $transaksis ?? [];
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
        <div class="mb-4">
            <h3 class="fw-bold text-success">Riwayat Transaksi</h3>
            <p class="text-muted">Kelola dan lihat semua riwayat transaksi penjualan.</p>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Periode</label>
                        <input type="date" class="form-control rounded-3" name="tanggal_mulai">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Kasir</label>
                        <select class="form-select rounded-3">
                            <option>Semua Kasir</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <select class="form-select rounded-3">
                            <option>Semua Metode</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <input type="text" class="form-control rounded-3" placeholder="Cari transaksi...">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <small class="text-muted">Total Transaksi</small>
                        <h3 class="fw-bold text-success mt-2">58</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <small class="text-muted">Total Penjualan</small>
                        <h4 class="fw-bold text-success mt-2">Rp2.845.000</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <small class="text-muted">Total Modal</small>
                        <h4 class="fw-bold text-primary mt-2">Rp1.725.000</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <small class="text-muted">Total Laba</small>
                        <h4 class="fw-bold text-warning mt-2">Rp1.120.000</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Kasir</th>
                                <th>Metode</th>
                                <th>Total Penjualan</th>
                                <th>Total Modal</th>
                                <th>Laba</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($transaksis)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($transaksis as $transaksi) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($transaksi['kode_transaksi'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($transaksi['tanggal'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($transaksi['kasir'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($transaksi['metode_pembayaran'] ?? '-') ?></td>
                                        <td>
                                            Rp<?= number_format($transaksi['total_penjualan'] ?? 0, 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            Rp<?= number_format($transaksi['total_modal'] ?? 0, 0, ',', '.') ?>
                                        </td>
                                        <td class="text-success fw-semibold">
                                            Rp<?= number_format($transaksi['laba'] ?? 0, 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <a href="/admin/riwayat-transaksi/detail/<?= htmlspecialchars($transaksi['id'] ?? '') ?>"
                                                class="btn btn-success btn-sm rounded-3">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9">
                                        <div class="text-center py-5 text-muted">
                                            Belum ada data transaksi.
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

    <?php include 'detail.php'; ?>
</body>

</html>