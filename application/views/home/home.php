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
    							<h5 class="text-white">Welcome to</h5>
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

    	<!-- Circles Chart -->
    	<div class="container content-space-2 content-space-lg-3"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
    		<!-- Heading -->
    		<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    			<h2>Our scholarship acceptance statistics</h2>
    		</div>
    		<!-- End Heading -->

    		<div class="row mb-7">
    			<div class="col-sm-6 col-lg-4 mb-7 mb-lg-4">
    				<!-- Circle Chart -->
    				<div class="circles-chart">
    					<div class="js-circle" data-hs-circles-options='{
               "value": <?= $statistik['total'];?>,
               "maxValue": <?= $statistik['total'];?>,
               "duration": 2000,
               "isViewportInit": true,
               "colors": ["#f8fafd", "#00c9a7"],
               "radius": 100,
               "width": 8,
               "fgStrokeLinecap": "round",
               "fgStrokeMiterlimit": "10",
               "textClass": "circles-chart-content",
               "textFontSize": 24,
               "textFontWeight": 500,
               "textColor": "#00c9a7",
               "secondaryText": "total applicants",
               "secondaryTextColor": "#77838f",
               "secondaryTextFontSize": "13",
               "secondaryTextFontWeight": "400",
               "dividerSpace": "10"
             }'></div>
    				</div>
    				<!-- End Circle Chart -->
    			</div>
    			<!-- End Col -->

    			<div class="col-sm-6 col-lg-4 mb-7 mb-lg-4">
    				<!-- Circle Chart -->
    				<div class="circles-chart">
    					<div class="js-circle" data-hs-circles-options='{
               "value": <?= $statistik['seleksi'];?>,
               "maxValue": <?= $statistik['total'];?>,
               "duration": 2000,
               "isViewportInit": true,
               "colors": ["#f8fafd", "#ffc107"],
               "radius": 100,
               "width": 8,
               "fgStrokeLinecap": "round",
               "fgStrokeMiterlimit": "10",
               "textClass": "circles-chart-content",
               "textFontSize": 24,
               "textFontWeight": 500,
               "textColor": "#00c9a7",
               "secondaryText": "pass the administrative selection",
               "secondaryTextColor": "#77838f",
               "secondaryTextFontSize": "13",
               "secondaryTextFontWeight": "400",
               "dividerSpace": "10"
             }'></div>
    				</div>
    				<!-- End Circle Chart -->
    			</div>
    			<!-- End Col -->

    			<div class="col-sm-6 col-lg-4 mb-7 mb-lg-4">
    				<!-- Circle Chart -->
    				<div class="circles-chart">
    					<div class="js-circle" data-hs-circles-options='{
               "value": <?= $statistik['member'];?>,
               "maxValue": <?= $statistik['seleksi'];?>,
               "duration": 2000,
               "isViewportInit": true,
               "colors": ["#f8fafd", "#de4437"],
               "radius": 100,
               "width": 8,
               "fgStrokeLinecap": "round",
               "fgStrokeMiterlimit": "10",
               "textClass": "circles-chart-content",
               "textFontSize": 24,
               "textFontWeight": 500,
               "textColor": "#00c9a7",
               "secondaryText": "scholarship grantee",
               "secondaryTextColor": "#77838f",
               "secondaryTextFontSize": "13",
               "secondaryTextFontWeight": "400",
               "dividerSpace": "10"
             }'></div>
    				</div>
    				<!-- End Circle Chart -->
    			</div>
    			<!-- End Col -->
    		</div>
    		<!-- End Row -->

    		<!-- Card Info -->
    		<div class="text-center">
    			<div class="card card-info-link card-sm">
    				<div class="card-body">
    					interested in joining our scholarship program? <a class="card-link ms-2"
    						href="<?= site_url('join-now');?>">Go here <span
    							class="bi-chevron-right small ms-1"></span></a>
    				</div>
    			</div>
    		</div>
    		<!-- End Card Info -->
    	</div>
    	<!-- End Circles Chart -->

    	<?php if (!empty($home_sinopsis)):?>
    	<!-- Features -->
    	<div class="overflow-hidden">
    		<div class="container bg-white">
    			<div class="row justify-content-lg-between align-items-lg-center">
    				<div class="col-lg-12 mb-9 mb-lg-0 text-center">
    					<div class="position-relative mx-auto mb-3">
    						<iframe width="100%" height="500" src="https://www.youtube.com/embed/gTthcmZpu2o"
    							title="YouTube video player" frameborder="0"
    							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    							allowfullscreen></iframe>
    					</div>
    				</div>
    				<!-- End Col -->

    				<div class="col-lg-12 text-center"
    					style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
    					<!-- Heading -->
    					<div class="mb-5">
    						<p><?= $home_sinopsis;?></p>
    					</div>
    					<!-- End Heading -->
    				</div>
    				<!-- End Col -->
    			</div>
    			<!-- End Row -->
    		</div>
    	</div>
    	<!-- End Features -->
    	<?php endif;?>


    	<?php if(!empty($home_benefit)):?>
    	<!-- Step -->
    	<div class="container content-space-t-2 content-space-t-lg-2 content-space-b-lg-2"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-19.svg) center no-repeat;">
    		<!-- Heading -->
    		<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    			<span class="text-cap">Benefit</span>
    			<h2>What will you get when join us</h2>
    		</div>
    		<!-- End Heading -->
    		<div class="row justify-content-center">
    			<?php foreach($home_benefit as $val):?>
    			<div class="col-md-6 col-lg-4 mb-4 mb-md-5 mb-lg-0">
    				<!-- Card -->
    				<a class="card card-lg card-transition h-100 text-center" href="#">
    					<div class="card-body">
    						<div class="mb-4">
    							<img class="avatar w-50 h-50"
    								src="<?= base_url();?><?= isset($val->picture) ? $val->picture : 'assets/svg/brands/google-adz-icon.svg';?>"
    								alt="Logo">
    						</div>
    						<h3 class="card-title"><?= $val->value;?></h3>
    						<?php if(isset($val->desc)):?><p class="card-text text-body"><?= $val->desc;?></p>
    						<?php endif;?>
    					</div>
    				</a>
    				<!-- End Card -->
    			</div>
    			<!-- End Col -->
    			<?php endforeach;?>
    		</div>
    		<!-- End Row -->
    	</div>
    	<!-- End Step -->
    	<?php endif;?>

    	<?php if (!empty($home_gallery)):?>
    	<div class="container content-space-t-2 content-space-t-lg-2 content-space-b-lg-5"
    		style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
    		<!-- Heading -->
    		<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
    			<span class="text-cap">Our Gallery</span>
    			<h2>See documentation about what we do</h2>
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
