<!-- PAGE TITLE
    ================================================== -->
<header class="py-md-8" style="background-image: none;">
    <div class="container text-center py-xl-2">
        <h1 class="display-4 fw-semi-bold mb-0">Daftar</h1>
    </div>
</header>


<!-- LOGIN
    ================================================== -->
<div class="container mb-11">
    <div class="row gx-0">
        <div class="col-md-7 col-xl-4 mx-auto">
            <!-- Login -->
            <h3 class="mb-6">Daftarkan Akun Anda</h3>


            <!-- Form Login -->
            <?= form_open('auth/register'); ?>
            <!-- Nama -->
            <div class="form-group mb-5">
                <label for="modalSigninNama">
                    Nama
                </label>
                <input type="nama" name="nama" value="<?= set_value('nama'); ?>" class="form-control" id="modalSigninNama" placeholder="">
                <div style="color: red; margin-left: 10px;">
                    <?= form_error('nama'); ?>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group mb-5">
                <label for="modalSigninEmail">
                    Email
                </label>
                <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control" id="modalSigninEmail" placeholder="">
                <div style="color: red; margin-left: 10px;">
                    <?= form_error('email'); ?>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group mb-5">
                <label for="modalSigninPassword">
                    Kata Sandi
                </label>
                <input type="password" name="password" class="form-control" id="modalSigninPassword" placeholder="">
                <div style="color: red; margin-left: 10px;">
                    <?= form_error('password'); ?>
                </div>
            </div>

            <!-- Submit -->
            <button class="btn btn-block btn-primary" type="submit">
                Daftar
            </button>
            <?= form_close(); ?>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center">
                Sudah punya akun? <a class="text-underline" href="<?= base_url('auth') ?>">MASUK</a>
            </p>
        </div>
    </div>
</div>