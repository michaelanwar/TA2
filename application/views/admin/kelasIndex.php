<style type="text/css">
    .table a {
        text-decoration: none;
    }

    .for-form-modal span {
        color: red;
    }
</style>
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
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
            <a data-toggle="modal" data-target="#createKelas" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <?php foreach ($kelasList as $key => $kelasItem) : ?>
                        <tr>
                            <!-- No -->
                            <td><?= $key + 1 ?></td>
                            <!-- Nama Kelas -->
                            <td><?= $kelasItem->nama ?></td>
                            <!-- Aksi -->
                            <td>
                                <div class="mb-2">
                                    <a href="#" data-toggle="modal" data-target="#editKelas-<?= $kelasItem->id ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                </div>
                                <div>
                                    <a href="#" data-toggle="modal" data-target="#deleteKelas-<?= $kelasItem->id ?>" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!-- Edit Modals -->
                        <div class="modal fade" id="editKelas-<?= $kelasItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Kelas</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body for-form-modal">
                                        <!-- make form -->
                                        <form action="<?= base_url('admin/updateKelas/' . $kelasItem->id) ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="namaKelas<?= $kelasItem->id ?>">Nama Kelas</label>
                                                <input type="text" class="form-control" id="namaKelas<?= $kelasItem->id ?>" name="txtNamaKelas" value="<?= $kelasItem->nama ?>" placeholder="Nama Kelas" required oninvalid="this.setCustomValidity('Nama Kelas tidak boleh kosong')" oninput="setCustomValidity('')">
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

                        <!-- Delete Modals -->
                        <div class="modal fade" id="deleteKelas-<?= $kelasItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus kelas</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus kelas ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                                        <a class="btn btn-danger" href="<?= base_url('admin/deleteKelas/' . $kelasItem->id) ?>">Yakin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <!-- make form -->
                <form action="<?= base_url('admin/createKelas') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="txtNamaKelas">Nama Kelas<span>*</span></label>
                        <input type="text" class="form-control" id="judul" name="txtNamaKelas" placeholder="Nama kelas" required oninvalid="this.setCustomValidity('Nama kelas tidak boleh kosong')" oninput="setCustomValidity('')">
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