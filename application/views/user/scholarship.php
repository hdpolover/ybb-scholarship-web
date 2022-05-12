<div class="d-grid gap-3 gap-lg-5">
	<!-- Card -->
	<div class="card">
		<div class="card-header border-bottom">
			<h4 class="card-header-title">YBB Scholarship </h4>
		</div>
		<!-- Body -->
		<div class="card-body">
			<?php if ($scholarship['status'] == false):?>
			<!-- CTA -->
			<div class="card card-sm overflow-hidden">
				<!-- Card -->
				<div class="card-body">
					<div class="row justify-content-md-start align-items-md-center text-center text-md-start">
						<div class="col-md offset-md-3 mb-3 mb-md-0">
							<h4 class="card-title"><?= $scholarship['message'];?>!</h4>
						</div>

						<div class="col-md-auto">
							<a class="btn btn-primary btn-transition" href="<?= site_url('scholarship');?>">Daftar sekarang</a>
						</div>
					</div>

					<!-- SVG Shape -->
					<figure class="w-25 d-none d-md-block position-absolute top-0 start-0 mt-n2">
						<svg viewBox="0 0 451 902" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.125" d="M0 82C203.8 82 369 247.2 369 451C369 654.8 203.8 820 0 820"
								stroke="url(#paint2_linear)" stroke-width="164" stroke-miterlimit="10" />
							<defs>
								<linearGradient id="paint2_linear" x1="323.205" y1="785.242" x2="-97.6164" y2="56.3589"
									gradientUnits="userSpaceOnUse">
									<stop offset="0" stop-color="white" stop-opacity="0" />
									<stop offset="1" stop-color="#377dff" />
								</linearGradient>
							</defs>
						</svg>
					</figure>
					<!-- End SVG Shape -->
				</div>
				<!-- End Card -->
			</div>
			<!-- End CTA -->
			<?php endif;?>
			<?php if ($scholarship['status'] != false):?>
			<div class="alert alert-soft-<?= $scholarship['alert'];?>" role="alert">
				<?= $scholarship['message'];?>
			</div>
			<hr>
			<?php endif;?>
			<?php if ($scholarship['status'] != false):?>
			<div class="row">
				<div class="col-12">
					<!-- List Striped -->
					<ul class="list-group list-group-lg">
						<li class="list-group-item p-2 active">
							<i class="bi bi-person-circle list-group-icon"></i> <span style="margin-top: -20px">Informasi pribadi</span>
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-4 mb-2 mb-sm-0">
									<span class="h6">Nama lengkap</span>
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
									<span class="h6">Tanggal lahir</span>
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
									<span class="h6">Whatssapp <small
											class="text-success">(active)</small></span>
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
									<span class="h6">Alamat</span>
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
									<span class="h6">Jurusan / Prodi / Fakultas</span>
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
									<span class="h6">Sekolah / Universitas</span>
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
									<span class="h6">GPA Saat ini</span>
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
								<div class="col-sm-4 mb-2 mb-sm-0">
									<span class="h6">Ceritakan tentang dirimu</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-8 mb-2 mb-sm-0">
									<span><?= $scholar->about;?></span>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-4 mb-2 mb-sm-0">
									<span class="h6">Mimpi terbesarmu dan cara mewujudkannya</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-8 mb-2 mb-sm-0">
									<span><?= $scholar->dream_come;?></span>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-4 mb-2 mb-sm-0">
									<span class="h6">Pengalaman organisasi dan relawan</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-8 mb-2 mb-sm-0">
									<span><?= $scholar->volunteer;?></span>
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
					<!-- List Striped -->
					<ul class="list-group list-group-lg">
						<li class="list-group-item p-2 active">
							<i class="bi bi-file-earmark-image-fill list-group-icon"></i> <span
								style="margin-top: -20px">File pendaftaran</span>
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-9 mb-2 mb-sm-0">
									<span class="h6">Bukti telah mengikuti sosial media kami</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-3 mb-2 mb-sm-0">
									<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
										data-bs-target="#uploadFollow"><i class="bi bi-file-earmark-image-fill"></i>
										cek file</button>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-9 mb-2 mb-sm-0">
									<span class="h6">Bukti telah mempunyai akun di aplikasi YBB</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-3 mb-2 mb-sm-0">
									<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
										data-bs-target="#uploadApps"><i class="bi bi-file-earmark-image-fill"></i> cek
										file</button>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-9 mb-2 mb-sm-0">
									<span class="h6">Bukti telah subscribed akun youtube official YBB </span>
								</div>
								<!-- End Col -->

								<div class="col-sm-3 mb-2 mb-sm-0">
									<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
										data-bs-target="#uploadYoutube"><i class="bi bi-file-earmark-image-fill"></i>
										cek file</button>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-9 mb-2 mb-sm-0">
									<span class="h6">Bukti telah bergabung dalam grup Telegram YBB</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-3 mb-2 mb-sm-0">
									<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
										data-bs-target="#uploadTelegram"><i class="bi bi-file-earmark-image-fill"></i>
										cek file</button>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-9 mb-2 mb-sm-0">
									<span class="h6">Bukti telah membagikan informasi via status instagram atau postingan instagram</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-3 mb-2 mb-sm-0">
									<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
										data-bs-target="#uploadStory"><i class="bi bi-file-earmark-image-fill"></i>
										cek file</button>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
						<li class="list-group-item p-3">
							<div class="row">
								<div class="col-sm-9 mb-2 mb-sm-0">
									<span class="h6">Bukti telah menandai 5 teman pada postingan instagram</span>
								</div>
								<!-- End Col -->

								<div class="col-sm-3 mb-2 mb-sm-0">
									<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
										data-bs-target="#uploadTags"><i class="bi bi-file-earmark-image-fill"></i> cek
										file</button>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</li>
					</ul>
					<!-- End List Striped -->
				</div>
			</div>
			<?php endif;?>
		</div>
		<!-- End Body -->
	</div>
	<!-- End Card -->
</div>

<!-- Modal -->
<div id="uploadFollow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="<?= base_url().$scholar->upload_follow;?>" alt="<?= base_url().$scholar->upload_follow;?>"
					class="w-100 h-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="uploadApps" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="<?= base_url().$scholar->upload_apps;?>" alt="<?= base_url().$scholar->upload_apps;?>"
					class="w-100 h-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="uploadYoutube" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="<?= base_url().$scholar->upload_youtube;?>" alt="<?= base_url().$scholar->upload_youtube;?>"
					class="w-100 h-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="uploadTelegram" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="<?= base_url().$scholar->upload_telegram;?>" alt="<?= base_url().$scholar->upload_telegram;?>"
					class="w-100 h-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="uploadStory" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="<?= base_url().$scholar->upload_story;?>" alt="<?= base_url().$scholar->upload_story;?>"
					class="w-100 h-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="uploadTags" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">File</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img src="<?= base_url().$scholar->upload_tags;?>" alt="<?= base_url().$scholar->upload_tags;?>"
					class="w-100 h-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
