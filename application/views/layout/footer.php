<?php
$site_config = $this->konfigurasi_model->listing();
?>

<style>
	.footer-title {
		font-family: 'Quicksand', sans-serif;
	}

	.footer-link {
		margin-bottom: -1px;
	}

	.footer-link a {
		color: black;
	}

	@media (min-width: 992px) {
		.sosmed {
			transition: .4s;
			color: #6B747C;
		}

		.sosmed:hover {
			color: #5E31C2;
		}
	}
</style>

<footer class="page-footer font-small unique-color-dark border-top">

	<div class="container text-center text-md-left mt-5 mb-4">
		<div class="row mt-3">

			<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
				<h6 class="text-uppercase font-weight-bold mb-3 footer-title">Address</h6>
				<p><?php echo $site_config->alamat; ?></p>
			</div>

			<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
				<h6 class="text-uppercase font-weight-bold mb-3 footer-title">Bantuan</h6>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Bantuan</a>
				</p>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Cara bergabung</a>
				</p>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Pindah Divisi</a>
				</p>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Jetskill</a>
				</p>
			</div>

			<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
				<h6 class="text-uppercase font-weight-bold mb-3 footer-title">Website</h6>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Jetskill</a>
				</p>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Developer</a>
				</p>
				<p class="footer-link">
					<a href="https://umrah.ac.id" target="_blank">Recruitment</a>
				</p>
			</div>

			<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
				<h6 class="text-uppercase font-weight-bold mb-3 footer-title">Contact</h6>
				<p class="footer-link">
					<i class="fas fa-envelope mr-3 text-muted"></i><?php echo $site_config->email; ?></p>
				<p class="footer-link">
					<i class="fas fa-phone mr-3 text-muted"></i><?php echo $site_config->telepon; ?></p>
			</div>

		</div>

		<div class="footer-copyright py-3">
			<div class="row">

				<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
					<small class="text-small text-muted">&copy; <?php echo date("Y"); ?> Copyright <?php echo $site_config->namaweb; ?> dikelola oleh Divisi Web Programming</small>
				</div>

				<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

				</div>

				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
					<a href="<?php echo $site_config->twitter ?>" target="_blank"><i class="fab fa-twitter sosmed"></i></a>
					<a href="<?php echo $site_config->instagram ?>" target="_blank"><i class="fab fa-instagram ml-4 sosmed"></i></a>
					<a href="<?php echo $site_config->facebook ?>" target="_blank"><i class="fab fa-facebook ml-4 sosmed"></i></a>
				</div>

			</div>
		</div>

	</div>

</footer>
<!-- Footer -->

<script>
	feather.replace()
</script>

<!-- Bootstrap core JavaScript -->

<script src="<?php echo base_url(); ?>assets/agency/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/agency/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo base_url(); ?>assets/agency/js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url(); ?>assets/agency/js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url(); ?>assets/agency/js/agency.js"></script>

</body>

</html>