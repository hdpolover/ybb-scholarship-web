<form action="<?= site_url('admin/editAnnouncement');?>" method="post">
	<input type="hidden" name="id" value="<?= $item->id;?>">

	<div class="mb-3">
		<label for="inputSubject" class="input-label">Subject <small class="text-danger">*</small></label>
		<input class="form-control" type="text" name="subject" value="<?= $item->subject;?>" required>
	</div>

	<div class="mb-3">
		<div class="d-grid gap-3">
			<!-- Check -->
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="for_public" id="publicType-<?= $item->id;?>" value="public"
					<?= $item->for_public == 'public' ? 'checked' : '';?>>
				<label class="form-check-label text-dark" for="publicType-<?= $item->id;?>">
					<b>Public</b>
					<span class="d-block text-muted small">This will display on
						landing page</span>
				</label>
			</div>
			<!-- End Check -->

			<!-- Check -->
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="for_users" id="usersType-<?= $item->id;?>" value="users"
					<?= $item->for_users == 'users' ? 'checked' : '';?>>
				<label class="form-check-label text-dark" for="usersType-<?= $item->id;?>">
					<b>All users</b>
					<span class="d-block text-muted small">This will display on
						every users account</span>
				</label>
			</div>
			<!-- End Check -->

			<!-- Check -->
			<div class="form-check">
				<input class="form-check-input" type="checkbox" name="for_members" id="membersType-<?= $item->id;?>" value="members"
					<?= $item->for_members == 'members' ? 'checked' : '';?>>
				<label class="form-check-label text-dark" for="membersType-<?= $item->id;?>">
					<b>Scholarship members</b>
					<span class="d-block text-muted small">This will display on
						scholarship members account</span>
				</label>
			</div>
			<!-- End Check -->
		</div>
	</div>

	<div class="mb-3">
		<label for="inputContent" class="input-label">Content <small class="text-danger">*</small></label>
		<textarea class="form-control editor" id="ckeditor-<?= $item->id;?>" name="content" rows="5" value="Insert annoucement content"
			required><?= $item->content;?></textarea>
	</div>

	<div class="modal-footer px-0 pb-0">
		<button type="button" class="btn btn-white btn-sm" data-bs-dismiss="modal">Cancel</button>
		<?php if($item->notification == 1):?>
		<button type="submit" class="btn btn-success btn-sm">Resend</button>
		<button type="submit" class="btn btn-warning btn-sm">Save &
			Resend</button>
		<?php endif;?>
		<button type="submit" class="btn btn-info btn-sm">Save</button>
	</div>
</form>

<script>
	//  ckeditor
    $( 'textarea.editor').each( function() {

        CKEDITOR.replace( $(this).attr('id') );

    });

</script>