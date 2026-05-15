<div class="dashboard-stats">
    <div class="stat-card green">
        <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
        <div class="stat-data">
            <span class="label">Penjualan Hari Ini</span>
            <h3>Rp <?= number_format($dashboard['totalPenjualanHariIni'] ?? 0, 0, ',', '.') ?></h3>
        </div>
    </div>
    <div class="stat-card blue">
        <div class="stat-icon"><i class="fas fa-exchange-alt"></i></div>
        <div class="stat-data">
            <span class="label">Total Transaksi</span>
            <h3><?= $dashboard['totalTransaksiHariIni'] ?? 0 ?></h3>
        </div>
    </div>
    <div class="stat-card orange">
        <div class="stat-icon"><i class="fas fa-box"></i></div>
        <div class="stat-data">
            <span class="label">Jumlah Barang</span>
            <h3><?= $dashboard['jumlahBarang'] ?? 0 ?></h3>
        </div>
    </div>
    <div class="stat-card red">
        <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="stat-data">
            <span class="label">Stok Menipis</span>
            <h3><?= $dashboard['stokMenipis'] ?? 0 ?></h3>
        </div>
    </div>
</div>