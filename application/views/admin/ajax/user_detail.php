<!-- Media -->
<div class="d-sm-flex">
	<div class="flex-shrink-0 mb-3 mb-sm-0">
		<img class="avatar avatar-xl avatar-circle"
			src="<?= $user->picture == null ? 'https://i.stack.imgur.com/ZQT8Z.png' : base_url() . '/' . $user->picture; ?>"
			alt="<?= $user->name; ?>">
	</div>

	<div class="flex-grow-1 ms-sm-4">
		<!-- Media -->
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h3 class="mb-0">
				<a class="text-dark"><?= $user->name; ?></a>
			</h3>
		</div>
		<!-- End Media -->

		<p>-</p>
	</div>
</div>
<!-- End Media -->
<br>
<!-- List Striped -->
<ul class="list-group list-group-lg">
	<li class="list-group-item">
		<div class="row">
			<div class="col-sm-4 mb-2 mb-sm-0">
				<span class="h6">Email</span>
			</div>
			<!-- End Col -->

			<div class="col-sm-8 mb-2 mb-sm-0">
				<span><a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a></span>
			</div>
			<!-- End Col -->
		</div>
		<!-- End Row -->
	</li>
	<li class="list-group-item">
		<div class="row">
			<div class="col-sm-4 mb-2 mb-sm-0">
				<span class="h6">Gender</span>
			</div>
			<!-- End Col -->

			<div class="col-sm-8 mb-2 mb-sm-0">
				<span><?= $user->gender == 'male' ? '<i class="bi bi-gender-male"></i>' : ($user->gender == 'female' ? '<i class="bi bi-gender-male"></i>' : '<i class="bi bi-question"></i>'); ?>
					<?= $user->gender; ?></span>
			</div>
			<!-- End Col -->
		</div>
		<!-- End Row -->
	</li>
</ul>
<!-- End List Striped -->
