<!-- internal css -->
<style text="style/css">
.p-4 {
    cursor: pointer;
}

textarea#alamat {
    resize: none;
}
</style>

<!-- INSTRUCTORS SINGLE
    ================================================== -->
<div class="container pt-8 pt-md-11">
    <div class="row">
        <div class="col-xl-8 mx-xl-auto">
            <?php
      if ($this->session->flashdata('error')) {
        echo '<span class="btn btn-danger disabled" style="color: black; width: 100%;">';
        echo $this->session->flashdata('error');
        echo '</span>';
      }
      ?>
            <?php
      if ($this->session->flashdata('success')) {
        echo '<span class="btn btn-success disabled" style="color: black; width: 100%;">';
        echo $this->session->flashdata('success');
        echo '</span>';
      }
      ?>
            <div class="d-flex flex-wrap align-items-center justify-content-center mb-5 mb-md-3">

                <div class="border rounded-circle d-inline-block mb-4 mb-md-0 mx-lg-4 order-0">
                    <div class="p-4" data-bs-toggle="modal" data-bs-target="#modalExample">
                        <?php if ($siswa->gambar != '' && file_exists('assets/siswa/profile/' . $siswa->gambar)) : ?>
                        <img src="<?= base_url() ?>assets/siswa/profile/<?= $siswa->gambar ?>" alt="..."
                            class="rounded-circle img-fluid" width="170" height="170">
                        <?php else : ?>
                        <img src="<?= base_url() ?>assets/img/avatars/avatar-6.jpg" alt="..."
                            class="rounded-circle img-fluid" width="170" height="170">
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <h1 class="text-center mb-1"><?= $siswa->nama ?></h1>
            <div class="text-center mb-7"><?= $siswa->getClass($siswa->id)->nama ?></div>

            <div class="text-center mb-7">
                <form action="<?= base_url('siswa/home/updateProfile') ?>" method="POST">
                    <div class="form-label-group">
                        <input type="text" class="form-control form-control-flush" name="nama" id="nama"
                            value="<?= $siswa->nama ?>">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="form-label-group">
                        <input type="date" class="form-control form-control-flush" name="tanggal_lahir"
                            id="tanggal_lahir" value="<?= $siswa->tanggal_lahir ?>">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                    </div>
                    <div class="form-label-group">
                        <textarea class="form-control form-control-flush" name="alamat"
                            id="alamat"><?= $siswa->alamat ?></textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="mt-6">
                        <button class="btn btn-block btn-success lift" type="submit">
                            Ubah Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- MODALS
    ================================================== -->
<!-- Modal Sidebar account -->
<div class="modal fade" id="modalExample" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <!-- Close -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <!-- Form -->
                <form action="<?= base_url('siswa/home/updateImage') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-label-group">
                                <input type="file" class="form-control form-control-flush" name="gambar" id="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                            <!-- Submit -->
                            <button id="btn-update-image" class="btn btn-block btn-primary mt-3 lift">
                                Perbaharui Gambar
                            </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>