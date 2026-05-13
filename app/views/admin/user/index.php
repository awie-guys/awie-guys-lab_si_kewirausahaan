<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">

</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">
  <?php include 'layout/navbar1.php'?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Daftar User</h5>
            <p class="text-muted small mb-0">Kelola akun pengguna dan hak akses sistem.</p>
        </div>
        <a href="user-tambah.php" class="btn btn-success px-4" style="background: var(--primary-green); border-radius: 10px; border:none;">
            <i class="fas fa-plus me-2"></i> Tambah User</a>
    </div>

    <!-- USER STATS -->
    <div class="row g-3 mb-4">
        <div class="col-md">
            <div class="user-stat-card">
                <div class="stat-icon-circle" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-user"></i></div>
                <div>
                    <div class="text-muted small">Total User</div>
                    <h5 class="fw-bold mb-0">6</h5>
                    <span class="text-muted" style="font-size: 10px;">Semua User</span>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="user-stat-card">
                <div class="stat-icon-circle" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-user-shield"></i></div>
                <div>
                    <div class="text-muted small">Administrator</div>
                    <h5 class="fw-bold mb-0">1</h5>
                    <span class="text-muted" style="font-size: 10px;">User</span>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="user-stat-card">
                <div class="stat-icon-circle" style="background: #e3f2fd; color: #1976d2;"><i class="fas fa-cash-register"></i></div>
                <div>
                    <div class="text-muted small">Kasir</div>
                    <h5 class="fw-bold mb-0">3</h5>
                    <span class="text-muted" style="font-size: 10px;">User</span>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="user-stat-card">
                <div class="stat-icon-circle" style="background: #f5f5f5; color: #666;"><i class="fas fa-user-times"></i></div>
                <div>
                    <div class="text-muted small">Nonaktif</div>
                    <h5 class="fw-bold mb-0">1</h5>
                    <span class="text-muted" style="font-size: 10px;">User</span>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-2 small">
                Tampilkan <select class="form-select form-select-sm w-auto"><option>10</option></select> data
            </div>
            <div class="position-relative">
                <input type="text" class="form-control form-control-sm ps-3" placeholder="Cari user..." style="width: 200px; border-radius: 8px;">
                <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-2 text-muted" style="font-size: 12px;"></i>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-user align-middle">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Terakhir Login</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = [
                        ['no' => 1, 'nama' => 'Admin', 'user' => 'admin', 'role' => 'Administrator', 'status' => 'Aktif', 'tgl' => '20 Mei 2026 09:15', 'color' => '#2e7d32'],
                        ['no' => 2, 'nama' => 'Ocha', 'user' => 'Ocha', 'role' => 'Kasir', 'status' => 'Aktif', 'tgl' => '20 Mei 2026 09:10', 'color' => '#0d6efd'],
                        ['no' => 3, 'nama' => 'Hanip', 'user' => 'Hanip', 'role' => 'Kasir', 'status' => 'Aktif', 'tgl' => '20 Mei 2026 09:05', 'color' => '#6f42c1'],
                        ['no' => 4, 'nama' => 'Dimas', 'user' => 'Dimas', 'role' => 'Kasir', 'status' => 'Aktif', 'tgl' => '20 Mei 2026 08:58', 'color' => '#fd7e14'],
                        ['no' => 5, 'nama' => 'Febby', 'user' => 'Febby', 'role' => 'Kasir', 'status' => 'Nonaktif', 'tgl' => '19 Mei 2026 16:40', 'color' => '#d63384'],
                        ['no' => 6, 'nama' => 'Zila', 'user' => 'Zila', 'role' => 'Kasir', 'status' => 'Aktif', 'tgl' => '19 Mei 2026 15:30', 'color' => '#0dcaf0'],
                        ['no' => 7, 'nama' => 'Tata', 'user' => 'Tata', 'role' => 'Kasir', 'status' => 'Aktif', 'tgl' => '19 Mei 2026 15:30', 'color' => '#acf00d'],
                    ];

                    foreach($users as $u):
                        $roleClass = 'role-staf';
                        if($u['role'] == 'Administrator') $roleClass = 'role-admin';
                        if($u['role'] == 'Kasir') $roleClass = 'role-kasir';
                        
                        $statusClass = ($u['status'] == 'Aktif') ? 'status-active' : 'status-inactive';
                    ?>
                    <tr>
                        <td><?= $u['no'] ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar-initial" style="background-color: <?= $u['color'] ?>;">
                                    <?= substr($u['nama'], 0, 1) ?>
                                </div>
                                <span class="fw-bold"><?= $u['nama'] ?></span>
                            </div>
                        </td>
                        <td class="text-muted"><?= $u['user'] ?></td>
                        <td><span class="badge-role <?= $roleClass ?>"><?= $u['role'] ?></span></td>
                        <td><span class="<?= $statusClass ?>"><?= $u['status'] ?></span></td>
                        <td class="text-muted"><?= $u['tgl'] ?></td>
                        <td class="text-center">

                            <a href="user-edit.php?id=<?= $u['no'] ?>"><button class="btn btn-action btn-success me-1" style="background:#008a34; border:none;"><i class="fas fa-edit"></i></button></a>
                            <a href=""><button class="btn btn-action btn-danger" style="background:#dc3545; border:none;"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted small">Menampilkan 1 sampai 7 dari 7 data</span>
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
</body>
</html>