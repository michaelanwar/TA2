<style type="text/css">
    .text-xs {
        font-size: 20px;
    }

    .text-xs span {
        text-transform: none;
    }

    .row a {
        text-decoration: none;
    }
</style>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a>Kelas</a></li>
        </ol>
    </nav>
    <!-- loop kelas with iteration -->
    <div class="h3 mb-2 text-gray-800">Kelas saya</div>
    <div class="d-flex flex-column">
        <?php foreach ($myKelasList as $myKelas) :
            if ($myKelas->getMapelsOfGuru($myGuruId)->count()) :
        ?>
                <div class="p-1">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <a href="<?= base_url('guru/kelasMapel/' . $myKelas->id) ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $myKelas->kelas->nama ?>
                                            </div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?= $myKelas->getMapelsOfGuru($myGuruId)->count() ?> <span>Mata Pelajaran</span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
        <?php endif;
        endforeach; ?>
    </div>

</div>