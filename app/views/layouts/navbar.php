<nav class="navbar">
    <div class="nav-left">
        <button id="sidebarToggle" class="btn-icon"><i class="fas fa-bars"></i></button>
        <h1 class="page-title"><?= htmlspecialchars($title ?? 'Dashboard') ?></h1>
    </div>
    <div class="nav-right">
        <div class="nav-date"><i class="far fa-calendar"></i> <?= date('D, d M Y') ?></div>
        <div class="nav-user">
            <div class="user-text">
                <span class="user-name"><?= htmlspecialchars($user['nama'] ?? 'User') ?></span>
                <span class="user-role"><?= ucfirst($_SESSION['role'] ?? 'Guest') ?></span>
            </div>
            <img src="/assets/images/avatar.png" alt="Profile" class="user-avatar">
        </div>
    </div>
</nav>
<div class="main-content">