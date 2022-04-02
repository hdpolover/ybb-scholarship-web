    <!-- Form -->
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-12 col-xl-12 d-flex justify-content-center align-items-center min-vh-lg-100">
    			<div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
    				<!-- Heading -->
    				<div class="text-center mb-5 mb-md-7">
    					<h1 class="h2">Reset your password</h1>
    					<p>Enter your new password for your account</p>
    				</div>
    				<!-- End Heading -->

    				<!-- Form -->
    				<form action="<?= site_url('authentication/proses_resetPassword'); ?>" method="post"
    					class="js-validate needs-validation" novalidate>
    					<!-- Form -->
    					<div class="mb-3">
    						<label class="form-label" for="signupModalFormSignupEmail">Your email</label>
    						<div class="input-group input-group-merge">
    							<div class="input-group-prepend input-group-text" id="inputGroupMergeEmail">
    								<i class="bi-envelope-open"></i>
    							</div>
    							<input type="email" class="form-control form-control-lg" name="email"
    								id="signupModalFormSignupEmail" value="<?= $email; ?>" aria-label="<?= $email; ?>"
    								aria-describedby="inputGroupMergeEmail" required readonly>
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
    								name="confirmPassword" id="signupModalFormSignupConfirmPassword" minlength="8"
    								placeholder="8+ characters required" aria-label="8+ characters required" required
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
    						<button type="submit" class="btn btn-primary btn-lg">Reset password</button>
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
