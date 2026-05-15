<aside id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <img src="/assets/images/logo-mtsn.png" alt="Logo" class="sidebar-logo">
        <div class="sidebar-title">
            <span class="brand-lab">LABORATORIUM</span>
            <span class="brand-name">KEWIRAUSAHAAN</span>
            <small>MTSN 8 BANYUWANGI</small>
        </div>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <li class="<?= ($activeMenu === 'dashboard') ? 'active' : '' ?>"><a href="/admin/dashboard"><i class="fas fa-th-large"></i> Dashboard</a></li>
                <li class="<?= ($activeMenu === 'kategori') ? 'active' : '' ?>"><a href="/admin/kategori"><i class="fas fa-tags"></i> Kategori</a></li>
                <li class="<?= ($activeMenu === 'barang') ? 'active' : '' ?>"><a href="/admin/barang"><i class="fas fa-box"></i> Barang</a></li>
                <li class="<?= ($activeMenu === 'supplier') ? 'active' : '' ?>"><a href="/admin/supplier"><i class="fas fa-truck"></i> Supplier</a></li>
                <li class="<?= ($activeMenu === 'restock') ? 'active' : '' ?>"><a href="/admin/restock"><i class="fas fa-plus-square"></i> Restock</a></li>
                <li class="<?= ($activeMenu === 'transaksi') ? 'active' : '' ?>"><a href="/admin/transaksi"><i class="fas fa-shopping-cart"></i> Transaksi</a></li>
                <li class="<?= ($activeMenu === 'riwayat') ? 'active' : '' ?>"><a href="/admin/riwayat-transaksi"><i class="fas fa-history"></i> Riwayat Transaksi</a></li>
                <li class="<?= ($activeMenu === 'laporan') ? 'active' : '' ?>"><a href="/admin/laporan"><i class="fas fa-file-invoice"></i> Laporan</a></li>
                <li class="<?= ($activeMenu === 'user') ? 'active' : '' ?>"><a href="/admin/user"><i class="fas fa-users"></i> User</a></li>
            <?php else: ?>
                <li class="<?= ($activeMenu === 'dashboard') ? 'active' : '' ?>"><a href="/kasir/dashboard"><i class="fas fa-th-large"></i> Dashboard</a></li>
                <li class="<?= ($activeMenu === 'transaksi') ? 'active' : '' ?>"><a href="/kasir/transaksi"><i class="fas fa-shopping-cart"></i> Transaksi</a></li>
                <li class="<?= ($activeMenu === 'Transaksi Riwayat') ? 'active' : '' ?>"><a href="/kasir/Transaksi Riwayat"><i class="fas fa-history"></i> Riwayat Transaksi</a></li>
                <li class="<?= ($activeMenu === 'Profil') ? 'active' : '' ?>"><a href="/kasir/user"><i class="fas fa-users"></i> User</a></li>
            <?php endif; ?>
            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>
</aside>