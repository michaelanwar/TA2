<style type="text/css">
    .text-xs {
        font-size: 20px;
    }

    .text-xs span {
        font-size: 17px;
    }

    .row a {
        text-decoration: none;
    }
</style>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('guru/kelas') ?>">Kelas</a></li>
            <li class="breadcrumb-item"><a>Mata Pelajaran</a></li>
        </ol>
    </nav>
    <h1 class=" h3 mb-2 text-gray-800"><?= $currentKelas->nama ?></h1>
    <!-- loop kelas with iteration -->
    <div class="row">
        <?php foreach ($myMapelOfClassList as $myMapelOfClass) : ?>
            <tr>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <a href="<?= base_url('guru/myCourseMateri/' . $myMapelOfClass->id) ?>">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $myMapelOfClass->mapel->nama ?>
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <?= $myMapelOfClass->materi()->count() ?> <span>Materi</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </tr>
        <?php endforeach; ?>
    </div>
</div>