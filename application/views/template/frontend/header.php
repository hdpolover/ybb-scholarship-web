<!DOCTYPE html>

<html lang="en" dir="">



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

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/aos/dist/aos.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugin/sweetalert2/sweetalert2.min.css">



    <!-- CSS Front Template -->

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/theme.min.css">



    <!-- CSS Custom override -->

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.min.css">



    <!-- JS Global Compulsory  -->

    <script src="<?= base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="<?= base_url(); ?>assets/plugin/sweetalert2/sweetalert2.min.js"></script>

</head>



<body>

    <!-- ========== MAIN CONTENT ========== -->