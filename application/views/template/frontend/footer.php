</main>

<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
	<div class="container pb-1 pb-lg-5">
		<div class="row content-space-t-2">
			<div class="col-lg-3 mb-7 mb-lg-0">
				<!-- Logo -->
				<div class="mb-5">
					<a class="navbar-brand" href="./index.html" aria-label="Space">
						<img class="navbar-brand-logo" src="<?= base_url(); ?>assets/images/logo-white.png"
							alt="YBB Foundation Scholarship">
					</a>
				</div>
				<!-- End Logo -->

				<!-- List -->
				<ul class="list-unstyled list-py-1">
					<li><a class="link-sm link-light"><i class="bi-geo-alt-fill me-1"></i> Jawa Timur - Indonesia</a>
					</li>
					<li><a class="link-sm link-light" href="https://wa.me/<?= $web_whatsapp;?>" target="_blank"><i class="bi-telephone-inbound-fill me-1"></i> <?= $web_whatsapp;?></a></li>
				</ul>
				<!-- End List -->

			</div>
			<!-- End Col -->

			<div class="col-sm mb-7 mb-sm-0">
			</div>
			<!-- End Col -->

			<div class="col-sm mb-7 mb-sm-0">
				<h5 class="text-white mb-3">Informasi</h5>

				<!-- List -->
				<ul class="list-unstyled list-py-1 mb-0">
					<li><a class="link-sm link-light" href="<?= site_url('announcement'); ?>">Pengumuman <i
								class="bi-box-arrow-up-right small ms-1"></i></a></li>
					<li><a class="link-sm link-light" href="<?= site_url('scholarship'); ?>">Beasiswa</a></li>
				</ul>
				<!-- End List -->
			</div>
			<!-- End Col -->

			<div class="col-sm">
				<h5 class="text-white mb-3">Pusat Bantuan</h5>

				<!-- List -->
				<ul class="list-unstyled list-py-1 mb-0">
					<li><a class="link-sm link-light" href="<?= site_url('contribute'); ?>">Contribute</a></li>
					<li><a class="link-sm link-light" href="<?= site_url('faq'); ?>">FAQ</a></li>
				</ul>
				<!-- End List -->
			</div>
			<!-- End Col -->

			<div class="col-sm">
				<h5 class="text-white mb-3">Akun</h5>

				<!-- List -->
				<ul class="list-unstyled list-py-1 mb-5">
					<li><a class="link-sm link-light" href="<?= site_url('faq'); ?>"><i
								class="bi-question-circle-fill me-1"></i> Bantuan</a>
					</li>
					<li><a class="link-sm link-light" href="<?= site_url('user'); ?>"><i
								class="bi-person-circle me-1"></i> Akunku</a>
					</li>
				</ul>
				<!-- End List -->
			</div>
			<!-- End Col -->
		</div>
		<!-- End Row -->

		<div class="border-top border-white-10 my-7"></div>

		<div class="row mb-7">
			<div class="col-sm mb-3 mb-sm-0">
				<!-- Socials -->
				<ul class="list-inline list-separator list-separator-light mb-0">
					<li class="list-inline-item">
						<a class="link-sm link-light" href="<?= site_url('privacy-policy'); ?>">Kebijakan &amp; Privasi</a>
					</li>
				</ul>
				<!-- End Socials -->
			</div>

			<div class="col-sm-auto">
				<!-- Socials -->
				<ul class="list-inline mb-0">
					<li class="list-inline-item">
						<a class="btn btn-soft-light btn-xs btn-icon" href="<?= prep_url($web_facebook); ?>">
							<i class="bi-facebook"></i>
						</a>
					</li>

					<li class="list-inline-item">
						<a class="btn btn-soft-light btn-xs btn-icon" href="<?= prep_url($web_instagram); ?>">
							<i class="bi-instagram"></i>
						</a>
					</li>

					<li class="list-inline-item">
						<a class="btn btn-soft-light btn-xs btn-icon" href="<?= prep_url($web_twitter); ?>">
							<i class="bi-twitter"></i>
						</a>
					</li>

					<li class="list-inline-item">
						<a class="btn btn-soft-light btn-xs btn-icon" href="<?= prep_url($web_youtube); ?>">
							<i class="bi-youtube"></i>
						</a>
					</li>
				</ul>
				<!-- End Socials -->
			</div>
		</div>

		<!-- Copyright -->
		<div class="w-md-85 text-lg-center mx-lg-auto d-none">
			<p class="text-white-50 small">&copy; YBB Foundation Scholarship. 2022 Ngodingin. All rights reserved.</p>
			<p class="text-white-50 small">When you visit or interact with our sites, services or tools, we or our
				authorised service providers may use cookies for storing information to help provide you with a better,
				faster and safer experience and for marketing purposes.</p>
		</div>
		<!-- End Copyright -->
	</div>
</footer>

<!-- ========== END FOOTER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->

<!-- Go To -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
	<i class="bi-chevron-up"></i>
</a>
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Implementing Plugins -->
<script src="<?= base_url(); ?>assets/vendor/hs-header/dist/hs-header.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/hs-show-animation/dist/hs-show-animation.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/aos/dist/aos.js"></script>
<script src="<?= base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/prism/prism.js"></script>
<script src="<?= base_url(); ?>assets/vendor/fslightbox/index.js"></script>
<script src="<?= base_url(); ?>assets/vendor/appear/dist/appear.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/circles.js/circles.js"></script>
<script src="<?= base_url(); ?>assets/vendor/imask/dist/imask.min.js"></script>

<!-- JS Front -->
<script src="<?= base_url(); ?>assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
	(function () {
		// INITIALIZATION OF HEADER
		// =======================================================
		new HSHeader('#header').init()


		// INITIALIZATION OF MEGA MENU
		// =======================================================
		new HSMegaMenu('.js-mega-menu', {
			desktop: {
				position: 'left'
			}
		})


		// INITIALIZATION OF SHOW ANIMATIONS
		// =======================================================
		new HSShowAnimation('.js-animation-link')


		// INITIALIZATION OF BOOTSTRAP VALIDATION
		// =======================================================
		HSBsValidation.init('.js-validate', {
			onSubmit: data => {
				data.event.preventDefault()
				alert('Submited')
			}
		})


		// INITIALIZATION OF BOOTSTRAP DROPDOWN
		// =======================================================
		HSBsDropdown.init()


		// INITIALIZATION OF GO TO
		// =======================================================
		new HSGoTo('.js-go-to')

		// INITIALIZATION OF CIRCLES
		// =======================================================
		setTimeout(() => {
			HSCore.components.HSCircles.init('.js-circle')
		})


		// INITIALIZATION OF AOS
		// =======================================================
		AOS.init({
			duration: 650,
			once: true
		});


		// INITIALIZATION OF INPUT MASK
		// =======================================================
		HSCore.components.HSMask.init('.js-input-mask')


		// INITIALIZATION OF SWIPER
		// =======================================================
		let activeIndex = 0
		var sliderThumbs = new Swiper('.js-swiper-thumbs', {
			slidesPerView: 1,
			autoplay: false,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
			followFinger: false,
			loop: true,
			on: {
				'slideChangeTransitionEnd': function (event) {
					if (sliderMain === undefined) return
					sliderMain.slideTo(event.activeIndex)
				}
			}
		});

		var sliderMain = new Swiper('.js-swiper-main', {
			effect: 'fade',
			autoplay: false,
			disableOnInteraction: true,
			loop: true,
			navigation: {
				nextEl: '.js-swiper-main-button-next',
				prevEl: '.js-swiper-main-button-prev',
			},
			thumbs: {
				swiper: sliderThumbs
			},
			on: {
				'slideChangeTransitionEnd': function (event) {
					if (sliderThumbs === undefined) return
					sliderThumbs.slideTo(event.activeIndex)
				}
			}
		})

		// Clients
		var swiper = new Swiper('.js-swiper-clients', {
			slidesPerView: 2,
			breakpoints: {
				380: {
					slidesPerView: 3,
					spaceBetween: 15,
				},
				768: {
					slidesPerView: 4,
					spaceBetween: 15,
				},
				1024: {
					slidesPerView: 5,
					spaceBetween: 15,
				},
			},
		});

		// Card Grid
		var swiper = new Swiper('.js-swiper-card-blocks', {
			slidesPerView: 1,
			pagination: {
				el: '.js-swiper-card-blocks-pagination',
				dynamicBullets: true,
				clickable: true,
			},
			breakpoints: {
				620: {
					slidesPerView: 2,
					spaceBetween: 15,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 15,
				},
			},
		});
	})()

</script>
</body>

</html>
