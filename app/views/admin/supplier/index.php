<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - Laboratorium Kewirausahaan</title>

</head>
<body>
<div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
            <p class="mb-0 text-muted">Kelola daftar pemasok barang untuk koperasi sekolah.</p>
        </div>
        <a href="/admin/supplier/create" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle fa-sm text-white-50 mr-2"></i> Tambah Supplier
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pemasok Aktif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Nama Supplier</th>
                            <th>Kontak Person</th>
                            <th>No. HP</th>
                            <th>Alamat</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($suppliers)): ?>
                            <?php $no = 1; foreach ($suppliers as $s): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $no++ ?></td>
                                    <td class="align-middle font-weight-bold text-gray-800"><?= htmlspecialchars($s['nama']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($s['kontak_person']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($s['no_hp']) ?></td>
                                    <td class="align-middle small"><?= htmlspecialchars($s['alamat']) ?></td>
                                    <td class="text-center align-middle">
                                        <?php if (($s['status'] ?? 'Aktif') == 'Aktif'): ?>
                                            <span class="badge badge-success px-2 py-1">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge badge-secondary px-2 py-1">Nonaktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            <a href="/admin/supplier/edit/<?= $s['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/admin/supplier/delete/<?= $s['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus supplier ini?')" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <i class="fas fa-truck-loading fa-3x text-gray-200 mb-3"></i>
                                    <p class="text-gray-500 italic">Belum ada data supplier terdaftar.</p>
                                </td>
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