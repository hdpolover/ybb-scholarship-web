<div class="row">
	<div class="col-12">
		<!-- List Striped -->
		<ul class="list-group list-group-lg">
			<li class="list-group-item p-2 active">
				<i class="bi bi-person-circle list-group-icon"></i> <span style="margin-top: -20px">Personal
					Information</span>
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">Full Name</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= $scholar->full_name;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">Date of birth</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= date("d F Y", strtotime($scholar->date_birth));?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">WhatssApp Number <small class="text-success">(active)</small></span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span>62<?= $scholar->whatsapp_number;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">Current Address</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= $scholar->current_address;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">Field of Study</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= $scholar->field_study;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">School or University</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= $scholar->school;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">Current GPA</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= $scholar->current_gpa;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-4 mb-2 mb-sm-0">
						<span class="h6">Semester</span>
					</div>
					<!-- End Col -->

					<div class="col-sm-8 mb-2 mb-sm-0">
						<span><?= $scholar->semester;?></span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-12 mb-2 mb-sm-0">
						<span class="h6">About yourself</span>
						<p><?= $scholar->about;?></p>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-12 mb-2 mb-sm-0">
						<span class="h6">Biggest dreams and how to make it come true</span>
						<p><?= $scholar->dream_come;?></p>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
			<li class="list-group-item p-3">
				<div class="row">
					<div class="col-sm-12 mb-2 mb-sm-0">
						<span class="h6">Volunteering or organizational experiences</span>
						<p><?= $scholar->volunteer;?></p>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</li>
		</ul>
		<!-- End List Striped -->
	</div>
</div>
<hr>
<div class="row">
	<div class="col-12">
		<!-- Accordion -->
		<div class="accordion accordion-flush accordion-lg" id="accordionApplicant">
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_follow">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadFollow"
						aria-expanded="false" aria-controls="collapseUploadFollow">
						Proof that you have already followed our social media
					</a>
				</div>
				<div id="collapseUploadFollow" class="accordion-collapse collapse" aria-labelledby="upload_follow"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<img src="<?= base_url().$scholar->upload_follow;?>"
							alt="<?= base_url().$scholar->upload_follow;?>" class="w-100 h-auto border">
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_apps">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadApps"
						aria-expanded="false" aria-controls="collapseUploadApps">
						Proof that you already have an account on the YBB App
					</a>
				</div>
				<div id="collapseUploadApps" class="accordion-collapse collapse" aria-labelledby="upload_apps"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<img src="<?= base_url().$scholar->upload_apps;?>"
							alt="<?= base_url().$scholar->upload_apps;?>" class="w-100 h-auto border">
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_youtube">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadYoutube"
						aria-expanded="false" aria-controls="collapseUploadYoutube">
						Proof that you have subscribed the YBB Youtube official account
					</a>
				</div>
				<div id="collapseUploadYoutube" class="accordion-collapse collapse" aria-labelledby="upload_youtube"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<img src="<?= base_url().$scholar->upload_youtube;?>"
							alt="<?= base_url().$scholar->upload_youtube;?>" class="w-100 h-auto border">
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_telegram">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadTelegram"
						aria-expanded="false" aria-controls="collapseUploadTelegram">
						Proof that you have joined YBB telegram official account
					</a>
				</div>
				<div id="collapseUploadTelegram" class="accordion-collapse collapse" aria-labelledby="upload_telegram"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<img src="<?= base_url().$scholar->upload_telegram;?>"
							alt="<?= base_url().$scholar->upload_telegram;?>" class="w-100 h-auto border">
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_story">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadStory"
						aria-expanded="false" aria-controls="collapseUploadStory">
						Proof that you have shared this information on your instagram story or
							instagram post
					</a>
				</div>
				<div id="collapseUploadStory" class="accordion-collapse collapse" aria-labelledby="upload_story"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<img src="<?= base_url().$scholar->upload_story;?>"
							alt="<?= base_url().$scholar->upload_story;?>" class="w-100 h-auto border">
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_tags">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadTags"
						aria-expanded="false" aria-controls="collapseUploadTags">
						Proof that you have tagged 5 of your friends on the post
					</a>
				</div>
				<div id="collapseUploadTags" class="accordion-collapse collapse" aria-labelledby="upload_tags"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<img src="<?= base_url().$scholar->upload_tags;?>"
							alt="<?= base_url().$scholar->upload_tags;?>" class="w-100 h-auto border">
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
			<!-- Accordion Item -->
			<div class="accordion-item">
				<div class="accordion-header" id="upload_twibbon">
					<a class="accordion-button collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#collapseUploadTwibbon"
						aria-expanded="false" aria-controls="collapseUploadTwibbon">
						Proof that you have uploaded a Twibbon on an instagram post
					</a>
				</div>
				<div id="collapseUploadTwibbon" class="accordion-collapse collapse" aria-labelledby="upload_twibbon"
					data-bs-parent="#accordionApplicant">
					<div class="accordion-body">
						<a href="<?= $scholar->upload_twibbon;?>" class="text-primary" target="_blank">Open link</a>
					</div>
				</div>
			</div>
			<!-- End Accordion Item -->
		</div>
		<!-- End Accordion -->
	</div>
</div>