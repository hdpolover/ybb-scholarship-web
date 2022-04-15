<!-- JS Implementing Plugins -->
<script src="<?= base_url(); ?>assets/vendor/hs-header/dist/hs-header.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/list.js/dist/list.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/hs-go-to/dist/hs-go-to.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/prism/prism.js"></script>

<!-- JS Front -->
<script src="<?= base_url(); ?>assets/js/theme.min.js"></script>

<!-- JS Plugins Init. -->
<script>
	(function() {
		// INITIALIZATION OF HEADER
		// =======================================================
		new HSHeader('#header').init()


		// INITIALIZATION OF LISTJS COMPONENT
		// =======================================================
		const docsSearch = HSCore.components.HSList.init('#docsSearch')

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