<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - Laboratorium Kewirausahaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style/style.css"> 
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">

    <!-- HEADER ACTION -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Tambah User Baru</h4>
            <p class="text-muted small">Daftarkan akun pengguna baru untuk mengelola sistem kasir.</p>
        </div>
        <a href="user.php" class="btn btn-sm btn-light border rounded-3 px-3">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </a>
    </div>

    <!-- FORM SECTION -->
    <div class="table-container shadow-sm border-0" style="max-width: 800px; margin: 0 auto;">
        <form action="proses-tambah-user.php" method="POST">
            <div class="row g-4">
                
                <!-- Kiri: Data Pribadi -->
                <div class="col-md-6">
                    <h6 class="fw-bold mb-3 text-success"><i class="fas fa-id-card me-2"></i>Data Profil</h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-3" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Role / Hak Akses</label>
                        <select class="form-select rounded-3" name="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Staf">Staf</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Status Akun</label>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="aktif" value="Aktif" checked>
                                <label class="form-check-label small" for="aktif">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="nonaktif" value="Nonaktif">
                                <label class="form-check-label small" for="nonaktif">Nonaktif</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Keamanan Akun -->
                <div class="col-md-6 border-start">
                    <h6 class="fw-bold mb-3 text-success"><i class="fas fa-user-lock me-2"></i>Kredensial Login</h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Username</label>
                        <input type="text" class="form-control rounded-3" name="username" placeholder="Masukkan username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Password</label>
                        <input type="password" class="form-control rounded-3" name="password" placeholder="Buat password baru" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Warna Avatar</label>
                        <input type="color" class="form-control form-control-color w-100 rounded-3" name="color" value="#008a34" title="Pilih warna profil">
                        <p class="text-muted" style="font-size: 10px; margin-top: 5px;">Warna ini akan muncul sebagai latar belakang inisial user.</p>
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <div class="col-12 mt-2">
                    <hr class="opacity-25">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-light px-4 fw-bold small rounded-3">Reset</button>
                        <button type="submit" class="btn-add px-4">
                            <i class="fas fa-user-plus me-2"></i> Daftarkan User
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div> <!-- TUTUP main-content -->

<?php include 'layout/footer.php'; ?> <!-- Footer di luar kontainer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>