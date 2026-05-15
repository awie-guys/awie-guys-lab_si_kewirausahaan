<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir - Laboratorium Kewirausahaan MTsN 8 Banyuwangi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary-green: #008a34;
            --dark-green: #005a18;
            --bg-color: #f8faf8;
            --sidebar-width: 260px;
        }

        body { background-color: var(--bg-color); font-family: 'Inter', sans-serif; color: #333; }
        .sidebar {
            background-color: var(--primary-green); color: white;
            min-height: 100vh; width: var(--sidebar-width);
            padding: 30px 20px; position: fixed; top: 0; left: 0; z-index: 1000;
            display: flex; flex-direction: column;
        }
        .sidebar-brand { text-align: left; margin-bottom: 40px; color: white; text-decoration: none; display: flex; align-items: center; gap: 12px; }
        .sidebar-brand img { width: 45px; background: white; padding: 5px; border-radius: 8px; }
        .sidebar-brand h6 { font-size: 11px; margin: 0; line-height: 1.2; font-weight: 700; text-transform: uppercase; }
        
        .nav-link {
            color: rgba(255,255,255,0.8); padding: 12px 15px; display: flex; align-items: center;
            border-radius: 12px; text-decoration: none; font-size: 14px; transition: 0.3s; margin-bottom: 8px;
        }
        .nav-link i { margin-right: 15px; width: 20px; text-align: center; font-size: 18px; }
        .nav-link:hover, .nav-link.active { color: white; background: rgba(255,255,255,0.15); font-weight: 500; }
        .nav-link.active { background: rgba(255,255,255,0.2); }

        .logout-link { margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1); }

        /* --- MAIN CONTENT & CARDS --- */
        .main-content { margin-left: var(--sidebar-width); padding: 30px; }
        
        .stat-card {
            background: white; border-radius: 16px; padding: 20px; 
            border: 1px solid #edf0ed; height: 100%; box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .stat-icon {
            width: 48px; height: 48px; border-radius: 12px; 
            display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 15px;
        }
        .trend-up { color: #2e7d32; font-size: 11px; font-weight: 600; }

        .card-custom {
            background: white; border-radius: 16px; padding: 20px; border: 1px solid #edf0ed; margin-bottom: 25px;
        }

        /* --- TABLE STYLE --- */
        .table-custom thead th {
            background: #f8faf8; color: #666; font-size: 11px;
            font-weight: 600; padding: 12px; border-bottom: 1px solid #eee; text-transform: uppercase;
        }
        .table-custom tbody td { font-size: 12px; padding: 12px; vertical-align: middle; }
        
        .badge-status {
            padding: 4px 12px; border-radius: 20px; font-size: 10px; font-weight: 600;
            background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="#" class="sidebar-brand">
        <img src="https://via.placeholder.com/45" alt="Logo">
        <div>
            <h6>Laboratorium<br>Kewirausahaan</h6>
            <span style="font-size: 8px; opacity: 0.8;">MTsN 8 BANYUWANGI</span>
        </div>
    </a>
    
    <nav>
        <a href="#" class="nav-link active"><i class="fas fa-th-large"></i> Dashboard</a>
        <a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> Transaksi</a>
        <a href="#" class="nav-link"><i class="fas fa-history"></i> Riwayat Transaksi</a>
        <a href="#" class="nav-link"><i class="fas fa-user-circle"></i> Profil</a>
    </nav>

    <a href="#" class="nav-link logout-link mt-auto"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <i class="fas fa-bars fs-5 text-muted"></i>
            <h5 class="mb-0 fw-bold" style="color: var(--primary-green);">Dashboard</h5>
        </div>
        <div class="d-flex align-items-center gap-4">
            <div class="position-relative">
                <input type="text" class="form-control form-control-sm border-0 bg-white ps-3" placeholder="Cari sesuatu..." style="width: 250px; border-radius: 8px;">
                <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted" style="font-size: 12px;"></i>
            </div>
            <div class="position-relative">
                <i class="fas fa-bell fs-5 text-muted"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px;">3</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <img src="https://via.placeholder.com/35" class="rounded-circle">
                <div class="text-end">
                    <p class="mb-0 fw-bold" style="font-size: 12px;">Dimas</p>
                    <span style="font-size: 10px; color: #999;">Kasir</span>
                </div>
                <i class="fas fa-chevron-down small text-muted"></i>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h4 class="fw-bold mb-1">Selamat datang, Dimas!</h4>
            <p class="text-muted small mb-0">Berikut ringkasan aktivitas penjualan hari ini.</p>
        </div>
        <div class="dropdown">
            <button class="btn btn-white btn-sm border bg-white dropdown-toggle px-3" type="button" style="border-radius: 10px; font-size: 12px;">
                <i class="far fa-calendar-alt me-2"></i> Kamis, 22 Mei 2026
            </button>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-shopping-cart"></i></div>
                        <div class="text-muted small">Total Transaksi</div>
                        <h3 class="fw-bold mb-1">23</h3>
                        <span class="trend-up"><i class="fas fa-arrow-up"></i> 15 dari kemarin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-store"></i></div>
                        <div class="text-muted small">Total Penjualan</div>
                        <h3 class="fw-bold mb-1">Rp 1.750.000</h3>
                        <span class="trend-up"><i class="fas fa-arrow-up"></i> 20% dari kemarin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-box"></i></div>
                        <div class="text-muted small">Total Item Terjual</div>
                        <h3 class="fw-bold mb-1">86</h3>
                        <span class="trend-up"><i class="fas fa-arrow-up"></i> 12 dari kemarin</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="stat-icon" style="background: #e8f5e9; color: #2e7d32;"><i class="fas fa-users"></i></div>
                        <div class="text-muted small">Pelanggan</div>
                        <h3 class="fw-bold mb-1">18</h3>
                        <span class="trend-up"><i class="fas fa-arrow-up"></i> 5 dari kemarin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card-custom h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0">Grafik Penjualan (7 Hari Terakhir)</h6>
                    <select class="form-select form-select-sm w-auto border-0 bg-light text-muted" style="font-size: 11px;">
                        <option>7 Hari Terakhir</option>
                    </select>
                </div>
                <canvas id="salesChart" height="200"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-custom h-100">
                <h6 class="fw-bold mb-4">Metode Pembayaran</h6>
                <div class="position-relative mb-4" style="height: 180px;">
                    <canvas id="paymentChart"></canvas>
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <span class="text-muted" style="font-size: 10px;">Total</span><br>
                        <span class="fw-bold" style="font-size: 12px;">Rp 1.750.000</span>
                    </div>
                </div>
                <div class="mt-2" style="font-size: 11px;">
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="fas fa-circle me-2" style="color: #2e7d32;"></i> Tunai</span>
                        <span class="fw-bold">Rp 1.050.000 (60%)</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="fas fa-circle me-2" style="color: #0d6efd;"></i> QRIS</span>
                        <span class="fw-bold">Rp 490.000 (28%)</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="fas fa-circle me-2" style="color: #ffc107;"></i> Transfer</span>
                        <span class="fw-bold">Rp 140.000 (8%)</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span><i class="fas fa-circle me-2" style="color: #6f42c1;"></i> E-Wallet</span>
                        <span class="fw-bold">Rp 70.000 (4%)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="card-custom h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0">Transaksi Terbaru</h6>
                    <a href="#" class="text-success text-decoration-none small fw-bold">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-custom align-middle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Transaksi</th>
                                <th>Waktu</th>
                                <th>Pelanggan</th>
                                <th>Total</th>
                                <th>Metode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $trxs = [
                                ['1', 'TRX220526001', '22 Mei 2026 10:15', 'Umum', '85.000', 'Tunai'],
                                ['2', 'TRX220526002', '22 Mei 2026 10:05', 'Umum', '120.000', 'QRIS'],
                                ['3', 'TRX220526003', '22 Mei 2026 09:50', 'Umum', '60.000', 'Tunai'],
                                ['4', 'TRX220526004', '22 Mei 2026 09:35', 'Umum', '95.000', 'Transfer'],
                                ['5', 'TRX220526005', '22 Mei 2026 09:20', 'Umum', '72.000', 'E-Wallet'],
                            ];
                            foreach($trxs as $t): ?>
                            <tr>
                                <td><?= $t[0] ?></td>
                                <td class="fw-bold"><?= $t[1] ?></td>
                                <td class="text-muted"><?= $t[2] ?></td>
                                <td><?= $t[3] ?></td>
                                <td class="text-success fw-bold">Rp <?= $t[4] ?></td>
                                <td><?= $t[5] ?></td>
                                <td><span class="badge-status">Selesai</span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card-custom h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0">Barang Terlaris Hari Ini</h6>
                    <a href="#" class="text-success text-decoration-none small fw-bold">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-custom align-middle">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Barang</th>
                                <th>Terjual</th>
                                <th>Total Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td class="fw-bold">Pensil 2B</td><td>25</td><td>Rp 125.000</td></tr>
                            <tr><td>2</td><td class="fw-bold">Pulpen Hitam</td><td>20</td><td>Rp 100.000</td></tr>
                            <tr><td>3</td><td class="fw-bold">Buku Tulis 38 Lembar</td><td>15</td><td>Rp 75.000</td></tr>
                            <tr><td>4</td><td class="fw-bold">Penghapus</td><td>12</td><td>Rp 24.000</td></tr>
                            <tr><td>5</td><td class="fw-bold">Penggaris 30cm</td><td>8</td><td>Rp 16.000</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: ['16 Mei', '17 Mei', '18 Mei', '19 Mei', '20 Mei', '21 Mei', '22 Mei'],
            datasets: [{
                label: 'Penjualan',
                data: [450000, 750000, 1050000, 880000, 1250000, 920000, 1180000],
                borderColor: '#008a34',
                backgroundColor: 'rgba(0, 138, 52, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#008a34',
                pointBorderColor: '#fff',
                pointRadius: 5
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { borderDash: [5, 5] }, ticks: { callback: value => 'Rp ' + (value / 1000) + 'K' } },
                x: { grid: { display: false } }
            }
        }
    });

    const ctxPayment = document.getElementById('paymentChart').getContext('2d');
    new Chart(ctxPayment, {
        type: 'doughnut',
        data: {
            labels: ['Tunai', 'QRIS', 'Transfer', 'E-Wallet'],
            datasets: [{
                data: [60, 28, 8, 4],
                backgroundColor: ['#2e7d32', '#0d6efd', '#ffc107', '#6f42c1'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            cutout: '75%',
            plugins: { legend: { display: false } }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>