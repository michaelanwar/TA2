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
            <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
            <a data-toggle="modal" data-target="#createAdmin" class="btn btn-primary">
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
                            <th>Email</th>
                            <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach ($admin as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->user->email ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#editAdmin<?= $value->id ?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#deleteAdmin<?= $value->id ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <div class="modal fade" id="deleteAdmin<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Admin</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-danger" href="<?= base_url('admin/deleteAdmin/' . urlencode($value->user->email)) ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editAdmin<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('admin/editAdmin/' . urlencode($value->user->email)) ?>" method="post">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label><span style="color: red;">*</span>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $value->nama ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password Baru</label><span style="color: red;">*</span>
                                                    <input type="password" class="form-control" id="password" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" minlength="6">
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
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

<div class="modal fade" id="createAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body for-form-modal">
                <form action="<?= base_url('admin/createAdmin') ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama<span>*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <!-- make from group for email and check email format -->
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="setCustomValidity('')">
                    </div>
                    <!-- make from group for password -->
                    <div class="form-group">
                        <label for="password">Password<span>*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="setCustomValidity('')" minlength="6">
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