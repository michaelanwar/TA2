<style type="text/css">
    .for-form-modal span {
        color: red;
    }
</style>
<div class="container-fluid">
    <?php if ($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message'); ?>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
            <a data-toggle="modal" data-target="#createGuru" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $key => $value) :
                            $kelassis = Assign_Kelas_Siswa_model::where('siswa_id', $value->id)->first();
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->alamat ?></td>

                                <td>
                                    <?php if ($value->gambar != NULL) : ?>
                                        <!-- show image small -->
                                        <a href="<?= base_url('assets/siswa/profile/' . $value->gambar) ?>" target="_blank">
                                            <img src="<?= base_url('assets/siswa/profile/' . $value->gambar) ?>" alt="<?= $value->nama ?>" class="img-thumbnail" width="100">
                                        </a>
                                    <?php else : ?>
                                        Tidak ada gambar
                                    <?php endif; ?>
                                </td>
                                <td><?= date("d-M-Y", strtotime($value->tanggal_lahir)); ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#editSiswa<?= $value->id ?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#deleteSiswa<?= $value->id ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                                <div class="modal fade" id="deleteSiswa<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-danger" href="<?= base_url('admin/deleteSiswa/' . $value->user_id) ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="editSiswa<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body for-form-modal">
                                                <form action="<?= base_url('admin/editSiswa/' . $value->id) ?>" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" id="id_modal<?= $value->id ?>" value="<?= $value->id ?>">
                                                    <div class="form-group">
                                                        <label for="nama">Nama<span>*</span></label>
                                                        <input type="text" class="form-control" value="<?= $value->nama ?>" id="nama" name="nama" placeholder="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="alamat">Alamat<span>*</span></label>
                                                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"><?= $value->alamat ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Tanggal Lahir<span>*</span></label>
                                                        <input type="date" class="form-control" value="<?= $value->tanggal_lahir ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password<span>*</span></label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" minlength="6">
                                                    </div>

                                                    <?php if ($value->gambar != NULL) : ?>
                                                        <a href="<?= base_url('assetsAdmin/img/upload/profil/siswa/' . $value->gambar) ?>" target="_blank">
                                                            <img src="<?= base_url('assetsAdmin/img/upload/profil/siswa/' . $value->gambar) ?>" alt="<?= $value->nama ?>" class="img-thumbnail" width="100">
                                                        </a>
                                                    <?php endif; ?>
                                                    <div class="form-group">
                                                        <label for="gambar">Gambar</label>
                                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkPassword" name="check">
                                                            <label class="form-check-label" for="checkPassword">
                                                                Ganti Password
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-space {
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .divElement {
        color: #4e73df;
        display: block;
    }

    .divElement.red {
        color: #4e73df;
    }

    .selected {
        font-weight: bold;
    }
</style>

<div class="modal fade" id="createGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <form action="<?= base_url('admin/createSiswa') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama<span>*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span>*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" minlength="6">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat<span>*</span></label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal Lahir<span>*</span></label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
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
<script src="<?= base_url() ?>assetsAdmin/vendor/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $("#tanggal_lahir").datepicker();
    });
</script>