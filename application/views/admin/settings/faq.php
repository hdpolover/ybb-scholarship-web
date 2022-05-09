<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for FAQ Page</h1>
			<p class="docs-page-header-text">Manage FAQ page content in here.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Manage FAQ component
					<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
						data-bs-target="#tambah">Add new FAQ</button>
					<a class="btn btn-ghost-secondary btn-sm float-end" style="margin-right: 10px;" href="<?= site_url('faq'); ?>" target="_blank">
						Preview <i class="bi-box-arrow-up-right ms-1"></i>
					</a>
				</h4>
			</div>
			<div class="card-body">
				<table class="table table-hover table-striped w-100" id="table">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Action</th>
							<!-- <th>Status</th> -->
							<th>Question</th>
							<th>Answer</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($faq)):?>
						<?php $no = 1; foreach($faq as $val):?>
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
							<td><?= $val->question;?></td>
							<td><button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
									data-bs-target="#answer-<?= $val->id;?>">check answer</button></td>
						</tr>

						<!-- Modal -->
						<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="add" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
								role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Edit FAQ content</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="<?= site_url('admin/editFaq');?>" method="post"
											class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>" required>

											<div class="mb-3">
												<label for="inputSubject" class="input-label">Question <small
														class="text-danger">*</small></label>
												<input class="form-control form-control-sm" type="text" name="question"
													value="<?= $val->question;?>" required>
											</div>

											<div class="mb-3">
												<label for="inputContent" class="input-label">Answer <small
														class="text-danger">*</small></label>
												<textarea class="form-control form-control-sm" name="answer" rows="5"
													placeholder="Answer" required><?= $val->answer;?></textarea>
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
										<form action="<?= site_url('admin/deleteFaq');?>" method="post"
											class="js-validate need-validate" novalidate>
											<input type="hidden" name="id" value="<?= $val->id;?>">
											<p>Are you sure want to delete this FAQ?</p>
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

						<div id="answer-<?= $val->id; ?>" class="modal fade" tabindex="-1" role="dialog"
							aria-labelledby="delete" aria-hidden="true">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
								role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="detailUserTitle">Answer</h4>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p><?= $val->answer;?></p>
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
				<h4 class="modal-title" id="detailUserTitle">Add new FAQ</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/addFaq');?>" method="post" class="js-validate need-validate"
					novalidate>

					<div class="mb-3">
						<label for="inputSubject" class="input-label">Question <small
								class="text-danger">*</small></label>
						<input class="form-control form-control-sm" type="text" name="question" placeholder="Question" required>
					</div>

					<div class="mb-3">
						<label for="inputContent" class="input-label">Answer <small
								class="text-danger">*</small></label>
						<textarea class="form-control form-control-sm" name="answer" rows="5" placeholder="Answer" required></textarea>
					</div>

					<div class="modal-footer px-0 pb-0">
						<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary btn-sm">Add new FAQ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>