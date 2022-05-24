<!-- Page Header -->
<div class="docs-page-header">
	<div class="row align-items-center">
		<div class="col-sm">
			<h1 class="docs-page-header-title">Mailer Settings for Mailer information</h1>
			<p class="docs-page-header-text">Manage Mailer information.</p>
		</div>
	</div>
</div>
<!-- End Page Header -->

<div class="row">
	<div class="col-md-7">
		<div class="card">
			<div class="card-body">
				<form action="<?= site_url('admin/changeMailerInfo');?>" method="post"
					class="js-validate needs-validation" novalidate enctype="multipart/form-data">
					<?php if($this->session->userdata('role') == 0):?>
					<div class="mb-3">
						<label for="inputMailerMode" class="form-label">Mailer Mode <small
								class="text-danger">*</small></label>
						<input type="number" id="inputMailerMode" class="form-control form-control-sm"
							name="mailer_mode" value="<?= $mailer_mode;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputMailerHost" class="form-label">Mailer Host<small
								class="text-danger">*</small></label>
						<input type="text" id="inputMailerHost" class="form-control form-control-sm" name="mailer_host"
							value="<?= $mailer_host;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputMailerPort" class="form-label">Mailer Port<small
								class="text-danger">*</small></label>
						<input type="text" id="inputMailerPort" class="form-control form-control-sm" name="mailer_port"
							value="<?= $mailer_port;?>" required>
					</div>
					<?php endif;?>
					<div class="mb-3">
						<label for="inputMailerAlias" class="form-label">Mailer Alias<small
								class="text-danger">*</small></label>
						<input type="text" id="inputMailerAlias" class="form-control form-control-sm"
							name="mailer_alias" value="<?= $mailer_alias;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputMailerUsername" class="form-label">Mailer Username<small
								class="text-danger">*</small></label>
						<input type="mail" id="inputMailerUsername" class="form-control form-control-sm"
							name="mailer_username" value="<?= $mailer_username;?>" required>
					</div>
					<div class="mb-3">
						<label for="inputMailerPassword" class="form-label">Mailer Password<small
								class="text-danger">*</small></label>
						<input type="password" id="inputMailerPassword" class="form-control form-control-sm"
							name="mailer_password" value="<?= $mailer_password;?>" required>
					</div>
					<div class="card-footer px-0">
						<button type="submit" class="btn btn-primary float-end">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card card-body">
			<h4>Test Mailler Config</h4>
			<form action="<?= site_url('admin/testMailer');?>" method="post" class="js-validate needs-validation" novalidate>
				<div class="mb-3">
					<label for="inputEmailTestingMailer">Input an email for testing <small
							class="text-danger">*</small></label>
					<input type="mail" class="form-control form-control-sm" name="email" placeholder="Input Email"
						required>
				</div>
                <button type="submit" class="btn btn-primary float-end">Test Config</button>
			</form>
		</div>
	</div>
</div>


<script>
	//  ckeditor
	$('textarea.editor').each(function () {

		CKEDITOR.replace($(this).attr('id'));

	});

</script>
