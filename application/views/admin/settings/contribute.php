<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for contribute page</h1>
			<p class="docs-page-header-text">Manage contribute page contents.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Contribute page content
					<a class="btn btn-ghost-secondary btn-sm float-end" href="<?= site_url('contribute'); ?>" target="_blank">
						Preview <i class="bi-box-arrow-up-right ms-1"></i>
					</a>
				</h4>
			</div>
			<div class="card-body">
				<form action="<?= site_url('admin/changeContribute');?>" method="post" class="js-validate needs-validation" novalidate>
					<div class="mb-3">
						<label class="form-label" for="inputContributeDescription">Contribute description <small
								class="text-danger">*</small></label>
						<textarea type="text" id="inputContributeDescription" class="form-control editor" rows="4"
							name="contribute_desc" placeholder="Contribute description"
							required><?= $contribute_desc;?></textarea>
					</div>
					<div class="mb-3">
						<label for="inputContributeAnRekening" class="form-label">Contribute An. Rekening <small
								class="text-danger">*</small></label>
						<input type="text" id="inputContributeAnRekening" class="form-control form-control-sm"
							name="contribute_an_rekening" value="<?= $contribute_an_rekening;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputContributeRekening" class="form-label">Contribute No. Rekening <small
								class="text-danger">*</small></label>
						<input type="text" id="inputContributeRekening" class="form-control form-control-sm" name="contribute_rekening"
							value="<?= $contribute_rekening;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputContributeWhatsapp" class="form-label">Contribute Whatsapp <small
								class="text-danger">*</small></label>
						<input type="text" id="inputContributeWhatsapp" class="form-control form-control-sm" name="contribute_whatsapp"
							value="<?= $contribute_whatsapp;?>" required>
					</div>
                    <div class="card-footer px-0">
                        <button type="submit" class="btn btn-primary float-end">Save changes</button>
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
