<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for about page</h1>
			<p class="docs-page-header-text">Manage about page content in here.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Manage About content
					<a class="btn btn-ghost-secondary btn-sm float-end" href="<?= site_url('about-us'); ?>"
						target="_blank">
						Preview <i class="bi-box-arrow-up-right ms-1"></i>
					</a>
				</h4>
			</div>
			<div class="card-body border-bottom">
				<form action="<?= site_url('admin/changeAboutContent');?>" method="post"
					class="js-validate need-validate" novalidate>
					<div class="mb-3">
						<label for="inputMotto" class="form-label">Motto <small class="text-danger">*</small></label>
						<input type="text" name="web_motto" id="inputMotto" class="form-control form-control-sm"
							value="<?= $web_motto;?>" required>
					</div>
					<div class="mb-3">
						<label class="form-label" for="inputAbout">About <small class="text-danger">*</small></label>
						<textarea type="text" id="inputAbout" class="form-control" rows="4" name="web_about"
							placeholder="About" required><?= $web_about;?></textarea>
						<small class="text-secondary">If you insert an emoji or special characters and it become <b>???</b>, its
							mean that
							emoji
							or special characters not yet supported and please change it to another
							alternative.</small>
					</div>
					<div class="card-footer px-0">
						<button type="submit" class="btn btn-primary btn-sm float-end">Save Changes</button>
					</div>
				</form>
			</div>
			<div class="card-header">
				<h4 class="card-title">Manage Gallery component
					<button type="button" class="btn btn-primary btn-xs float-end" data-bs-toggle="modal"
						data-bs-target="#tambah">Add new Gallery item</button>
				</h4>
			</div>
			<div class="card-body">
				<table class="table table-hover table-striped w-100" id="table">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="25%">Action</th>
							<!-- <th>Status</th> -->
							<th>Picture</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($about_gallery)):?>
						<?php $no = 1; foreach($about_gallery as $val):?>
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
									data-bs-target="#picture-<?= $val->id;?>">Display picture</button></td>
						</tr>

						<!-- Modal -->
						<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="add" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Edit FAQ content</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('admin/editAboutGallery');?>" method="post"
											enctype="multipart/form-data" class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>" required>

											<div class="mb-3">
												<label for="inputSubject" class="input-label">Picture <small
														class="text-danger">*</small></label>
												<input class="form-control form-control-sm" type="file" name="image"
													value="<?= $val->picture;?>" accept="image/*" required>
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
										<form action="<?= site_url('admin/deleteAboutGallery');?>" method="post"
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
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Picture</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<img src="<?= base_url();?><?= $val->picture;?>" alt="<?= $val->picture;?>"
											class="w-100 h-auto">
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
				<form action="<?= site_url('admin/addAboutGallery');?>" method="post" enctype="multipart/form-data"
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

	// TINYMCE
	tinymce.init({
		selector: '#inputAbout',
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
