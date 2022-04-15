</div>
<!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

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
<script src="<?= base_url(); ?>assets/vendor/list.js/dist/list.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/prism/prism.js"></script>

<!-- JS Front -->
<script src="<?= base_url(); ?>assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
	function tournow() {
		introJs().setOptions({
			disableInteraction: true,
			steps: [{
				intro: "Welcome to YBB Foundation Scholarship webApp, we will briefly explain our feature`s"
			}, {
				element: document.querySelector('#tour-landing-button'),
				intro: "Go to landing page with ease"
			}, {
				element: document.querySelector('#tour-dashboard'),
				intro: "Overview page of this page"
			}, {
				element: document.querySelector('#tour-users'),
				intro: "You can see users account that has been registered on this site"
			}, {
				element: document.querySelector('#tour-applicant'),
				intro: "You can manage users request to apply on YBB scholarship"
			}, {
				element: document.querySelector('#tour-members'),
				intro: "You can see data applicant of YBB scholarship"
			}, {
				element: document.querySelector('#tour-announcement'),
				intro: "You can manage announcement data on here"
			}, {
				element: document.querySelector('#tour-website'),
				intro: "You can manage website setting from account to landing page information"
			}]
		}).start();
	};

	(function() {
		// INITIALIZATION OF HEADER
		// =======================================================
		new HSHeader('#header').init()


		// INITIALIZATION OF LISTJS COMPONENT
		// =======================================================
		const docsSearch = HSCore.components.HSList.init('#docsSearch')


		// GET JSON FILE RESULTS
		// =======================================================
		fetch('<?= base_url(); ?>assets/json/docs-search.json')
			.then(response => response.json())
			.then(data => {
				docsSearch.getItem(0).add(data)
			})

		// INITIALIZATION OF GO TO
		// =======================================================
		new HSGoTo('.js-go-to')
	})()

	$(document).ready(function() {
		$('#table').DataTable({
			"scrollX": true
		});
	})
</script>
</body>

</html>