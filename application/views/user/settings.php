<div class="d-grid gap-3 gap-lg-5">
    <!-- Card -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-header-title">Password</h5>
        </div>

        <!-- Body -->
        <div class="card-body">
            <!-- Form -->
            <form action="<?= site_url('user/changePassword'); ?>" method="POST">
                <!-- Form -->
                <div class="row mb-4">
                    <label for="currentPasswordLabel" class="col-sm-3 col-form-label form-label">Current password</label>

                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="currentPassword" id="currentPasswordLabel" placeholder="Enter current password" aria-label="Enter current password" required>
                    </div>
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="row mb-4">
                    <label for="newPassword" class="col-sm-3 col-form-label form-label">New password</label>

                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="newPassword" id="newPassword" minlength="8" placeholder="Enter new password" aria-label="Enter new password" required>
                    </div>
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="row mb-4">
                    <label for="confirmNewPasswordLabel" class="col-sm-3 col-form-label form-label">Confirm new password</label>

                    <div class="col-sm-9">
                        <div class="mb-3">
                            <input type="password" class="form-control" name="confirmNewPassword" minlength="8" id="confirmNewPasswordLabel" placeholder="Confirm your new password" aria-label="Confirm your new password" required>
                        </div>

                        <h5>Password requirements:</h5>

                        <p class="card-text small">Ensure that these requirements are met:</p>

                        <ul class="small">
                            <li>Minimum 8 characters long - the more, the better</li>
                        </ul>
                    </div>
                </div>
                <!-- End Form -->

                <div class="d-flex justify-content-end gap-3">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
        <!-- End Body -->
    </div>
    <!-- End Card -->
</div>