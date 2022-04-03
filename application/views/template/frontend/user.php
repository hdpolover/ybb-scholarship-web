    <!-- Breadcrumb -->
    <div class="navbar-dark bg-dark" style="background-image: url(<?= base_url(); ?>assets/svg/components/wave-pattern-light.svg);">
    	<div class="container content-space-4 content-space-b-lg-3">
    		<div class="row align-items-center">
    			<div class="col">
    				<div class="d-none d-lg-block">
    					<h1 class="h2 text-white">Personal info</h1>
    				</div>

    				<!-- Breadcrumb -->
    				<nav aria-label="breadcrumb">
    					<ol class="breadcrumb breadcrumb-light mb-0">
    						<li class="breadcrumb-item">Account</li>
    						<li class="breadcrumb-item active" aria-current="page"><?= !empty($this->uri->segment(2)) ? str_replace('-', ' ', $this->uri->segment(2)) : 'Overview'; ?></li>
    					</ol>
    				</nav>
    				<!-- End Breadcrumb -->
    			</div>
    			<!-- End Col -->

    			<div class="col-auto">
    				<!-- Responsive Toggle Button -->
    				<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="navbar-toggler-default">
    						<i class="bi-list"></i>
    					</span>
    					<span class="navbar-toggler-toggled">
    						<i class="bi-x"></i>
    					</span>
    				</button>
    				<!-- End Responsive Toggle Button -->
    			</div>
    			<!-- End Col -->
    		</div>
    		<!-- End Row -->
    	</div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Content -->
    <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
    	<div class="row">
    		<div class="col-lg-3">
    			<!-- Navbar -->
    			<div class="navbar-expand-lg navbar-light">
    				<div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
    					<!-- Card -->
    					<div class="card flex-grow-1 mb-5">
    						<div class="card-body">
    							<!-- Avatar -->
    							<div class="d-none d-lg-block text-center mb-5">
    								<div class="avatar avatar-xxl avatar-circle mb-3">
    									<img class="avatar-img" src="<?= $user->picture == null ? 'https://i.stack.imgur.com/ZQT8Z.png' : base_url() . 'berkas/pengguna/' . $user->user_id . '/' . $user->picture; ?>" alt="<?= $user->name; ?>">
    									<img class="avatar-status avatar-lg-status" src="<?= base_url(); ?>assets/svg/illustrations/top-vendor.svg" alt="Image Description" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified user">
    								</div>

    								<h4 class="card-title mb-0"><?= $user->name; ?></h4>
    								<p class="card-text small"><?= $user->email; ?></p>
    							</div>
    							<!-- End Avatar -->

    							<!-- Nav -->
    							<span class="text-cap">Account</span>

    							<!-- List -->
    							<ul class="nav nav-sm nav-tabs nav-vertical mb-4">
    								<li class="nav-item">
    									<a class="nav-link <?= ($this->uri->segment(1) == "user" ? "active" : "") ?>" href="<?= site_url('user'); ?>">
    										<i class="bi-person-badge nav-icon"></i> Overview
    									</a>
    								</li>
    								<li class="nav-item">
    									<a class="nav-link <?= ($this->uri->segment(2) == "scholarship" ? "active" : "") ?>" href="<?= site_url('user/scholarship'); ?>">
    										<i class="bi-people nav-icon"></i> Scholarship
    									</a>
    								</li>
    								<li class="nav-item">
    									<a class="nav-link <?= ($this->uri->segment(2) == "settings" ? "active" : "") ?>" href="<?= site_url('user/settings'); ?>">
    										<i class="bi-sliders nav-icon"></i> Preferences
    									</a>
    								</li>
    							</ul>
    							<!-- End List -->

    							<div class="d-lg-none">
    								<div class="dropdown-divider"></div>

    								<!-- List -->
    								<ul class="nav nav-sm nav-tabs nav-vertical">
    									<li class="nav-item">
    										<a class="nav-link" href="#">
    											<i class="bi-box-arrow-right nav-icon"></i> Log out
    										</a>
    									</li>
    								</ul>
    								<!-- End List -->
    							</div>
    							<!-- End Nav -->
    						</div>
    					</div>
    					<!-- End Card -->
    				</div>
    			</div>
    			<!-- End Navbar -->
    		</div>
    		<!-- End Col -->

    		<div class="col-lg-9">