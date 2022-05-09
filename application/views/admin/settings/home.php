<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for landing page</h1>
			<p class="docs-page-header-text">Manage landing page content in here.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->


<div class="row">
	<div class="col-md-8">
		<!-- Nav -->
		<div class="text-left">
			<ul class="nav nav-segment nav mb-4" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="nav-one-eg1-tab" href="#nav-one-eg1" data-bs-toggle="pill"
						data-bs-target="#nav-one-eg1" role="tab" aria-controls="nav-one-eg1" aria-selected="true">Hero
						Section</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="nav-two-eg1-tab" href="#nav-two-eg1" data-bs-toggle="pill"
						data-bs-target="#nav-two-eg1" role="tab" aria-controls="nav-two-eg1"
						aria-selected="false">Synopsis Section</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="nav-three-eg1-tab" href="#nav-three-eg1" data-bs-toggle="pill"
						data-bs-target="#nav-three-eg1" role="tab" aria-controls="nav-three-eg1"
						aria-selected="false">Benefit Section</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="nav-four-eg1-tab" href="#nav-four-eg1" data-bs-toggle="pill"
						data-bs-target="#nav-four-eg1" role="tab" aria-controls="nav-four-eg1"
						aria-selected="false">Gallery Section</a>
				</li>
			</ul>
		</div>
		<!-- End Nav -->

		<div class="card">
			<!-- Tab Content -->
			<div class="tab-content">
				<div class="tab-pane fade show active" id="nav-one-eg1" role="tabpanel"
					aria-labelledby="nav-one-eg1-tab">
					<div class="card-header">
						<h4 class="card-title">Manage Hero Section
							<button type="button" class="btn btn-primary btn-xs float-end" data-bs-toggle="modal"
								data-bs-target="#tambahHero">Add new Hero component</button>
							<a class="btn btn-ghost-secondary btn-xs float-end" href="<?= site_url('home'); ?>"
								target="_blank">
								Preview <i class="bi-box-arrow-up-right ms-1"></i>
							</a>
						</h4>
					</div>
					<div class="card-body">
						<!-- Swiper Slider -->
						<div class="border-bottom">
							<!-- Main Slider -->
							<div class="js-swiper-main swiper vh-md-50">
								<div class="swiper-wrapper">
									<?php if(empty($hero_section)):?>
									<!-- Slide -->
									<div class="swiper-slide gradient-y-overlay-sm-gray-900 bg-img-start"
										style="background-image: url(<?= base_url(); ?>assets/img/1920x800/img2.jpg);">
										<div
											class="container d-md-flex align-items-md-center vh-md-50 content-space-t-5 content-space-b-3 content-space-md-0">
											<div class="w-100 text-center">
												<button class="btn btn-secondary btn-xs position-absolute"
													style="top: 10px; right: 10px;">default</button>
												<h5 class="text-white">Welcome to</h5>
												<h2 class="display-7 text-white mb-0">Youth Break the
													Boundaries<br><small class="display-7">Foundation
														Scholarship</small></h2>
											</div>
										</div>
									</div>
									<!-- End Slide -->
									<?php else:?>
									<?php foreach($hero_section as $val):?>
									<!-- Slide -->
									<div class="swiper-slide gradient-y-overlay-sm-gray-900 bg-img-start"
										style="background-image: url(<?= base_url(); ?><?= $val->picture;?>);">
										<div
											class="container d-md-flex align-items-md-center vh-md-50 content-space-t-5 content-space-b-3 content-space-md-0">
											<div class="w-100 text-center">
												<button
													class="btn btn-primary btn-xs position-absolute selectorEditHero"
													style="top: 10px; right: 10px;" data-bs-toggle="modal"
													data-bs-target="#editHero" id="<?= $val->id;?>">manage</button>
												<?php if ($val->hero_icon == 1):?><img
													src="<?= base_url();?><?= $val->icon;?>" alt="<?= $val->icon;?>"
													class="w-25 mb-3"><?php endif;?>
												<h2 class="display-5 text-white mb-2"><?= $val->value;?></h2>
												<?php if(isset($val->desc)):?><h2
													class="display-7 text-white fw-normal mb-0"><?= $val->desc;?></h2>
												<?php endif;?>
												<?php if ($val->button == 1):?><a
													href="<?= prep_url($val->button_link);?>"
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
									<div
										class="js-swiper-main-button-next swiper-button-next swiper-button-next-soft-white">
									</div>
									<div
										class="js-swiper-main-button-prev swiper-button-prev swiper-button-prev-soft-white">
									</div>
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
					</div>
				</div>

				<div class="tab-pane fade" id="nav-two-eg1" role="tabpanel" aria-labelledby="nav-two-eg1-tab">
					<div class="card-header">
						<h4 class="card-title">Manage Synopsis Section
							<a class="btn btn-ghost-secondary btn-sm float-end" href="<?= site_url('about-us'); ?>"
								target="_blank">
								Preview <i class="bi-box-arrow-up-right ms-1"></i>
							</a>
						</h4>
					</div>
					<div class="card-body border-bottom">
						<form action="<?= site_url('admin/changeHomeContent');?>" method="post"
							class="js-validate need-validate" novalidate>
							<div class="mb-3">
								<div class="alert alert-primary" role="alert">
									<small>If you insert an emoji or special characters and it become <b>???</b>, its
										mean that
										emoji
										or special characters not yet supported and please change it to another
										alternative.</small>
								</div>
								<label class="form-label" for="inputAbout">Home Synopsis <small
										class="text-danger">*</small></label>
								<textarea type="text" id="inputHomeDesc" class="form-control form-control-sm" rows="4"
									name="home_sinopsis" placeholder="About" required><?= $home_sinopsis;?></textarea>
							</div>
							<div class="card-footer px-0">
								<button type="submit" class="btn btn-primary btn-sm float-end">Save Changes</button>
							</div>
						</form>
					</div>
				</div>

				<div class="tab-pane fade" id="nav-three-eg1" role="tabpanel" aria-labelledby="nav-three-eg1-tab">
					<div class="card-header">
						<h4 class="card-title">Manage Benefit Section
							<button type="button" class="btn btn-primary btn-xs float-end" data-bs-toggle="modal"
								data-bs-target="#tambahBenefit">Add new Benefit component</button>
							<a class="btn btn-ghost-secondary btn-xs float-end" href="<?= site_url('home'); ?>"
								target="_blank">
								Preview <i class="bi-box-arrow-up-right ms-1"></i>
							</a>
						</h4>
					</div>
					<div class="card-body">
						<table class="table table-hover table-striped display nowrap w-100" id="table">
							<thead class="w-100">
								<tr>
									<th>No.</th>
									<th>Action</th>
									<th>Benefit</th>
									<th>Desc</th>
									<th>Picture</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($home_benefit)):?>
								<?php $no = 1; foreach($home_benefit as $val):?>
								<tr>
									<td><?= $no++;?></td>
									<td>
										<button type="button" class="btn btn-info btn-xs" data-bs-toggle="modal"
											data-bs-target="#edit-<?= $val->id;?>">edit</button>
										<button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal"
											data-bs-target="#delete-<?= $val->id;?>">delete</button>
									</td>
									<td><?= $val->value;?></td>
									<td><button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
											data-bs-target="#desc-<?= $val->id;?>">Read desc</button></td>
									<td><button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
											data-bs-target="#picture-<?= $val->id;?>">Show picture</button></td>
								</tr>

								<!-- Modal -->
								<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="add" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Edit Benefit component</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="<?= site_url('admin/editHomeBenefit');?>" method="post"
													enctype="multipart/form-data" class="js-validate need-validate"
													novalidate>
													<input type="hidden" name="id" value="<?= $val->id;?>" required>

													<div class="mb-3">
														<label for="inputBenefit" class="input-label">Benefit <small
																class="text-danger">*</small></label>
														<input class="form-control form-control-sm" type="text"
															id="inputBenefit" name="benefit" value="<?= $val->value;?>"
															required>
													</div>

													<div class="mb-3">
														<label for="inputPicture" class="input-label">Picture <small
																class="text-danger">*</small></label>
														<input class="form-control form-control-sm" type="file"
															accept="image/*" id="inputPicture" name="image" value="">
														<input type="hidden" name="old_image"
															value="<?=$val->picture;?>">
													</div>

													<div class="mb-3">
														<label for="inputDesc" class="input-label">Desc <small
																class="text-secondary">(optional)</small></label>
														<textarea id="inputDesc" class="form-control form-control-sm"
															name="desc" rows="3"
															placeholder="Description"><?= $val->desc;?></textarea>
													</div>

													<div class="modal-footer px-0 pb-0">
														<button type="button" class="btn btn-white btn-sm"
															data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-info btn-sm">Save
															Changes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div id="delete-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="delete" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Delete</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="<?= site_url('admin/deleteHomeBenefit');?>" method="post"
													class="js-validate need-validate" novalidate>
													<input type="hidden" name="id" value="<?= $val->id;?>">
													<p>Are you sure want to delete this Benefit Item?</p>
													<div class="modal-footer px-0 pb-0">
														<button type="button" class="btn btn-white btn-sm"
															data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-danger btn-sm">Yes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div id="desc-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="delete" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Description</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<p><?= $val->desc;?></p>
												<div class="modal-footer px-0 pb-0">
													<button type="button" class="btn btn-white btn-sm"
														data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div id="picture-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="delete" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Picture</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<img src="<?= base_url();?><?= $val->picture;?>"
													alt="<?= $val->picture;?>" class="w-100 h-auto">
												<div class="modal-footer px-0 pb-0">
													<button type="button" class="btn btn-white btn-sm"
														data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
								<?php endif;?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="tab-pane fade" id="nav-four-eg1" role="tabpanel" aria-labelledby="nav-four-eg1-tab">
					<div class="card-header">
						<h4 class="card-title">Manage Gallery Section
							<button type="button" class="btn btn-primary btn-xs float-end" data-bs-toggle="modal"
								data-bs-target="#tambah">Add new Gallery item</button>
							<a class="btn btn-ghost-secondary btn-xs float-end" href="<?= site_url('home'); ?>"
								target="_blank">
								Preview <i class="bi-box-arrow-up-right ms-1"></i>
							</a>
						</h4>
					</div>
					<div class="card-body">
						<table class="table table-hover table-striped w-100" id="table2">
							<thead>
								<tr>
									<th width="10%">No.</th>
									<th width="25%">Action</th>
									<!-- <th>Status</th> -->
									<th>Picture</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($home_gallery)):?>
								<?php $no = 1; foreach($home_gallery as $val):?>
								<tr>
									<td><?= $no++;?></td>
									<td>
										<button type="button" class="btn btn-info btn-xs" data-bs-toggle="modal"
											data-bs-target="#edit-<?= $val->id;?>">edit</button>
										<button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal"
											data-bs-target="#delete-<?= $val->id;?>">delete</button>
									</td>
									<!-- <td><span
									class="badge bg-<?= $val->draft == 1 ? 'warning' : 'primary';?>"><?= $val->draft == 1 ? 'draft' : 'displayed';?></span>
							</td> -->
									<td><button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
											data-bs-target="#picture-<?= $val->id;?>">Show picture</button></td>
								</tr>

								<!-- Modal -->
								<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="add" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Edit FAQ content</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="<?= site_url('admin/editHomeGallery');?>" method="post"
													enctype="multipart/form-data" class="js-validate need-validate"
													novalidate>
													<input type="hidden" name="id" value="<?= $val->id;?>" required>

													<div class="mb-3">
														<label for="inputSubject" class="input-label">Picture <small
																class="text-danger">*</small></label>
														<input class="form-control form-control-sm" type="file"
															name="image" value="" accept="image/*" required>
														<input type="hidden" name="old_image"
															value="<?=$val->picture;?>">
													</div>

													<div class="modal-footer px-0 pb-0">
														<button type="button" class="btn btn-white btn-sm"
															data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-info btn-sm">Save
															Changes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div id="delete-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="delete" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Delete</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<form action="<?= site_url('admin/deleteHomeGallery');?>" method="post"
													class="js-validate need-validate" novalidate>
													<input type="hidden" name="id" value="<?= $val->id;?>">
													<p>Are you sure want to delete this Gallery Item?</p>
													<div class="modal-footer px-0 pb-0">
														<button type="button" class="btn btn-white btn-sm"
															data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-danger btn-sm">Yes</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div id="picture-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="delete" aria-hidden="true">
									<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
										role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="detailUserTitle">Picture</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<img src="<?= base_url();?><?= $val->picture;?>"
													alt="<?= $val->picture;?>" class="w-100 h-auto">
												<div class="modal-footer px-0 pb-0">
													<button type="button" class="btn btn-white btn-sm"
														data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
								<?php endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- End Tab Content -->
		</div>
	</div>
</div>


<!-- Modal -->
<div id="tambahHero" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Add new Hero component</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addHomeHero');?>" method="post" enctype="multipart/form-data"
					class="js-validate need-validate" novalidate>

					<div class="mb-3">
						<label for="inputBackground" class="input-label">Background <small
								class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="file" id="inputBackground" name="image"
							placeholder="Question" accept="image/*" required>
					</div>

					<div class="mb-3">
						<label for="inputTitle" class="input-label">Title <small class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="text" id="inputTitle" name="title"
							placeholder="Title" required>
					</div>

					<div class="mb-4">
						<label for="inputSubTitle" class="input-label">Sub Title <small
								class="text-secondary">(optional)</small></label>
						<input class="form-control form-control-sm" type="text" id="inputSubTitle" name="sub_title"
							placeholder="Sub Title">
					</div>

					<div class="mb-3">
						<div class="row mb-3">
							<div class="col-4">
								<!-- Checkbox Switch -->
								<div class="form-check form-switch">
									<input type="checkbox" class="form-check-input" name="button" id="inputButton">
									<label class="form-check-label" for="inputButton">Hero Button <small
											class="text-secondary">(optional)</small></label>
								</div>
								<!-- End Checkbox Switch -->
							</div>
						</div>
						<div class="row d-none" id="buttonDetails">
							<div class="col-3 mb-3">
								<label for="inputButtonColor" class="input-label">Button Color <small
										class="text-danger">*</small></label>
								<input class="form-control form-control-sm" type="color" name="button_color"
									id="inputButtonColor" placeholder="Title">
							</div>
							<div class="col-3 mb-3">
								<label for="inputButtonTextColor" class="input-label">Text Color <small
										class="text-danger">*</small></label>
								<input class="form-control form-control-sm" type="color" name="button_text_color"
									id="inputButtonTextColor" placeholder="Title">
							</div>
							<div class="col-6 mb-3">
								<label for="inputButtonText" class="input-label">Button Text <small
										class="text-danger">*</small></label>
								<input class="form-control form-control-sm" type="text" name="button_text"
									id="inputButtonText" placeholder="Title">
							</div>
							<div class="col-12 mb-3">
								<label for="inputButtonLink" class="input-label">Button Link <small
										class="text-danger">*</small></label>
								<input class="form-control form-control-sm" type="link" name="button_link"
									id="inputButtonLink" placeholder="Title">
							</div>
						</div>
					</div>

					<div class="mb-3">
						<div class="row mb-3">
							<div class="col-4">
								<!-- Checkbox Switch -->
								<div class="form-check form-switch">
									<input type="checkbox" class="form-check-input" name="icon" id="iconButton">
									<label class="form-check-label" for="iconButton">Hero Icon <small
											class="text-secondary">(optional)</small></label>
								</div>
								<!-- End Checkbox Switch -->
							</div>
						</div>
						<div class="row d-none" id="inputIcons">
							<div class="col-12 mb-3">
								<label for="inputButtonLink" class="input-label">Upload icon <small
										class="text-danger">*</small></label>
								<input class="form-control form-control-sm" type="file" name="icon" id="inputIcon"
									placeholder="Title">
							</div>
						</div>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Add new Benefit component</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="editHero" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Edit Hero component
				</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="editHeroContent">
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="tambahBenefit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Add new Benefit component</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addHomeBenefit');?>" method="post" enctype="multipart/form-data"
					class="js-validate need-validate" novalidate>

					<div class="mb-3">
						<label for="inputBenefit" class="input-label">Benefit <small
								class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="text" id="inputBenefit" name="benefit"
							placeholder="Benefit" required>
					</div>

					<div class="mb-3">
						<label for="inputPicture" class="input-label">Picture <small
								class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="file" id="inputPicture" name="image"
							placeholder="Question" accept="image/*" required>
					</div>

					<div class="mb-3">
						<label for="inputDesc" class="input-label">Desc <small class="text-secondary">(optional)</small></label>
						<textarea id="inputDesc" class="form-control form-control-sm" name="desc" rows="3"
							placeholder="Description"></textarea>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Add new Benefit component</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Add new Gallery item</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addHomeGallery');?>" method="post" enctype="multipart/form-data"
					class="js-validate need-validate" novalidate>

					<div class="mb-3">
						<label for="inputSubject" class="input-label">Picture <small
								class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="file" name="image" placeholder="Question"
							accept="image/*" required>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Add new Gallery item</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	//  ckeditor
	$('textarea.editor').each(function () {

		CKEDITOR.replace($(this).attr('id'));

	});

	$("#inputButton").change(function () {
		if (this.checked) {
			$("#buttonDetails").removeClass('d-none');
			$("#inputButtonText").prop('required', true);
			$("#inputButtonColor").prop('required', true);
			$("#inputButtonTextColor").prop('required', true);
			$("#inputButtonLink").prop('required', true);
		} else {
			$("#buttonDetails").addClass('d-none');
			$("#inputButtonText").prop('required', false);
			$("#inputButtonColor").prop('required', false);
			$("#inputButtonTextColor").prop('required', false);
			$("#inputButtonLink").prop('required', false);
		}
	});

	$("#iconButton").change(function () {
		if (this.checked) {
			$("#inputIcons").removeClass('d-none');
			$("#inputIcon").prop('required', true);
		} else {
			$("#inputIcons").addClass('d-none');
			$("#inputIcon").prop('required', false);
		}
	});

	$(".selectorEditHero").click(function () {

		var id = $(this).attr('id');
		$("#editHeroContent").html(
			`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
		);

		jQuery.ajax({
			url: "<?= site_url('admin/getEditHeroAjax') ?>",
			type: 'POST',
			data: {
				id: id
			},
			success: function (data) {
				$("#editHeroContent").html(data);
			}
		});
	});

	// TINYMCE
	tinymce.init({
		selector: '#inputHomeDesc',
		height: 400,
		menubar: false,
		branding: false,
		toolbar_sticky: true,
		plugins: 'print preview paste importcss searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons lineheight',
		// plugins: [
		//     'lists preview',
		//     'visualblocks',
		//     'table paste wordcount emoticons'
		// ],
		toolbar: 'fullscreen  preview | undo redo | fontselect fontsizeselect formatselect lineheight | charmap emoticons | blockquote bold italic underline strikethrough |  alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | image media template link codesample',
		// toolbar: 'undo redo | fontsizeselect formatselect | forecolor backcolor removeformat | emoticons' +
		//     'blockquote bold italic underline strikethrough | alignleft aligncenter ' +
		//     'alignright alignjustify | bullist numlist outdent indent | ' +
		//     'removeformat preview'
	});

</script>
