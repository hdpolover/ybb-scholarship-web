<!-- Page Header -->
<div class="docs-page-header">
    <div class="row align-items-center">
        <div class="col-sm">
            <h1 class="docs-page-header-title">Website Settings</h1>
            <p class="docs-page-header-text">Manage all information for the system.</p>
        </div>
    </div>
</div>
<!-- End Page Header -->

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 mb-6">

    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=basic'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-bs-icons.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Basic Information</h4>
                <p class="card-text small text-body">Manage basic information.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->
    <?php if($this->session->userdata('role') == 0):?>
    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=credentials'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-duotone-icons.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Credentials</h4>
                <p class="card-text small text-body">Manage admin credentials.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->

    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= base_url(); ?>db.php" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-divider.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Database</h4>
                <p class="card-text small text-body">Manage database systems.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <?php endif;?>
    <!-- End Col -->
    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=mailer'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-quill.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Mailer</h4>
                <p class="card-text small text-body">Manage mailer account.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->
    <!-- End Col -->
    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=scholarship'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-file-attachments.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Scholarship</h4>
                <p class="card-text small text-body">Manage scholarship settings.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->

<span class="divider-center text-cap mb-8">Landing page information</span>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 mb-6">
    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=home'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-offcanvas.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Home</h4>
                <p class="card-text small text-body">Manage home page information.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->

    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=about'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-toasts.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">About</h4>
                <p class="card-text small text-body">Manage information on about page.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->

    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=faq'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-tooltips.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">FAQ</h4>
                <p class="card-text small text-body">Manage list of FAQs.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->

    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=programs'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-sticky-block.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Other Programs</h4>
                <p class="card-text small text-body">Manage content of others programs page.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->

    <div class="col mb-4">
        <!-- Card -->
        <a class="card card-sm card-transition h-100" href="<?= site_url('settings/website?page=contribute'); ?>" data-aos="fade-up">
            <img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-chartjs.svg" alt="Image Description">
            <div class="card-body">
                <h4 class="card-title text-inherit">Contribute</h4>
                <p class="card-text small text-body">Manage content of contribute page.</p>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->