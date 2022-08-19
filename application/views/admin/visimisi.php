<!-- EVENT SINGLE
    ================================================== -->
<!-- <div class="sk-thumbnail img-ratio-7">
    <img src="<?= base_url() ?>assets/img/covers/mencoba.jpg" alt="..." class="img-fluid">
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-10 mx-xl-auto mt-md-n10 mt-xl-n13 mb-8">
            <div class="rounded bg-white p-5 p-lg-8">
                <h1 class="text-center mb-5"> Visi Misi Sekolah </h1>
            </div>
        </div>
    </div>

    <div class="row mb-11">
        <div class="col-lg-8 mb-6 mb-lg-0">
            <h3 class="mb-5">Visi</h3>
            <div class="row row-cols-lg-2 mb-8">
                <div class="col-md-8">
                    <ul class="list-style-v1 list-unstyled">
                        <li>SEKOLAH SHALIH, CERDAS, DAN TERAMPIL</li>
                    </ul>
                </div>
            </div>

            <h3 class="mb-5">Misi</h3>
            <ul class="list-style-v2 list-unstyled mb-6">
                <li>Menciptakan iklim dan budaya sekolah yang islami</li>
                <li>Membentuk peserta didik yang cerdas dan kompetitif</li>
                <li>Membentuk pribadi yang adaptif dan berketuhanan Yang Maha Esa</li>
            </ul>
        </div>

    </div>
</div> -->

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
            <h6 class="m-0 font-weight-bold text-primary">Visi Misi Sekolah</h6>
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
                        <?php foreach ($visimisis as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $value->judul ?></td>
                                <td>
                                    <?= $value->isi ?>
                                </td>

                                <td>
                                    <a data-toggle="modal" data-target="#editSiswa<?= $value->id ?>" class="btn btn-warning btn-circle btn-sm mb-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('admin/viewVisiMisi/' . $value->id) ?>" target="_blank" class="btn btn-info btn-circle btn-sm">
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
                                                <form action="<?= base_url('admin/updateVisiMisi/' . $value->id) ?>" method="post" enctype="multipart/form-data">
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
<script src="<?= base_url() ?>assetsAdmin/vendor/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $("#tanggal_lahir").datepicker();
    });
</script>