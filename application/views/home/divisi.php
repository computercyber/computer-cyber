<style>
	.jumbotron-divisi {
		height: 500px;
		background-size: cover;
	}

	.heading-menu {
		font-family: 'Quicksand', sans-serif;
		color: white;
		opacity: .8;
		font-weight: 400;
		margin-top: 120px !important;
	}

	.subheading-menu a {
		color: white;
		opacity: .8;
		transition: .4s;
	}

	.subheading-menu a:hover {
		color: #5E31C2;
	}

	.single-service {
		text-align: center;
		border: 1px rgba(0, 0, 0, .1) solid;
		/* background-color: #f9f9ff; */
		border-radius: 0.25em;
		padding: 40px 0;
		-webkit-transition: all 0.3s ease 0s;
		-moz-transition: all 0.3s ease 0s;
		-o-transition: all 0.3s ease 0s;
		transition: all 0.3s ease 0s;
	}

	.single-service p {
		color: #222;
		transition: all 0.3s ease 0s;
	}

	.single-service:hover {
		cursor: default;
		box-shadow: 0px 30px 20px -20px rgba(126, 90, 206, .4);
		color: #fff;
	}

	.single-service:hover p {
		color: #7E5ACE;
		text-decoration-line: none;
	}

	.single-service img {
		width: 15%;
	}

	.logo {
		filter: grayscale(100%);
		transition: .4s;
	}

	.logo:hover {
		filter: grayscale(0%);
	}

	@media (max-width: 575.98px) {
		.jumbotron-divisi {
			background-position-x: -420px;
		}

		.heading-menu {
			margin-top: 170px !important;
		}

		.single-service {
			margin-top: 30px;
		}
	}
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-divisi" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/divisi/divisi4.png)">
	<div class="container">
		<div class="text-head-jumbotron">
			<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
			<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
		</div>

	</div>
</div>

<section class="section-divisi-list page-section">
	<div class="container">
		<div class="row row-our-division">
			<div class="col-md-12">
				<div class="title-our-division text-center">
					<h2 class="mb-10">OUR DIVISION</h2>
					<p>Kami memiliki 5 divisi</p>
				</div>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-lg-4 col-md-6 mb-30">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/programming'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/programming.png" alt="">
						<h5 class="mt-4">
							<p>Programming</p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-30">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/web-programming'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/web.png" alt="">
						<h5 class="mt-4">
							<p>Web Programming</p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 ">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/robotik'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/robotik.png" alt="">
						<h5 class="mt-4">
							<p>Robotik</p>
						</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-lg-4 col-md-6 mb-30">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/networking'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/networking.png" alt="">
						<h5 class="mt-4">
							<p>Networking</p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-30">
				<div class="single-service logo" style="min-height: 209px">
					<a class="text-decoration-none" href="#">
						<img class="d-block mx-auto mb-30" style="width: 120px" src="<?php echo base_url('assets'); ?>/logo/cc.png" alt="">
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 ">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/multimedia'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/multimedia.png" alt="">
						<h5 class="mt-4">
							<p>Multimedia</p>
						</h5>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="row">
		<?php foreach ($divisi as $divisi) { ?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
					<span class="icon">
						<img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $divisi->gambar_divisi ?>" alt="" class="img-responsive">
					</span>
					<div class="feature-copy">
						<a href="<?php echo site_url('divisi/detail/' . $divisi->id_divisi); ?>">
							<h3><?php echo $divisi->nama_divisi ?></h3>
						</a>
						<p style="border-top: 2px solid #303841;"><?php echo $divisi->keterangan_divisi ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
	</div> -->
</section>