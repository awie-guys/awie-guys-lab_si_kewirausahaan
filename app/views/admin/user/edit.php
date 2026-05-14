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
        <h1 class="h3 mb-0 text-gray-800">Edit User: <?= htmlspecialchars($userData['username']) ?></h1>
        <a href="/admin/user" class="btn btn-secondary"><i class="fas fa-arrow-left mr-2"></i> Kembali</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow border-left-warning">
                <div class="card-body">
                    <form action="/admin/user/update/<?= $userData['id'] ?>" method="POST">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($userData['nama']) ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($userData['username']) ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($userData['email']) ?>" required>
                        </div>
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Status</label>
                            <select name="status" class="form-control">
                                <option value="Aktif" <?= $userData['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="Nonaktif" <?= $userData['status'] == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 text-white font-weight-bold">Perbarui User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>