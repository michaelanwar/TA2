<style type="text/css">
    .table a {
        text-decoration: none;
    }

    .for-form-modal span {
        color: red;
    }
</style>
<div class="container-fluid">
    <div class="d-flex flex-row">
        <span class=" h3 mb-4 text-gray-800">
            Mata Pelajaran dan Guru Pengajar
        </span>
        <div class="flex-fill pl-3">
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="p-2 alert alert-success" role="alert">
                    <?= $this->session->flashdata('message') ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger p-1  " role="alert">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="w-25">Nama Kelas</th>
                            <th>Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelasList as $key => $kelasItem) : ?>
                            <tr>
                                <!-- Nama Kelas -->
                                <td class="w-25"><?= $kelasItem->nama ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#addMapelToKelas-<?= $kelasItem->id ?>" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">tambah</span>
                                    </a>
                                    <div class="p-2 row">
                                        <?php foreach ($kelasItem->mapelList as $key => $mapelItem) : ?>
                                            <div class="col-6 p-1 display-8 small">
                                                <div class="d-flex align-items-center p-1 border border-info rounded bg-light shadow-sm">
                                                    <a class="p-1 mr-1 btn btn-sm rounded bg-white text-danger" href="#" data-toggle="modal" data-target="#deleteAssignedMapel<?= $mapelItem->id ?>" data-toggle="modal">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a class="p-1 mr-1 btn btn-sm rounded bg-white text-info" href="#" data-toggle="modal" data-target="#editAssignedMapel<?= $mapelItem->id ?>" data-toggle="modal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <span>
                                                        Mapel
                                                        <strong>
                                                            <?= $mapelItem->mapel->nama ?>
                                                        </strong>
                                                        dengan Guru
                                                        <strong>
                                                            <?= $mapelItem->guru->nama ?>
                                                        </strong>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- edit modals -->
                                            <div class="modal fade" id="editAssignedMapel<?= $mapelItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="editAssignedMapel<?= $mapelItem->id ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="<?= base_url('admin/editAssignedMapel/' . $mapelItem->id) ?>" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Mata Pelajaran </h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <input type="hidden" name="idAssignedMapel" value="<?= $mapelItem->id ?>">
                                                            <div class="modal-body">
                                                                <p>
                                                                    Ubah mata pelajaran
                                                                    <strong><?= $mapelItem->mapel->nama ?></strong>
                                                                    di
                                                                    <strong><?= $kelasItem->nama ?></strong>
                                                                </p>
                                                                <!-- CHOOSE GURU -->
                                                                <div class="form-group">
                                                                    <label for="optGuru">Pilih pengganti <?= $mapelItem->guru->nama ?></label>
                                                                    <select class="custom-select" name="optGuru" id="optGuru">
                                                                        <option value="" selected>Pilih Guru</option>
                                                                        <?php foreach ($guruList as $key => $guruItem) : ?>
                                                                            <option value="<?= $guruItem->id ?>"><?= $guruItem->nama ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- delete modals -->
                                            <div class="modal fade" id="deleteAssignedMapel<?= $mapelItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteAssignedMapel<?= $mapelItem->id ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="<?= base_url('admin/deleteAssignedMapel/' . $mapelItem->id) ?>">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Mata Pelajaran</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Hapus Mapel <strong><?= $mapelItem->mapel->nama ?></strong> dengan Guru <strong><?= $mapelItem->guru->nama ?></strong>?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </td>
                            </tr>

                            <!-- ADD MAPEL TO KELAS -->
                            <div class="modal fade" id="addMapelToKelas-<?= $kelasItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="<?= base_url('admin/addMapelToKelas') ?>" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran ke <?= $kelasItem->nama ?></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <input type="hidden" name="idKelas" value="<?= $kelasItem->id ?>">
                                            <div class="modal-body">
                                                <!-- CHOOSE MAPEL -->
                                                <div class="form-group">
                                                    <label for="optMapel">Mata pelajaran</label>
                                                    <select class="custom-select" name="optMapel" id="optMapel">
                                                        <option value="" selected>Pilih Mata Pelajaran</option>
                                                        <?php foreach ($mapelList as $key => $mapelItem) : ?>
                                                            <option value="<?= $mapelItem->id ?>"><?= $mapelItem->nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <!-- CHOOSE GURU -->
                                                <div class="form-group">
                                                    <label for="optGuru">Pilih Guru</label>
                                                    <select class="custom-select" name="optGuru" id="optGuru">
                                                        <option value="" selected>Pilih Guru</option>
                                                        <?php foreach ($guruList as $key => $guruItem) : ?>
                                                            <option value="<?= $guruItem->id ?>"><?= $guruItem->nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-sm btn-primary">Tambahkan</button>
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>