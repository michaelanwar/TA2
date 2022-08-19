<style type="text/css">
    .for-form-modal span {
        color: red;
    }
</style>
<div class="container-fluid">
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-primary" role="alert">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sejarah Sekolah</h6>
            <!-- <a data-toggle="modal" data-target="#createGuru" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah
            </a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sejarahs as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $value->judul ?></td>
                                <td><?= $value->isi ?></td>

                                <td>
                                    <a data-toggle="modal" data-target="#editSiswa<?= $value->id ?>" class="btn btn-warning btn-circle btn-sm mb-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/viewSejarah/' . $value->id) ?>" target="_blank" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>

                                <div class="modal fade" id="editSiswa<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Sejarah</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body for-form-modal">
                                                <form action="<?= base_url('admin/updateSejarah/' . $value->id) ?>" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="nama">Nama<span>*</span></label>
                                                        <input type="text" class="form-control" value="<?= $value->judul ?>" id="judul" name="txtJudul" placeholder="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Isi<span>*</span></label>
                                                        <textarea class="form-control" id="isi" name="txtIsi" placeholder="Isi" required oninvalid="this.setCustomValidity('isi tidak boleh kosong')" oninput="setCustomValidity('')" cols="30" rows="15"><?= $value->isi ?></textarea>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sejarah Sekolah</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <form action="<?= base_url('admin/createSejarah') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Judul<span>*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul sejarah" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Isi<span>*</span></label>
                        <textarea cols="30" rows="15" class="form-control" id="isi" name="isi" placeholder="isi sejarah" required oninvalid="this.setCustomValidity('Alamat tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
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
<script src="<?= base_url() ?>assetsAdmin/vendor/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $("#tanggal_lahir").datepicker();
    });
</script>