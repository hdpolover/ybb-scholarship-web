<!-- Form -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark" style="background-image: url(<?= base_url(); ?>assets/svg/components/wave-pattern-light.svg);">
            <div class="flex-grow-1 p-5">
                <!-- Blockquote -->
                <figure class="text-center">
                    <div class="mb-4">
                        <img class="avatar avatar-xxl avatar-4x3" src="<?= base_url(); ?>assets/images/<?= $web_logo_white;?>" alt="Logo">
                    </div>
                </figure>
                <!-- End Blockquote -->
            </div>
        </div>
        <!-- End Col -->

        <div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">Selamat datang</h1>
                    <p>Masuk ke akun anda.</p>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form action="<?= site_url('authentication/proses_login'); ?>" method="POST" class="js-validate needs-validation" novalidate>
                    <!-- Form -->
                    <div class="mb-3">
                        <label class="form-label" for="signupModalFormSignupEmail">Email</label>
                        <div class="input-group input-group-merge">
                            <div class="input-group-prepend input-group-text" id="inputGroupMergeEmail">
                                <i class="bi-envelope-open"></i>
                            </div>
                            <input type="email" class="form-control form-control-lg" name="email" id="signupModalFormSignupEmail" placeholder="email@site.com" aria-label="email@site.com" aria-describedby="inputGroupMergeEmail" required>
                            <span class="invalid-feedback">Masukkan email dengan benar.</span>
                        </div>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-3">
                        <label class="form-label" for="signupModalFormSignupPassword">Password</label>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-key"></i>
                            </div>
                            <input type="password" class="js-toggle-password form-control form-control-lg" minlength="8" name="password" autocomplete="off" id="signupModalFormSignupPassword" placeholder="8+ characters required" aria-label="8+ characters required" required data-hs-toggle-password-options='{
                             "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                             "defaultClass": "bi-eye-slash",
                             "showClass": "bi-eye",
                             "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                           }'>
                            <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                                <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                            </a>
                        </div>

                        <span class="invalid-feedback">Password tidak valid, masukkan password dengan benar.</span>

                        <a class="form-label-link" href="<?= site_url('forgot-password');?>">Lupa password?</a>
                    </div>
                    <!-- End Form -->

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Masuk</button>
                    </div>

                    <div class="text-center">
                        <p>Belum punya akun? <a class="link" href="<?= site_url('join-now'); ?>">Daftar sekarang</a></p>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Form -->