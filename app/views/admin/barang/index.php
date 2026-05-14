<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang - Kopsis POS</title>
</head>
<body>

<div class="main-content">

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            <p class="mb-0 text-muted">Kelola stok dan informasi produk koperasi.</p>
        </div>
        <a href="/admin/barang/create" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Tambah Barang
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($barangs ?? []) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light text-dark">
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Foto</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($barangs)): ?>
                            <?php $no = 1; foreach ($barangs as $b): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $no++ ?></td>
                                    <td class="text-center align-middle">
                                        <?php if (!empty($b['foto'])): ?>
                                            <img src="/public/uploads/barang/<?= $b['foto'] ?>" alt="Foto" style="width: 50px; height: 50px; object-fit: cover;" class="rounded border">
                                        <?php else: ?>
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-image text-gray-300"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle font-weight-bold text-gray-800">
                                        <?= htmlspecialchars($b['nama']) ?>
                                        <br><small class="text-muted">Kode: <?= htmlspecialchars($b['kode_barang'] ?? '-') ?></small>
                                    </td>
                                    <td class="align-middle"><?= htmlspecialchars($b['nama_kategori'] ?? 'Uncategorized') ?></td>
                                    <td class="align-middle text-primary font-weight-bold">
                                        Rp <?= number_format($b['harga_jual'], 0, ',', '.') ?>
                                    </td>
                                    <td class="text-center align-middle">
                                        <?php if (($b['stok'] ?? 0) <= 5): ?>
                                            <span class="badge badge-danger"><?= $b['stok'] ?? 0 ?> (Menipis)</span>
                                        <?php else: ?>
                                            <span class="badge badge-success"><?= $b['stok'] ?? 0 ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            <a href="/admin/barang/edit/<?= $b['id'] ?>" class="btn btn-sm btn-warning shadow-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/admin/barang/delete/<?= $b['id'] ?>" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Hapus barang ini?')" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted italic">Data barang belum tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>