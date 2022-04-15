  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand navbar-fixed navbar-end navbar-light navbar-sticky-lg-top bg-white">
      <div class="container-fluid">
          <nav class="navbar-nav-wrap">
              <div class="row flex-grow-1">
                  <!-- Default Logo -->
                  <div class="docs-navbar-sidebar-container d-flex align-items-center mb-2 mb-lg-0">
                      <a class="navbar-brand" href="<?= site_url('dashboard'); ?>" aria-label="Space">
                          <img class="navbar-brand-logo" src="<?= base_url(); ?>assets/images/logo.png" alt="Logo">
                      </a>
                      <a>
                          <span class="badge bg-soft-primary text-primary">v1.0</span>
                      </a>
                  </div>
                  <!-- End Default Logo -->

                  <div class="col-md px-lg-0">
                      <div class="d-flex justify-content-between align-items-center px-lg-5 px-xl-10">
                          <!-- Navbar -->
                          <ul class="navbar-nav p-0">
                              <li class="nav-item" id="tour-landing-button">
                                  <a class="btn btn-ghost-secondary btn-sm" href="<?= base_url(); ?>" target="_blank">
                                      Landing page <i class="bi-box-arrow-up-right ms-1"></i>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="btn btn-outline-secondary btn-sm" href="<?= site_url('logout'); ?>">
                                      <i class="bi-power me-1"></i> Logout
                                  </a>
                              </li>
                          </ul>
                          <!-- End Navbar -->
                      </div>
                  </div>
                  <!-- End Col -->
              </div>
              <!-- End Row -->
          </nav>
      </div>
  </header>
  <!-- ========== END HEADER ========== -->