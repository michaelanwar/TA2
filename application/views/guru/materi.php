<style type="text/css">
    .table a {
        text-decoration: none;
    }

    .form-group a {
        text-decoration: none;
    }

    .for-form-modal span {
        color: red;
    }
</style>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelas') ?>">Kelas</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelasMapel/' . $currentCourse->mapel->id) ?>">Mata Pelajaran</a></li>
            <li class="breadcrumb-item">Materi</li>
        </ol>
    </nav>
    <h1 class=" h3 mb-2 text-gray-800">
        <?= $currentCourse->kelas->nama ?> <i class="fas fa-xs fa-angle-double-right"></i>
        <?= $currentCourse->mapel->nama ?> <i class="fas fa-xs fa-angle-double-right"></i>
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-row">
                <div>
                    <a data-toggle="modal" data-target="#createMateri" class="btn btn-primary btn-icon-split m-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Materi</span>
                    </a>
                    <a data-toggle="modal" data-target="#deleteManyMateri" class="btn btn-danger btn-icon-split m-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus Beberapa</span>
                    </a>
                </div>
                <div class="d-flex flex-fill">
                    <?php if ($this->session->flashdata('message')) : ?>
                        <span class="ml-auto alert alert-success disabled">
                            <?= $this->session->flashdata('message') ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <span class="alert alert-danger disabled">
                            <?= $this->session->flashdata('error') ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 3%;">No</th>
                            <th>Topik</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Banner</th>
                            <th>Berkas</th>
                            <th>Tugas</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materiList as $key => $materiItem) : ?>
                            <tr>
                                <!-- No -->
                                <td style="width: 3%;"><?= $key + 1 ?></td>
                                <!-- Topik -->
                                <td>
                                    <p>
                                        <strong>
                                            <?= $materiItem->judul ?>
                                        </strong>
                                    </p>
                                </td>
                                <!-- Deskripsi -->
                                <td>
                                    <p>
                                        <?= $materiItem->deskripsi ?>
                                    </p>
                                </td>
                                <!-- Link -->
                                <td>
                                    <a href="<?= urldecode($materiItem->link)  ?>" target="_blank">
                                        Link Berkas
                                    </a>
                                </td>
                                <!-- Banner -->
                                <td>
                                    <?php if ($materiItem->banner != null) : ?>
                                        <a href="<?= base_url('assetsAdmin/img/upload/modul/' . $materiItem->banner) ?>" target="_blank">
                                            <img src="<?= base_url('assetsAdmin/img/upload/modul/' . $materiItem->banner) ?>" alt="<?= $materiItem->judul ?>" style="width: 100px;">
                                        </a>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Tidak ada banner</span>
                                    <?php endif; ?>
                                </td>
                                <!-- Berkas -->
                                <td>
                                    <a href="<?= base_url('assetsAdmin/img/upload/modul/' . $materiItem->nama_file) ?>" target="_blank">
                                        Lihat
                                    </a>
                                </td>
                                <!-- Tugas -->
                                <td>
                                    <?php if ($materiItem->materi_tugas->count() > 0) : ?>
                                        <div class="d-flex flex-column">
                                            <div class="p-1">
                                                <a class="btn btn-info btn-icon-split" href="" data-toggle="modal" data-target="#detailMateriTugas<?= $materiItem->id ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-info"></i>
                                                    </span>
                                                    <span class="text">
                                                        Detail
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="p-1">
                                                <a href="<?= base_url('guru/pengumpulan_tugas/' . $materiItem->materi_tugas->first()->id) ?>" class="btn btn-success btn-icon-split">
                                                    <span class="icon"><i class="fas fa-list-alt"></i></span>
                                                    <span class="text">Pengumpulan</span>
                                                </a>
                                            </div>
                                            <div class="p-1">
                                                <a class="btn btn-danger btn-icon-split" href="" data-toggle="modal" data-target="#deleteMateriTugas<?= $materiItem->id ?>">
                                                    <span class="icon"><i class="fa fa-trash"></i></span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                            </div>

                                        </div>
                                    <?php else : ?>
                                        <a data-toggle="modal" data-target="#createTugas<?= $materiItem->id ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-file-upload"></i>
                                            </span>
                                            <span class="text">Upload</span>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <!-- Pilihan -->
                                <td>
                                    <div class="mb-2">
                                        <a data-toggle="modal" data-target="#editMateri<?= $materiItem->id ?>" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                    </div>
                                    <div class="mb-2">
                                        <a data-toggle="modal" data-target="#deleteFile<?= $materiItem->id ?>" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>


                            <div class="modal fade" id="deleteFile<?= $materiItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Materi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus materi ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                            <a class="btn btn-danger" href="<?= base_url('guru/deleteMateri/' . $materiItem->id) ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- UBAH MATERI MODAL  -->
                            <div class="modal fade" id="editMateri<?= $materiItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Materi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body for-form-modal">
                                            <form action="<?= base_url('guru/updateMateri/' . $materiItem->id) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="judul">Topik Materi<span>*</span></label>
                                                    <input type="text" class="form-control" id="judul" name="txtJudul" value="<?= $materiItem->judul ?>" placeholder="Topik Materi" required oninvalid="this.setCustomValidity('Topik Materi tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi<span>*</span></label>
                                                    <textarea class="form-control" id="deskripsi" name="txtDeskripsi" rows="3" placeholder="Deskripsi" required oninvalid="this.setCustomValidity('Deskripsi tidak boleh kosong')" oninput="setCustomValidity('')"><?= $materiItem->deskripsi ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Link Youtube<span>*</span></label>
                                                    <input class="form-control" id="link" name="txtLink" type="url" value="<?= $materiItem->link ?>" placeholder="Link Youtube" required oninvalid="this.setCustomValidity('Link Youtube tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <?php if ($materiItem->banner != null) : ?>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="<?= base_url('assetsAdmin/img/upload/modul/' . $materiItem->banner) ?>" class="img-thumbnail" alt="banner" width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="form-group">
                                                    <label for="banner">Banner</label>
                                                    <input type="file" class="form-control-file" id="banner" name="banner">
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">File</label>
                                                    <a href="<?= base_url('assetsAdmin/img/upload/modul/' . $materiItem->nama_file) ?>" target="_blank">
                                                        Lihat
                                                    </a>
                                                    <input type="file" class="form-control-file" id="file" name="file">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                            <button class="btn btn-primary" type="submit">Ubah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="createTugas<?= $materiItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Upload Tugas</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body for-form-modal">
                                            <form action="<?= base_url('guru/createTugas/' . $materiItem->id) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="deadline">Pengumpulan<span>*</span></label>
                                                    <input type="datetime-local" class="form-control" id="deadline1" name="deadline1" required oninvalid="this.setCustomValidity('Deadline tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deadline">Penutupan</label>
                                                    <input type="datetime-local" class="form-control" id="deadline2" name="deadline2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="file">File<span>*</span></label>
                                                    <input type="file" class="form-control-file" id="file" name="file" required oninvalid="this.setCustomValidity('Tugas tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                            <button class="btn btn-primary" type="submit">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($materiItem->materi_tugas->count() > 0) : ?>
                                <div class="modal fade" id="detailMateriTugas<?= $materiItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Tugas</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body for-form-modal">
                                                <form action="<?= base_url('guru/updateMateriTugas/' . $materiItem->materi_tugas->first()->id) ?>" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="deadline">Pengumpulan<span>*</span></label>
                                                        <input type="datetime-local" class="form-control" id="deadline1" name="deadline1" required value="<?= date('Y-m-d\TH:i:s', strtotime($materiItem->materi_tugas->first()->deadline_1)) ?>" oninvalid=" this.setCustomValidity('Deadline tidak boleh kosong')" oninput="setCustomValidity('')">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deadline">Penutupan</label>
                                                        <input type="datetime-local" class="form-control" id="deadline2" name="deadline2" value="<?= ($materiItem->materi_tugas->first()->deadline_2 != null) ? date('Y-m-d\TH:i:s', strtotime($materiItem->materi_tugas->first()->deadline_2)) : '' ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="<?= base_url('assetsAdmin/img/upload/modul/tugas/' . $materiItem->materi_tugas->first()->nama_file) ?>" target="_blank">
                                                            Lihat File Tugas
                                                        </a>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file">File</label>
                                                        <input type="file" class="form-control-file" id="file" name="file">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                                <button class="btn btn-primary" type="submit">Ubah</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="modal fade" id="judulMateri<?= $materiItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Topik Materi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body for-form-modal">
                                            <form>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="judul" rows="3" readonly><?= $materiItem->judul ?></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="deleteMateriTugas<?= $materiItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Tugas</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus tugas ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                            <a class="btn btn-danger" href="<?= base_url('guru/deleteMateriTugas/' . $materiItem->materi_tugas->first()->id) ?>">Yakin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- CREATE MATERI MODAL -->
<div class="modal fade" id="createMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <form action="<?= base_url('guru/createMateri') ?>" method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label for="judul">Topik Materi<span>*</span></label>
                        <input type="text" class="form-control" id="judul" name="txtJudul" placeholder="Topik Materi" required oninvalid="this.setCustomValidity('Topik Materi tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi<span>*</span></label>
                        <textarea class="form-control" id="deskripsi" name="txtDeskripsi" rows="3" required placeholder="Deskripsi" oninvalid="this.setCustomValidity('Deskripsi tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Link Youtube<span>*</span></label>
                        <input class="form-control" id="link" name="txtLink" type="url" placeholder="Link Youtube" required oninvalid="this.setCustomValidity('Link Youtube tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" class="form-control-file" id="banner" name="banner">
                    </div>
                    <div class="form-group">
                        <label for="file">File<span>*</span></label>
                        <input type="file" class="form-control-file" id="file" name="fileMateri" required oninvalid="this.setCustomValidity('Materi tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- HAPUS MATERI MODAL -->
<div class="modal fade" id="deleteManyMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Materi Sekaligus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <form action="<?= base_url('guru/hapusBeberapaMateri') ?>" method="post" enctype="multipart/form-data">
                    <!-- make list materi with checkbox -->
                    <div class="form-group">
                        <label for="materi">Daftar Topik Materi</label>
                        <div class="row">
                            <?php foreach ($materiList as $materiItem) : ?>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $materiItem->id ?>" name="materi[]">
                                        <label class="form-check-label" for="materi">
                                            <?= $materiItem->judul ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>