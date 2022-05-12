<!-- Hero -->
<div class="position-relative bg-img-start" style="background-image: url(<?= base_url();?><?= $op_bg;?>);">
	<div class="container content-space-t-2 content-space-t-md-3 content-space-3 content-space-b-lg-5">
		<br><br><br><br><br>
	</div>

	<!-- Shape -->
	<div class="shape shape-bottom zi-1" style="margin-bottom: -.125rem">
		<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
			<path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
		</svg>
	</div>
	<!-- End Shape -->
</div>
<!-- End Hero -->

<!-- Clients -->
<div class="container position-relative zi-2">
	<div class="row justify-content-center mt-n5">
		<div class="col-lg-2 d-none d-lg-inline-block mt-lg-n10">
			<!-- Logo -->
			<div class="avatar avatar-xxl avatar-circle shadow-sm p-2 mx-auto">
				<img class="avatar-img" src="<?= base_url();?>assets/images/logo/duta-pelajar.png">
			</div>
			<!-- End Logo -->
		</div>

		<div class="col-3 col-lg-2 d-none d-sm-inline-block mt-n10">
			<!-- Logo -->
			<div class="avatar avatar-xl avatar-circle shadow-sm p-2 mx-auto">
				<img class="avatar-img" src="<?= base_url();?>assets/images/logo/ybb.png"
					alt="Image Description">
			</div>
			<!-- End Logo -->
		</div>

		<div class="col-lg-2 d-none d-lg-inline-block mt-lg-n8">
			<!-- Logo -->
			<div class="avatar avatar-xxl avatar-circle shadow-sm p-2 mx-auto">
				<img class="avatar-img" src="<?= base_url();?>assets/images/logo/iys.png"
					alt="Image Description">
			</div>
			<!-- End Logo -->
		</div>

		<div class="col-3 col-lg-2 d-none d-sm-inline-block mt-n4">
			<!-- Logo -->
			<div class="avatar avatar-xl avatar-circle shadow-sm p-2 mx-auto">
				<img class="avatar-img" src="<?= base_url();?>assets/images/logo/ybb-school.png">
			</div>
			<!-- End Logo -->
		</div>

		<div class="col-3 col-lg-2 d-none d-sm-inline-block mt-n7">
			<!-- Logo -->
			<div class="avatar avatar-xl avatar-circle shadow-sm p-2 mx-auto">
				<img class="avatar-img" src="<?= base_url();?>assets/images/logo/ybb-edu.png">
			</div>
			<!-- End Logo -->
		</div>

		<div class="col-lg-2 d-none d-lg-inline-block mt-lg-n10">
			<!-- Logo -->
			<div class="avatar avatar-xxl avatar-circle shadow-sm p-2 mx-auto">
				<img class="avatar-img" src="<?= base_url();?>assets/images/logo/iys.png"
					alt="Image Description">
			</div>
			<!-- End Logo -->
		</div>
	</div>
</div>
<!-- End Clients -->

<!-- Card Grid -->
<div class="container content-space-2 content-space-lg-3">
	<?php if(!empty($op_content)):?>
	<!-- Heading -->
	<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
		<span class="text-cap">Other Programs</span>
		<h2><?= $op_desc;?></h2>
	</div>
	<!-- End Heading -->
	<?php endif;?>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 mb-5 justify-content-center">
		<?php if(empty($op_content)):?>
		<h4 class="modal-title text-center">Sorry, we couldn't find any content for this page</h4>
		<?php else:?>
		<?php foreach ($op_content as $val):?>
		<div class="col mb-5">
			<!-- Card -->
			<div class="card h-100">
				<img class="card-img-top"
					src="<?= base_url();?><?= $val->picture == null ? 'assets/svg/design-system/docs-cards.svg' : $val->picture;?>"
					alt="Image Description">

				<div class="card-body">
					<h5><?= $val->title;?></h5>
					<p class="card-text"><?= substr(strip_tags($val->desc), 0, 100);?>...</p>
				</div>

				<div class="card-footer pt-0">
					<a class="card-link cursor" data-bs-toggle="modal" data-bs-target="#detail-<?= $val->id;?>">Read
						more <i class="bi-chevron-right small ms-1"></i></a>
				</div>
			</div>
			<!-- End Card -->
		</div>
		<!-- End Col -->

		<!-- Modal -->
		<div id="detail-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
			aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-2"><?= $val->title;?></h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row justify-content-center mb-4">
							<div class="col-md-8">
								<img class="card-img-top"
									src="<?= base_url();?><?= $val->picture == null ? 'assets/svg/design-system/docs-cards.svg' : $val->picture;?>"
									alt="Image Description">
							</div>
						</div>
						<p><?= $val->desc;?></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal -->
		<?php endforeach;?>
		<?php endif;?>

	</div>
	<!-- End Row -->
</div>
<!-- End Card Grid -->
