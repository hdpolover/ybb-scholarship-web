<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Timeline</h1>
			<p class="docs-page-header-text">Manage Timeline information.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Manage Timeline
					<button type="button" class="btn btn-primary btn-xs float-end" data-bs-toggle="modal"
						data-bs-target="#tambah">Add new</button>
				</h4>
			</div>
			<div class="card-body">
				<table class="table table-hover table-striped w-100" id="table">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="25%">Action</th>
							<th>Title</th>
							<th>Period</th>
							<th>Desc</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($timeline)):?>
						<?php $no = 1; foreach($timeline as $val):?>
						<tr>
							<td><?= $no++;?></td>
							<td>
								<button type="button" class="btn btn-info btn-xs" data-bs-toggle="modal"
									data-bs-target="#edit-<?= $val->id;?>">edit</button>
								<button type="button" class="btn btn-danger btn-xs" data-bs-toggle="modal"
									data-bs-target="#delete-<?= $val->id;?>">delete</button>
							</td>
							<td><?= $val->title;?></td>
							<td>
								<?php
                                    $arrPeriod = explode(' - ', $val->period);
                                    $start = date("d F Y", strtotime($arrPeriod[0]));
                                    $end = date("d F Y", strtotime($arrPeriod[1]));
									
									if($start == $end){
										echo $start;
									}else{
										echo $start.' - '.$end;
									};?>
							</td>
							<td><?= $val->desc;?></td>
						</tr>

						<!-- Modal -->
						<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="add" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
								role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Edit Timeline</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('admin/editTimeline');?>" method="post"
											enctype="multipart/form-data" class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>" required>

											<div class="mb-3">
												<label for="inputTitle">Title <small
														class="text-danger">*</small></label>
												<input type="text" class="form-control form-control-sm" name="title"
													id="inputTitle" value="<?= $val->title;?>" required>
											</div>

											<div class="mb-3">
												<label for="inputPeriod" class="input-label">Period <small
														class="text-danger">*</small></label>
												<input class="form-control form-control-sm" id="inputPeriod" type="text"
													name="period" value="<?= $val->period;?>" accept="image/*" required>
											</div>

											<div class="mb-3">
												<label for="inputDescription">Description <small
														class="text-secondary">(optional)</small></label>
												<textarea type="text" id="inputDescription" class="form-control"
													rows="4" name="desc"
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
										<form action="<?= site_url('admin/deleteTimeline');?>" method="post"
											class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<p>Are you sure you want to delete this?</p>
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
				<h4 class="modal-title" id="detailUserTitle">Add new Timeline</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addTimeline');?>" method="post" enctype="multipart/form-data"
					class="js-validate need-validate" novalidate>

					<div class="mb-3">
						<label for="inputTitle">Title <small class="text-danger">*</small></label>
						<input type="text" class="form-control form-control-sm" name="title" id="inputTitle"
							placeholder="Title" required>
					</div>

					<div class="mb-3">
						<label for="inputPeriod" class="input-label">Period <small class="text-danger">*</small></label>
						<input class="form-control form-control-sm" id="inputPeriod" type="text" name="period"
							placeholder="Period" accept="image/*" required>
					</div>

					<div class="mb-3">
						<label for="inputDescription">Description <small
								class="text-secondary">(optional)</small></label>
						<textarea type="text" id="inputDescription" class="form-control" rows="4" name="desc"
							placeholder="Description"></textarea>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Publish</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$('input[name="period"]').daterangepicker();

</script>
