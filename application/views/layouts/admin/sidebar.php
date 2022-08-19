<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-injured"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($title == 'Beranda') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($title == 'Pengumuman') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/pengumuman') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
    </li>


    <!-- NEW MENU -->
    <?php $menu = $this->session->flashdata('menu') ?>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Kelas</div>
    <li class="nav-item <?= ($title == 'Mata Pelajaran Kelas') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/assignMapelToKelas') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Mata Pelajaran per Kelas</span>
        </a>
    </li>
    <li class="nav-item <?= ($title == 'Siswa per Kelas') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/siswaKelas') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Siswa per Kelas</span>
        </a>
    </li>
    <li class="nav-item <?= ($title == 'Daftar Kelas') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/kelas') ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Daftar Kelas</span>
        </a>
    </li>
    <!-- END OF NEW MENU -->

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Pengguna</div>
    <li class="nav-item <?= ($title == 'Guru') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/guru') ?>">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Guru</span>
        </a>
    </li>

    <li class="nav-item <?= ($title == 'Siswa') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/siswa') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Siswa</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($title == 'Admin') ? 'active' : '' ?>">
        <a class=" nav-link" href="<?= base_url('admin/admin') ?>">
            <i class="fas fa-fw fa-user-injured"></i>
            <span>Admin</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Informasi</div>
    <li class="nav-item <?= ($title == 'sejarah') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/sejarah') ?>">
            <i class="fas fa-fw fa-atlas"></i>
            <span>Sejarah Sekolah</span>
        </a>
    </li>

    <li class="nav-item <?= ($title == 'visi misi') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('admin/visimisi') ?>">
            <i class="fas fa-fw fa-atlas"></i>
            <span>Visi Misi Sekolah</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->