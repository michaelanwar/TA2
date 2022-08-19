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
        Daftar Guru Per Kelas
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-lg-3">
                    <?php if ($this->session->flashdata('message')) : ?>
                        <span class=" btn btn-success disabled">
                            <?= $this->session->flashdata('message') ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Daftar Guru</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allkelas as $key => $value) :
                            $ids = [];
                            $kelasNow = $value->id;
                        ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td style="min-width: 12rem;">
                                    <?= $value->nama ?>
                                </td>
                                <td class="w-75 w-lg-50">
                                    <form class="form-inline" action="<?= base_url('admin/insertAssignKelasGuru') ?>" method="post">
                                        <input type="hidden" name="kelas_id" value="<?= $value->id ?>">
                                        <?php
                                        $available_guru = $this->guru_model->available($ids);
                                        if ($available_guru->count() < 1) :
                                        ?>
                                            <select class="custom-select my-1 mr-sm-2" name="guru_id" id="inlineFormCustomSelectPref">
                                                <option value="none">
                                                    Semua guru sudah ditambahkan
                                                </option>
                                            </select>
                                            <button type="button" class="btn btn-sm btn-primary my-1" onclick="return alert('Semua Guru sudah ditambahkan')">tambahkan</button>
                                        <?php else : ?>
                                            <select class="custom-select my-1 mr-sm-2" name="guru_id" id="inlineFormCustomSelectPref">
                                                <?php foreach ($available_guru as $key => $avguru) : ?>
                                                    <option value="<?= $avguru->id ?>">
                                                        <?= $avguru->nama ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-primary my-1">Tambahkan</button>
                                        <?php endif; ?>
                                    </form>
                                    <div class="d-flex align-content-start flex-wrap mt-3">
                                        <?php foreach ($value->guru as $key => $kel) :
                                            $ids[] = $kel->guru->id;
                                        ?>
                                            <div class="mr-2 mb-2">
                                                <div class="d-flex flex-row display-8 border border-primary rounded">
                                                    <span class="p-1 px-2 ">
                                                        <?= $kel->guru->nama ?>
                                                    </span>
                                                    <a class="btn btn-sm rounded bg-white border-white text-danger" href="" data-toggle="modal" data-target="#deleteAKG<?= $kel->guru->id ?>-<?= $kelasNow ?>" data-toggle="modal" data-target="#deleteAKG<?= $kel->guru->id ?>-<?= $kelasNow ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="deleteAKG<?= $kel->guru->id ?>-<?= $kelasNow ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Kelas Guru</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin ingin menghapus <?= $kel->guru->nama ?> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <a class="btn btn-danger" href="<?= base_url('admin/deleteAKG/' . $kel->guru->id . '-' . $kelasNow) ?>">Yakin</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </td>
                            </tr>
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