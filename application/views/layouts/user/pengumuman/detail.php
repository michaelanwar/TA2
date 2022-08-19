<!-- EVENT SINGLE
    ================================================== -->
<div class="sk-thumbnail img-ratio-7">
    <?php if ($pengumuman->banner != '' && file_exists('assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner)) : ?>
        <img class="img-fluid" src="<?php echo base_url('assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner) ?>" alt="..."></a>
    <?php else : ?>
        <img src="<?= base_url() ?>assets/img/covers/cover-22.jpg" alt="..." class="img-fluid">
    <?php endif; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-10 mx-xl-auto mt-md-n10 mt-xl-n13 mb-8">
            <div class="rounded bg-white p-5 p-lg-8">
                <ul class="nav mx-n3 d-block d-md-flex justify-content-center mb-5 align-items-center">
                    <li class="nav-item px-3 mb-3 mb-md-0">
                        <span class="badge badge-lg badge-orange badge-pill px-5">
                            <span class="text-white fw-normal font-size-sm"><?= get_day($pengumuman->created_at) ?></span>
                        </span>
                    </li>
                </ul>
                <h1 class="text-center mb-5"> <?= $pengumuman->judul ?> </h1>
            </div>
        </div>
    </div>

    <div class="row mb-11">
        <div class="col-lg-8 mb-6 mb-lg-0">
            <h3 class="">Deskripsi</h3>
            <p class="mb-6 line-height-md">
                <?= $pengumuman->deskripsi ?>
                <!-- print author -->
                <?php if ($pengumuman->author != '') : ?>
                    <br>
                    <small class="text-muted">
                        Dibuat Oleh : <?= $pengumuman->admin->nama ?>
                    </small>
                <?php endif; ?>
            </p>

            <?php if ($pengumuman->files->count() > 0) :
                foreach ($pengumuman->files as $key => $value) :
                    if (file_exists(FCPATH . '/assetsAdmin/files/uploads/pengumuman/' . $value->file_name)) :
            ?>
                        <a href="<?= base_url('/assetsAdmin/files/uploads/pengumuman/' . $value->file_name) ?>" target="_blank" class="text-teal h6 mb-8" role="button">
                            <span class="d-inline-flex align-items-center more">
                                Download file<?= $key + 1 ?>
                                <span class="d-flex align-items-center justify-content-center bg-teal rounded-circle ms-2 p-2 w-26p">
                                    <i class="fas fa-download font-size-10 text-white"></i>
                                </span>
                            </span>
                        </a>
                        <br>
                        <br>
            <?php endif;
                endforeach;
            endif; ?>
        </div>
    </div>
</div>