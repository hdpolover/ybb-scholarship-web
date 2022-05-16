    <!-- Form -->
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark"
    			style="background-image: url(<?= base_url(); ?>assets/svg/components/wave-pattern-light.svg);">
    			<div class="flex-grow-1 p-5">
    				<!-- Blockquote -->
    				<figure class="text-center">
    					<div class="mb-4">
    						<img class="avatar avatar-xxl avatar-4x3"
    							src="<?= base_url(); ?>assets/images/<?= $web_logo_white;?>" alt="Logo">
    					</div>

    					<blockquote class="blockquote blockquote-light">“ Ayo bergabung bersama kami di YBB Scholarship Programs dan dapatkan berbagai keuntungan untukmu. ”</blockquote>
    				</figure>
    				<!-- End Blockquote -->
    			</div>
    		</div>
    		<!-- End Col -->

    		<div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
    			<div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
    				<!-- Heading -->
    				<div class="text-center mb-5 mb-md-7">
    					<h1 class="h2">Selamat datang di YBB Foundation Scholarship</h1>
    					<p>Isi data dirimu dengan benar.</p>
    				</div>
    				<!-- End Heading -->

    				<!-- Form -->
    				<form action="<?= site_url('authentication/proses_daftar'); ?>" method="POST"
    					class="js-validate needs-validation" autocomplete="on" novalidate>
    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupName">Nama lengkap</label>
    						<div class="input-group input-group-merge">
    							<div class="input-group-prepend input-group-text" id="inputGroupMergeName">
    								<i class="bi-person"></i>
    							</div>
    							<input type="text" class="form-control form-control-lg" name="name"
    								id="signupModalFormSignupName" placeholder="Jhon Doe" aria-label="Jhon Doe"
    								aria-describedby="inputGroupMergeName" required>
    							<span class="invalid-feedback">Mohon masukkan nama dengan benar.</span>
    						</div>
    					</div>
    					<!-- End Form -->
    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupPhone">Nomor telepon</label>
    						<div class="input-group mb-3">
    							<span class="input-group-text" id="basic-addon1">+62</span>
    							<input type="number" class="form-control form-control-lg" name="phone"
    								id="signupModalFormSignupPhone" placeholder="081000222345" aria-label="81000222345"
    								aria-describedby="basic-addon1" required>
    							<span class="invalid-feedback">Mohon masukkan nomor telepon dengan benar.</span>
    						</div>
    					</div>
    					<!-- End Form -->

    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupEmail">Emailmu</label>
    						<div class="input-group input-group-merge">
    							<div class="input-group-prepend input-group-text" id="inputGroupMergeEmail">
    								<i class="bi-envelope-open"></i>
    							</div>
    							<input type="email" class="form-control form-control-lg" name="email"
    								id="signupModalFormSignupEmail" placeholder="email@site.com"
    								aria-label="email@site.com" aria-describedby="inputGroupMergeEmail" required>
    							<span class="invalid-feedback">Mohon masukkan email dengan benar.</span>
    						</div>
    					</div>
    					<!-- End Form -->

    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupPassword">Password</label>

    						<div class="input-group input-group-merge" data-hs-validation-validate-class>
    							<div class="input-group-prepend input-group-text">
    								<i class="bi-key"></i>
    							</div>
    							<input type="password" class="js-toggle-password form-control form-control-lg"
    								name="password" autocomplete="off" id="signupModalFormSignupPassword" minlength="8"
    								placeholder="8+ characters required" aria-label="8+ characters required" required
    								data-hs-toggle-password-options='{
                             "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                             "defaultClass": "bi-eye-slash",
                             "showClass": "bi-eye",
                             "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                           }'>
    							<a class="js-toggle-password-target-1 input-group-append input-group-text"
    								href="javascript:;">
    								<i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
    							</a>
    						</div>

    						<span class="invalid-feedback">Password tidak valid.</span>
    					</div>
    					<!-- End Form -->

    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupConfirmPassword">Konfirmasi password</label>

    						<div class="input-group input-group-merge" data-hs-validation-validate-class>
    							<div class="input-group-prepend input-group-text">
    								<i class="bi-key"></i>
    							</div>
    							<input type="password" class="js-toggle-password form-control form-control-lg"
    								name="confirmPassword" id="signupModalFormSignupConfirmPassword"
    								placeholder="8+ characters required" minlength="8"
    								aria-label="8+ characters required" required
    								data-hs-validation-equal-field="#signupModalFormSignupPassword"
    								data-hs-toggle-password-options='{
                           "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                           "defaultClass": "bi-eye-slash",
                           "showClass": "bi-eye",
                           "classChangeTarget": ".js-toggle-passowrd-show-icon-2"
                         }'>
    							<a class="js-toggle-password-target-2 input-group-append input-group-text"
    								href="javascript:;">
    								<i class="js-toggle-passowrd-show-icon-2 bi-eye"></i>
    							</a>
    						</div>

    						<span class="invalid-feedback">Password tidak sesuai.</span>
    					</div>
    					<!-- End Form -->

    					<div class="d-grid mb-3">
    						<button type="submit" class="btn btn-primary btn-lg">Daftar</button>
    					</div>

    					<div class="text-center">
    						<p>Sudah punya akun? <a class="link" href="<?= site_url('login'); ?>">masuk disini</a>
    						</p>
    					</div>
    				</form>
    				<!-- End Form -->
    			</div>
    		</div>
    		<!-- End Col -->
    	</div>
    	<!-- End Row -->
    </div>
    <!-- End Form -->

    <script>
    	$(document).ready(function () {
    		$("#signupModalFormSignupName").keydown(function (event) {
    			var inputValue = event.which;
    			// allow letters and whitespaces only.
    			if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 &&
    					inputValue != 8 && inputValue != 37 && inputValue != 39)) {
    				event.preventDefault();
    			}
    		});
    	});

    	$("#signupModalFormSignupPhone").keyup(function () {
    		var value = $(this).val();
    		value = value.replace(/^(0*)/, "");
    		$(this).val(value);
    	});

    	// Restricts input for the given textbox to the given inputFilter.
    	function setInputFilter(textbox, inputFilter) {
    		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (
    		event) {
    			textbox.addEventListener(event, function () {
    				if (inputFilter(this.value)) {
    					this.oldValue = this.value;
    					this.oldSelectionStart = this.selectionStart;
    					this.oldSelectionEnd = this.selectionEnd;
    				} else if (this.hasOwnProperty("oldValue")) {
    					this.value = this.oldValue;
    					this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
    				} else {
    					this.value = "";
    				}
    			});
    		});
    	}

    	// Install input filters Tambah Hp Pegawai.
    	setInputFilter(document.getElementById("signupModalFormSignupPhone"), function (value) {
    		return /^\d*$/.test(value);
    	});

    </script>
