<!-- ========== HEADER ========== -->
<header id="header"
	class="navbar navbar-expand-lg navbar-end navbar-absolute-top <?= (empty($this->uri->segment(1)) || $this->uri->segment(1) ==  'home' ? "navbar-dark" : "navbar-light bg-white shadow-sm") ?> navbar-show-hide"
	data-hs-header-options='{"fixMoment": 1000,"fixEffect": "slide"}'>

	<!-- Topbar -->
	<div class="container navbar-topbar">
		<nav class="js-mega-menu navbar-nav-wrap">
			<!-- Toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
				data-bs-target="#topbarNavDropdown" aria-controls="topbarNavDropdown" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="d-flex justify-content-between align-items-center small">
					<span class="navbar-toggler-text">Topbar</span>

					<span class="navbar-toggler-default">
						<i class="bi-chevron-down ms-2"></i>
					</span>
					<span class="navbar-toggler-toggled">
						<i class="bi-chevron-up ms-2"></i>
					</span>
				</span>
			</button>
			<!-- End Toggler -->

			<div id="topbarNavDropdown"
				class="navbar-nav-wrap-collapse collapse navbar-collapse navbar-topbar-collapse">
				<div class="navbar-toggler-wrapper">
					<div class="navbar-topbar-toggler d-flex justify-content-between align-items-center">
						<span class="navbar-toggler-text small">Topbar</span>

						<!-- Toggler -->
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#topbarNavDropdown" aria-controls="topbarNavDropdown" aria-expanded="false"
							aria-label="Toggle navigation">
							<i class="bi-x"></i>
						</button>
						<!-- End Toggler -->
					</div>
				</div>

				<ul class="navbar-nav">
					<!-- Demos -->
					<li class="nav-item">
						<a class="nav-link <?= ($this->uri->segment(1) == "faq" ? "active" : "") ?>" aria-current="page"
							href="<?= site_url('faq'); ?>" role="button">FAQ</a>
					</li>
					<!-- End Demos -->
					<?php if ($this->session->userdata('logged_in') == true) : ?>
					<!-- Docs -->
					<li class="hs-has-sub-menu nav-item"
						data-hs-mega-menu-item-options='{"desktop": { "maxWidth": "20rem"}}'>
						<a id="docsMegaMenu"
							class="hs-mega-menu-invoker nav-link dropdown-toggle <?= ($this->uri->segment(1) == "user" ? "active" : "") ?>"
							href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Your Account</a>

						<!-- Mega Menu -->
						<div class="hs-sub-menu hs-position-right dropdown-menu" aria-labelledby="docsMegaMenu"
							style="min-width: 14rem;">
							<?php if($this->session->userdata('role') == 0 || $this->session->userdata('role') == 1):?>
							<a class="dropdown-item <?= ($this->uri->segment(1) == "dashboard" ? "active" : "") ?>"
								href="<?= site_url('dashboard'); ?>">Admin Dashboard</a>
							<?php else:?>
							<a class="dropdown-item <?= ($this->uri->segment(1) == "user" ? "active" : "") ?>"
								href="<?= site_url('user'); ?>">Profile</a>
							<a class="dropdown-item <?= ($this->uri->segment(2) == "scholarship" ? "active" : "") ?>"
								href="<?= site_url('user/scholarship'); ?>">Scholarship</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item <?= ($this->uri->segment(2) == "settings" ? "active" : "") ?>"
								href="<?= site_url('user/settings'); ?>">Account Setting</a>
							<?php endif;?>
							<a class="dropdown-item " href="<?= site_url('logout'); ?>">Logout</a>
						</div>
						<!-- End Mega Menu -->
					</li>
					<!-- End Docs -->
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</div>
	<!-- End Topbar -->

	<div class="container">
		<nav class="navbar-nav-wrap">
			<!-- Default Logo -->
			<a class="navbar-brand" href="<?= base_url(); ?>" aria-label="YBB Scholarship">
				<img class="navbar-brand-logo"
					src="<?= base_url(); ?>assets/images/<?= (empty($this->uri->segment(1)) ? "logo-white.png" : "logo.png") ?>"
					alt="YBB Scholarship">
			</a>
			<!-- End Default Logo -->

			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-default">
					<i class="bi-list"></i>
				</span>
				<span class="navbar-toggler-toggled">
					<i class="bi-x"></i>
				</span>
			</button>
			<!-- End Toggler -->

			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<div class="navbar-absolute-top-scroller">
					<ul class="navbar-nav">
						<!-- Landings -->
						<li class="nav-item">
							<a class="nav-link <?= (empty($this->uri->segment(1)) || $this->uri->segment(1) == 'home' ? "active" : "") ?>"
								href="<?= base_url(); ?>" aria-current="page" role="button">Home</a>
						</li>
						<!-- End Landings -->

						<!-- Landings -->
						<li class="nav-item">
							<a class="nav-link <?= ($this->uri->segment(1) == "announcements" ? "active" : "") ?>"
								href="<?= site_url('announcements'); ?>" role="button">Announcements</a>
						</li>
						<!-- End Landings -->

						<!-- Landings -->
						<li class="nav-item">
							<a class="nav-link <?= ($this->uri->segment(1) == "timeline" ? "active" : "") ?>"
								href="<?= site_url('timeline'); ?>" role="button">Timeline</a>
						</li>
						<!-- End Landings -->

						<!-- Landings -->
						<li class="nav-item">
							<a class="nav-link <?= ($this->uri->segment(1) == "about-us" ? "active" : "") ?>"
								href="<?= site_url('about-us'); ?>" role="button">About Us</a>
						</li>
						<!-- End Landings -->

						<!-- Landings -->
						<!-- <li class="nav-item">
							<a class="nav-link <?= ($this->uri->segment(1) == "faq" ? "active" : "") ?>"
								href="<?= site_url('faq'); ?>" role="button">FAQ</a>
						</li> -->
						<!-- End Landings -->

						<!-- Landings -->
						<li class="nav-item">
							<a class="nav-link <?= ($this->uri->segment(1) == "other-programs" ? "active" : "") ?>"
								href="<?= site_url('other-programs'); ?>" role="button">Other Programs</a>
						</li>
						<!-- End Landings -->

						<!-- Landings -->
						<li class="nav-item">
							<a class="nav-link <?= ($this->uri->segment(1) == "contribute" ? "active" : "") ?>"
								href="<?= site_url('contribute'); ?>" role="button">Contribute</a>
						</li>
						<!-- End Landings -->

						<?php if ($this->session->userdata('logged_in') == false) : ?>
						<!-- Button -->
						<li class="nav-item">
							<a class="btn btn-<?= (empty($this->uri->segment(1)) ? "light" : "primary") ?> btn-transition"
								href="<?= site_url('login'); ?>">Join Now</a>
						</li>
						<!-- End Button -->
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<!-- End Collapse -->
		</nav>
	</div>
</header>

<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="bg-white">
