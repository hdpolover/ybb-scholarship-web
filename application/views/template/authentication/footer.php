</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Implementing Plugins -->
<script src="<?= base_url(); ?>assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js"></script>

<!-- JS Front -->
<script src="<?= base_url(); ?>assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
	(function() {
		// INITIALIZATION OF BOOTSTRAP VALIDATION
		// =======================================================
		HSBsValidation.init('.js-validate', {
			onSubmit: data => {
				$('button[type=submit]').prop("disabled", true);
				// add spinner to button
				$('button[type=submit]').html(
					`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
				);
				return;
			}
		})


		// INITIALIZATION OF TOGGLE PASSWORD
		// =======================================================
		new HSTogglePassword('.js-toggle-password')
	})()
</script>
</body>

</html>