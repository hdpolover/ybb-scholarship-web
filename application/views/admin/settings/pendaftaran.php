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
							<input type="checkbox" class="form-check-input" name="pendaftaran_buka" id="pendaftaranBuka" <?= $pendaftaran_buka == 1 ? 'checked' : '';?>>
							<label class="form-check-label" for="pendaftaranBuka">Open Register?</label>
						</div>
						<!-- End Checkbox Switch -->
					</div>
					<div class="mb-3">
						<label class="form-label" for="inputAbout">Set max. quota for scholarship applicant <small
								class="text-danger">*</small></label>
						<!-- Quantity -->
						<div class="quantity-counter">
							<div class="js-quantity-counter row align-items-center">
								<div class="col">
									<span class="d-block small">Quota Maximal</span>
									<input class="js-result form-control form-control-quantity-counter" name="pendaftaran_max" type="text"
										value="<?= $pendaftaran_max;?>">
								</div>
								<!-- End Col -->

								<div class="col-auto">
									<a class="js-minus btn btn-outline-secondary btn-xs btn-icon rounded-circle"
										href="javascript:;">
										<svg width="8" height="2" viewBox="0 0 8 2" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z"
												fill="currentColor" />
										</svg>
									</a>
									<a class="js-plus btn btn-outline-secondary btn-xs btn-icon rounded-circle"
										href="javascript:;">
										<svg width="8" height="8" viewBox="0 0 8 8" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z"
												fill="currentColor" />
										</svg>
									</a>
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->
						</div>
						<!-- End Quantity -->
					</div>
					<div class="card-footer px-0">
						<button type="submit" class="btn btn-primary btn-sm float-end">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
