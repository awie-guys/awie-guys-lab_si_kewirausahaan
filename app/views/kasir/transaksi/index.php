<div class="welcome-banner">
    <h2>Halo, <?= htmlspecialchars($user['nama'] ?? 'Kasir') ?>!</h2>
    <p>Selamat bertugas di Koperasi Sekolah MTSN 8 Banyuwangi.</p>
    <a href="/kasir/transaksi" class="btn-pos"><i class="fas fa-shopping-cart"></i> MULAI TRANSAKSI</a>
</div>
<div class="dashboard-stats mt-4">
    <div class="stat-card green">
        <span class="label">Penjualan Anda Hari Ini</span>
        <h3>Rp <?= number_format($dashboard['totalPenjualanHariIni'] ?? 0, 0, ',', '.') ?></h3>
    </div>
</div>