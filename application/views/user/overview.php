          <div class="d-grid gap-3 gap-lg-5">
          	<!-- Card -->
          	<div class="card">
          		<form action="<?= site_url('user/updateProfile'); ?>" method="POST" enctype="multipart/form-data">
          			<div class="card-header border-bottom">
          				<h4 class="card-header-title">Informasi pribadi</h4>
          			</div>

          			<!-- Body -->
          			<div class="card-body">
          				<?php if ($scholarship['status'] == false && ($pendaftaran_buka == 1 || $pendaftaran_max >= $applicant_lolos)):?>
          				<!-- CTA -->
          				<div class="card card-sm overflow-hidden mb-5">
          					<!-- Card -->
          					<div class="card-body">
          						<div
          							class="row justify-content-md-start align-items-md-center text-center text-md-start">
          							<div class="col-md offset-md-3 mb-3 mb-md-0">
          								<h4 class="card-title"><?= $scholarship['message'];?>!</h4>
          							</div>

          							<div class="col-md-auto">
          								<a class="btn btn-primary btn-transition"
          									href="<?= site_url('scholarship');?>">Daftar sekarang</a>
          							</div>
          						</div>

          						<!-- SVG Shape -->
          						<figure class="w-25 d-none d-md-block position-absolute top-0 start-0 mt-n2">
          							<svg viewBox="0 0 451 902" fill="none" xmlns="http://www.w3.org/2000/svg">
          								<path opacity="0.125"
          									d="M0 82C203.8 82 369 247.2 369 451C369 654.8 203.8 820 0 820"
          									stroke="url(#paint2_linear)" stroke-width="164" stroke-miterlimit="10" />
          								<defs>
          									<linearGradient id="paint2_linear" x1="323.205" y1="785.242" x2="-97.6164"
          										y2="56.3589" gradientUnits="userSpaceOnUse">
          										<stop offset="0" stop-color="white" stop-opacity="0" />
          										<stop offset="1" stop-color="#377dff" />
          									</linearGradient>
          								</defs>
          							</svg>
          						</figure>
          						<!-- End SVG Shape -->
          					</div>
          					<!-- End Card -->
          				</div>
          				<!-- End CTA -->
          				<hr class="mb-4">
          				<?php endif;?>
          				<?php if ($scholarship['status'] != false):?>
          				<div class="alert alert-soft-<?= $scholarship['alert'];?>" role="alert">
          					<?= $scholarship['message'];?>
          				</div>
          				<hr class="mb-4">
          				<?php endif;?>
          				<?php if ($pendaftaran_buka == 0 || $pendaftaran_max >= $applicant_lolos && $scholarship['status'] == false):?>
          				<div class="alert alert-soft-warning" role="alert">
          					Mohon maaf, pendaftaran beasiswa telah ditutup !
          				</div>
          				<hr class="mb-4">
          				<?php endif;?>
          				<!-- Form -->
          				<div class="row mb-4">
          					<label class="col-sm-3 col-form-label form-label">Foto profil</label>

          					<div class="col-sm-9">
          						<!-- Media -->
          						<div class="d-flex align-items-center">
          							<!-- Avatar -->
          							<label class="avatar avatar-xl avatar-circle" for="avatarUploader">
          								<img id="avatarImg" class="avatar-img"
          									src="<?= $user->picture == null ? 'https://i.stack.imgur.com/ZQT8Z.png' : base_url().'/' . $user->picture; ?>"
          									alt="<?= $user->name; ?>">
          							</label>

          							<div class="d-grid d-sm-flex gap-2 ms-4">
          								<div class="form-attachment-btn btn btn-primary btn-sm">Unggah foto
          									<input type="file" class="js-file-attach form-attachment-btn-label"
          										name="image" id="avatarUploader" data-hs-file-attach-options='{
                                      "textTarget": "#avatarImg",
                                      "mode": "image",
                                      "targetAttr": "src",
                                      "resetTarget": ".js-file-attach-reset-img",
                                      "resetImg": "https://i.stack.imgur.com/ZQT8Z.png",
                                      "allowTypes": [".png", ".jpeg", ".jpg"]
                                   }'>
          								</div>
          								<!-- End Avatar -->

          								<a href="<?= site_url('user/resetPicture');?>"
          									class="js-file-attach-reset-img btn btn-white btn-sm">Reset</a>
          							</div>
          						</div>
          						<!-- End Media -->
          					</div>
          				</div>
          				<!-- End Form -->

          				<!-- Form -->
          				<div class="row mb-4">
          					<label for="nameLabel" class="col-sm-3 col-form-label form-label">Nama lengkap <i
          							class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip"
          							data-bs-placement="top"
          							title="Displayed on public forums, such as Front."></i></label>

          					<div class="col-sm-9">
          						<input type="text" class="form-control form-control-sm" name="name" id="nameLabel"
          							placeholder="<?= $user->name; ?>" aria-label="Clarice" value="<?= $user->name; ?>"
          							required>
          					</div>
          				</div>
          				<!-- End Form -->

          				<!-- Form -->
          				<div class="row mb-4">
          					<label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

          					<div class="col-sm-9">
          						<input type="email" class="form-control form-control-sm" name="email" id="emailLabel"
          							placeholder="clarice@example.com" aria-label="<?= $user->email; ?>"
          							value="<?= $user->email; ?>" required>
          					</div>
          				</div>
          				<!-- End Form -->

          				<!-- Form -->
          				<div class="row mb-4">
          					<label for="phoneLabel" class="col-sm-3 col-form-label form-label">No. Telepon <span
          							class="form-label-secondary">(Optional)</span></label>

          					<div class="col-sm-9">
          						<div class="input-group mb-3">
          							<span class="input-group-text" id="basic-addon1">+62</span>
          							<input type="number" class="form-control form-control-lg" name="phone"
          								id="signupModalFormSignupPhone" value="<?= $user->phone; ?>"
          								aria-label="<?= $user->phone; ?>" aria-describedby="basic-addon1">
          						</div>
          					</div>
          				</div>
          				<!-- End Form -->

          				<!-- Form -->
          				<div class="row mb-4">
          					<label class="col-sm-3 col-form-label form-label">Jenis kelamin</label>

          					<div class="col-sm-9">
          						<div class="input-group input-group-md-down-break">
          							<!-- Radio Check -->
          							<label class="form-control form-control-sm" for="male">
          								<span class="form-check">
          									<input type="radio" class="form-check-input" name="gender" id="male"
          										value="male" <?= $user->gender == 'male' ? 'checked' : ''; ?>>
          									<span class="form-check-label">Laki laki</span>
          								</span>
          							</label>
          							<!-- End Radio Check -->

          							<!-- Radio Check -->
          							<label class="form-control form-control-sm" for="female">
          								<span class="form-check">
          									<input type="radio" class="form-check-input" name="gender" id="female"
          										value="female" <?= $user->gender == 'female' ? 'checked' : ''; ?>>
          									<span class="form-check-label">Perempuan</span>
          								</span>
          							</label>
          							<!-- End Radio Check -->

          							<!-- Radio Check -->
          							<label class="form-control form-control-sm" for="other">
          								<span class="form-check">
          									<input type="radio" class="form-check-input" name="gender" id="other"
          										value="other"
          										<?= $user->gender == null || $user->gender == 'other' ? 'checked' : ''; ?>>
          									<span class="form-check-label">Tidak mengatakan</span>
          								</span>
          							</label>
          							<!-- End Radio Check -->
          						</div>
          					</div>
          				</div>
          				<!-- End Form -->
          			</div>
          			<!-- End Body -->

          			<!-- Footer -->
          			<div class="card-footer pt-0">
          				<div class="d-flex justify-content-end gap-3">
          					<button type="submit" class="btn btn-primary">Simpan perubahan</button>
          				</div>
          			</div>
          			<!-- End Footer -->
          		</form>
          	</div>
          	<!-- End Card -->

          	<!-- Card -->
          	<div class="card d-none">
          		<div class="card-header border-bottom">
          			<h4 class="card-header-title">Delete your account</h4>
          		</div>

          		<!-- Body -->
          		<div class="card-body">
          			<p class="card-text">When you delete your account, you lose access to Front account services, and
          				we permanently delete your personal data. You can cancel the deletion for 14 days.</p>

          			<div class="mb-4">
          				<!-- Check -->
          				<div class="form-check">
          					<input type="checkbox" class="form-check-input" id="deleteAccountCheckbox">
          					<label class="form-check-label" for="deleteAccountCheckbox">Confirm that I want to delete
          						my account.</label>
          				</div>
          				<!-- End Check -->
          			</div>

          			<div class="d-flex justify-content-end">
          				<button type="submit" class="btn btn-danger">Delete</button>
          			</div>
          		</div>
          		<!-- End Body -->
          	</div>
          	<!-- End Card -->
          </div>
