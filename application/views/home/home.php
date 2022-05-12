    	<!-- Swiper Slider -->
    	<div class="border-bottom">
    		<!-- Main Slider -->
    		<div class="js-swiper-main swiper vh-md-70">
    			<div class="swiper-wrapper">
    				<!-- Slide -->
    				<!-- <div class="swiper-slide gradient-y-overlay-sm-gray-900 bg-img-start"
    					style="background-image: url(<?= base_url(); ?>assets/img/1920x800/img2.jpg);">
    					<div
    						class="container d-md-flex align-items-md-center vh-md-70 content-space-t-5 content-space-b-3 content-space-md-0">
    						<div class="w-100 text-center">
    							<h4 class="text-white">Welcome to</h4>
    							<h2 class="display-6 text-white mb-0">Youth Break the Boundaries<br><small
    									class="display-7">Foundation Scholarship</small></h2>
    						</div>
    					</div>
    				</div> -->
    				<!-- End Slide -->
    				<?php if (empty($hero_section)):?>
    				<!-- Slide -->
    				<div class="swiper-slide gradient-y-overlay-sm-gray-900 bg-img-start"
    					style="background-image: url(<?= base_url(); ?>assets/img/1920x800/img2.jpg);">
    					<div
    						class="container d-md-flex align-items-md-center vh-md-70 content-space-t-5 content-space-b-3 content-space-md-0">
    						<div class="w-100 text-center">
    							<h5 class="text-white">Selamat datang di</h5>
    							<h2 class="display-7 text-white mb-0">Youth Break the
    								Boundaries<br><small class="display-7">Foundation
    									Scholarship</small></h2>
    						</div>
    					</div>
    				</div>
    				<!-- End Slide -->
    				<?php else:?>
    				<?php foreach ($hero_section as $val):?>
    				<!-- Slide -->
    				<div class="swiper-slide gradient-y-overlay-sm-gray-900 bg-img-start"
    					style="background-image: url(<?= base_url(); ?><?= $val->picture;?>);">
    					<div
    						class="container d-md-flex align-items-md-center vh-md-70 content-space-t-5 content-space-b-3 content-space-md-0">
    						<div class="w-100 text-center">
    							<?php if ($val->hero_icon == 1):?><img src="<?= base_url();?><?= $val->icon;?>"
    								alt="<?= $val->icon;?>" class="w-25 mb-3"><?php endif;?>
    							<h2 class="display-2 text-white mb-2"><?= $val->value;?></h2>
    							<?php if (isset($val->desc)):?><h2 class="display-6 text-white fw-normal mb-0">
    								<?= $val->desc;?></h2><?php endif;?>
    							<?php if ($val->button == 1):?><a href="<?= prep_url($val->button_link);?>"
    								class="btn rounded-pill text-white"
    								style="background-color: <?= $val->button_color;?> !important;color: <?= $val->button_text_color;?> !important;"><?= $val->button_text;?></a><?php endif;?>
    						</div>
    					</div>
    				</div>
    				<!-- End Slide -->
    				<?php endforeach;?>
    				<?php endif;?>
    			</div>

    			<!-- Arrows -->
    			<div class="d-none d-md-inline-block">
    				<div class="js-swiper-main-button-next swiper-button-next swiper-button-next-soft-white"></div>
    				<div class="js-swiper-main-button-prev swiper-button-prev swiper-button-prev-soft-white"></div>
    			</div>
    		</div>
    		<!-- End Main Slider -->

    		<!-- Thumbs Slider -->
    		<div class="js-swiper-thumbs swiper">
    			<div class="swiper-wrapper">
    			</div>
    		</div>
    		<!-- End Thumbs Slider -->
    	</div>
    	<!-- Swiper Slider -->

    	<?php if (!empty($home_sinopsis)):?>
    	<div class="position-relative"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-19.svg) center no-repeat;">
    		<div class="container content-space-2 content-space-lg-3">

    			<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
    				<span class="text-cap">Apa itu YBB</span>
    				<h2>Apa itu YBB dan apa yang kami lakukan</h2>
    			</div>

    			<div class="overflow-hidden">
    				<div class="container bg-white">
    					<div class="row justify-content-lg-between align-items-lg-center">
    						<div class="col-lg-12 text-center">
    							<div class="position-relative mx-auto mb-3">
    								<iframe class="thumbnail" width="100%" height="500"
    									src="https://www.youtube.com/embed/gTthcmZpu2o" title="YouTube video player"
    									frameborder="0"
    									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    									allowfullscreen></iframe>
    							</div>
    						</div>

    						<div class="col-lg-12 text-center bg-light">

    							<div class="mb-5">
    								<p><?= $home_sinopsis;?></p>
    							</div>

    						</div>

    					</div>

    				</div>
    			</div>
    		</div>
    	</div>
    	<?php endif;?>



    	<?php if(!empty($home_benefit)):?>
    	<div class="position-relative bg-dark"
    		style="background-image: url(../assets/svg/components/wave-pattern-light.svg);">
    		<!-- Icon Blocks -->
    		<div class="container content-space-1 content-space-lg-3">
    			<!-- Heading -->
    			<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    				<span class="text-cap text-white">Keuntungan</span>
    				<h2 class="h2 text-white-70">Apa yang kamu dapat saat bergabung</h2>
    			</div>
    			<!-- End Heading -->

    			<div class="row justify-content-center">
    				<?php foreach($home_benefit as $val):?>
    				<div class="col-md-4">
    					<!-- Icon Blocks -->
    					<div class="text-center px-lg-3">
    						<div class="svg-icon text-primary mb-4">
    							<img src="<?= base_url();?><?= $val->picture;?>" class="w-25 h-auto" alt="">
    						</div>
    						<h4 class="text-white"><?= $val->value;?></h4>
    						<p class="text-white-70"><?= $val->desc;?></p>
    					</div>
    					<!-- End Icon Blocks -->
    				</div>
    				<!-- End Col -->
    				<?php endforeach;?>
    			</div>
    			<!-- End Row -->
    		</div>
    		<!-- End Icon Blocks -->
    	</div>

    	<!-- Step -->
    	<!-- <div class="container content-space-t-2 content-space-t-lg-2 content-space-b-lg-2"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-19.svg) center no-repeat;">

    		<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    			<span class="text-cap">Benefit</span>
    			<h2>What will you get when join us</h2>
    		</div>

    		<div class="row justify-content-center">
    			<?php foreach($home_benefit as $val):?>
    			<div class="col-md-6 col-lg-4 mb-4 mb-md-5 mb-lg-0">
    				<a class="card card-transition h-100" href="#">
    					<div class="card-body">
    						<div class="d-flex">
    							<div class="flex-shrink-0 w-25">
    								<span class="svg-icon text-primary">
    									<img src="<?= base_url();?><?= $val->picture;?>" class="w-100 h-auto" alt="">
    								</span>
    							</div>

    							<div class="flex-grow-1 ms-4">
    								<h4 class="card-title"><?= $val->value;?></h4>
    								<p class="card-text text-body"><?= $val->desc;?></p>
    							</div>
    						</div>
    					</div>
    				</a>
    			</div>

    			<?php endforeach;?>
    		</div>

    	</div> -->
    	<!-- End Step -->
    	<?php endif;?>

    	<?php if (!empty($home_gallery)):?>
    	<div class="container content-space-t-2 content-space-t-lg-2 content-space-b-lg-5"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
    		<!-- Heading -->
    		<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    			<span class="text-cap">Galeri kegiatan</span>
    			<h2>Lihat galeri mengenai kegiatan yang kami lakukan</h2>
    		</div>
    		<div class="row justify-content-center">
    			<?php foreach ($home_gallery as $val):?>
    			<div class="col-md-3">
    				<!-- Media Viewer -->
    				<a class="media-viewer" href="<?= base_url();?><?= $val->picture;?>" data-fslightbox="gallery">
    					<!-- End Media Viewer -->
    					<div class="bg-img-start"
    						style="background-image: url(<?= base_url();?><?= $val->picture;?>); height: 15rem;"></div>

    					<span class="media-viewer-container">
    						<span class="media-viewer-icon">
    							<i class="bi-plus media-viewer-icon-inner"></i>
    						</span>
    					</span>
    				</a>
    			</div>
    			<!-- End Col -->
    			<?php endforeach;?>
    		</div>
    		<!-- End Row -->
    	</div>
    	<?php endif;?>

    	<div class="container content-space-t-2 content-space-t-lg-2 content-space-b-lg-5"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
    		<!-- Heading -->
    		<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    			<span class="text-cap">Hubungi Kami</span>
    			<h2>Hubungi kami melalui Whatsapp atau Email</h2>
    		</div>

    		<div class="row justify-content-center">

    			<div class="col-md-4 mb-3 mb-md-0">
    				<!-- Card -->
    				<a class="card card-transition text-center h-100" href="#">
    					<div class="card-body">
    						<div class="svg-icon text-primary mb-3">
    							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
    								xmlns="http://www.w3.org/2000/svg">
    								<path
    									d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725V8.725Z"
    									fill="#035A4B"></path>
    								<path opacity="0.3"
    									d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
    									fill="#035A4B"></path>
    							</svg>

    						</div>

    						<h4 class="card-title">Email</h4>
    						<p class="card-text text-body text-center">
    							<?= $web_email;?></p>
    					</div>

    					<div class="card-footer pt-0">
    						<span class="card-link"
    							onclick="window.location.href=`mailto:<?= $web_whatsapp;?>`">Hubungi</span>
    					</div>
    				</a>
    				<!-- End Card -->
    			</div>
    			<!-- End Col -->

    			<div class="col-md-4">
    				<!-- Card -->
    				<a class="card card-transition text-center h-100" href="#">
    					<div class="card-body">
    						<div class="svg-icon text-primary mb-3">
    							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
    								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
    								style="enable-background:new 0 0 512 512;" xml:space="preserve">
    								<path style="fill:#2D527C;"
    									d="M255.999,512c-25.934,0-51.961-4.332-77.361-12.875c-7.966-2.68-12.251-11.309-9.571-19.274
									c2.678-7.966,11.305-12.254,19.274-9.571c22.267,7.49,45.03,11.286,67.659,11.286c124.377,0,225.565-102.089,225.565-227.572
									c0.002-123.271-101.637-223.56-226.568-223.56c-123.823,0-224.563,100.289-224.563,223.56c0,43.274,11.989,85.16,34.672,121.139
									l5.913,8.87c2.442,3.666,3.179,8.211,2.015,12.46l-16.162,59.025l60.92-15.584c8.144-2.086,16.43,2.829,18.514,10.97
									c2.083,8.143-2.829,16.431-10.97,18.514l-86.28,22.072c-5.253,1.344-10.821-0.208-14.622-4.074s-5.259-9.459-3.827-14.687
									l21.243-77.585l-2.173-3.259c-0.068-0.103-0.137-0.208-0.204-0.315C13.65,350.655,0,303.091,0,253.994
									c0-68.07,26.535-131.939,74.717-179.841C122.813,26.334,186.837,0,254.996,0c68.356,0,132.71,26.173,181.205,73.699
									C485.081,121.6,512,185.63,512,253.992c0,68.482-26.824,133.176-75.532,182.162C387.837,485.064,323.745,512,255.999,512z" />
    								<path style="fill:#CEE8FA;"
    									d="M399.217,353.076l4.634-15.273c1.482-4.351-0.274-10.09-4.532-12.685l-67.288-38.073
									c-4.258-2.593-9.905-1.948-13.609,2.217l-30.747,33.223c-2.407,2.036-5.833,2.867-9.072,1.478
									c-11.254-5.064-35.944-16.411-54.297-34.765l0.003-0.003c-0.254-0.25-0.501-0.501-0.753-0.75c-0.25-0.253-0.501-0.499-0.75-0.753
									l-0.003,0.003c-19.138-19.138-29.702-43.043-34.765-54.297c-1.389-3.24-0.558-6.665,1.478-9.072l33.223-30.747
									c4.165-3.704,4.81-9.352,2.217-13.609l-38.073-67.288c-2.593-4.258-8.334-6.014-12.685-4.532l-15.273,4.634
									c-16.384,4.728-31.099,16.026-39.795,32.415c-10.545,21.018-14.054,45.922-2.564,76.283c19.287,51.196,45.82,86.259,66.758,107.196
									c20.937,20.937,56,47.469,107.196,66.758c30.361,11.49,55.263,7.981,76.283-2.564C383.19,384.175,394.489,369.46,399.217,353.076z" />
    								<path style="fill:#2D527C;" d="M326.998,417.787c-0.002,0-0.003,0-0.005,0c-13.54,0-27.625-2.733-41.862-8.121
									c-56.146-21.153-92.209-49.867-112.57-70.229c-20.362-20.36-49.076-56.423-70.237-112.592c-11.749-31.04-10.673-60.813,3.203-88.47
									c0.052-0.103,0.105-0.207,0.158-0.309c10.239-19.298,28.062-33.826,48.91-39.873l14.993-4.55c2.503-0.817,5.142-1.231,7.847-1.231
									c9.2,0,17.798,4.732,22.439,12.35c0.085,0.14,0.167,0.282,0.25,0.425l37.978,67.12c6.274,10.571,4.141,24.171-5.117,32.519
									l-29.022,26.858c5.2,11.338,14.549,30.101,29.36,45.012c0.119,0.114,0.236,0.228,0.35,0.347l1.28,1.28
									c0.117,0.114,0.233,0.231,0.347,0.35c14.476,14.369,34.119,24.297,45.021,29.354l26.85-29.013
									c5.002-5.548,12.058-8.725,19.388-8.725c4.62,0,9.153,1.246,13.131,3.608l67.12,37.978c0.143,0.081,0.285,0.164,0.425,0.25
									c10.031,6.113,14.774,19.082,11.119,30.285l-4.55,14.995c-6.047,20.849-20.575,38.671-39.873,48.91
									c-0.102,0.055-0.204,0.107-0.309,0.158C358.659,413.98,342.972,417.787,326.998,417.787z M132.651,152.183
									c-9.966,19.968-10.573,40.877-1.853,63.911c20.27,53.803,48.35,86.887,63.286,101.823c14.935,14.935,48.02,43.017,101.801,63.278
									c10.804,4.089,21.264,6.158,31.111,6.158h0.003c11.294,0,22.03-2.617,32.818-8.004c12.012-6.426,21.039-17.53,24.779-30.492
									c0.02-0.067,0.038-0.134,0.059-0.199l3.717-12.25l-60.938-34.48l-28.59,30.893c-0.421,0.455-0.87,0.884-1.344,1.284
									c-4.395,3.714-9.928,5.761-15.584,5.761c-3.209,0-6.342-0.645-9.313-1.919c-0.082-0.035-0.163-0.072-0.245-0.108
									c-10.407-4.682-38.053-17.121-58.813-37.883c-0.078-0.078-0.154-0.155-0.228-0.234l-0.457-0.453
									c-0.043-0.043-0.087-0.087-0.129-0.129l-0.453-0.457c-0.079-0.075-0.157-0.152-0.234-0.228
									c-20.782-20.782-32.152-46.069-37.616-58.222l-0.266-0.592c-0.037-0.082-0.072-0.163-0.108-0.245
									c-3.573-8.33-2.1-17.869,3.844-24.898c0.4-0.473,0.829-0.921,1.283-1.342l30.893-28.59l-34.48-60.938l-12.25,3.717
									c-0.065,0.02-0.132,0.04-0.199,0.059C150.181,131.144,139.077,140.169,132.651,152.183z" />
    							</svg>
    						</div>

    						<h4 class="card-title">WhatsApp</h4>
    						<p class="card-text text-body"><?= $web_whatsapp;?></p>
    					</div>

    					<div class="card-footer pt-0">
    						<span class="card-link"
    							onclick="window.location.href=`https://wa.me/<?= $web_whatsapp;?>?text=I'm%20interested%20to%20become%20YBB%20Contributor`">Hubungi</span>
    					</div>
    				</a>
    				<!-- End Card -->
    			</div>
    			<!-- End Col -->
    		</div>
    		<!-- End Row -->
    	</div>
    	<!-- End Card Grid -->
