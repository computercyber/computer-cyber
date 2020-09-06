<!-- <header class="masthead">
		<div class="container">
			<div class="intro-text">
				<div class="intro-lead-in">Welcome To Our Community!</div>
				<div class="intro-heading text-uppercase">It's Nice To Meet You</div>
				<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#vision">Tell Me More</a>
			</div>
		</div>
	</header> -->

<style>
	/* .row-our-division {
		margin-top: -50px;
	}

	.row-btn-all-division {
		margin-top: 40px;
		margin-bottom: -50px;
	} */
	/* .jumbotron-home {
		height: 100vh;
		background-size: cover;
	} */

	.btn-welcome {
		width: 200px;
		font-size: 90%;
		border-radius: 5rem;
		letter-spacing: .1rem;
		padding: 1rem;
		transition: all 0.2s;
	}

	.single-service {
		text-align: center;
		background-color: #f9f9ff;
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
		box-shadow: 0px 20px 20px 0px rgba(70, 157, 250, .1);
		color: #fff;
	}

	.single-service:hover p {
		color: #469DFA;
		text-decoration-line: none;
	}

	.single-service img {
		width: 15%;
	}

	.btn-view-all-division {
		width: 200px;
		font-size: 80%;
		border-radius: 5rem;
		letter-spacing: .1rem;
		font-weight: bold;
		padding: 1rem;
		opacity: 0.7;
		transition: all 0.2s;
		background-image: linear-gradient(to right, #6771E6, #5E31C2);
		border: none;
		color: white;
		/* box-shadow: 1px 1px 20px 0px rgba(70, 157, 250, .3); */
	}

	.btn-view-all-division:hover {
		box-shadow: 0px 0px 20px 0px rgba(94, 49, 194, .5);
		/* box-shadow: 1px 1px 20px 0px rgba(70, 157, 250, .3); */
	}

	.row-btn-all-gallery {
		margin-top: 40px;
	}

	.btn-view-all-gallery {
		width: 200px;
		font-size: 80%;
		border-radius: 5rem;
		letter-spacing: .1rem;
		font-weight: bold;
		padding: 1rem;
		transition: all 0.2s;
		background-image: linear-gradient(to right, #6771E6, #5E31C2);
		border: none;
		/* box-shadow: 1px 1px 20px 0px rgba(70, 157, 250, .3); */
	}

	.btn-view-all-gallery:hover {
		color: white;
		box-shadow: 0px 0px 20px 0px rgba(94, 49, 194, .5);
		/* box-shadow: 0px 20px 20px 0px rgba(255, 255, 255, .1); */
		/* box-shadow: 1px 1px 20px 0px rgba(70, 157, 250, .3); */
	}


	.text-gallery-title {
		font-weight: 400;
	}

	@media (max-width: 575.98px) {
		.section-visi {
			margin-top: -32px;
		}

		.single-service {
			margin-top: 30px;
		}

		/* .section-our-division {
			min-height: 1200px;
		}

		.row-our-division {
			margin-top: -50px;
		}

		.title-our-division {
			margin-top: 40px;
		}

		.row-btn-all-division {
			margin-top: 40px;
			margin-bottom: -50px;
		} */
	}

	@media (min-width: 992px) {

		.portfolio-link>.portfolio-caption {
			transition: .4s;
		}

		.portfolio-link:hover>.portfolio-caption {
			background-image: linear-gradient(to right, #6771E6, #5E31C2);
			color: white;
			box-shadow: 0px 20px 20px 0px rgba(70, 157, 250, .1);
		}
	}
</style>




<!-- <div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-home" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/home/home.png)">
	<div class="container">
		<div class="text-head-jumbotron">
			<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
			<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
		</div>

	</div>
</div> -->

<div class="jumbotron jumbotron-fluid jumbotron-home">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="intro-text intro-text-home text-white">
					<div class="lead lead-home" style="text-align: left;">Welcome To Our Community!</div>
					<div class="display-4 display-4-home" style="text-align: left;">It's Nice To Meet You</div>
					<a class="btn btn-primary btn-lg text-uppercase js-scroll-trigger btn-welcome mt-4" href="#vision">Tell Me More</a>
				</div>
			</div>
			<div class="col-md-6">
				<img id="img-welcome" class="bg-jumbotron-home" src="<?php echo base_url() ?>assets/img/header/baru2.png" alt="">
			</div>
		</div>
	</div>
</div>


<!-- Visi -->
<section class="section-visi py-5 text-white" id="vision" style="background-color:#6E75E7;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 text-center offset-lg-2">
				<div class="title-visi text-center">
					<h2 class="mb-10">VISI</h2>
				</div>
				<div class="visi-desc mt-4">
					<p class="text-white"><?php echo $site->description ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Services -->
<section class="page-section section-our-division">
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
					<a class="text-decoration-none" href="<?php echo site_url('divisi/detail/1'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/programming.png" alt="">
						<h5 class="mt-4">
							<p>Programming</p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-30">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/detail/2'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/web.png" alt="">
						<h5 class="mt-4">
							<p>Web Programming</p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 ">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/detail/3'); ?>">
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
					<a class="text-decoration-none" href="<?php echo site_url('divisi/detail/4'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/networking.png" alt="">
						<h5 class="mt-4">
							<p>Networking</p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mb-30">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('/'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/logo/cc.png" alt="">
						<h5 class="mt-4">
							<p></p>
						</h5>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 ">
				<div class="single-service">
					<a class="text-decoration-none" href="<?php echo site_url('divisi/detail/5'); ?>">
						<img class="d-block mx-auto mb-30" src="<?php echo base_url('assets'); ?>/img/icon/divisi/multimedia.png" alt="">
						<h5 class="mt-4">
							<p>Multimedia</p>
						</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="row row-btn-all-division mt-4">
			<div class="col-md-12 text-center">
				<a class="btn btn-view-all-division btn-outline-primary text-uppercase" href="<?php echo site_url('divisi'); ?>">View All</a>
			</div>
		</div>
	</div>
</section>

<!-- Portfolio Grid -->
<section class="page-section section-gallery" id="portfolio" style="background-color:#0F0E20">
	<div class="container">
		<div class="row row-our-gallery">
			<div class="col-md-12">
				<div class="title-gallery text-center text-white">
					<h2 class="mb-10">OUR STORY</h2>
					<p style="color:#8481AB">Beberapa kilasan kegiatan kami</p>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<?php foreach ($gallery_home as $gallery_home) { ?>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<a class="portfolio-link text-decoration-none" data-toggle="modal" href="#portfolioModal6">
						<!-- <img class="img-fluid" src="<?php echo base_url(); ?>assets/upload/image/<?php echo $gallery_home->gambar; ?>" alt=""> -->
						<img class="img-fluid" src="<?= base_url('assets/upload/image/' . $gallery_home->gambar); ?>" alt="">
						<div class="portfolio-caption">
							<h6 class="text-gallery-title"><?php echo $gallery_home->judul_gallery; ?></h6>
							<!-- <p class="text-gallery-title"><?php echo $gallery_home->nama; ?></p> -->
						</div>
					</a>

				</div>
			<?php } ?>
		</div>
		<div class="row row-btn-all-gallery">
			<div class="col-lg-12 text-center">
				<a class="btn btn-view-all-gallery btn-outline-light text-uppercase" href="<?php echo base_url('gallery'); ?>">View All</a>
			</div>
		</div>
	</div>
</section>

<!-- <div id="gtco-features" style="margin-bottom: 0; padding-bottom: 0;">
		<div class="gtco-container"> -->
<!-- <div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>VISI</h2>
					<p><?php echo $site->description ?></p>
				</div>
			</div> -->
<!-- <div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-announcement"></i>
						</span>
						<h3>INFORMASI</h3>
						<p>Temukan informasi menarik seputar teknologi. </p><hr>
						<p><a href="<?php echo base_url('informasi'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<h3>DIVISI</h3>
						<p>Computer Cyber memiliki 5 divisi. </p><hr>
						<p><a href="<?php echo base_url('divisi'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-user"></i>
						</span>
						<h3>PENGURUS</h3>
						<p>Pengerus serta anggota Computer Cyber. </p><hr>
						<p><a href="<?php echo base_url('pengurus'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
					</div>
				</div>
			</div> -->
<!-- </div>
	</div> -->

<!-- <div class="gtco-section border-bottom" style="background-color: #EFEFEF;">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Latest Post</h2>
				</div>
			</div>
			<div class="row">
				<?php foreach ($berita as $berita) : ?>
					<div class="col-md-4 col-sm-4">
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="ti-agenda"></i>
						</span>
						<div class="feature-copy">
							<h3><?php echo $berita->judul ?></h3>
							<small><?php echo date('d M Y', strtotime($berita->tanggal)); ?></small>
							<p><?php echo character_limiter($berita->isi, 100); ?></p>
							<a class="btn btn-primary" href="<?php echo base_url('home/berita_read/' . $berita->id_berita); ?>">Lanjut Baca</a>
						</div>
					</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div> -->
<!-- <div id="gtco-portfolio" class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2 class="space2px">GALERI</h2>
					<p></p>
				</div>
			</div>
			<div class="row row-pb-md">
				<div class="col-md-12">
					<ul id="gtco-portfolio-list">
						<?php foreach ($gallery_home as $gallery_home) { ?>
							<li class="col-md-6 col-sm-6 col-xs-12  img-responsive animate-box gallery_home" data-animate-effect="fadeIn" style="background-image: url(<?php echo base_url() ?>assets/upload/image/<?php echo $gallery_home->gambar ?>); "> 
							<a href="<?php echo base_url() ?>assets/upload/image/<?php echo $gallery_home->gambar ?>" title="<?php echo $gallery_home->judul_gallery ?>" class="color-1 group3">
								<div class="case-studies-summary">
									<img src="" width="60">
									<span><?php echo $gallery_home->nama ?></span>
									<h2><?php echo $gallery_home->judul_gallery ?></h2>
								</div>
							</a>
						</li>
						<?php } ?>
					</ul>		
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-md-offset-4 text-center animate-box">
					<a href="<?php echo base_url('gallery'); ?>" class="space2px btn btn-white btn-outline btn-lg btn-block">Lihat Semua Galeri</a>
				</div>
			</div>

			
		</div> -->
</div>


<!-- Address -->
<section class="page-section smoke-color">
	<div class="container">
		<div class="row ">
			<div class="col-md-12">
				<div class="title-gallery text-center">
					<h2 class="mb-10">OUR OFFICE</h2>
					<p>Lokasi sekretariat kami</p>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12 portfolio-item">
				<div class="portfolio-caption">
					<?php echo $site->google_map ?>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$('#img-welcome').on('dragstart', function(event) {
		event.preventDefault();
	});
</script>