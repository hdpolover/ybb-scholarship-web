<!-- Gallery -->
<div class="container content-space-t-3 content-space-t-lg-5" style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-19.svg) center no-repeat;">
	<div class="w-lg-75 text-center mx-lg-auto">
		<!-- Heading -->
		<div class="mb-5 mb-md-10">
			<h1 class="display-4">About Us</h1>
			<p class="lead">An introduction about our couse</p>
		</div>
		<!-- End Heading -->
	</div>
	<?php if(!empty($about_gallery)):?>
	<div class="row justify-content-center">
		<?php foreach($about_gallery as $val):?>
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
	<?php endif;?>
</div>
<!-- End Gallery -->
</div>
<!-- End Feature Stats -->
<br><br>
<div class="border-top mx-auto" style="max-width: 25rem;"></div>

<!-- Info -->
<div class="container content-space-2" style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
	<div class="row justify-content-lg-between">
		<div class="col-lg-4 mb-5 mb-lg-0">
			<h2><?= $web_motto;?></h2>
		</div>
		<!-- End Col -->

		<div class="col-lg-8">
			<?= $web_about;?>
		</div>
		<!-- End Col -->
	</div>
	<!-- End Row -->
</div>
<!-- End Info -->
