<style type="text/css">
    .text-xs {
        font-size: 20px;
    }

    .text-xs span {
        text-transform: none;
    }

    .row a {
        text-decoration: none;
    }
</style>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelas') ?>">Kelas</a></li>
            <li class="breadcrumb-item">
                <a href="<?= base_url('guru/kelasMapel/' . $currentKelasMapel->mapel->id) ?>">Mata Pelajaran</a>
            </li>
            <li class="breadcrumb-item"><a>BAB</a></li>
        </ol>
    </nav>
    <h1 class=" h3 mb-2 text-gray-800">
        <?= $currentKelasMapel->kelas->nama ?> <i class="fas fa-xs fa-angle-double-right"></i> <?= $currentKelasMapel->mapel->nama ?>
    </h1>
    <div class="card shadow mb-4">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="card-header py-3">
                <span class=" btn btn-success disabled">
                    <?= $this->session->flashdata('message') ?>
                </span>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="card-header py-3">
                <span class=" btn btn-danger disabled">
                    <?= $this->session->flashdata('error') ?>
                </span>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <div class="mb-2">
                <a data-toggle="modal" data-target="#tambahBab" href="#" class="btn btn-primary btn-sm btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah BAB</span>
                </a>
            </div>
            <div class="modal fade" id="tambahBab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Bab</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('guru/tambahBab/' . $currentKelasMapel->id) ?>" method="GET">
                                <div class="form-group">
                                    <label for="txtNamaBab">Nama Bab</label>
                                    <input class="form-control" type="text" name="txtNamaBab" id="txtNamaBab" required>
                                </div>
                                <button class="btn btn-primary" type="submit">Tambah Bab</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($babList as $key => $babItem) : ?>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-header">
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                    <?= $babItem->name ?>
                                    <?php if ($key + 1 == $babList->count()) : ?>
                                        <a data-toggle="modal" data-target="#deleteBab<?= $babItem->id ?>" class="btn btn-danger btn-sm float-right">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a href="<?= base_url('guru/babMateri/' . $babItem->id) ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?= $babItem->materiList->count() ?> materi
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- HAPUS BAB MODALS -->
                    <div class="modal fade" id="deleteBab<?= $babItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Bab</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus bab ini?
                                    <div style="color: black;">
                                        <small>Noted: Bab bisa dihapus jika file sudah dikosongkan</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                    <a class="btn btn-danger <?= ($babItem->materiList->count() == 0) ? '' : 'disabled' ?>" href="<?= base_url('guru/deleteBab/' . $babItem->id) ?>">Yakin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>