<style type="text/css">
    .table a {
        text-decoration: none;
    }

    .for-form-modal span {
        color: red;
    }
</style>
<div class="container-fluid">
    <h1 class=" h3 mb-2 text-gray-800">
        Pengumuman
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-row align-items-center">
                <a href="#" data-toggle="modal" data-target="#createPengumuman" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Pengumuman</span>
                </a>
                <?php if ($this->session->flashdata('message')) : ?>
                    <span class="alert alert-success p-2 m-0 ml-auto">
                        <?= $this->session->flashdata('message') ?>
                    </span>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')) : ?>
                    <span class="alert alert-danger p-2 m-0 ml-auto">
                        <?= $this->session->flashdata('error') ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pembuat</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>deskripsi</th>
                            <th>File Pendukung</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengumumans as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->admin->nama ?></td>
                                <td>
                                    <?php if (!empty($value->banner)) : ?>
                                        <?php if (file_exists(FCPATH . './assetsAdmin/img/upload/pengumuman/' . $value->banner)) : ?>
                                            <a href="<?= base_url("assetsAdmin/img/upload/pengumuman/" . $value->banner) ?>" target="_blank">
                                                <img src="<?= base_url('assetsAdmin/img/upload/pengumuman/' . $value->banner)  ?>" alt="<?= $value['banner'] ?>" width="100px" height="100px">
                                            </a>
                                        <?php else : ?>
                                            Gambar tidak ditemukan
                                        <?php endif; ?>
                                    <?php else : ?>
                                        Tidak ada gambar
                                    <?php endif; ?>
                                </td>
                                <td><?= $value->judul ?></td>
                                <td><?= $value->deskripsi ?></td>
                                <td>
                                    <div class="mb-2">
                                        <a href="#" data-toggle="modal" data-target="#addFilePengumuman<?= $value->id ?>" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">tambah</span>
                                        </a>
                                    </div>

                                    <?php foreach ($value->files as $key2 => $file) : ?>
                                        <div class="mb-2">
                                            <a href="#" data-toggle="modal" data-target="#updateFilePengumuman<?= $file->id ?>">
                                                File - <?= $file->display_name ?>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteFilePengumuman<?= $file->id ?>"><i class="fa fa-trash" style="color: red;"></i></a>
                                        </div>

                                        <div class="modal fade" id="deleteFilePengumuman<?= $file->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus File</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus file ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                                        <a class="btn btn-danger" href="<?= base_url('admin/deleteFilePengumuman/' . $file->id) ?>">Yakin</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="updateFilePengumuman<?= $file->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail File</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body for-form-modal">
                                                        <form action="<?= base_url('admin/updateFilePengumuman/' . $file->id) ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <a target="_blank" href="<?= base_url('./assetsAdmin/files/uploads/pengumuman/' . $file->file_name) ?>">
                                                                    Lihat File
                                                                </a>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="nama">Ganti File</label>
                                                                <input type="file" class="form-control" id="nama" name="nama" required oninvalid="this.setCustomValidity('File tidak boleh kosong')" oninput="setCustomValidity('')">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <button class="btn btn-primary" type="submit">Ubah</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <div class="mb-2">
                                        <a href="#" data-toggle="modal" data-target="#editPengumuman<?= $value->id ?>" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" data-toggle="modal" data-target="#deletePengumuman<?= $value->id ?>" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="addFilePengumuman<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah File</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body for-form-modal">
                                            <!-- make form -->
                                            <form action="<?= base_url('admin/addFilePengumuman') ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" value="<?= $value->id ?>" name="pengumuman_id">
                                                <div class=" form-group">
                                                    <label for="nama">File</label>
                                                    <input type="file" class="form-control" id="nama" name="filePengumuman" required oninvalid="this.setCustomValidity('File tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editPengumuman<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Pengumuman</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body for-form-modal">
                                            <!-- make form -->
                                            <form action="<?= base_url('admin/editPengumuman/' . $value->id) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="judul">Judul<span>*</span></label>
                                                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $value->judul ?>" placeholder="Judul" required oninvalid="this.setCustomValidity('Judul tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi<span>*</span></label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi" required oninvalid="this.setCustomValidity('Deskripsi tidak boleh kosong')" oninput="setCustomValidity('')"><?= $value->deskripsi ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="banner">Gambar Pengumuman</label>
                                                    <input type="file" class="form-control" id="banner" name="banner">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Ubah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="deletePengumuman<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus pengumuman ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                            <a class="btn btn-danger" href="<?= base_url('admin/deletePengumuman/' . $value->id) ?>">Yakin</a>
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

<div class="modal fade" id="createPengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <!-- make form -->
                <form action="<?= base_url('admin/createPengumuman') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Judul<span>*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required oninvalid="this.setCustomValidity('Judul tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi<span>*</span></label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi" required oninvalid="this.setCustomValidity('Deskripsi tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="filePengumuman">File pengumuman</label>
                        <input type="file" class="form-control" name="filePengumuman" id="filePengumuman">
                    </div>
                    <div class="form-group">
                        <label for="banner">Gambar Pengumuman</label>
                        <input accept="image/png, image/jpeg" type="file" class="form-control" id="banner" name="banner" onchange="updateImage(this)" imageTarget="#banner-prev">
                    </div>
                    <div class="image-area mt-4">
                        <img id="banner-prev" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function updateImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var target = $(input).attr('imageTarget');
            console.log(target);

            reader.onload = (e) => {
                $(target).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(() => {
        $('.editbtn').on('change', () => {
            updateImage(input);
        })
    });
</script>