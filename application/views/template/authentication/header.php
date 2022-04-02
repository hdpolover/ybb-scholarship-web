<!DOCTYPE html>
<html lang="en" dir="" class="h-100">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>YBB Scholarship</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/icon-white.png">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugin/sweetalert2/sweetalert2.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/theme.min.css">

    <!-- CSS Custom override -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.scss">

    <!-- JS Global Compulsory  -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-v2.2.4.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin Javascript -->
    <!-- TinyMCE -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/tinymce/jquery.tinymce.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>

    <!-- sweetalert2 -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/sweetalert2/sweetalert2.min.js"></script>

    <!-- jquery inputmask -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/jquery.inputmask.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex align-items-center min-h-100">
    <!-- ========== HEADER ========== -->
    <header id="header" class="navbar navbar-expand navbar-light navbar-absolute-top">
        <div class="container-fluid">
            <nav class="navbar-nav-wrap">
                <!-- White Logo -->
                <a class="navbar-brand d-none d-lg-flex" href="<?= base_url(); ?>" aria-label="YBB Foundation Scholarship">
                    <img class="navbar-brand-logo" src="<?= base_url(); ?>assets/images/<?= ($this->uri->segment(1) == 'email-activation' || $this->uri->segment(1) == 'forgot-password' || $this->uri->segment(1) == 'recovery-password' ? "logo.png" : "logo-white.png") ?>" alt="YBB Foundation Scholarship">
                </a>
                <!-- End White Logo -->

                <!-- Default Logo -->
                <a class="navbar-brand d-flex d-lg-none" href="<?= base_url(); ?>" aria-label="YBB Foundation Scholarship">
                    <img class="navbar-brand-logo" src="<?= base_url(); ?>assets/images/logo.png" alt="YBB Foundation Scholarship">
                </a>
                <!-- End Default Logo -->

                <div class="ms-auto">
                    <a class="link link-sm link-secondary" href="<?= base_url(); ?>">
                        <i class="bi-chevron-left small ms-1"></i> Go to homepage
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="flex-grow-1">