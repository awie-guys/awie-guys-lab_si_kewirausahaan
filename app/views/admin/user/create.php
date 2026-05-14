<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - Laboratorium Kewirausahaan</title>

</head>
<body>
<div class="main-content">
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User Baru</h1>
        <a href="/admin/user" class="btn btn-secondary"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow border-left-primary">
                <div class="card-body">
                    <form action="/admin/user/store" method="POST">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Role Akses <span class="text-danger">*</span></label>
                            <select name="role" class="form-control" required>
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 font-weight-bold">
                            <i class="fas fa-save mr-2"></i> Simpan User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>