<!-- Hero -->
<div class="bg-dark" style="background-image: url(<?= base_url();?>assets/svg/components/wave-pattern-light.svg);">
	<div class="container content-space-2 content-space-b-3 content-space-t-lg-5">
	<div class="w-lg-65 text-center mx-lg-auto">
		<h1 class="text-white mb-0">Pengumuman</h1>
		<span class="badge bg-warning text-dark rounded-pill mb-3">Baca pengumuman terbaru dari kami</span>
	</div>
	</div>
</div>
<!-- End Hero -->

<!-- Card Grid -->
<div class="container content-space-2 content-space-lg-3" style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-9.svg) center no-repeat;">
	<?php if(!empty($op_content)):?>
	<!-- Heading -->
	<div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
		<span class="text-cap">Pengumuman</span>
		<h2>Pengumuman terbaru kami</h2>
	</div>
	<!-- End Heading -->
	<?php endif;?>

	<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 mb-5 justify-content-center">
		<?php if(empty($announcement)):?>
		<h4 class="modal-title text-center">Mohon maaf, tidak dapat menemukan satupun pengumuman terbaru</h4>
		<?php else:?>
		<?php foreach ($announcement as $val):?>
		<div class="col mb-5">
			<!-- Card -->
			<div class="card h-100">
				<div class="card-body">
					<h5><?= $val->subject;?></h5>
					<p class="card-text"><?= substr(strip_tags($val->content), 0, 100);?>...</p>
					<h6 class="mb-0"><?= date("d M F - H:i", $val->created_at);?></h6>
				</div>

				<div class="card-footer pt-0">
					<a class="card-link cursor" data-bs-toggle="modal" data-bs-target="#detail-<?= $val->id;?>">Baca<i class="bi-chevron-right small ms-1"></i></a>
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
						<h4 class="modal-title mb-2"><?= $val->subject;?></h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p><?= $val->content;?></p>
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
