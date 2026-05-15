<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">

</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">   
    <?php include 'layout/navbar1.php'; ?>

    <div class="row">
        <!-- KOLOM KIRI: PRODUK -->
        <div class="col-lg-8">
            <div class="card-custom">
                <h6 class="fw-bold mb-3">Transaksi Penjualan</h6>
                <p class="text-muted small">Scan barcode atau cari barang untuk menambahkan ke keranjang.</p>
                
                <div class="d-flex gap-2 mb-4">
                    <div class="flex-grow-1 position-relative">
                        <i class="fas fa-barcode position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" class="form-control ps-5" placeholder="Scan barcode di sini..." style="border-radius: 8px;">
                    </div>
                    <button class="btn btn-success px-4" style="background: var(--dark-green); border-radius: 8px;">Cari Barang</button>
                </div>

                <h6 class="fw-bold mb-3">Kategori</h6>
                <div class="d-flex flex-wrap gap-2">
                    <button class="category-btn active">Semua</button>
                    <button class="category-btn">Alat Tulis</button>
                    <button class="category-btn">Makanan</button>
                    <button class="category-btn">Minuman</button>
                    <button class="category-btn">Buku</button>
                    <button class="category-btn">Lainnya</button>
                </div>

                <div class="product-grid">
                    <?php
                    $products = [
                        ['nama' => 'Buku Tulis 38 Lbr', 'stok' => 120, 'harga' => '2.000', 'img' => '📓'],
                         ['nama' => 'Kamus', 'stok' => 128, 'harga' => '15.000', 'img' => '📕'],
                          ['nama' => 'Pembatas Buku', 'stok' => 60, 'harga' => '1.000', 'img' => '📑'],
                        ['nama' => 'Pensil 2B', 'stok' => 80, 'harga' => '1.500', 'img' => '✏️'],
                        ['nama' => 'Pulpen Hitam', 'stok' => 15, 'harga' => '2.000', 'img' => '🖋️'],
                        ['nama' => 'Topi Upacara', 'stok' => 8, 'harga' => '5.000', 'img' => '🧢'],
                        ['nama' => 'Air Mineral 600ml', 'stok' => 50, 'harga' => '3.000', 'img' => '🥤'],
                        ['nama' => 'Tas Sekolah', 'stok' => 30, 'harga' => '20.500', 'img' => '🎒'],
                        ['nama' => 'Buku LKS', 'stok' => 35, 'harga' => '15.500', 'img' => '📚'],
                        ['nama' => 'Jangka', 'stok' => 7, 'harga' => '1.000', 'img' => '📐'],
                        ['nama' => 'Tempat Pensil', 'stok' => 10, 'harga' => '10.000', 'img' => '👝'],
                        ['nama' => 'Gunting', 'stok' => 25, 'harga' => '3.000', 'img' => '✂️'],
                        ['nama' => 'Kalkulator', 'stok' => 20, 'harga' => '10.500', 'img' => '🧮'],
                        ['nama' => 'Penggaris 30cm', 'stok' => 60, 'harga' => '5.500', 'img' => '📏'],
                        ['nama' => 'Kaos Kaki', 'stok' => 40, 'harga' => '8.00', 'img' => '🧦'],

                    ];
                    foreach($products as $p):
                    ?>
                    <div class="product-item">
                        <div style="font-size: 30px;"><?= $p['img'] ?></div>
                        <h6><?= $p['nama'] ?></h6>
                        <div class="stock">Stok: <?= $p['stok'] ?></div>
                        <div class="price">Rp<?= $p['harga'] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- RIWAYAT TERAKHIR -->
            <div class="card-custom">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0">Transaksi Terakhir</h6>
                    <a href="#" class="text-decoration-none small text-muted">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless align-middle" style="font-size: 13px;">
                        <thead>
                            <tr class="text-muted">
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Kasir</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="fw-bold">TRX-2026-0058</td>
                                <td>Admin</td>
                                <td>Rp24.500</td>
                                <td><span class="badge bg-light text-dark px-3">Cash</span></td>
                                <td class="text-muted">20 Mei 2026 09:15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN: KERANJANG -->
        <div class="col-lg-4">
            <div class="cart-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0">Keranjang</h6>
                    <button class="btn btn-link btn-sm text-danger text-decoration-none p-0"><i class="fas fa-trash-alt me-1"></i> Kosongkan</button>
                </div>

                <div class="cart-items-list mb-4" style="max-height: 300px; overflow-y: auto;">
                    <!-- Item 1 -->
                    <div class="cart-item">
                        <div style="font-size: 20px;">📓</div>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold" style="font-size: 13px;">Buku Tulis 38 Lembar</p>
                            <span class="text-muted small">Rp2.000</span>
                        </div>
                        <div class="qty-control">
                            <button>-</button>
                            <input type="text" value="2">
                            <button>+</button>
                        </div>
                        <div class="text-end" style="width: 70px;">
                            <span class="fw-bold small">Rp4.000</span>
                        </div>
                        <i class="fas fa-times-circle text-danger ms-2 cursor-pointer"></i>
                    </div>
                    <!-- Item 2 -->
                    <div class="cart-item">
                        <div style="font-size: 20px;">✏️</div>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-bold" style="font-size: 13px;">Pensil 2B</p>
                            <span class="text-muted small">Rp1.500</span>
                        </div>
                        <div class="qty-control">
                            <button>-</button>
                            <input type="text" value="3">
                            <button>+</button>
                        </div>
                        <div class="text-end" style="width: 70px;">
                            <span class="fw-bold small">Rp4.500</span>
                        </div>
                        <i class="fas fa-times-circle text-danger ms-2 cursor-pointer"></i>
                    </div>
                </div>

                <hr class="text-muted opacity-25">

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted small">Subtotal</span>
                    <span class="fw-bold small">Rp17.500</span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="text-muted small">Diskon</span>
                    <input type="text" class="form-control form-control-sm text-end" value="0" style="width: 80px;">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <h5 class="fw-bold">Total</h5>
                    <h5 class="fw-bold text-success">Rp17.500</h5>
                </div>

                <h6 class="fw-bold mt-4 mb-3 small">Metode Pembayaran</h6>
                <div class="row g-2 mb-4">
                    <div class="col-6">
                        <div class="method-btn active"><i class="fas fa-money-bill-wave me-2"></i> Cash</div>
                    </div>
                    <div class="col-6">
                        <div class="method-btn"><i class="fas fa-university me-2"></i> Transfer</div>
                    </div>
                    <div class="col-6">
                        <div class="method-btn"><i class="fas fa-qrcode me-2"></i> QRIS</div>
                    </div>
                    <div class="col-6">
                        <div class="method-btn"><i class="fas fa-wallet me-2"></i> E-wallet</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="small fw-bold text-muted mb-2">Nominal Bayar</label>
                    <input type="text" class="form-control" placeholder="Masukkan nominal bayar">
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold small">Kembalian</span>
                    <h5 class="fw-bold text-success mb-0">Rp0</h5>
                </div>

                <div class="row g-2">
                    <div class="col-4">
                        <button class="btn btn-outline-secondary w-100 py-2"><i class="fas fa-times me-1"></i> Batal</button>
                    </div>
                    <div class="col-8">
                        <button class="btn-pay"><i class="fas fa-save me-2"></i> Simpan Transaksi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>