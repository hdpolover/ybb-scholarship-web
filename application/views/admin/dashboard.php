    	<div class="row justify-content-md-between align-items-md-center mb-10">
    		<div class="col-md-7 col-xl-6">
    			<div class="mb-4">
    				<h1 class="display-5 mb-3"><span class="h3">Welcome to</span><br><span class="text-primary text-highlight-warning">YBB Scholarship</span><br><span class="display-6">system</span></h1>
    				<p class="lead">Manage your scholarship programs from share information to make report with ease in one platform.</p>
    			</div>

    			<div class="d-flex flex-wrap gap-2">
    				<!-- Card -->
    				<div class="bg-soft-secondary text-center rounded p-3" style="min-width: 7rem;">
    					<h2 class="h1 fw-normal mb-1"><?= $users;?></h2>
    					<span class="text-cap mb-0" style="font-size: 0.75rem;">User</span>
    				</div>
    				<!-- End Card -->

    				<!-- Card -->
    				<div class="bg-soft-secondary text-center rounded p-3" style="min-width: 7rem;">
    					<h2 class="h1 fw-normal mb-1"><?= $members;?></h2>
    					<span class="text-cap mb-0" style="font-size: 0.75rem;">Grantee</span>
    				</div>
    				<!-- End Card -->

    				<!-- Card -->
    				<div class="bg-soft-secondary text-center rounded cursor p-3" style="min-width: 7rem;" onclick="tournow()">
    					<h2 class="h1 fw-normal mb-1"><i class="bi bi-book-half"></i></h2>
    					<span class="text-cap mb-0" style="font-size: 0.75rem;">Take Tour</span>
    				</div>
    				<!-- End Card -->
    			</div>
    		</div>
    		<!-- End Col -->

    		<div class="col-md-5 col-xl-6">
    			<img class="img-fluid" src="<?= base_url(); ?>assets/svg/illustrations/oc-building-apps.svg" alt="Image Description">
    		</div>
    		<!-- End Col -->
    	</div>
    	<!-- End Row -->

    	<span class="divider-center text-cap mb-8">Quick access menu</span>

    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 mb-6">
    		<div class="col mb-4">
    			<!-- Card -->
    			<a class="card card-sm card-transition h-100" href="<?= site_url('users'); ?>" data-aos="fade-up">
    				<img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-avatars.svg" alt="Image Description">
    				<div class="card-body">
    					<h4 class="card-title text-inherit">Manage users</h4>
    					<p class="card-text small text-body">Manage user information.</p>
    				</div>
    			</a>
    			<!-- End Card -->
    		</div>
    		<!-- End Col -->

    		<div class="col mb-4">
    			<!-- Card -->
    			<a class="card card-sm card-transition h-100" href="<?= site_url('scholarship/applicant'); ?>" data-aos="fade-up">
    				<img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-toggle-state.svg" alt="Image Description">
    				<div class="card-body">
    					<h4 class="card-title text-inherit">Scholarship</h4>
    					<p class="card-text small text-body">Manage scholarship applicant.</p>
    				</div>
    			</a>
    			<!-- End Card -->
    		</div>
    		<!-- End Col -->

    		<div class="col mb-4">
    			<!-- Card -->
    			<a class="card card-sm card-transition h-100" href="<?= site_url('settings/website'); ?>" data-aos="fade-up">
    				<img class="card-img p-2" src="<?= base_url(); ?>assets/svg/design-system/docs-sorting.svg" alt="Image Description">
    				<div class="card-body">
    					<h4 class="card-title text-inherit">Settings</h4>
    					<p class="card-text small text-body">Customize landing page with ease.</p>
    				</div>
    			</a>
    			<!-- End Card -->
    		</div>
    		<!-- End Col -->
    	</div>
    	<!-- End Row -->