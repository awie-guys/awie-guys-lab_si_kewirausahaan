<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Laboratorium Kewirausahaan</title>

</head>
<body>
<div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
            <p class="text-muted">Kelola akun kasir dan staf untuk akses sistem.</p>
        </div>
        <a href="/admin/user/create" class="btn btn-primary shadow-sm">
            <i class="fas fa-user-plus mr-2"></i> Tambah Kasir
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Sistem</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u): ?>
                        <tr>
                            <td class="text-center align-middle"><?= $no++ ?></td>
                            <td class="align-middle font-weight-bold"><?= htmlspecialchars($u['nama']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($u['username']) ?></td>
                            <td class="align-middle"><?= htmlspecialchars($u['email']) ?></td>
                            <td class="align-middle text-capitalize"><?= htmlspecialchars($u['role']) ?></td>
                            <td class="text-center align-middle">
                                <span class="badge badge-<?= ($u['status'] == 'Aktif') ? 'success' : 'secondary' ?>">
                                    <?= htmlspecialchars($u['status']) ?>
                                </span>
                            </td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="/admin/user/edit/<?= $u['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="/admin/user/reset-password/<?= $u['id'] ?>" class="btn btn-sm btn-outline-info" title="Reset Password"><i class="fas fa-key"></i></a>
                                    <?php if ($u['role'] !== 'admin'): ?>
                                    <a href="/admin/user/delete/<?= $u['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus user ini?')" title="Hapus"><i class="fas fa-trash"></i></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>