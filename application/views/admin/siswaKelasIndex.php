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
            Daftar Siswa Tiap Kelas
        </span>
        <div class="ml-auto">
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
    <style>
        .btn-check {
            display: none;
        }
    </style>
    <div class="p-1">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="w-25">Nama Kelas</th>
                                <th>Daftar Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kelasList as $key => $kelasItem) : ?>
                                <tr>
                                    <!-- Nama Kelas -->
                                    <td class="w-25"><?= $kelasItem->nama ?></td>

                                    <!-- Daftar Siswa -->
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#updateSiswaOnKelas-<?= $kelasItem->id ?>" class="btn btn-primary btn-sm btn-icon-split shadow-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                            <span class="text">Tambah</span>
                                        </a>
                                        <div class="p-2 row">
                                            <?php foreach ($kelasItem->siswa as $key => $siswaItem) : ?>
                                                <div class="col-6 col-md-4 col-lg-3 p-1 display-8 small">
                                                    <div class="d-flex align-items-center p-1 border border-info rounded bg-light shadow-sm">
                                                        <span class="p-1">
                                                            <?= $siswaItem->siswa->nama ?>
                                                        </span>
                                                    </div>
                                                </div>

                                            <?php endforeach ?>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ADD SISWA TO KELAS -->
                                <div class="modal fade" id="updateSiswaOnKelas-<?= $kelasItem->id ?>" tabindex="-1" role="dialog" aria-labelledby="addSiswaToKelas" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="<?= base_url('admin/updateSiswaInKelas') ?>" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah siswa di <?= $kelasItem->nama ?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <input type="hidden" name="idKelas" value="<?= $kelasItem->id ?>">
                                                <div class="modal-body">
                                                    <!-- CHOOSE SISWA -->
                                                    <div class="row">
                                                        <?php foreach ($allSiswaList as $key => $allSiswaItem) :
                                                            if ($allSiswaItem->getWhichClassMembered() == false || $allSiswaItem->getWhichClassMembered()->id == $kelasItem->id) :
                                                        ?>
                                                                <div class="col-6 col-md-4 col-lg-4 p-1 display-8 small">
                                                                    <input type="checkbox" <?= ($allSiswaItem->isMemberOfKelas($kelasItem->id) ? 'checked' : '') ?> class="btn-check siswaOpt" name="siswaKelasNewList[]" value="<?= $allSiswaItem->id ?>" id="btncheck-optSis-<?= $kelasItem->id . '-' . $allSiswaItem->id ?>" target="optSis-<?= $kelasItem->id . '-' . $allSiswaItem->id ?>" autocomplete="off">
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="btn w-100 <?= ($allSiswaItem->isMemberOfKelas($kelasItem->id) ? 'btn-info' : 'btn-outline-info') ?>
                                                                    " for="btncheck-optSis-<?= $kelasItem->id . '-' . $allSiswaItem->id ?>" id="optSis-<?= $kelasItem->id ?>-<?= $allSiswaItem->id ?>">
                                                                            <?= $allSiswaItem->nama ?>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                        <?php
                                                        endforeach ?>
                                                    </div>
                                                    <br>
                                                    <small>
                                                        Keterangan
                                                        <br>
                                                        <div class="btn btn-sm btn-info">--</div> Terpilih
                                                        <div class="btn btn-sm btn-outline-info ml-2">--</div> Tidak terpilih
                                                    </small>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
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
</div>
<script>
    window.onload = () => {
        $('input.siswaOpt').click((e) => {
            var idTarget = $(e.target).attr('target');
            var isChecked = $(e.target).is(':checked');
            var target = $('#' + idTarget);

            if (isChecked) {
                $(target).removeClass('btn-outline-info');
                $(target).addClass('btn-info');
            } else {
                $(target).removeClass('btn-info');
                $(target).addClass('btn-outline-info');
            }
        })
    }
</script>