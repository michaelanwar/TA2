<?php
$materiName = explode(' ', $materi->judul);
$mtName = array_map(function ($item) {
    return $item[0];
}, $materiName);
?>
<style>
    .countdown-remaining {
        font-size: 1.0em;
        color: #4A8F9F;
    }

    .remaining-warning {
        color: red;
    }
</style>
<script>
    // change class name body to bg-dark
    document.body.className = 'bg-dark';
</script>

<!-- NAVBAR
    ================================================== -->
<header class="bg-portgore py-3">
    <div class="px-5 px-lg-8 w-100">
        <div class="d-md-flex align-items-center">
            <!-- Brand -->
            <a class="navbar-brand mb-2 mb-md-0" href="<?= base_url('siswa/home') ?>">
                <img src="<?= base_url() ?>assets/img/brand-white.svg" class="navbar-brand-img" alt="...">
            </a>

            <!-- Lesson Title -->
            <div class="mx-auto mb-5 mb-md-0">
                <h3 class="mb-0 line-clamp-2 text-white"><?= $materi->judul ?></h3>
            </div>

            <!-- Back to Course -->
            <a href="<?= base_url('siswa/pelajaran/detail/' . $currentCourse->id) ?>" class="btn btn-sm btn-orange ms-md-6 px-6 mb-3 mb-md-0 flex-shrink-0">kembali ke pelajaran</a>
        </div>
    </div>
</header>


<!-- COURSE
    ================================================== -->
<div class="container container-wd">
    <div class="row pt-8 pb-10">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-primary">
                <?= $this->session->flashdata('message') ?>
            </div>
        <?php endif ?>
        <div class="col-lg-8">
            <a href="<?= $materi->link ?>" class="d-block sk-thumbnail rounded mb-8" data-fancybox>
                <div class="h-90p w-90p rounded-circle bg-white size-30-all d-inline-flex align-items-center justify-content-center position-absolute center z-index-1">
                    <!-- Icon -->
                    <svg width="14" height="16" viewBox="0 0 14 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.8704 6.15374L3.42038 0.328572C2.73669 -0.0923355 1.9101 -0.109836 1.20919 0.281759C0.508282 0.673291 0.0898438 1.38645 0.0898438 2.18929V13.7866C0.0898438 15.0005 1.06797 15.9934 2.27016 16C2.27344 16 2.27672 16 2.27994 16C2.65563 16 3.04713 15.8822 3.41279 15.6591C3.70694 15.4796 3.79991 15.0957 3.62044 14.8016C3.44098 14.5074 3.05697 14.4144 2.76291 14.5939C2.59188 14.6982 2.42485 14.7522 2.27688 14.7522C1.82328 14.7497 1.33763 14.3611 1.33763 13.7866V2.18933C1.33763 1.84492 1.51713 1.53907 1.81775 1.3711C2.11841 1.20314 2.47294 1.21064 2.76585 1.39098L12.2159 7.21615C12.4999 7.39102 12.6625 7.68262 12.6618 8.01618C12.6611 8.34971 12.4974 8.64065 12.2118 8.81493L5.37935 12.9983C5.08548 13.1783 4.9931 13.5623 5.17304 13.8562C5.35295 14.1501 5.73704 14.2424 6.03092 14.0625L12.8625 9.87962C13.5166 9.48059 13.9081 8.78496 13.9096 8.01868C13.9112 7.25249 13.5226 6.55524 12.8704 6.15374Z" fill="currentColor" />
                    </svg>

                </div>
                <img class="rounded shadow-light-lg" src="<?= base_url() ?>assets/img/products/product-2.jpg" alt="...">
            </a>

            <h3 class="text-white">Deskripsi Materi</h3>

            <p class="mb-6 line-height-md">
                <?= $materi->deskripsi ?>
            </p>
            <?php if (!empty($materi->nama_file) && file_exists('assetsAdmin/img/upload/modul/' . $materi->nama_file)) : ?>
                <a href="<?= base_url('assetsAdmin/img/upload/modul/' . $materi->nama_file) ?>" target="_blank" class="text-teal h6 mb-8" role="button">
                    <span class="d-inline-flex align-items-center more">
                        Download materi
                        <span class="d-flex align-items-center justify-content-center bg-teal rounded-circle ms-2 p-2 w-26p">
                            <i class="fas fa-download font-size-10 text-white"></i>
                        </span>
                    </span>
                </a>
            <?php endif; ?>

            <?php if ($tugas && !empty($tugas->nama_file) && file_exists('assetsAdmin/img/upload/modul/tugas/' . $tugas->nama_file)) : ?>
                <br><br>
                <a href="<?= base_url('assetsAdmin/img/upload/modul/tugas/' . $tugas->nama_file) ?>" target="_blank" class="text-teal h6 mb-8" role="button">
                    <span class="d-inline-flex align-items-center more">
                        Download Tugas
                        <span class="d-flex align-items-center justify-content-center bg-teal rounded-circle ms-2 p-2 w-26p">
                            <i class="fas fa-download font-size-10 text-white"></i>
                        </span>
                    </span>
                </a>
                <!-- Submit Tugas [start] -->
                <div class="bg-portgore rounded p-6 p-md-9 mt-8 mb-8 ">
                    <h3 class="text-white mb-2">
                        <?php if ($submitTugas) : ?>
                            Update Tugas
                        <?php else : ?>
                            Kumpulkan Tugas
                        <?php endif ?>
                    </h3>
                    <div class="countdown-remaining">
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99974 3.0083C5.79444 3.0083 2.37305 6.42973 2.37305 10.635C2.37305 14.8405 5.79448 18.2619 9.99974 18.2619C14.2053 18.2619 17.6264 14.8405 17.6264 10.635C17.6264 6.42973 14.205 3.0083 9.99974 3.0083ZM9.99974 16.8797C6.55666 16.8797 3.7555 14.0783 3.7555 10.6353C3.7555 7.19219 6.55662 4.39103 9.99974 4.39103C13.4428 4.39103 16.244 7.19219 16.244 10.6353C16.244 14.0785 13.4428 16.8797 9.99974 16.8797Z" fill="currentColor" />
                            <path d="M12.1193 10.4048H10.2761V7.73202C10.2761 7.35022 9.9666 7.04077 9.5848 7.04077C9.20301 7.04077 8.89355 7.35022 8.89355 7.73202V11.0961C8.89355 11.4779 9.20301 11.7873 9.5848 11.7873H12.1194C12.5012 11.7873 12.8106 11.4779 12.8106 11.0961C12.8106 10.7143 12.5011 10.4048 12.1193 10.4048Z" fill="currentColor" />
                            <path d="M6.08489 15.5823C5.80102 15.3267 5.36391 15.35 5.10864 15.6336L3.0349 17.9378C2.77935 18.2214 2.80263 18.6585 3.08627 18.9138C3.2183 19.033 3.38372 19.0915 3.54849 19.0915C3.73767 19.0915 3.92614 19.0143 4.06255 18.8625L6.13629 16.5583C6.3918 16.2746 6.36852 15.8375 6.08489 15.5823Z" fill="currentColor" />
                            <path d="M16.9661 17.9381L14.8924 15.634C14.6375 15.3501 14.2002 15.327 13.9163 15.5826C13.6325 15.8379 13.6097 16.275 13.865 16.5586L15.9387 18.8628C16.0749 19.0144 16.2633 19.0916 16.4525 19.0916C16.6171 19.0916 16.7825 19.033 16.9147 18.9141C17.1986 18.6588 17.2214 18.2217 16.9661 17.9381Z" fill="currentColor" />
                            <path d="M5.96733 1.91597C4.59382 0.571053 2.3798 0.573123 1.03211 1.92105C0.361569 2.59132 -0.00479631 3.47819 4.74212e-05 4.41826C0.00512553 5.34705 0.373327 6.21665 1.03715 6.86689C1.17172 6.99845 1.34614 7.06411 1.52078 7.06411C1.69774 7.06411 1.87469 6.99638 2.00949 6.86181L5.9726 2.8987C6.10303 2.76808 6.17584 2.59085 6.17491 2.40632C6.17401 2.22171 6.09932 2.04523 5.96733 1.91597ZM1.5966 5.31939C1.45813 5.04037 1.38414 4.73162 1.38254 4.41088C1.37953 3.84315 1.60211 3.30581 2.00949 2.89843C2.41594 2.49222 2.95328 2.28921 3.49359 2.28921C3.80949 2.28921 4.12655 2.35855 4.4187 2.49726L1.5966 5.31939Z" fill="currentColor" />
                            <path d="M18.9673 1.92072C17.6194 0.573026 15.4053 0.570721 14.0318 1.91564C13.9 2.04489 13.8252 2.22142 13.8242 2.40595C13.8233 2.59052 13.8963 2.76794 14.0268 2.89833L17.9899 6.86144C18.1247 6.99648 18.3016 7.06398 18.4786 7.06398C18.6532 7.06398 18.8279 6.99831 18.9622 6.86628C19.6263 6.21628 19.9945 5.34672 19.9993 4.41789C20.0042 3.47809 19.6376 2.59122 18.9673 1.92072ZM18.4028 5.3193L15.5807 2.4972C16.3729 2.12114 17.3459 2.25458 17.9899 2.89856C18.3973 3.30594 18.6199 3.84301 18.6169 4.41102C18.6152 4.73152 18.5413 5.04051 18.4028 5.3193Z" fill="currentColor" />
                        </svg>

                        <span id="countdown" class="ms-2"></span>
                        <?php
                        if ($this->session->flashdata('warning')) {
                            echo '<span class="btn btn-warning disabled" style="color: black; width: 100%;">';
                            echo $this->session->flashdata('warning');
                            echo '</span>';
                        }
                        ?>
                    </div>
                    <?php
                    // JIKA SUDAH, MAKA UPDATE
                    if ($submitTugas) :
                        $isSubmit = True;
                    ?>
                        <br>
                        <a href="<?= base_url($tugasPath . $submitTugas->nama_file) ?>" target="_blank" class="text-teal h6 mb-8" role="button">
                            <span class="d-inline-flex align-items-center more">
                                Download Submitan
                                <span class="d-flex align-items-center justify-content-center bg-teal rounded-circle ms-2 p-2 w-26p">
                                    <i class="fas fa-download font-size-10 text-white"></i>
                                </span>
                            </span>
                        </a>
                        <br><br>
                        <form id="form_submit_tugas" method="POST" action="<?= base_url('siswa/pelajaran/updatetugas/' . $submitTugas->id) ?>" enctype="multipart/form-data">
                            <div class="form-group mb-6">
                                <input type="hidden" name="tugasId" value="<?= $tugas->id ?>">
                                <input type="file" required class="custom-file-input" name="nama_file" id="input-tugas-update">
                            </div>

                            <button id="submit-tugas-update" type="submit" class="btn btn-sm btn-orange btn-block mw-md-300p">Update</button>
                        </form>
                        <!-- // JIKA BELUM, MAKA CREATE -->
                    <?php else : ?>
                        <form id="form_submit_tugas" method="POST" action="<?= base_url('siswa/pelajaran/kirimTugas') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="materiTugasId" value="<?= $tugas->id ?>">
                            <div class="form-group mb-6">
                                <input type="file" required class="custom-file-input" name="nama_file" id="input-tugas-serahkan">
                            </div>

                            <button id="submit-tugas-serahkan" type="submit" class="btn btn-sm btn-orange btn-block mw-md-300p">Serahkan</button>
                        </form>
                    <?php endif; ?>
                </div>

                <!-- Submit Tugas [end] -->
            <?php endif; ?>

        </div>

        <div class="col-lg-4">
            <div class="bg-portgore rounded p-6">
                <!-- Search -->
                <form class="mb-5">
                    <div class="input-group rounded">
                        <div class="input-group-prepend">
                            <button class="btn btn-sm text-secondary bg-dark" type="submit">
                                <!-- Icon -->
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.8477 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.8477 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.8477 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="currentColor" />
                                    <path d="M19.762 18.6121L15.1007 13.9509C14.7831 13.6332 14.2687 13.6332 13.9511 13.9509C13.6335 14.2682 13.6335 14.7831 13.9511 15.1005L18.6124 19.7617C18.7712 19.9205 18.9791 19.9999 19.1872 19.9999C19.395 19.9999 19.6032 19.9205 19.762 19.7617C20.0796 19.4444 20.0796 18.9295 19.762 18.6121Z" fill="currentColor" />
                                </svg>

                            </button>
                        </div>
                        <input class="form-control form-control-sm border-0 ps-0 bg-dark" type="search" placeholder="Search item" aria-label="Search">
                    </div>
                </form>

                <div id="accordionCurriculum" class="">
                    <div id="CurriculumcollapseOne" class="collapse show" aria-labelledby="curriculumheadingOne" data-parent="#accordionCurriculum">
                        <?php foreach ($currentCourse->materi as $key => $materiItem) : ?>
                            <div class="border-top px-5 border-color-20 py-4 min-height-70 d-md-flex align-items-center">
                                <div class="d-flex align-items-center me-auto mb-4 mb-md-0">
                                    <div class="text-secondary d-flex">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5717 0H4.16956C4.05379 0.00594643 3.94322 0.0496071 3.85456 0.124286L0.413131 3.57857C0.328167 3.65957 0.280113 3.77191 0.280274 3.88929V16.8514C0.281452 17.4853 0.794988 17.9988 1.42885 18H12.5717C13.1981 17.9989 13.7086 17.497 13.7203 16.8707V1.14857C13.7191 0.514714 13.2056 0.00117857 12.5717 0ZM8.18099 0.857143H10.6988V4.87714L9.80527 3.45214C9.76906 3.39182 9.71859 3.3413 9.65827 3.30514C9.45529 3.18337 9.19204 3.24916 9.07027 3.45214L8.18099 4.87071V0.857143ZM3.7367 1.46786V2.66143C3.73552 3.10002 3.38029 3.45525 2.9417 3.45643H1.74813L3.7367 1.46786ZM12.8546 16.86C12.8534 17.0157 12.7274 17.1417 12.5717 17.1429H1.42885C1.42665 17.1429 1.42445 17.143 1.42226 17.143C1.26486 17.1441 1.13635 17.0174 1.13527 16.86V4.32214H2.9417C3.85793 4.31979 4.60006 3.57766 4.60242 2.66143V0.857143H7.31527V5.23286C7.31345 5.42593 7.37688 5.61391 7.49527 5.76643C7.67533 5.99539 7.98036 6.08561 8.25599 5.99143L8.28813 5.98071C8.49272 5.89484 8.66356 5.7443 8.77456 5.55214L9.44099 4.48071L10.1074 5.55214C10.2184 5.7443 10.3893 5.89484 10.5938 5.98071C10.8764 6.0922 11.1987 6.00509 11.3867 5.76643C11.5051 5.61391 11.5685 5.42593 11.5667 5.23286V0.857143H12.5717C12.7266 0.858268 12.8523 0.982982 12.8546 1.13786V16.86Z" fill="currentColor" />
                                            <path d="M10.7761 14.3143H3.22252C2.98584 14.3143 2.79395 14.5062 2.79395 14.7429C2.79395 14.9796 2.98584 15.1715 3.22252 15.1715H10.7761C11.0128 15.1715 11.2047 14.9796 11.2047 14.7429C11.2047 14.5062 11.0128 14.3143 10.7761 14.3143Z" fill="currentColor" />
                                            <path d="M10.7761 12.2035H3.22252C2.98584 12.2035 2.79395 12.3954 2.79395 12.6321C2.79395 12.8687 2.98584 13.0606 3.22252 13.0606H10.7761C11.0128 13.0606 11.2047 12.8687 11.2047 12.6321C11.2047 12.3954 11.0128 12.2035 10.7761 12.2035Z" fill="currentColor" />
                                            <path d="M10.7761 10.0928H3.22252C2.98584 10.0928 2.79395 10.2847 2.79395 10.5213C2.79395 10.758 2.98584 10.9499 3.22252 10.9499H10.7761C11.0128 10.9499 11.2047 10.758 11.2047 10.5213C11.2047 10.2847 11.0128 10.0928 10.7761 10.0928Z" fill="currentColor" />
                                            <path d="M10.7761 7.98218H3.22252C2.98584 7.98218 2.79395 8.17407 2.79395 8.41075C2.79395 8.64743 2.98584 8.83932 3.22252 8.83932H10.7761C11.0128 8.83932 11.2047 8.64743 11.2047 8.41075C11.2047 8.17407 11.0128 7.98218 10.7761 7.98218Z" fill="currentColor" />
                                        </svg>

                                    </div>

                                    <div class="ms-4">
                                        <?= $materiItem->judul ?>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center overflow-auto overflow-md-visible flex-shrink-all">
                                    <a href="<?= base_url('siswa/pelajaran/materi/' .  $materiItem->id) ?>" class="text-secondary d-flex">
                                        <!-- Icon -->
                                        <svg width="14" height="16" viewBox="0 0 14 16" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.8704 6.15374L3.42038 0.328572C2.73669 -0.0923355 1.9101 -0.109836 1.20919 0.281759C0.508282 0.673291 0.0898438 1.38645 0.0898438 2.18929V13.7866C0.0898438 15.0005 1.06797 15.9934 2.27016 16C2.27344 16 2.27672 16 2.27994 16C2.65563 16 3.04713 15.8822 3.41279 15.6591C3.70694 15.4796 3.79991 15.0957 3.62044 14.8016C3.44098 14.5074 3.05697 14.4144 2.76291 14.5939C2.59188 14.6982 2.42485 14.7522 2.27688 14.7522C1.82328 14.7497 1.33763 14.3611 1.33763 13.7866V2.18933C1.33763 1.84492 1.51713 1.53907 1.81775 1.3711C2.11841 1.20314 2.47294 1.21064 2.76585 1.39098L12.2159 7.21615C12.4999 7.39102 12.6625 7.68262 12.6618 8.01618C12.6611 8.34971 12.4974 8.64065 12.2118 8.81493L5.37935 12.9983C5.08548 13.1783 4.9931 13.5623 5.17304 13.8562C5.35295 14.1501 5.73704 14.2424 6.03092 14.0625L12.8625 9.87962C13.5166 9.48059 13.9081 8.78496 13.9096 8.01868C13.9112 7.25249 13.5226 6.55524 12.8704 6.15374Z" fill="currentColor" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->session->set_userdata('next', current_url());
?>

<script>
    function getRemaining(ts) {
        const now = moment();
        const then = moment(ts);
        const diff = then.diff(now);
        const dur = moment.duration(diff);

        let parts = [];
        for (const part of ['days', 'hours', 'minutes', 'seconds']) {
            const d = dur[part]();
            dur.subtract(moment.duration(d, part));
            parts.push(d);
        }
        return parts;
    }
</script>

<script>
    var end = new Date('<?= $tugas->deadline_1 ?>');
    var end2 = new Date('<?= $tugas->deadline_2 ?>');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        var distance2 = end2 - now;

        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);

        if (days == 0 && hours == 0 && minutes <= 5) {
            const $countdown = document.querySelector('.countdown-remaining');
            $countdown.classList.add('remaining-warning');
        }
        if (distance < 0) {
            clearInterval(timer);
            if (distance2 < 0) {
                var isSubmit = <?= $isSubmit ?>;
                if (!isSubmit) {
                    var $submit_tugas_serahkan = document.getElementById('submit-tugas-serahkan');
                    var $input_tugas_serahkan = document.getElementById('input-tugas-serahkan');
                    $submit_tugas_serahkan.setAttribute("disabled", "");
                    $input_tugas_serahkan.setAttribute("disabled", "");
                } else {
                    var $submit_tugas_update = document.getElementById('submit-tugas-update');
                    var $input_tugas_update = document.getElementById('input-tugas-update');
                    $submit_tugas_update.setAttribute("disabled", "");
                    $input_tugas_update.setAttribute("disabled", "");
                }

            }
            const $countdown = document.querySelector('.countdown-remaining');
            $countdown.classList.add('remaining-warning');
            const ts = end;
            const rem = getRemaining(ts);

            console.log(rem)

            setInterval(() => {
                const rem = getRemaining(ts);
                document.getElementById('countdown').innerHTML = 'Late! ';
                document.getElementById('countdown').innerHTML += rem[0] + 'days ';
                document.getElementById('countdown').innerHTML += rem[1] + 'hrs ';
                document.getElementById('countdown').innerHTML += rem[2] + 'mins ';
                document.getElementById('countdown').innerHTML += rem[3] + 'secs';
            }, 100)
            return;
        }

        document.getElementById('countdown').innerHTML = days + 'days ';
        document.getElementById('countdown').innerHTML += hours + 'hrs ';
        document.getElementById('countdown').innerHTML += minutes + 'mins ';
        document.getElementById('countdown').innerHTML += seconds + 'secs';
    }

    timer = setInterval(showRemaining, 1000);
    document.getElementById('countdown').addEventListener("change", showRemaining);
</script>