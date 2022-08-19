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
        Daftar Guru
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
                            <th>Mata Pelajaran per Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($gurus as $key => $value) :
                            $ids = [];
                        ?>
                            <tr>
                                <!-- NO -->
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <!-- NAMA -->
                                <td >
                                    <?= $value->nama ?>
                                </td>
                                <!-- MATA PELAJARAN PER KELAS -->
                                <td class="w-75 w-lg-50">
                                    <?php foreach ($value->assignedKelas as $key => $kelas) :
                                        // $ids[] = $kel->guru->id;
                                    ?>
                                        <!-- KELAS ITEM -->
                                        <div class="card shadow-sm my-2">
                                            <a data-toggle="collapse" href="#collapseKelasCard-<?= $kelas->id ?>" role="button" aria-expanded="false" aria-controls="collapseKelasCard-<?= $kelas->id ?>">
                                                <div class="card-header">
                                                    <!-- KELAS NAME -->
                                                    <?= $kelas->kelas->nama ?>
                                                </div>
                                            </a>
                                            <div class="card-body collapse multi-collapse" id="collapseKelasCard-<?= $kelas->id ?>">
                                                <!-- FORM -->
                                                <form class="form-inline" action="<?= base_url('admin/insertAssignMapelKelasGuru') ?>" method="post">
                                                    <input type="hidden" name="assign_kelas_guru_id" value="<?= $kelas->id ?>">
                                                    <input type="hidden" name="kelas_id" value="<?= $kelas->kelas->id ?>">
                                                    <span class="btn btn-sm btn-info my-1 mr-2 disabled">
                                                        <i class="fas fa-plus fa-sm"></i>
                                                    </span>
                                                    <?php
                                                    $available_mapel = $kelas->available_maple($kelas->kelas->id);
                                                    if ($available_mapel->count() < 1) :
                                                    ?>
                                                        <select class="custom-select my-1 mr-sm-2" name="guru_id" id="inlineFormCustomSelectPref">
                                                            <option value="none">
                                                                Tidak tersedia mapel untuk kelas ini
                                                            </option>
                                                        </select>
                                                        <button type="button" class="btn btn-sm btn-primary my-1" onclick="return alert('Semua Guru sudah ditambahkan')">assign</button>
                                                    <?php else : ?>
                                                        <select class="custom-select my-1 mr-sm-2" name="mapel_id" id="inlineFormCustomSelectPref">
                                                            <?php foreach ($available_mapel as $key => $avMaple) : ?>
                                                                <option value="<?= $avMaple->id ?>">
                                                                    <?= $avMaple->nama ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <button type="submit" class="btn btn-sm btn-primary my-1">Tambahkan</button>
                                                    <?php endif; ?>
                                                </form>
                                                <ul>
                                                    <?php foreach ($kelas->assign_mapel_kelas_guru as $key => $mp) : ?>
                                                        <li>
                                                            <?= $mp->assign_mapel_kelas->mapel->nama ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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