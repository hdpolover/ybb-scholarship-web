<!DOCTYPE html>
<html lang="en" dir="" class="h-100">

<head>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)) . ' ' . ($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "") . " - ".$web_title) : $web_title); ?></title>

	<meta name="description" content="<?= $web_desc; ?>">
	<meta property="og:title"
		content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)) . ' ' . ($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "") . $web_title) : $web_title); ?>">
	<meta property="og:description" content="<?= $web_desc; ?>">
	<meta property="og:image"
		content="<?= base_url(); ?>assets/images/<?= $web_icon?>">
	<meta property="og:url" content="<?= base_url(uri_string()) ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/<?= $web_icon_white;?>">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugin/sweetalert2/sweetalert2.min.css">

    <!-- Dropzone css -->
    <link href="<?= base_url(); ?>assets/plugin/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/theme.min.css">

    <!-- CSS Custom override -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.min.css">

    <!-- JS Global Compulsory  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin Javascript -->

    <!-- TinyMCE -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/tinymce/jquery.tinymce.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>

    <!-- sweetalert2 -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/sweetalert2/sweetalert2.min.js"></script>

    <!-- jquery inputmask -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/jquery.inputmask.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Dropzone -->
    <script src="<?= base_url(); ?>assets/plugin/dropzone/min/dropzone.min.js"></script>

</head>



<body class="d-flex align-items-center min-h-100 <?= $this->uri->segment(1) == 'scholarship' ? 'bg-school' : '';?>">

    <!-- ========== HEADER ========== -->
    <header id="header" class="navbar navbar-expand navbar-light navbar-absolute-top">
        <div class="container-fluid">
            <nav class="navbar-nav-wrap">

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
                        <i class="bi-chevron-left small ms-1"></i> Ke beranda
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="flex-grow-1">