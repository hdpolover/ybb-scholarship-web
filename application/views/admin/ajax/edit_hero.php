<form action="<?= site_url('admin/editHomeHero');?>" method="post" enctype="multipart/form-data"
	class="js-validate need-validate" novalidate>
	<input type="hidden" name="id" value="<?= $hero->id;?>">

	<div class="mb-3">
		<label for="inputBackground" class="input-label">Background
			<small class="text-danger">*</small></label>
		<input class="form-control form-control-sm" type="file" id="inputBackground" name="image" value=""
			accept="image/*">
		<input type="hidden" name="old_image" value="<?= $hero->picture;?>">
	</div>

	<div class="mb-3">
		<label for="inputTitle" class="input-label">Title <small class="text-danger">*</small></label>
		<input class="form-control form-control-sm" type="text" id="inputTitle" name="title" value="<?= $hero->value;?>"
			required>
	</div>

	<div class="mb-4">
		<label for="inputSubTitle" class="input-label">Sub Title
			<small class="text-secondary">(optional)</small></label>
		<input class="form-control form-control-sm" type="text" id="inputSubTitle" name="sub_title"
			value="<?= $hero->desc;?>">
	</div>

	<div class="mb-3">
		<div class="row mb-3">
			<div class="col-4">
				<!-- Checkbox Switch -->
				<div class="form-check form-switch">
					<input type="checkbox" class="form-check-input" name="button" id="inputButton-<?= $hero->id;?>"
						<?= $hero->button == 1 ? 'checked' : '';?>>
					<label class="form-check-label" for="inputButton">Hero Button <small
							class="text-secondary">(optional)</small></label>
				</div>
				<!-- End Checkbox Switch -->
			</div>
		</div>
		<div class="row <?= $hero->button == 1 ? '' : 'd-none';?>" id="buttonDetails-<?= $hero->id;?>">
			<div class="col-3 mb-3">
				<label for="inputButtonColor" class="input-label">Button Color <small
						class="text-danger">*</small></label>
				<input class="form-control form-control-sm" type="color" name="button_color"
					id="inputButtonColor-<?= $hero->id;?>" value="<?= $hero->button_color;?>">
			</div>
			<div class="col-3 mb-3">
				<label for="inputButtonTextColor" class="input-label">Text Color <small
						class="text-danger">*</small></label>
				<input class="form-control form-control-sm" type="color" name="button_text_color"
					id="inputButtonTextColor-<?= $hero->id;?>" value="<?= $hero->button_text_color;?>">
			</div>
			<div class="col-6 mb-3">
				<label for="inputButtonText" class="input-label">Button Text <small
						class="text-danger">*</small></label>
				<input class="form-control form-control-sm" type="text" name="button_text"
					id="inputButtonText-<?= $hero->id;?>" value="<?= $hero->button_text;?>">
			</div>
			<div class="col-12 mb-3">
				<label for="inputButtonLink" class="input-label">Button Link <small
						class="text-danger">*</small></label>
				<input class="form-control form-control-sm" type="link" name="button_link"
					id="inputButtonLink-<?= $hero->id;?>" value="<?= $hero->button_link;?>">
			</div>
		</div>
	</div>

	<div class="mb-3">
		<div class="row mb-3">
			<div class="col-4">
				<!-- Checkbox Switch -->
				<div class="form-check form-switch">
					<input type="checkbox" class="form-check-input" name="icon" id="iconButton-<?= $hero->id;?>"
						<?= $hero->hero_icon == 1 ? 'checked' : '';?>>
					<label class="form-check-label" for="iconButton">Hero Icon <small
							class="text-secondary">(optional)</small></label>
				</div>
				<!-- End Checkbox Switch -->
			</div>
		</div>
		<div class="row <?= $hero->hero_icon == 1 ? '' : 'd-none';?>" id="inputIcons-<?= $hero->id;?>">
			<div class="col-12 mb-3">
				<label for="inputButtonLink" class="input-label">Upload icon <small
						class="text-danger">*</small></label>
				<input class="form-control form-control-sm" type="file" name="icon" id="inputIcon-<?= $hero->id;?>"
					value="<?= $hero->icon;?>">
			</div>
		</div>
	</div>

	<div class="modal-footer px-0 pb-0">
		<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
		<a href="<?= site_url('admin/deleteHomeHero/'.$hero->id);?>" class="btn btn-danger btn-sm">Delete</a>
		<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
	</div>
</form>


<script>
	$("#inputButton-<?= $hero->id;?>").change(function () {
		if (this.checked) {
			$("#buttonDetails-<?= $hero->id;?>").removeClass('d-none');
			$("#inputButtonText-<?= $hero->id;?>").prop('required', true);
			$("#inputButtonColor-<?= $hero->id;?>").prop('required', true);
			$("#inputButtonTextColor-<?= $hero->id;?>").prop('required', true);
			$("#inputButtonLink-<?= $hero->id;?>").prop('required', true);
		} else {
			$("#buttonDetails-<?= $hero->id;?>").addClass('d-none');
			$("#inputButtonText-<?= $hero->id;?>").prop('required', false);
			$("#inputButtonColor-<?= $hero->id;?>").prop('required', false);
			$("#inputButtonTextColor-<?= $hero->id;?>").prop('required', false);
			$("#inputButtonLink-<?= $hero->id;?>").prop('required', false);
		}
	});

	$("#iconButton-<?= $hero->id;?>").change(function () {
		if (this.checked) {
			$("#inputIcons-<?= $hero->id;?>").removeClass('d-none');
			$("#inputIcon-<?= $hero->id;?>").prop('required', true);
		} else {
			$("#inputIcons-<?= $hero->id;?>").addClass('d-none');
			$("#inputIcon-<?= $hero->id;?>").prop('required', false);
		}
	});

</script>
