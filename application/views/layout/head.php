<?php
$site_config = $this->konfigurasi_model->listing();
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $site_config->namaweb ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/' . $site_config->logo); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $site_config->namaweb ?>" />
	<meta name="keywords" content="<?php echo $site_config->namaweb ?>" />
	<meta name="author" content="<?php echo $site_config->namaweb ?>" />

	<!-- favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon/CC_logo_remake.png" type="image/x-icon"> -->

	<!-- <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'> -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/animate.css">

	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/icomoon.css"> -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/themify-icons.css">

	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap.css"> -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/magnific-popup.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/owl.carousel.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/colorbox-master/example5/colorbox.css" />

	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/style.css"> -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/agency/vendor/fontawesome-free/css/all.min.css" type="text/css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/agency/vendor/bootstrap/css/bootstrap.min.css">

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

	<!-- animate.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

	<script src="<?php echo base_url(); ?>assets/agency/vendor/jquery/jquery.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/agency/css/agency.css">

	<!-- lazyload image -->
	<script async src="<?php echo base_url(); ?>assets/lazysizes/lazysizes.min.js"></script>

	<!-- CSS Pribadi -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/header/css/style.css">

	<!-- feather icon -->
	<script src="https://unpkg.com/feather-icons"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/feathericon/js/feather.min.js"></script> -->

	<style>
		.font-quick-sand {
			font-family: 'Quicksand', sans-serif;
		}

		.font-open-sans {
			font-family: 'Open Sans', sans-serif;
		}
	</style>

</head>

<body>

	<style>
		[class=text-hide] {
			/* background-image: url('https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg'); */
			background-image: url('http://localhost/computer-cyber/assets/img/icon/CC.svg');
			/* width: 20px;
			height: 20px; */
		}

		.our-client {
			text-align: center;
			background-color: transparent;
			padding: 10px 0
		}

		.our-client img {
			max-height: 100px;
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%)
		}

		.our-client img:hover {
			max-height: 100px;
			-webkit-filter: none;
			filter: none;
			-webkit-transition: all .3s ease 0s;
			-moz-transition: all .3s ease 0s;
			-o-transition: all .3s ease 0s;
			transition: all .3s ease 0s
		}

		.navbar-brand {
			font-size: 18px;
		}

		@media (min-width: 992px) {
			.border-karya {}
		}
	</style>

	<?php if ($this->uri->segment(1) == "") { ?>

		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
			<div class="container">
				<!-- <a class="navbar-brand" href="<?php echo site_url('/') ?>">
				<h1 class="text-hide">Computer Cyber</h1>
			</a> -->
				<a class="navbar-brand js-scroll-trigger" href="<?php echo site_url('/'); ?>">
					Computer Cyber
				</a>

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "") {
																		echo "active";
																	} ?>" href="<?php echo site_url(); ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "divisi") {
																		echo "active";
																	} ?>" href="<?php echo site_url('divisi'); ?>">Divisi</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link  <?php if ($this->uri->segment(1) == "portfolio") {
													echo "active";
												} elseif ($this->uri->segment(1) == "informasi") {
													echo "active";
												} elseif ($this->uri->segment(1) == "agenda") {
													echo "active";
												} elseif ($this->uri->segment(1) == "pengurus") {
													echo "active";
												} ?>" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Info <span><i class="fa fa-chevron-down" style="margin-left: .5px; font-size:10px;"></span></i>
							</a>
							<div class="dropdown-menu animate slideIn" style="border-left: 5px solid #5E31C2" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "berita") {
															echo "active";
														} ?>" href="<?php echo site_url('berita'); ?>">News</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "artikel") {
															echo "active";
														} ?>" href="<?php echo site_url('artikel'); ?>">Article</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "informasi") {
															echo "active";
														} ?>" href="<?php echo site_url('informasi'); ?>">Information</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "agenda") {
															echo "active";
														} ?>" href="<?php echo site_url('agenda'); ?>">Agenda dan Event</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "pengurus") {
															echo "active";
														} ?>" href="<?php echo site_url('pengurus'); ?>">Kepengurusan</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "gallery") {
																		echo "active";
																	} ?>" href="<?php echo site_url('gallery'); ?>">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "karya") {
																		echo "active";
																	} ?>" href="<?php echo site_url('karya'); ?>">Karya</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "about") {
																		echo "active";
																	} ?>" href="<?php echo site_url('about'); ?>">About US</a>
						</li>
						<li class="nav-link">
							<a class="btn btn-sm js-scroll-trigger join mt-1 text-white text-decoration-none" href="http://localhost/register/" target="_blank">Join Us</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

	<?php } else { ?>

		<nav class="navbar navbar2 navbar-expand-lg navbar-light fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo site_url('/'); ?>">
					Computer Cyber
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link <?php if ($this->uri->segment(1) == "") {
													echo "active";
												} ?>" href="<?php echo site_url(); ?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "divisi") {
																		echo "active";
																	} ?>" href="<?php echo site_url('divisi'); ?>">Divisi</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link  <?php if ($this->uri->segment(1) == "portfolio") {
													echo "active";
												} elseif ($this->uri->segment(1) == "informasi") {
													echo "active";
												} elseif ($this->uri->segment(1) == "agenda") {
													echo "active";
												} elseif ($this->uri->segment(1) == "pengurus") {
													echo "active";
												} ?>" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Info <span><i class="fa fa-chevron-down" style="margin-left: .5px; font-size:10px;"></span></i>
							</a>
							<div class="dropdown-menu animate slideIn" style="border-left: 5px solid #5E31C2" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "berita") {
															echo "active";
														} ?>" href="<?php echo site_url('berita'); ?>">News</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "artikel") {
															echo "active";
														} ?>" href="<?php echo site_url('artikel'); ?>">Article</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "informasi") {
															echo "active";
														} ?>" href="<?php echo site_url('informasi'); ?>">Information</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "agenda") {
															echo "active";
														} ?>" href="<?php echo site_url('agenda'); ?>">Agenda dan Event</a>
								<a class="dropdown-item <?php if ($this->uri->segment(1) == "pengurus") {
															echo "active";
														} ?>" href="<?php echo site_url('pengurus'); ?>">Kepengurusan</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "gallery") {
																		echo "active";
																	} ?>" href="<?php echo site_url('gallery'); ?>">Gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "karya") {
																		echo "active";
																	} ?>" href="<?php echo site_url('karya'); ?>">
								Karya</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger <?php if ($this->uri->segment(1) == "about") {
																		echo "active";
																	} ?>" href="<?php echo site_url('about'); ?>">About US</a>
						</li>
						<form class="form-inline">
							<a href="http://localhost/register/" target="_blank" class="join btn btn-sm btn-outline-secondary text-uppercase border-0" type="button" style="background-color: #1C45EF">Join us</a>
						</form>
					</ul>
				</div>
			</div>
		</nav>

	<?php } ?>