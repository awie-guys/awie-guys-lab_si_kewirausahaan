<?php
$title = $title ?? 'Detail Transaksi';
$transaksi = $transaksi ?? [];
$details = $details ?? [];
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
                <h3 class="fw-bold text-success">Detail Transaksi</h3>
                <p class="text-muted mb-0">Informasi lengkap transaksi penjualan.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Informasi Transaksi</h5>

                        <div class="mb-3">
                            <small class="text-muted d-block">Kode Transaksi</small>
                            <strong><?= htmlspecialchars($transaksi['kode_transaksi'] ?? '-') ?></strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Tanggal</small>
                            <strong><?= htmlspecialchars($transaksi['tanggal'] ?? '-') ?></strong>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">Kasir</small>
                            <strong><?= htmlspecialchars($transaksi['kasir'] ?? '-') ?></strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Metode Pembayaran</small>
                            <strong><?= htmlspecialchars($transaksi['metode_pembayaran'] ?? '-') ?></strong>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block">Nominal Bayar</small>
                            <strong>
                                Rp<?= number_format($transaksi['nominal_bayar'] ?? 0, 0, ',', '.') ?>
                            </strong>
                        </div>
                        <div>
                            <small class="text-muted d-block">Kembalian</small>
                            <strong>
                                Rp<?= number_format($transaksi['kembalian'] ?? 0, 0, ',', '.') ?>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
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
                                    <?php if (!empty($details)) : ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($details as $detail) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= htmlspecialchars($detail['nama_barang'] ?? '-') ?></td>
                                                <td>
                                                    Rp<?= number_format($detail['harga_jual'] ?? 0, 0, ',', '.') ?>
                                                </td>
                                                <td>
                                                    Rp<?= number_format($detail['harga_beli'] ?? 0, 0, ',', '.') ?>
                                                </td>
                                                <td><?= htmlspecialchars($detail['qty'] ?? 0) ?></td>
                                                <td>
                                                    Rp<?= number_format($detail['subtotal_jual'] ?? 0, 0, ',', '.') ?>
                                                </td>
                                                <td>
                                                    Rp<?= number_format($detail['subtotal_beli'] ?? 0, 0, ',', '.') ?>
                                                </td>
                                                <td class="text-success fw-semibold">
                                                    Rp<?= number_format($detail['laba'] ?? 0, 0, ',', '.') ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8">
                                                <div class="text-center py-5 text-muted">
                                                    Detail transaksi belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="border-top pt-3 mt-3 text-end">
                            <h4 class="fw-bold text-success">
                                Total : Rp<?= number_format($transaksi['total_penjualan'] ?? 0, 0, ',', '.') ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>