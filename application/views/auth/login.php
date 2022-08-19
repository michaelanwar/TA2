<!-- PAGE TITLE

    ================================================== -->

<header class="py-md-8" style="background-image: none;">

    <div class="container text-center py-xl-2">

        <h1 class="display-4 fw-semi-bold mb-0">Masuk</h1>

    </div>

</header>





<!-- LOGIN

    ================================================== -->

<div class="container mb-11">

    <div class="row gx-0">

        <div class="col-md-7 col-xl-4 mx-auto">

            <!-- Login -->

            <h3 class="mb-6">Masuk dengan Akun Anda</h3>



            <!-- Form Login -->

            <?php

            if ($this->session->flashdata('warning')) {

                echo '<span class="btn btn-danger disabled" style="color: black; width: 100%;">';

                echo $this->session->flashdata('warning');

                echo '</span>';
            }

            ?>

            <?php

            if ($this->session->flashdata('success')) {

                echo '<span class="btn btn-danger disabled" style="color: black; width: 100%;">';

                echo $this->session->flashdata('success');

                echo '</span>';
            }

            ?>



            <?= form_open('auth'); ?>

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

                Masuk

            </button>

            <?= form_close(); ?>



        </div>

    </div>

</div>