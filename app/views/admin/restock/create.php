<?php
$title = $title ?? 'Form Restock';
$barangs = $barangs ?? [];
$suppliers = $suppliers ?? [];
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <h3 class="fw-bold text-success">Form Restock Barang</h3>
                            <p class="text-muted mb-0">Tambahkan stok barang dari supplier.</p>
                        </div>
                        <form action="/admin/restock/store" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Barang</label>
                                    <select name="id_barang" class="form-select rounded-3">
                                        <option value="">Pilih Barang</option>

                                        <?php foreach ($barangs as $barang) : ?>
                                            <option value="<?= htmlspecialchars($barang['id'] ?? '') ?>">
                                                <?= htmlspecialchars($barang['nama_barang'] ?? '-') ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Supplier</label>
                                    <select name="id_supplier" class="form-select rounded-3">
                                        <option value="">Pilih Supplier</option>

                                        <?php foreach ($suppliers as $supplier) : ?>
                                            <option value="<?= htmlspecialchars($supplier['id'] ?? '') ?>">
                                                <?= htmlspecialchars($supplier['nama_supplier'] ?? '-') ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Qty</label>
                                    <input type="number" name="qty" class="form-control rounded-3">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Harga Beli</label>
                                    <input type="number" name="harga_beli" class="form-control rounded-3">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Harga Jual Baru</label>
                                    <input type="number" name="harga_jual_baru" class="form-control rounded-3">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Catatan</label>
                                    <textarea name="catatan" rows="4" class="form-control rounded-3"></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="index.php" class="btn btn-light border rounded-3 px-4">
                                    Batal
                                </a>

                                <button type="submit" class="btn btn-success rounded-3 px-4">
                                    Simpan Restock
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>