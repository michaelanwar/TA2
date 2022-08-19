<style type="text/css">
    .table a {
        text-decoration: none;
    }

    .form-group a {
        text-decoration: none;
    }

    .for-form-modal span {
        color: red;
    }
</style>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelas') ?>">Kelas</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelasMapel/' . $cur_idAkgs) ?>">Mata Pelajaran</a>
            </li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelasMapelBab/' . $cur_idAmkg) ?>">BAB</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelasMapelBabFile/' . $cur_idAmkgb) ?>">Materi</a>
            <li class="breadcrumb-item">Pengumpulan Tugas</li>
            </li>
        </ol>
    </nav>
    <h1 class=" h3 mb-2 text-gray-800">
        <?= $cur_kelasNama ?> <i class="fas fa-xs fa-angle-double-right"></i>
        <?= $cur_mapelName ?> <i class="fas fa-xs fa-angle-double-right"></i>
        <?= $cur_babName ?> <i class="fas fa-xs fa-angle-double-right"></i>
        Tugas
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span class="mr-2">Topik: <?= $materiName ?></span>
            <a href="<?= base_url('guru/downloadPengumpulan/' . $tugasId) ?>" class="btn btn-sm btn-primary float-right">
                Download Semua Tugas
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Berkas</th>
                            <th>Batas Pengiriman</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mtss as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->siswa->nama ?></td>
                                <td>
                                    <a href="<?= base_url($tugasPath . $value->nama_file) ?>" target="_blank">
                                        Download File
                                    </a>
                                </td>
                                <td>
                                    <?= $value->materi_tugas->deadline_1 ?>
                                </td>
                                <td>
                                    <!-- find distance $value->updated_at and $value->materi_tugas->deadline_1 -->
                                    <?php
                                    $date1 = new DateTime($value->materi_tugas->deadline_1);
                                    $date2 = new DateTime(($value->updated_at == null) ? $value->created_at : $value->updated_at);
                                    $diff = $date2->diff($date1);

                                    // check if deadline is passed
                                    if ($diff->invert == 1) {
                                        echo '<span class="badge badge-danger">Telat ' .
                                            $diff->d . ' hari ' . $diff->h . ' jam ' . $diff->i . ' menit ' . $diff->s . ' detik</span>';
                                    } else {
                                        echo '<span class="badge badge-success">Pengumpulan tepat waktu</span>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>