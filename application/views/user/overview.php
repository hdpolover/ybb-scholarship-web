          <div class="d-grid gap-3 gap-lg-5">
              <!-- Card -->
              <div class="card">
                  <form action="<?= site_url('user/updateProfile'); ?>" method="POST" enctype="multipart/form-data">
                      <div class="card-header border-bottom">
                          <h4 class="card-header-title">Basic info</h4>
                      </div>

                      <!-- Body -->
                      <div class="card-body">
                          <!-- Form -->
                          <div class="row mb-4">
                              <label class="col-sm-3 col-form-label form-label">Profile photo</label>

                              <div class="col-sm-9">
                                  <!-- Media -->
                                  <div class="d-flex align-items-center">
                                      <!-- Avatar -->
                                      <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                          <img id="avatarImg" class="avatar-img" src="<?= $user->picture == null ? 'https://i.stack.imgur.com/ZQT8Z.png' : base_url().'/' . $user->picture; ?>" alt="<?= $user->name; ?>">
                                      </label>

                                      <div class="d-grid d-sm-flex gap-2 ms-4">
                                          <div class="form-attachment-btn btn btn-primary btn-sm">Upload photo
                                              <input type="file" class="js-file-attach form-attachment-btn-label" name="image" id="avatarUploader" data-hs-file-attach-options='{
                                      "textTarget": "#avatarImg",
                                      "mode": "image",
                                      "targetAttr": "src",
                                      "resetTarget": ".js-file-attach-reset-img",
                                      "resetImg": "https://i.stack.imgur.com/ZQT8Z.png",
                                      "allowTypes": [".png", ".jpeg", ".jpg"]
                                   }'>
                                          </div>
                                          <!-- End Avatar -->

                                          <a href="<?= site_url('user/resetPicture');?>" class="js-file-attach-reset-img btn btn-white btn-sm">Reset</a>
                                      </div>
                                  </div>
                                  <!-- End Media -->
                              </div>
                          </div>
                          <!-- End Form -->

                          <!-- Form -->
                          <div class="row mb-4">
                              <label for="nameLabel" class="col-sm-3 col-form-label form-label">Full name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" id="nameLabel" placeholder="<?= $user->name; ?>" aria-label="Clarice" value="<?= $user->name; ?>" required>
                              </div>
                          </div>
                          <!-- End Form -->

                          <!-- Form -->
                          <div class="row mb-4">
                              <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                              <div class="col-sm-9">
                                  <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="<?= $user->email; ?>" value="<?= $user->email; ?>" required>
                              </div>
                          </div>
                          <!-- End Form -->

                          <!-- Form -->
                          <div class="row mb-4">
                              <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone <span class="form-label-secondary">(Optional)</span></label>

                              <div class="col-sm-9">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1">+62</span>
                                      <input type="number" class="form-control form-control-lg" name="phone" id="signupModalFormSignupPhone" value="<?= $user->phone; ?>" aria-label="<?= $user->phone; ?>" aria-describedby="basic-addon1">
                                  </div>
                              </div>
                          </div>
                          <!-- End Form -->

                          <!-- Form -->
                          <div class="row mb-4">
                              <label class="col-sm-3 col-form-label form-label">Gender</label>

                              <div class="col-sm-9">
                                  <div class="input-group input-group-md-down-break">
                                      <!-- Radio Check -->
                                      <label class="form-control" for="male">
                                          <span class="form-check">
                                              <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?= $user->gender == 'male' ? 'checked' : ''; ?>>
                                              <span class="form-check-label">Male</span>
                                          </span>
                                      </label>
                                      <!-- End Radio Check -->

                                      <!-- Radio Check -->
                                      <label class="form-control" for="female">
                                          <span class="form-check">
                                              <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?= $user->gender == 'female' ? 'checked' : ''; ?>>
                                              <span class="form-check-label">Female</span>
                                          </span>
                                      </label>
                                      <!-- End Radio Check -->

                                      <!-- Radio Check -->
                                      <label class="form-control" for="other">
                                          <span class="form-check">
                                              <input type="radio" class="form-check-input" name="gender" id="other" value="other" <?= $user->gender == null || $user->gender == 'other' ? 'checked' : ''; ?>>
                                              <span class="form-check-label">Other</span>
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
                              <button type="submit" class="btn btn-primary">Save changes</button>
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