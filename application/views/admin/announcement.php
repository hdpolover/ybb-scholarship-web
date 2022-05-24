<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Announcements
				<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
					data-bs-target="#add">Add New</button>
			</h1>
			<p class="docs-page-header-text">Manage announcements</p>
		</div>
	</div>
</div>
<!-- End Page Header -->

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="table" class="table table-striped display nowrap align-middle w-100">
					<thead>
						<tr>
							<th class="text-center">No.</th>
							<th></th>
							<th>Title</th>
							<th>Type</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($announcement) > 0) : ?>
						<?php $no = 1;
                            foreach ($announcement as $item) : ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td>
								<button type="button" data-bs-toggle="modal" id="<?= $item->id; ?>"
									data-bs-target="#detail<?= $item->id; ?>" class="btn btn-info btn-xs"><i
										class="bi bi-eye"></i>
									details</button>
								<button type="button" data-bs-toggle="modal" id="<?= $item->id; ?>"
									data-bs-target="#edit" class="btn btn-primary btn-xs selectorDetail"><i
										class="bi bi-pencil-square"></i>
									edit</button>
								<button type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $item->id; ?>"
									class="btn btn-danger btn-xs"><i class="bi bi-bookmark-check"></i> delete</button>
							</td>
							<td><b><?= $item->subject; ?></b></td>
							<td>
								<?php if ($item->for_public == 'public'):?>
								<span class="badge bg-info mr-2">public</span>
								<?php endif;?>
								<?php if ($item->for_users == 'users'):?>
								<span class="badge bg-warning mr-2">Users</span>
								<?php endif;?>
								<?php if ($item->for_members == 'members'):?>
								<span class="badge bg-primary">Scholarship members</span>
								<?php endif;?>
							</td>
							<td><b><?= date("d F Y - H:i", $item->created_at); ?></b></td>
						</tr>
						<!-- Modal -->
						<div id="detail<?= $item->id; ?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="edit" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
								role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Details</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<h2 class="mb-3"><?= $item->subject;?></h2>
											<?php if ($item->for_public == 'public'):?>
											<span class="badge bg-info mr-2">public</span>
											<?php endif;?>
											<?php if ($item->for_users == 'users'):?>
											<span class="badge bg-warning mr-2">Users</span>
											<?php endif;?>
											<?php if ($item->for_members == 'members'):?>
											<span class="badge bg-primary">Scholarship members</span>
											<?php endif;?>
										<p><?= $item->content;?></p>
										<div class="modal-footer px-0 pb-0">
											<span class="float-start">Created at
												<?= date("d F Y - H:i", $item->created_at); ?></span>
											<button type="button" class="btn btn-white btn-sm"
												data-bs-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Modal -->
						<!-- Modal -->
						<div id="delete<?= $item->id; ?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="edit" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
								role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Delete</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('admin/deleteAnnouncement');?>" method="post">
											<input type="hidden" name="id" value="<?= $item->id;?>">
											<p>Are you sure you want to delete this announcement?</p>
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
						<!-- End Modal -->
						<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Add new</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addAnnouncement');?>" method="post">

					<div class="mb-3">
						<label for="inputSubject" class="input-label">Title <small
								class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="text" name="subject" placeholder="Enter subject"
							required>
					</div>

					<div class="mb-3">
						<label class="input-label mb-2"> Choose to whom this announcement will be displayed <small
								class="text-danger">*</small></label>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<!-- Check -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="for_public" id="publicType"
										value="public" checked>
									<label class="form-check-label text-dark" for="publicType">
										<b>Public</b>
										<span class="d-block text-muted small">This will be displayed on the landing page</span>
									</label>
								</div>
								<!-- End Check -->

								<!-- Check -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="for_members" id="membersType"
										value="members">
									<label class="form-check-label text-dark" for="membersType">
										<b>Scholarship members</b>
										<span class="d-block text-muted small">This will be displayed on the
											scholarship members account</span>
									</label>
								</div>
								<!-- End Check -->
							</div>
							<div class="col-md-6 col-sm-12">
								<!-- Check -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="for_users" id="usersType"
										value="users">
									<label class="form-check-label text-dark" for="usersType">
										<b>All users</b>
										<span class="d-block text-muted small">This will be displayed on
											every user account</span>
									</label>
								</div>
								<!-- End Check -->
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="inputContent" class="input-label">Content <small
								class="text-danger">*</small></label>
						<textarea class="form-control form-control-sm" id="ckeditor" name="content" rows="5"
							placeholder="Enter content" required></textarea>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-info btn-sm">Publish</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="detailUserTitle">Edit</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="modalAnnouncementContent">

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<script>
	//  ckeditor
	var ckeditor = CKEDITOR.replace('ckeditor');
	ckeditor.on('required', function (evt) {
		editor.showNotification('This field is required.', 'warning');
		evt.cancel();
	});

	$(".selectorDetail").click(function () {

		var id = $(this).attr('id');
		$("#modalAnnouncementContent").html(
			`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
		);

		jQuery.ajax({
			url: "<?= site_url('admin/getDetailAnnouncement') ?>",
			type: 'POST',
			data: {
				id: id
			},
			success: function (data) {
				$("#modalAnnouncementContent").html(data);
			}
		});
	});

</script>
