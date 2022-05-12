<!-- Form -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xl-12 d-flex justify-content-center align-items-center min-vh-lg-100">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">Selamat datang</h1>
                    <p>Masukkan kode aktivasi yang telah kamu terima di email kamu.</p>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form action="<?= site_url('authentication/proses_verifikasiEmail'); ?>" method="POST" class="js-validate needs-validation" novalidate>
                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupModalFormLoginCode">Kode aktivasi</label>
                        <input type="text" class="form-control form-control-lg" name="activation_code" id="signupModalFormLoginCode" data-inputmask="'mask': '999-999'" placeholder="000-000" aria-label="000-000" style="text-align: center; font-size: 24px;" required>
                        <span class="invalid-feedback">Mohon masukkan kode aktivasi yang benar.</span>
                    </div>
                    <!-- End Form -->

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Aktivasi akun</button>
                        <small class="text-muted">Cek kotak masuk atau kotak spam pada emailmu. atau <a href="<?= site_url('email-activation?act=resend-email'); ?>" class="text-primary">kirim kembali email</a></small>
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

<script type="text/javascript">
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>