<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">
    <?php include 'layout/navbar1.php'?>
   
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h5 class="fw-bold mb-1">Daftar Supplier</h5>
            <p class="text-muted small mb-0">Kelola semua data supplier pemasok barang di koperasi.</p>
        </div>
        <a href="supplier-tambah.php"><button class="btn btn-success px-4" style="background: var(--primary-green); border-radius: 10px; border:none;">
            <i class="fas fa-plus me-2"></i> Tambah Supplier
        </button></a>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card-supplier">
                <div class="stat-icon-box" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-users"></i></div>
                <div class="text-muted small">Total Supplier</div>
                <h4 class="fw-bold mb-0">25</h4>
                <p class="mb-0 text-muted" style="font-size: 10px;">Semua supplier</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card-supplier">
                <div class="stat-icon-box" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-store"></i></div>
                <div class="text-muted small">Supplier Aktif</div>
                <h4 class="fw-bold mb-0 text-success">22</h4>
                <p class="mb-0 text-muted" style="font-size: 10px;">Aktif</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card-supplier">
                <div class="stat-icon-box" style="background: #fff3e0; color: #ef6c00;"><i class="fas fa-clock"></i></div>
                <div class="text-muted small">Supplier Nonaktif</div>
                <h4 class="fw-bold mb-0 text-warning">3</h4>
                <p class="mb-0 text-muted" style="font-size: 10px;">Nonaktif</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card-supplier">
                <div class="stat-icon-box" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-file-invoice"></i></div>
                <div class="text-muted small">Total Restock</div>
                <h4 class="fw-bold mb-0">68</h4>
                <p class="mb-0 text-muted" style="font-size: 10px;">Dari semua supplier</p>
            </div>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="small text-muted">Tampilkan 
                    <select class="form-select-sm border-light mx-1"><option>10</option></select> data
                </div>
                <select class="form-select form-select-sm border-light" style="width: 150px;"><option>Semua Status</option></select>
            </div>
            <div class="d-flex gap-2">
                <div class="position-relative">
                    <input type="text" class="form-control form-control-sm ps-3" placeholder="Cari supplier..." style="width: 200px; border-radius: 8px;">
                    <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-2 text-muted" style="font-size: 12px;"></i>
                </div>
                <button class="btn btn-sm btn-outline-secondary border-light text-muted"><i class="fas fa-filter me-1"></i> Filter</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-supplier align-middle">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Nama Supplier</th>
                        <th>Kontak Person</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Total Restock</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $suppliers = [
                        ['no' => 1, 'nama' => 'CV Sumber Makmur', 'cp' => 'Budi Santoso', 'hp' => '0812-3456-7890', 'alamat' => 'Jl. Ahmad Yani No. 10 Banyuwangi', 'restock' => 15, 'status' => 'Aktif'],
                        ['no' => 2, 'nama' => 'PT Cahaya Abadi', 'cp' => 'Siti Nurhaliza', 'hp' => '0822-1111-2222', 'alamat' => 'Jl. Gajah Mada No. 45 Banyuwangi', 'restock' => 12, 'status' => 'Aktif'],
                        ['no' => 3, 'nama' => 'Toko Berkah Jaya', 'cp' => 'Ahmad Rizki', 'hp' => '0813-2222-3333', 'alamat' => 'Jl. Diponegoro No. 23 Banyuwangi', 'restock' => 10, 'status' => 'Aktif'],
                        ['no' => 4, 'nama' => 'UD Maju Bersama', 'cp' => 'Dewi Lestari', 'hp' => '0857-7777-8888', 'alamat' => 'Jl. Letkol Istiqlah No. 5 Banyuwangi', 'restock' => 8, 'status' => 'Aktif'],
                        ['no' => 5, 'nama' => 'Toko Sinar Terang', 'cp' => 'Joko Susilo', 'hp' => '0812-9999-0000', 'alamat' => 'Jl. Jaksa Agung Suprapto No. 88 Banyuwangi', 'restock' => 6, 'status' => 'Aktif'],
                        ['no' => 8, 'nama' => 'Toko Rejeki Baru', 'cp' => 'Slamet Riyadi', 'hp' => '0822-5555-6666', 'alamat' => 'Jl. KH. Agus Salim No. 31 Banyuwangi', 'restock' => 3, 'status' => 'Nonaktif'],
                        ['no' => 9, 'nama' => 'Multi Bangunan', 'cp' => 'Puji Astuti', 'hp' => '0811-4444-5555', 'alamat' => 'Jl. Basuki Rahmat No. 99 Banyuwangi', 'restock' => 2, 'status' => 'Nonaktif'],
                    ];

                    foreach($suppliers as $s):
                        $statusClass = ($s['status'] == 'Aktif') ? 'status-aktif' : 'status-nonaktif';
                    ?>
                    <tr>
                        <td><?= $s['no'] ?></td>
                        <td class="fw-bold"><?= $s['nama'] ?></td>
                        <td><?= $s['cp'] ?></td>
                        <td><?= $s['hp'] ?></td>
                        <td class="text-muted" style="font-size: 11px; max-width: 200px;"><?= $s['alamat'] ?></td>
                        <td><?= $s['restock'] ?></td>
                        <td><span class="badge-status <?= $statusClass ?>"><?= $s['status'] ?></span></td>
                        <td class="text-center">
                            <a href="supplier-edit.php"><button class="btn btn-action btn-success me-1" style="background:#008a34; border:none;"><i class="fas fa-edit"></i></button></a>
                            <a href=""><button class="btn btn-action btn-danger" style="background:#dc3545; border:none;"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted small">Menampilkan 1 sampai 10 dari 25 data</span>
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