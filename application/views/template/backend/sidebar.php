  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main">
  	<!-- Navbar -->
  	<nav class="js-nav-scroller navbar navbar-expand-lg navbar-sidebar navbar-vertical navbar-light bg-white border-end"
  		data-hs-nav-scroller-options='{
            "type": "vertical",
            "target": ".navbar-nav .active",
            "offset": 80
           }'>
  		<!-- Navbar Toggle -->
  		<button type="button" class="navbar-toggler btn btn-white d-grid w-100" data-bs-toggle="collapse"
  			data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false"
  			aria-controls="navbarVerticalNavMenu">
  			<span class="d-flex justify-content-between align-items-center">
  				<span class="h3 mb-0">Nav menu</span>

  				<span class="navbar-toggler-default">
  					<i class="bi-list"></i>
  				</span>

  				<span class="navbar-toggler-toggled">
  					<i class="bi-x"></i>
  				</span>
  			</span>
  		</button>
  		<!-- End Navbar Toggle -->

  		<!-- Navbar Collapse -->
  		<div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
  			<div class="navbar-brand-wrapper border-end" style="height: auto;">
  				<!-- Default Logo -->
  				<div class="d-flex align-items-center mb-3">
  					<a class="navbar-brand" href="<?= site_url('dashboard'); ?>" aria-label="Space">
  						<img class="navbar-brand-logo" src="<?= base_url(); ?>assets/images/logo.png" alt="Logo">
  					</a>
  					<a class="navbar-brand-badge">
  						<span class="badge bg-soft-primary text-primary ms-2">v1.0</span>
  					</a>
  				</div>
  				<!-- End Default Logo -->
  			</div>

  			<div class="docs-navbar-sidebar-aside-body navbar-sidebar-aside-body">
  				<ul id="navbarSettings" class="navbar-nav nav nav-vertical nav-tabs nav-tabs-borderless nav-sm">
  					<li class="nav-item" id="tour-dashboard">
  						<a class="nav-link <?= ($this->uri->segment(1) == "dashboard" ? "active" : "") ?>"
  							href="<?= site_url('dashboard'); ?>">Dashboard</a>
  					</li>
  					<li class="nav-item" id="tour-dashboard">
  						<a class="nav-link <?= ($this->uri->segment(1) == "statistik" ? "active" : "") ?>"
  							href="<?= site_url('statistik'); ?>">Statistik</a>
  					</li>

  					<li class="nav-item my-2 my-lg-5"></li>

  					<li class="nav-item" id="tour-users">
  						<span class="nav-subtitle">Users</span>
  					</li>
  					<?php if ($this->session->userdata('role') == 0) : ?>
  					<li class="nav-item">
  						<a class="nav-link <?= ($this->uri->segment(1) == "log" ? "active" : "") ?>"
  							href="<?= site_url('log'); ?>">Log</a>
  					</li>
  					<?php endif; ?>
  					<li class="nav-item" id="tour-users">
  						<a class="nav-link <?= ($this->uri->segment(1) == "users" ? "active" : "") ?>"
  							href="<?= site_url('users'); ?>">Users</a>
  					</li>

  					<li class="nav-item my-2 my-lg-5"></li>

  					<li class="nav-item">
  						<span class="nav-subtitle">Scholarship</span>
  					</li>
  					<li class="nav-item" id="tour-applicant">
  						<a class="nav-link <?= ($this->uri->segment(2) == "applicant" ? "active" : "") ?>"
  							href="<?= site_url('scholarship/applicant'); ?>">Applicant
  							<?php if($countScholar > 0):?>
  							<span class="ms-auto badge bg-primary"><?= $countScholar;?></span>
  							<?php endif;?>
  						</a>
  					</li>
  					<li class="nav-item" id="tour-members">
  						<a class="nav-link <?= ($this->uri->segment(2) == "member" ? "active" : "") ?>"
  							href="<?= site_url('scholarship/member'); ?>">Members</a>
  					</li>

  					<li class="nav-item my-2 my-lg-5"></li>

  					<li class="nav-item">
  						<span class="nav-subtitle">Information</span>
  					</li>
  					<li class="nav-item" id="tour-announcement">
  						<a class="nav-link <?= ($this->uri->segment(2) == "announcement" ? "active" : "") ?>"
  							href="<?= site_url('information/announcement'); ?>">Announcement</a>
  					</li>
  					<li class="nav-item" id="tour-announcement">
  						<a class="nav-link <?= ($this->uri->segment(2) == "timeline" ? "active" : "") ?>"
  							href="<?= site_url('information/timeline'); ?>">Timeline</a>
  					</li>

  					<li class="nav-item my-2 my-lg-5"></li>

  					<li class="nav-item">
  						<span class="nav-subtitle">Settings</span>
  					</li>
  					<li class="nav-item" id="tour-website">
  						<a class="nav-link <?= ($this->uri->segment(1) == "settings" ? "active" : "") ?>"
  							href="<?= site_url('settings/website'); ?>">Website</a>
  					</li>
  				</ul>
  			</div>
  		</div>
  		<!-- End Navbar Collapse -->
  	</nav>
  	<!-- End Navbar -->
  	<!-- Content -->
  	<div class="navbar-sidebar-aside-content content-space-1 content-space-md-2 px-lg-5 px-xl-10">
