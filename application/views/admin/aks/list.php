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
        Daftar Siswa Per Kelas
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-4">
                    <?php if ($this->session->flashdata('message')) : ?>
                        <span class=" btn btn-success disabled">
                            <?= $this->session->flashdata('message') ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        foreach ($classes as $key => $value) :
            $ids = [];
            // echo $value->siswa;
        ?>
            <div class="card-body">
                <h4><?= $value->nama ?></h4>
                <?php
                $available_siswa = $this->siswa_model->available($idsiswas);
                if ($available_siswa->count() < 1) :
                ?>
                    <form method="post" action="<?= base_url('admin/insertAssignKelasSiswa') ?>" class="form-inline">
                        <input type="hidden" name="kelas_id" value="<?= $value->id ?>">
                        <span class="btn btn-sm btn-info my-1 mr-2 disabled">
                            <i class="fas fa-plus fa-sm"></i>
                        </span>
                        <select class="custom-select my-1 mr-sm-2" name="siswa_id" id="inlineFormCustomSelectPref">
                            <option value="none">
                                Tidak ada data siswa!
                            </option>
                        </select>
                        <button type="button" class="btn btn-sm btn-primary my-1" onclick="return alert('Tidak ada data siswa!')">tambahkan</button>
                    <?php else : ?>
                        <form method="post" action="<?= base_url('admin/insertAssignKelasSiswa') ?>" class="form-inline">
                            <input type="hidden" name="kelas_id" value="<?= $value->id ?>">
                            <span class="btn btn-sm btn-info my-1 mr-2 disabled">
                                <i class="fas fa-plus fa-sm"></i>
                            </span>
                            <select class="custom-select my-1 mr-sm-2" name="siswa_id" id="inlineFormCustomSelectPref">
                                <?php foreach ($available_siswa as $key2 => $avsiswa) : ?>
                                    <option value="<?= $avsiswa->id ?>">
                                        <?= $avsiswa->nama ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary my-1">assign</button>
                        <?php endif; ?>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable-<?= $key ?>" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>alamat</th>
                                        <th>tanggal lahir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($value->siswa as $key => $sis) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td> <?= $sis->siswa->nama ?> </td>
                                            <td> <?= $sis->siswa->alamat ?> </td>
                                            <td> <?= $sis->siswa->tanggal_lahir ?> </td>
                                            <td>
                                                <center>
                                                    <a data-toggle="modal" data-target="#deleteAKS<?= $sis->id ?>" class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteAKS<?= $sis->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus <?= $sis->siswa->nama ?> ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="<?= base_url('admin/deleteAKS/' . $sis->id) ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
            </div>
        <?php endforeach; ?>
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
                        <label for="banner">Gambar Pengumuman</label>
                        <input type="file" class="form-control" id="banner" name="banner">
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