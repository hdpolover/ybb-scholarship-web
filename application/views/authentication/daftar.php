    <!-- Form -->
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-5 col-xl-4 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-dark"
    			style="background-image: url(<?= base_url(); ?>assets/svg/components/wave-pattern-light.svg);">
    			<div class="flex-grow-1 p-5">
    				<!-- Blockquote -->
    				<figure class="text-center">
    					<div class="mb-4">
    						<img class="avatar avatar-xl avatar-4x3"
    							src="<?= base_url(); ?>assets/svg/brands/mailchimp-white.svg" alt="Logo">
    					</div>

    					<blockquote class="blockquote blockquote-light">“ It has many landing page variations to choose
    						from, which one is always a big advantage. ”</blockquote>
    				</figure>
    				<!-- End Blockquote -->
    			</div>
    		</div>
    		<!-- End Col -->

    		<div class="col-lg-7 col-xl-8 d-flex justify-content-center align-items-center min-vh-lg-100">
    			<div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
    				<!-- Heading -->
    				<div class="text-center mb-5 mb-md-7">
    					<h1 class="h2">Welcome to YBB Foundation Scholarship</h1>
    					<p>Fill out the form to get started.</p>
    				</div>
    				<!-- End Heading -->

    				<!-- Form -->
    				<form action="<?= site_url('authentication/proses_daftar'); ?>" method="POST"
    					class="js-validate needs-validation" autocomplete="on" novalidate>
    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupName">Your name</label>
    						<div class="input-group input-group-merge">
    							<div class="input-group-prepend input-group-text" id="inputGroupMergeName">
    								<i class="bi-person"></i>
    							</div>
    							<input type="text" class="form-control form-control-lg" name="name"
    								id="signupModalFormSignupName" placeholder="Jhon Doe" aria-label="Jhon Doe"
    								aria-describedby="inputGroupMergeName" required>
    							<span class="invalid-feedback">Please enter a valid name.</span>
    						</div>
    					</div>
    					<!-- End Form -->
    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupPhone">Your phone</label>
    						<div class="input-group mb-3">
    							<span class="input-group-text" id="basic-addon1">+62</span>
    							<input type="number" class="form-control form-control-lg" name="phone"
    								id="signupModalFormSignupPhone" placeholder="081000222345" aria-label="81000222345"
    								aria-describedby="basic-addon1" required>
    							<span class="invalid-feedback">Please enter a valid phone number.</span>
    						</div>
    					</div>
    					<!-- End Form -->

    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupEmail">Your email</label>
    						<div class="input-group input-group-merge">
    							<div class="input-group-prepend input-group-text" id="inputGroupMergeEmail">
    								<i class="bi-envelope-open"></i>
    							</div>
    							<input type="email" class="form-control form-control-lg" name="email"
    								id="signupModalFormSignupEmail" placeholder="email@site.com"
    								aria-label="email@site.com" aria-describedby="inputGroupMergeEmail" required>
    							<span class="invalid-feedback">Please enter a valid email address.</span>
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

    						<span class="invalid-feedback">Your password is invalid. Please try again.</span>
    					</div>
    					<!-- End Form -->

    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupConfirmPassword">Confirm
    							password</label>

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

    						<span class="invalid-feedback">Password does not match the confirm password.</span>
    					</div>
    					<!-- End Form -->

    					<div class="d-grid mb-3">
    						<button type="submit" class="btn btn-primary btn-lg">Sign up</button>
    					</div>

    					<div class="text-center">
    						<p>Already have an account? <a class="link" href="<?= site_url('login'); ?>">Log in here</a>
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
