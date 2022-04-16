<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Scholarship Applicant</h1>
			<p class="docs-page-header-text">List of all user that has been send their applicant for scholarship programs.</p>
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
							<th>Date Apply</th>
							<th>Name</th>
							<th>Email</th>
							<th>Applicant Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($users) > 0) : ?>
						<?php $no = 1;
                            foreach ($users as $user) : ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td>
								<button type="button" data-bs-toggle="modal" id="<?= $user->user_id; ?>" data-bs-target="#detailUser"
									class="btn btn-info btn-xs selectorDetail"><i class="bi bi-eye"></i> detail</button>
								<button type="button" data-bs-toggle="modal" id="<?= $user->user_id; ?>" data-bs-target="#detailApplicant"
									class="btn btn-info btn-xs selectorApplicant"><i class="bi bi-eye"></i> applicant data`s</button>
							</td>
							<td><b><?= date("d F Y - H:i", $user->created_at); ?></b></td>
							<td><b><?= $user->name; ?></b></td>
							<td><a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a></td>
							<td>
								<?php
									switch ($user->status) {
										case 1:
											$class = 'warning';
											$status = 'waiting verification';
											break;

										case 2:
											$class = 'success';
											$status = 'approved';
											break;

										case 3:
											$class = 'danger';
											$status = 'rejected';
											break;
										
										default:
                                            $class = 'secondary';
                                            $status = 'unverified';
											break;
									}
								?>
								<span class="badge bg-<?= $class;?>"><?= $status;?></span>
							</td>
						</tr>
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
<div id="detailUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">User information</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="modalUserContent">

				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="detailApplicant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailUserTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailUserTitle">Applicant information</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="modalApplicantContent">

				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(".selectorDetail").click(function () {

		var user_id = $(this).attr('id');
			$("#modalUserContent").html(
				`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
			);

			jQuery.ajax({
				url: "<?= site_url('admin/getDetailUser') ?>",
				type: 'POST',
				data: {
					user_id: user_id
				},
				success: function (data) {
					$("#modalUserContent").html(data);
				}
			});
	});

</script>

<script>
	$(".selectorApplicant").click(function () {

		var user_id = $(this).attr('id');
			$("#modalApplicantContent").html(
				`<center class="py-5"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang memuat ...</center>`
			);

			jQuery.ajax({
				url: "<?= site_url('admin/getDetailApplicant') ?>",
				type: 'POST',
				data: {
					user_id: user_id
				},
				success: function (data) {
					$("#modalApplicantContent").html(data);
				}
			});
	});

</script>
