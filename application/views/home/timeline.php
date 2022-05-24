<!-- Hero -->
<div class="bg-dark" style="background-image: url(<?= base_url();?>assets/svg/components/wave-pattern-light.svg);">
	<div class="container content-space-2 content-space-b-3 content-space-t-lg-5">
		<div class="w-lg-65 text-center mx-lg-auto">
			<h1 class="text-white mb-0">Jadwal</h1>
			<span class="badge bg-warning text-dark rounded-pill mb-3">Jadwal kegiatan YBB Scholarship Program</span>
		</div>
	</div>
</div>
<!-- End Hero -->
<div style="background: url(<?= base_url();?>assets/svg/components/abstract-shapes-19.svg) center no-repeat;">
	<!-- Description Section -->
	<div class="container content-space-2 w-50">
		<div class="row justify-content-sm-center center-flext">
			<div class="col-lg-12">
				<div class="mb-8">
					<?php if(empty($timeline)):?>
					<?php else:?>
					<!-- Step -->
					<ul class="step step-icon-sm">
						<?php foreach($timeline as $val):?>
						<li class="step-item">
							<div class="step-content-wrapper">
								<span class="step-icon step-icon-soft-dark">
									<i class="bi bi-clipboard"></i>
								</span>
								<div class="step-content mb-4">
									<h5><?= $val->title;?></h5>
									<?php
                                    $arrPeriod = explode(' - ', $val->period);
                                    $start = date("d F Y", strtotime($arrPeriod[0]));
                                    $end = date("d F Y", strtotime($arrPeriod[1]));

                                    ?>
									<?php if($start == $end):?>
									<p class="text-body mb-0"><?= $start;?></p>
									<?php else:?>
									<p class="text-body mb-0"><?= $start;?> s/d <?= $end;?></p>
									<?php endif;?>
								</div>
							</div>
						</li>
						<?php endforeach;?>
					</ul>
					<!-- End Step -->
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<!-- Description Section -->
</div>
