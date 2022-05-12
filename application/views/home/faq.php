<!-- Hero -->
<div class="bg-img-start" style="background-image: url(<?= base_url();?>assets/svg/components/card-11.svg);">
	<div class="container content-space-t-3 content-space-t-lg-5 content-space-b-2">
		<div class="w-md-75 w-lg-50 text-center mx-md-auto">
			<h1>FAQ</h1>
			<p>Cari FAQ yang mungkin kamu butuhkan.</p>
		</div>
	</div>
</div>
<!-- End Hero -->

<!-- FAQ -->
<div class="container bg-white content-space-2 content-space-b-lg-3">
	<div class="w-lg-75 mx-lg-auto">
		<div class="d-grid gap-10">
			<div class="d-grid gap-3">

				<?php if(empty($faq)):?>
				<center>Mohon maaf, tidak dapat menemukan satupun FAQ terbaru.</center>
				<?php else:?>
				<!-- Accordion -->
				<div class="accordion accordion-flush accordion-lg" id="accordionFAQBasics">
					<?php $i = 1;foreach($faq as $val):?>
					<!-- Accordion Item -->
					<div class="accordion-item">
						<div class="accordion-header" id="headingSupportFour-<?= $val->id;?>">
							<a class="accordion-button <?= $i == 1 ? '' : 'collapsed';?>" role="button"
								data-bs-toggle="collapse" data-bs-target="#collapseSupportFour-<?= $val->id;?>"
								aria-expanded="<?= $i == 1 ? 'true' : 'false';?>"
								aria-controls="collapseSupportFour-<?= $val->id;?>">
								<?= $val->question;?>
							</a>
						</div>
						<div id="collapseSupportFour-<?= $val->id;?>"
							class="accordion-collapse collapse <?= $i == 1 ? 'show' : '';?>"
							aria-labelledby="headingSupportFour-<?= $val->id;?>" data-bs-parent="#accordionFAQBasics">
							<div class="accordion-body">
								<?= $val->answer;?>
							</div>
						</div>
					</div>
					<!-- End Accordion Item -->
					<?php $i++;endforeach;?>

				</div>
				<!-- End Accordion -->
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<!-- End FAQ -->