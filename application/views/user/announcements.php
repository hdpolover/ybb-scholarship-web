<div class="d-grid gap-3 gap-lg-5">
	<!-- Card -->
	<div class="card">
		<div class="card-header">
			<h4 class="card-header-title">Pengumuman</h4>
		</div>

		<!-- Table -->
		<div class="table-responsive">
			<table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
				<thead class="thead-light">
					<tr>
						<th>Pengumuman</th>
						<th>Tanggal</th>
						<th style="width: 5%;"></th>
					</tr>
				</thead>

				<tbody>
					<?php if(!empty($annoucementsUser)):?>
					<?php foreach($annoucementsUser as $val):?>
					<tr>
						<td><?= $val->subject;?></td>
						<td><?= date("d F Y - H:i", ($val->created_at));?></td>
						<td>
							<button class="btn text-body" href="javascript:;" data-bs-toggle="modal"
								data-bs-target="#read-<?= $val->id;?>">
								<i class="bi-book-half"></i>
							</button>
						</td>
					</tr>

					<!-- Modal -->
					<div id="read-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle"><?= $val->subject;?></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?= $val->content;?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End Modal -->

					<?php endforeach;?>
					<?php endif;?>
					<?php if(!empty($annoucementsMember)):?>
					<?php foreach ($annoucementsMember as $val):?>
					<tr>
						<td><?= $val->subject;?></td>
						<td><?= date("d F Y - H:i", ($val->created_at));?></td>
						<td>
							<button class="btn text-body" href="javascript:;" data-bs-toggle="modal"
								data-bs-target="#read-<?= $val->id;?>">
								<i class="bi-book-half"></i>
							</button>
						</td>
					</tr>

					<!-- Modal -->
					<div id="read-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle"><?= $val->subject;?></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?= $val->content;?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End Modal -->
					<?php endforeach;?>
					<?php endif;?>
					<?php if(!empty($annoucementsBoth)):?>
					<?php foreach ($annoucementsBoth as $val):?>
					<tr>
						<td><?= $val->subject;?></td>
						<td><?= date("d F Y - H:i", ($val->created_at));?></td>
						<td>
							<button class="btn text-body" href="javascript:;" data-bs-toggle="modal"
								data-bs-target="#read-<?= $val->id;?>">
								<i class="bi-book-half"></i>
							</button>
						</td>
					</tr>

					<!-- Modal -->
					<div id="read-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalCenterTitle"><?= $val->subject;?></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?= $val->content;?>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-white" data-bs-dismiss="modal">Tutup</button>
								</div>
							</div>
						</div>
					</div>
					<!-- End Modal -->
					<?php endforeach;?>
					<?php endif;?>
				</tbody>
			</table>
		</div>
		<!-- End Table -->
	</div>
	<!-- End Card -->
</div>
