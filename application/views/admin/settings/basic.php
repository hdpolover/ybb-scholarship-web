<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Website Settings for basic information</h1>
			<p class="docs-page-header-text">Manage basic information.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<form action="<?= site_url('admin/changeBasicInfo');?>" method="post"
					class="js-validate needs-validation" novalidate enctype="multipart/form-data">
					<div class="mb-3">
						<label for="inputWebsiteTitle" class="form-label">Website Title <small
								class="text-danger">*</small></label>
						<input type="text" id="inputWebsiteTitle" class="form-control form-control-sm"
							name="web_title" value="<?= $web_title;?>" required>
					</div>
					<div class="mb-3">
						<label class="form-label" for="inputWebDesc">Website Description <small
								class="text-danger">*</small></label>
						<textarea type="text" id="inputWebDesc" class="form-control editor" rows="4" name="web_desc"
							placeholder="Website Description" required><?= $web_desc;?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label" for="inputWebsiteAddress">Website Address <small
								class="text-danger">*</small></label>
						<textarea type="text" id="inputWebsiteAddress" class="form-control" rows="3" name="web_address"
							placeholder="Website Address" required><?= $web_address;?></textarea>
					</div>
					<div class="mb-3">
						<label for="inputWebsiteWhatsapp" class="form-label">Website Whatsapp<small
								class="text-danger">*</small></label>
						<input type="text" id="inputWebsiteWhatsapp" class="form-control form-control-sm"
							name="web_whatsapp" value="<?= $web_whatsapp;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputWebsiteFacebook" class="form-label">Website Facebook<small
								class="text-danger">*</small></label>
						<input type="text" id="inputWebsiteFacebook" class="form-control form-control-sm"
							name="web_facebook" value="<?= $web_facebook;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputWebsiteInstagram" class="form-label">Website Instagram<small
								class="text-danger">*</small></label>
						<input type="text" id="inputWebsiteInstagram" class="form-control form-control-sm"
							name="web_instagram" value="<?= $web_instagram;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputWebsiteTwitter" class="form-label">Website Twitter<small
								class="text-danger">*</small></label>
						<input type="text" id="inputWebsiteTwitter" class="form-control form-control-sm"
							name="web_twitter" value="<?= $web_twitter;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputWebsiteYoutube" class="form-label">Website Youtube<small
								class="text-danger">*</small></label>
						<input type="text" id="inputWebsiteYoutube" class="form-control form-control-sm"
							name="web_youtube" value="<?= $web_youtube;?>" required>
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
