<?php
$title = $title ?? 'Transaksi Admin';
$barangs = $barangs ?? [];
$metodePembayaran = $metodePembayaran ?? ['Cash', 'Transfer', 'QRIS', 'E-Wallet'];
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
    <style>
        .product-card {
            transition: .2s ease;
        }

        .product-card:hover {
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

    <div class="container-fluid py-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="fw-bold text-success mb-1">Transaksi Penjualan</h4>
                                <small class="text-muted">Scan barcode atau cari barang untuk menambahkan ke keranjang.</small>
                            </div>
                        </div>
                        <div class="row g-2 mb-4">
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg rounded-3" id="searchBarang"
                                    placeholder="Scan barcode di sini...">
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success w-100 rounded-3 h-100">
                                    Cari Barang
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-success rounded-pill btn-sm">Semua</button>
                                <button class="btn btn-light rounded-pill btn-sm border">Alat Tulis</button>
                                <button class="btn btn-light rounded-pill btn-sm border">Makanan</button>
                                <button class="btn btn-light rounded-pill btn-sm border">Minuman</button>
                                <button class="btn btn-light rounded-pill btn-sm border">Buku</button>
                                <button class="btn btn-light rounded-pill btn-sm border">Lainnya</button>
                            </div>
                        </div>
                        <div class="row g-3">
                            <?php if (!empty($barangs)) : ?>
                                <?php foreach ($barangs as $barang) : ?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="card h-100 border-0 shadow-sm rounded-4 product-card">
                                            <div class="card-body text-center">
                                                <div class="product-image mb-3">
                                                    <img src="<?= htmlspecialchars($barang['gambar'] ?? '/public/assets/img/no-image.png') ?>"
                                                        class="img-fluid" style="height:70px; object-fit:contain;">
                                                </div>
                                                <h6 class="fw-semibold mb-1">
                                                    <?= htmlspecialchars($barang['nama_barang'] ?? '-') ?>
                                                </h6>

                                                <small class="text-muted d-block mb-2">
                                                    Stok: <?= htmlspecialchars($barang['stok'] ?? 0) ?>
                                                </small>

                                                <div class="fw-bold text-success mb-3">
                                                    Rp<?= number_format($barang['harga_jual'] ?? 0, 0, ',', '.') ?>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-success w-100 rounded-3 add-cart-btn"
                                                    data-id="<?= htmlspecialchars($barang['id'] ?? '') ?>"
                                                    data-nama="<?= htmlspecialchars($barang['nama_barang'] ?? '') ?>"
                                                    data-harga="<?= htmlspecialchars($barang['harga_jual'] ?? 0) ?>">
                                                    Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="col-12">
                                    <div class="alert alert-light border text-center py-5 rounded-4">
                                        Data barang belum tersedia.
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 20px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">Keranjang</h5>
                            <button type="button" class="btn btn-sm btn-light text-danger border" id="resetCartBtn">
                                Kosongkan
                            </button>
                        </div>
                        <form action="/transaksi/store" method="POST" id="formTransaksi">
                            <input type="hidden" name="cart_json" id="cart_json">

                            <div id="cartContainer" class="mb-4">
                                <div class="text-center text-muted py-5 border rounded-4 bg-light">
                                    Belum ada barang di keranjang.
                                </div>
                            </div>
                            <div class="border-top pt-3 mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <strong id="subtotalText">Rp0</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Diskon</span>
                                    <strong>Rp0</strong>
                                </div>
                                <div class="d-flex justify-content-between fs-5">
                                    <strong>Total</strong>
                                    <strong class="text-success" id="totalText">Rp0</strong>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Metode Pembayaran</label>
                                <div class="row g-2">
                                    <?php foreach ($metodePembayaran as $index => $metode) : ?>
                                        <div class="col-6">
                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="metode_pembayaran"
                                                id="metode<?= $index ?>"
                                                value="<?= htmlspecialchars($metode) ?>"
                                                <?= $index === 0 ? 'checked' : '' ?>>

                                            <label class="btn btn-outline-success w-100 rounded-3"
                                                for="metode<?= $index ?>">
                                                <?= htmlspecialchars($metode) ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nominal Bayar</label>
                                <input
                                    type="number"
                                    class="form-control rounded-3"
                                    name="nominal_bayar"
                                    id="nominalBayar"
                                    placeholder="Masukkan nominal bayar">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <span class="fw-semibold">Kembalian</span>
                                <strong class="text-success fs-5" id="kembalianText">Rp0</strong>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-light border w-50 rounded-3" id="cancelBtn">
                                    Batal
                                </button>

                                <button type="submit" class="btn btn-success w-50 rounded-3">
                                    Simpan Transaksi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/assets/js/pos.js"></script>

</body>

</html>