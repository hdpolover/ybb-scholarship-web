<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for scholarship register</h1>
			<p class="docs-page-header-text">Manage about scholarship register.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->


<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body border-bottom">
				<form action="<?= site_url('admin/changeScholarReg');?>" method="post" class="js-validate need-validate"
					novalidate>
					<div class="mb-3">
						<!-- Checkbox Switch -->
						<div class="form-check form-switch mb-4">
							<input type="checkbox" class="form-check-input" name="pendaftaran_buka" id="pendaftaranBuka"
								<?= $pendaftaran_buka == 1 ? 'checked' : '';?>>
							<label class="form-check-label" for="pendaftaranBuka">Open Register?</label>
						</div>
						<!-- End Checkbox Switch -->
					</div>
					<div class="mb-3">
						<label class="form-label" for="inputAbout">Set max. registered date for scholarship applicant
							<small class="text-danger">*</small></label>
						<input type="date" class="form-control" name="pendaftaran_max" value="<?= $pendaftaran_max;?>" required>
					</div>
					<div class="card-footer px-0">
						<button type="submit" class="btn btn-primary btn-sm float-end">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
