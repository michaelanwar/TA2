<!-- PAGE TITLE
================================================== -->
<header class="py-8 py-md-4" style="background-image: none;">
    <div class="container text-center py-xl-2">
        <h1 class="display-4 fw-semi-bold mb-0">Pengumuman</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-scroll justify-content-center">
                <li class="breadcrumb-item">
                    <a class="text-gray-800" href="<?= base_url('siswa/home') ?>">
                        Beranda
                    </a>
                </li>
                <li class="breadcrumb-item text-gray-800 active" aria-current="page">
                    Pengumuman
                </li>
            </ol>
        </nav>
    </div>
    <!-- Img -->
    <img class="d-none img-fluid" src="...html" alt="...">
</header>


<!-- CONTROL BAR
    ================================================== -->
<div class="container mb-4 mb-xl-6 z-index-2">
    <div class="d-xl-flex align-items-center">
        <p class="mb-xl-0"><span class="text-dark"><?= $pengumumans->count() ?> Pengumuman</span></p>
        <div class="ms-xl-auto d-xl-flex flex-wrap">
            <div class="mb-4 mb-xl-0 ms-xl-6">
                <form class="">
                    <div class="input-group input-group-filter">
                        <input id="searchBtn" class="form-control form-control-sm placeholder-dark border-end-0 shadow-none" type="text" placeholder="Cari pengumuman" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-white border-start-0 bg-transparent text-dark" type="submit">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor" />
                                    <path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- EVENT ================================================== -->
<div class="container pb-4 pb-xl-7">
    <div class="row row-cols-md-2 row-cols-lg-3 mb-4">
        <!-- Event Single Card [start] -->
        <?php foreach ($pengumumans as $pengumuman) : ?>
            <div class="col-md mb-6">
                <!-- Card -->
                <div class="content card border shadow p-2 lift sk-fade">
                    <!-- Image -->
                    <div class="card-zoom position-relative">
                        <a href="<?= base_url('siswa/pengumuman/detail/' . $pengumuman->id) ?>" class="card-img d-block sk-thumbnail img-ratio-3 card-hover-overlay">
                            <?php if ($pengumuman->banner != '' && file_exists('assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner)) : ?>
                                <img class="rounded shadow-light-lg img-fluid" src="<?php echo base_url('assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner) ?>" alt="..."></a>
                    <?php else : ?>
                        <img class="rounded shadow-light-lg img-fluid" src="<?php echo base_url() ?>assets/img/events/event-1.jpg" alt="..."></a>
                    <?php endif; ?>
                    <a href="<?= base_url('siswa/pengumuman/detail/' . $pengumuman->id) ?>" class="text-underline text-white card-text-overlay position-absolute h5 mb-0 center">Lihat
                        Selengkapnya</a>
                    <a href="<?= base_url('siswa/pengumuman/detail/' . $pengumuman->id) ?>" class="badge sk-fade-bottom badge-lg badge-orange badge-pill badge-float bottom-0 left-0 mb-4 ms-4 px-5 me-4">
                        <span class="text-white fw-normal font-size-sm"><?= get_day($pengumuman->created_at) ?></span>
                    </a>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer px-2 pb-2 pt-4">
                        <!-- Heading -->
                        <a href="<?= base_url('siswa/pengumuman/detail/' . $pengumuman->id) ?>" class="d-block">
                            <h5 class="line-clamp-2 h-48 h-lg-52 mb-2"><?= $pengumuman->judul ?></h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Event Single Card [end] -->
    </div>
</div>

<script>
    window.onload = () => {
        $(document).ready(function() {
            $('#searchBtn').keyup(function() {
                // Search text
                var text = $(this).val();

                // Hide all content class element
                $('.content').hide();

                // Search and show
                $('.content:contains("' + text + '")').show();

            });
        });
    }
</script>