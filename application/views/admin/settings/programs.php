<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for Other Programs Page</h1>
			<p class="docs-page-header-text">Manage other programs page content in here.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Manage OtherProgram
					<a class="btn btn-ghost-secondary btn-sm float-end" href="<?= site_url('other-programs'); ?>"
						target="_blank">
						Preview <i class="bi-box-arrow-up-right ms-1"></i>
					</a>
				</h4>
			</div>
			<div class="card-body border-bottom">
				<form action="<?= site_url('admin/changeOtherProgramContent');?>" method="post" enctype="multipart/form-data"
					class="js-validate need-validate" novalidate>
					<div class="mb-3">
						<label for="inputBackground" class="form-label">Background <small
								class="text-danger">*</small></label>
						<input type="file" name="image" id="inputBackground" class="form-control" value="<?= $op_bg;?>">
					</div>
					<div class="mb-3">
						<label class="form-label" for="inputDescription">Description <small
								class="text-danger">*</small></label>
						<textarea type="text" class="form-control" rows="4" name="op_desc"
							placeholder="Other Program Description" required><?= $op_desc;?></textarea>
					</div>
					<div class="card-footer px-0">
						<button type="submit" class="btn btn-primary btn-sm float-end">Save Changes</button>
					</div>
				</form>
			</div>
			<div class="card-header">
				<h4 class="card-title">Manage Other Program Content
					<button type="button" class="btn btn-primary btn-xs float-end" data-bs-toggle="modal"
						data-bs-target="#tambah">Add new Other Program Content</button>
				</h4>
			</div>
			<div class="card-body">
				<table class="table table-hover table-striped w-100" id="table">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="25%">Action</th>
							<th>Title</th>
							<th>Read</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($op_content)):?>
						<?php $no = 1; foreach($op_content as $val):?>
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
							<td><?= $val->title;?></td>
							<td>
								<button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
									data-bs-target="#detail-<?= $val->id;?>">Read detail</button>
							</td>
						</tr>

						<!-- Modal -->
						<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="add" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Edit Other Program content</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('admin/editOtherProgramContent');?>" method="post"
											enctype="multipart/form-data" class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>" required>

											<div class="mb-3">
												<label for="inputTitle">Title <small
														class="text-danger">*</small></label>
												<input type="text" class="form-control" name="title" id="inputTitle"
													value="<?= $val->title;?>" required>
											</div>

											<div class="mb-3">
												<label for="inputSubject" class="input-label">Picture <small
														class="text-danger">*</small></label>
												<input class="form-control" type="file" name="image"
													value="<?= $val->picture;?>" required>
											</div>

											<div class="mb-3">
												<label for="inputDescription-<?= $val->id;?>">Description <small
														class="text-danger">*</small></label>
												<textarea type="text" id="inputDescription-<?= $val->id;?>"
													class="form-control editor" rows="4" name="desc"
													placeholder="Other Program Description"
													required><?= $val->desc;?></textarea>
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

						<div id="delete-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
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
										<form action="<?= site_url('admin/deleteOtherProgramContent');?>" method="post"
											class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<p>Are you sure want to delete this content?</p>
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

						<div id="detail-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="delete" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Detail</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h4 class="mb-2"><?= $val->title;?></h4>
										<div class="row justify-content-center mb-4">
											<div class="col-md-8">
												<img class="card-img-top"
													src="<?= base_url();?><?= $val->picture == null ? 'assets/svg/design-system/docs-cards.svg' : $val->picture;?>"
													alt="Image Description">
											</div>
										</div>
										<p><?= $val->desc;?></p>
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
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Add new Other Program Content</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addOtherProgramContent');?>" method="post"
					enctype="multipart/form-data" class="js-validate need-validate" novalidate>

					<div class="mb-3">
						<label for="inputTitle">Title <small class="text-danger">*</small></label>
						<input type="text" class="form-control" name="title" id="inputTitle" placeholder="Title"
							required>
					</div>

					<div class="mb-3">
						<label for="inputSubject" class="input-label">Picture <small
								class="text-danger">*</small></label>
						<input class="form-control" type="file" name="image" placeholder="Picture" required>
					</div>

					<div class="mb-3">
						<label for="inputDescription">Description <small
								class="text-danger">*</small></label>
						<textarea type="text" id="inputDescription" class="form-control editor" rows="4"
							name="desc" placeholder="Other Program Description" required></textarea>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Add new Other Program Content</button>
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

</script>
