<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Guru</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($title == 'Beranda') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('guru') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Menu</div>

    <li class="nav-item <?= ($title == 'Pengumuman') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('guru/pengumuman') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Kelas</div>
    <li class="nav-item <?= ($title == 'Kelas Saya') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('guru/kelas') ?>">
            <i class="fas fa-fw fa-chalkboard"></i>
            <span>Kelas Saya</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Informasi</div>
    <li class="nav-item <?= ($title == 'Sejarah Sekolah') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('guru/sejarah') ?>">
            <i class="fas fa-fw fa-atlas"></i>
            <span>Sejarah Sekolah</span>
        </a>
    </li>

    <li class="nav-item <?= ($title == 'Visi Misi Sekolah') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('guru/visimisi') ?>">
            <i class="fas fa-fw fa-atlas"></i>
            <span>Visi Misi Sekolah</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->