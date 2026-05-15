<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Laboratorium Kewirausahaan</title>

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Menggunakan style.css utama -->
    <link rel="stylesheet" href="style/style.css"> 
</head>
<body>

<?php include 'layout/sidebar.php'; ?>

<div class="main-content">

    <!-- HEADER ACTION -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Edit Akun Pengguna</h4>
            <p class="text-muted small">Perbarui profil, hak akses, atau keamanan akun user.</p>
        </div>
        <a href="user.php" class="btn btn-sm btn-light border rounded-3 px-3">
            <i class="fas fa-arrow-left me-2"></i> kembali
        </a>
    </div>

    <!-- FORM SECTION -->
    <div class="table-container shadow-sm border-0" style="max-width: 850px; margin: 0 auto;">
        <form action="proses-edit-user.php" method="POST">
            <!-- Hidden ID untuk identifikasi data -->
            <input type="hidden" name="id_user" value="2"> 

            <div class="row g-4">
                
                <!-- Kiri: Informasi Profil -->
                <div class="col-md-6">
                    <h6 class="fw-bold mb-4 text-success border-bottom pb-2">
                        <i class="fas fa-user-circle me-2"></i>Profil Pengguna
                    </h6>
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-3" name="nama" value="Ocha" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Username</label>
                        <input type="text" class="form-control rounded-3 bg-light" name="username" value="Ocha" readonly>
                        <p class="text-muted" style="font-size: 10px; margin-top: 5px;">Username tidak dapat diubah demi keamanan sistem.</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Role / Jabatan</label>
                        <select class="form-select rounded-3" name="role">
                            <option value="Administrator">Administrator</option>
                            <option value="Kasir" selected>Kasir</option>
                            <option value="Staf">Staf</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Status Akun</label>
                        <select class="form-select rounded-3" name="status">
                            <option value="Aktif" selected>Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <!-- Kanan: Keamanan & Tampilan -->
                <div class="col-md-6 border-start">
                    <h6 class="fw-bold mb-4 text-success border-bottom pb-2">
                        <i class="fas fa-shield-alt me-2"></i>Keamanan & Tampilan
                    </h6>
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-uppercase">Password Baru</label>
                        <input type="password" class="form-control rounded-3" name="password" placeholder="Isi hanya jika ingin ganti password">
                        <p class="text-muted" style="font-size: 10px; margin-top: 5px;">Kosongkan jika tidak ingin mengubah password lama.</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-uppercase">Warna Tema Avatar</label>
                        <div class="d-flex align-items-center gap-3">
                            <input type="color" class="form-control form-control-color rounded-circle" name="color" value="#0d6efd" style="width: 50px; height: 50px; padding: 2px;">
                            <div class="avatar-initial" style="background-color: #0d6efd; width: 45px; height: 45px; font-size: 18px;">O</div>
                        </div>
                        <p class="text-muted mt-2" style="font-size: 10px;">Sesuaikan warna identitas user di tabel[cite: 22].</p>
                    </div>
                </div>

                <!-- Tombol Action -->
                <div class="col-12">
                    <hr class="opacity-25">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-light px-4 fw-bold small rounded-3">Reset</button>
                        <button type="submit" class="btn-save px-5 py-2">
                            <i class="fas fa-check-circle me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?php include 'layout/footer.php'; ?> <!-- Footer di luar kontainer utama agar simetris -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>