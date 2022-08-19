<?php defined('BASEPATH') or exit('No direct script access allowed');


if (isset($content)) {
    $this->load->view($content);
} else {

?>

    <!-- HERO
    ================================================== -->
    <section class="py-4 py-md-13 position-relative bg-white">
        <!-- Cursor position parallax -->
        <div class="position-absolute right-0 left-0 top-0 bottom-0">
            <div class="cs-parallax">
                <div class="cs-parallax-layer" data-depth="0.1">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-01.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.3">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-02.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.2">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-03.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.2">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-04.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.4">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-05.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.3">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-06.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.2">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-07.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.2">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-08.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.4">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-09.svg" alt="Layer">
                </div>
                <div class="cs-parallax-layer" data-depth="0.3">
                    <img class="img-fluid" src="<?php echo base_url() ?>assets/img/parallax/layer-10.svg" alt="Layer">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2" data-aos="fade-in" data-aos-delay="50">

                    <!-- Image -->
                    <img src="<?php echo base_url() ?>assets/img/illustrations/illustration-1.png" class="img-fluid mw-md-150 mw-lg-130 mb-6 mb-md-0" alt="...">

                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 px-md-0">
                    <!-- Heading -->
                    <h1 class="display-2" data-aos="fade-left" data-aos-duration="150">
                        Belajar dari <span class="text-orange fw-bold">Rumah</span>
                    </h1>

                    <!-- Text -->
                    <p class="lead pe-md-8 text-capitalize" data-aos="fade-up" data-aos-duration="200">
                        Ilmu adalah jembatan dunia yang sangat mahal, karena ilmu itu tidak dapat dibatalkan.
                    </p>

                    <!-- Buttons -->
                    <a href="<?= base_url('siswa/pelajaran') ?>" class="btn btn-wide btn-slide slide-primary shadow mb-4 mb-md-0 me-md-5" data-aos-duration="200" data-aos="fade-up">Belajar Sekarang</a>
                    <a href="<?= base_url('siswa/pelajaran') ?>" class="btn btn-primary btn-wide lift d-none d-lg-inline-block" data-aos-duration="200" data-aos="fade-up">Lihat Pelajaran</a>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- FEATURED PRODUCT
    ================================================== -->
    <section class="pt-5 pb-9 py-md-11">
        <div class="container">
            <div class="row align-items-center mb-5" data-aos="fade-up">
                <div class="col-md mb-2 mb-md-0">
                    <h1 class="mb-1">Mata Pelajaran</h1>
                    <p class="font-size-lg text-capitalize">Daftar mata pelajaran</p>
                </div>
                <div class="col-md-auto">
                    <a href="<?= base_url('siswa/pelajaran') ?>" class="d-flex align-items-center fw-medium">
                        Lihat Semua
                        <div class="ms-2 d-flex">
                            <!-- Icon -->
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="currentColor" />
                            </svg>

                        </div>
                    </a>
                </div>
            </div>

            <div class="mx-n4" data-flickity='{"pageDots": true, "prevNextButtons": false, "cellAlign": "left", "wrapAround": true, "imagesLoaded": true}'>
                <?php foreach ($mapelList as $key => $mapel) { ?>
                    <div class="col-12 col-md-6 col-xl-4 pb-4 pb-md-7" data-aos="fade-up" data-aos-delay="50" style="padding-right:15px;padding-left:15px;">
                        <!-- Card -->
                        <div class="card border shadow p-2 sk-fade">
                            <!-- Image -->
                            <div class="card-zoom position-relative">
                                <div class="badge-float sk-fade-top top-0 right-0 mt-4 me-4">
                                    <a href="<?= base_url('siswa/pelajaran/detail/' . $mapel->id) ?>" class="btn btn-xs btn-dark text-white rounded-circle lift opacity-dot-7 me-1 p-2 d-inline-flex justify-content-center align-items-center w-36 h-36">
                                        <!-- Icon Eye-->
                                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.8856 8.64995C17.7248 8.42998 13.8934 3.26379 8.99991 3.26379C4.10647 3.26379 0.274852 8.42998 0.114223 8.64974C-0.0380743 8.85843 -0.0380743 9.14147 0.114223 9.35016C0.274852 9.57013 4.10647 14.7363 8.99991 14.7363C13.8934 14.7363 17.7248 9.5701 17.8856 9.35034C18.0381 9.14169 18.0381 8.85843 17.8856 8.64995ZM8.99991 13.5495C5.39537 13.5495 2.27345 10.1206 1.3493 8.99965C2.27226 7.87771 5.38764 4.4506 8.99991 4.4506C12.6043 4.4506 15.726 7.8789 16.6505 9.00046C15.7276 10.1224 12.6122 13.5495 8.99991 13.5495Z" fill="currentColor" />
                                            <path d="M8.9999 5.43958C7.03671 5.43958 5.43945 7.03683 5.43945 9.00003C5.43945 10.9632 7.03671 12.5605 8.9999 12.5605C10.9631 12.5605 12.5603 10.9632 12.5603 9.00003C12.5603 7.03683 10.9631 5.43958 8.9999 5.43958ZM8.9999 11.3736C7.69103 11.3736 6.62629 10.3089 6.62629 9.00003C6.62629 7.6912 7.69107 6.62642 8.9999 6.62642C10.3087 6.62642 11.3735 7.6912 11.3735 9.00003C11.3735 10.3089 10.3088 11.3736 8.9999 11.3736Z" fill="currentColor" />
                                        </svg>

                                    </a>
                                </div>

                                <a href="javascript:void(0)" class="card-img sk-thumbnail d-block">
                                    <img class="rounded shadow-light-lg" src="<?php echo base_url() ?>assets/img/products/product-1.jpg" alt="...">
                                </a>

                            </div>

                            <!-- Footer -->
                            <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                                <a href="instructors-single.html" class="d-block">
                                    <div class="avatar avatar-xl badge-float position-absolute top-0 right-0 mt-n6 me-5 rounded-circle shadow border border-white border-w-lg">
                                        <img src="<?php echo base_url() ?>assets/img/avatars/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </a>

                                <!-- Preheading -->
                                <a href="javascript:void(0)"><span class="mb-1 d-inline-block text-gray-800"><?= $mapel->guru->nama ?></span></a>


                                <!-- Heading -->
                                <div class="position-relative">
                                    <a href="<?= base_url('siswa/pelajaran/detail/' . $mapel->id) ?>" class="d-block stretched-link">
                                        <h4 class="line-clamp-2 h-md-48 h-lg-58 me-md-6 me-lg-10 me-xl-4 mb-2">
                                            <?php echo $mapel->mapel->nama; ?>
                                        </h4>
                                    </a>


                                    <div class="row mx-n2 align-items-end mh-50">
                                        <div class="col px-2">
                                            <ul class="nav mx-n3">
                                                <li class="nav-item px-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 d-flex icon-uxs text-secondary">
                                                            <!-- Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M17.1947 7.06802L14.6315 7.9985C14.2476 7.31186 13.712 6.71921 13.0544 6.25992C12.8525 6.11877 12.6421 5.99365 12.4252 5.88303C13.0586 5.25955 13.452 4.39255 13.452 3.43521C13.452 1.54098 11.9124 -1.90735e-06 10.0197 -1.90735e-06C8.12714 -1.90735e-06 6.58738 1.54098 6.58738 3.43521C6.58738 4.39255 6.98075 5.25955 7.61414 5.88303C7.39731 5.99365 7.1869 6.11877 6.98502 6.25992C6.32752 6.71921 5.79178 7.31186 5.40787 7.9985L2.8447 7.06802C2.33612 6.88339 1.79688 7.26044 1.79688 7.80243V16.5178C1.79688 16.8465 2.00256 17.14 2.31155 17.2522L9.75312 19.9536C9.93073 20.018 10.1227 20.0128 10.2863 19.9536L17.7278 17.2522C18.0368 17.14 18.2425 16.8465 18.2425 16.5178V7.80243C18.2425 7.26135 17.704 6.88309 17.1947 7.06802ZM10.0197 1.5625C11.0507 1.5625 11.8895 2.40265 11.8895 3.43521C11.8895 4.46777 11.0507 5.30792 10.0197 5.30792C8.98866 5.30792 8.14988 4.46777 8.14988 3.43521C8.14988 2.40265 8.98866 1.5625 10.0197 1.5625ZM9.23844 18.1044L3.35938 15.9703V8.91724L9.23844 11.0513V18.1044ZM10.0197 9.67255L6.90644 8.54248C7.58164 7.51892 8.75184 6.87042 10.0197 6.87042C11.2875 6.87042 12.4577 7.51892 13.1329 8.54248L10.0197 9.67255ZM16.68 15.9703L10.8009 18.1044V11.0513L16.68 8.91724V15.9703Z" fill="currentColor" />
                                                            </svg>

                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- EVENTS
    ================================================== -->
    <section class="py-5 pt-md-11 pb-md-10">
        <div class="container">
            <div class="row align-items-end mb-4 mb-md-7">
                <div class="col-md mb-4 mb-md-0">
                    <h1 class="mb-1">Pengumuman</h1>
                    <p class="font-size-lg mb-0 text-capitalize">Temukan pengumuman terbaru dibawah ini</p>
                </div>
                <div class="col-md-auto">
                    <a href="<?= base_url('siswa/pengumuman') ?>" class="d-flex align-items-center fw-medium">
                        Lihat Semua
                        <div class="ms-2 d-flex">
                            <!-- Icon -->
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.7779 4.6098L3.32777 0.159755C3.22485 0.0567475 3.08745 0 2.94095 0C2.79445 0 2.65705 0.0567475 2.55412 0.159755L2.2264 0.487394C2.01315 0.700889 2.01315 1.04788 2.2264 1.26105L5.96328 4.99793L2.22225 8.73895C2.11933 8.84196 2.0625 8.97928 2.0625 9.1257C2.0625 9.27228 2.11933 9.4096 2.22225 9.51269L2.54998 9.84025C2.65298 9.94325 2.7903 10 2.9368 10C3.0833 10 3.2207 9.94325 3.32363 9.84025L7.7779 5.38614C7.88107 5.2828 7.93774 5.14484 7.93741 4.99817C7.93774 4.85094 7.88107 4.71305 7.7779 4.6098Z" fill="currentColor" />
                            </svg>

                        </div>
                    </a>
                </div>
            </div>

            <div class="row row-cols-lg-2">
                <?php foreach ($pengumumans as $key => $value) : ?>


                    <!-- SEC -->
                    <div class="col-12 col-md-6 col-xl-4 pb-4 pb-md-7" data-aos="fade-up" data-aos-delay="50" style="padding-right:15px;padding-left:15px;">
                        <!-- Card -->
                        <div class="card border shadow p-2 sk-fade">
                            <!-- Image -->
                            <div class="card-zoom position-relative">
                                <div class="badge-float sk-fade-top top-0 right-0 mt-4 me-4">
                                    <a href="<?= base_url('siswa/pengumuman/detail/' . $value->id) ?>" class="btn btn-xs btn-dark text-white rounded-circle lift opacity-dot-7 me-1 p-2 d-inline-flex justify-content-center align-items-center w-36 h-36">
                                        <!-- Icon Eye-->
                                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.8856 8.64995C17.7248 8.42998 13.8934 3.26379 8.99991 3.26379C4.10647 3.26379 0.274852 8.42998 0.114223 8.64974C-0.0380743 8.85843 -0.0380743 9.14147 0.114223 9.35016C0.274852 9.57013 4.10647 14.7363 8.99991 14.7363C13.8934 14.7363 17.7248 9.5701 17.8856 9.35034C18.0381 9.14169 18.0381 8.85843 17.8856 8.64995ZM8.99991 13.5495C5.39537 13.5495 2.27345 10.1206 1.3493 8.99965C2.27226 7.87771 5.38764 4.4506 8.99991 4.4506C12.6043 4.4506 15.726 7.8789 16.6505 9.00046C15.7276 10.1224 12.6122 13.5495 8.99991 13.5495Z" fill="currentColor" />
                                            <path d="M8.9999 5.43958C7.03671 5.43958 5.43945 7.03683 5.43945 9.00003C5.43945 10.9632 7.03671 12.5605 8.9999 12.5605C10.9631 12.5605 12.5603 10.9632 12.5603 9.00003C12.5603 7.03683 10.9631 5.43958 8.9999 5.43958ZM8.9999 11.3736C7.69103 11.3736 6.62629 10.3089 6.62629 9.00003C6.62629 7.6912 7.69107 6.62642 8.9999 6.62642C10.3087 6.62642 11.3735 7.6912 11.3735 9.00003C11.3735 10.3089 10.3088 11.3736 8.9999 11.3736Z" fill="currentColor" />
                                        </svg>

                                    </a>
                                </div>

                                <a href="javascript:void(0)" class="card-img sk-thumbnail d-block">
                                    <img class="rounded shadow-light-lg" src="<?= base_url('assetsAdmin/img/upload/pengumuman/' . $value->banner) ?>" alt="...">
                                </a>

                            </div>

                            <!-- Footer -->
                            <div class="card-footer px-2 pb-2 mb-1 pt-4 position-relative">
                                <a href="<?= base_url('siswa/pengumuman/detail/' . $value->id) ?>" class="d-block">
                                    <div class="avatar avatar-xl badge-float position-absolute top-0 right-0 mt-n6 me-5 rounded-circle shadow border border-white border-w-lg">
                                        <img src="<?php echo base_url() ?>assets/img/avatars/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </a>

                                <!-- Preheading -->
                                <a href="javascript:void(0)"><span class="mb-1 d-inline-block text-gray-800"><?= get_day($value->created_at) ?></span></a>


                                <!-- Heading -->
                                <div class="position-relative">
                                    <a href="<?= base_url('siswa/pengumuman/detail/' . $value->id) ?>" class="d-block stretched-link">
                                        <h4 class="line-clamp-2 h-md-48 h-lg-58 me-md-6 me-lg-10 me-xl-4 mb-2">
                                            <?= $value->judul ?>
                                        </h4>
                                    </a>


                                    <div class="row mx-n2 align-items-end mh-50">
                                        <div class="col px-2">
                                            <ul class="nav mx-n3">
                                                <li class="nav-item px-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2 d-flex icon-uxs text-secondary">
                                                            <!-- Icon -->
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M17.1947 7.06802L14.6315 7.9985C14.2476 7.31186 13.712 6.71921 13.0544 6.25992C12.8525 6.11877 12.6421 5.99365 12.4252 5.88303C13.0586 5.25955 13.452 4.39255 13.452 3.43521C13.452 1.54098 11.9124 -1.90735e-06 10.0197 -1.90735e-06C8.12714 -1.90735e-06 6.58738 1.54098 6.58738 3.43521C6.58738 4.39255 6.98075 5.25955 7.61414 5.88303C7.39731 5.99365 7.1869 6.11877 6.98502 6.25992C6.32752 6.71921 5.79178 7.31186 5.40787 7.9985L2.8447 7.06802C2.33612 6.88339 1.79688 7.26044 1.79688 7.80243V16.5178C1.79688 16.8465 2.00256 17.14 2.31155 17.2522L9.75312 19.9536C9.93073 20.018 10.1227 20.0128 10.2863 19.9536L17.7278 17.2522C18.0368 17.14 18.2425 16.8465 18.2425 16.5178V7.80243C18.2425 7.26135 17.704 6.88309 17.1947 7.06802ZM10.0197 1.5625C11.0507 1.5625 11.8895 2.40265 11.8895 3.43521C11.8895 4.46777 11.0507 5.30792 10.0197 5.30792C8.98866 5.30792 8.14988 4.46777 8.14988 3.43521C8.14988 2.40265 8.98866 1.5625 10.0197 1.5625ZM9.23844 18.1044L3.35938 15.9703V8.91724L9.23844 11.0513V18.1044ZM10.0197 9.67255L6.90644 8.54248C7.58164 7.51892 8.75184 6.87042 10.0197 6.87042C11.2875 6.87042 12.4577 7.51892 13.1329 8.54248L10.0197 9.67255ZM16.68 15.9703L10.8009 18.1044V11.0513L16.68 8.91724V15.9703Z" fill="currentColor" />
                                                            </svg>

                                                        </div>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- CALL ACTION
    ================================================== -->
    <section class="py-6 py-md-11 border-top border-bottom jarallax" data-jarallax data-speed=".8" style="background-image: url(<?php echo base_url() ?>assets/img/illustrations/illustration-1.jpg)">
        <div class="container text-center py-xl-4" data-aos="fade-up">
            <h1 class="text-capitalize">“Pendidikan adalah apa yang tersisa setelah melupakan semua yang dia pelajari di
                sekolah”</h1>
            <div class="font-size-lg mb-md-6 mb-4">Albert Einstein</div>
        </div>
    </section>

<?php } ?>