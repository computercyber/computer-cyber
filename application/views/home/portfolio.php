<style>
	.jumbotron-head {
		min-height: 500px;
		background-size: cover;
	}

	.heading-menu {
		font-family: 'Quicksand', sans-serif;
		color: white;
		opacity: .9;
		font-weight: 400;
		margin-top: 120px !important;
		text-shadow: 0px 0px 5px rgba(0, 0, 0, .1) !important;
	}

	.subheading-menu a {
		color: white;
		transition: .4s;
	}

	.subheading-menu a:hover {
		color: #3ABAF4;
	}

	.post-title {
		font-weight: 500;
		text-transform: capitalize;
	}

	.post-title,
	.post-subtitle {
		color: black;
		transition: .3s;
	}

	.post-subtitle {
		font-weight: 300;
		font-size: 18px;
	}

	.post-title:hover {
		color: #5E31C2;
	}

	@media (min-width: 992px) {
		.section-news {
			margin-top: -90px;
		}
	}
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/news/news2.jpg)">
	<div class="container">
		<h1 class="display-4 text-center heading-menu">NEWS</h1>
		<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
	</div>
</div>

<section class="section-news">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10 mx-auto">
				<?php foreach ($portfolio_all as $portfolio_all) { ?>
					<div class="post-preview">
						<a class="text-decoration-none" href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_berita); ?>">
							<h2 class="post-title">
								<?php echo $portfolio_all->judul ?>
							</h2>
							<h3 class="post-subtitle">
								<?php echo character_limiter($portfolio_all->isi, 280); ?>
							</h3>
						</a>
						<p class="post-meta">Oleh Admin CC pada <?php echo date('d F Y', strtotime($portfolio_all->tanggal)); ?></p>
					</div>
					<hr>
				<?php } ?>
				<!-- Pager -->
				<!-- <div class="clearfix">
					<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
				</div> -->
			</div>
		</div>
	</div>
</section>

<!-- Card Berita -->
<!-- <section class="page-selection">
		<div class="container">
			<div class="row">
				<?php foreach ($portfolio_all as $portfolio_all) { ?>
					<div class="col-lg-3 col-md-4 col-sm-6 mb-4 pl-3">
						<div class="card card-news h-100">
							<img class="card-img-top" src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $portfolio_all->gambar ?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">
									<a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_berita); ?>">
										<?php echo $portfolio_all->judul ?>
									</a><br>
									<a class="text-small text-muted disabled" aria-disabled="true" href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_berita); ?>#disqus_thread"></a>
								</h5>
								<p class="card-text"><?php echo character_limiter($portfolio_all->isi, 100); ?></p>
								<a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_berita); ?>" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section> -->
<!-- End Card Berita -->

<!-- <div class="gtco-section" style="margin-bottom: 0px;">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-12">
					<?php foreach ($portfolio_all as $portfolio_all) { ?>
															<div class="portfolio-box col-md-6 col-sm-6 col-xs-12">
																<div class="box0">
																	<img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $portfolio_all->gambar ?>" alt="" class="portfolio-img img-responsive">
																	<a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_berita); ?>"><h3><?php echo $portfolio_all->judul ?></h3></a>
																	<div class="box1">
																		<span class="tanggalbox"><?php echo date('d F Y', strtotime($portfolio_all->tanggal));  ?></span> <span class="tanggalbox">Oleh: <?php echo $title ?></span>
																		<p><?php echo character_limiter($portfolio_all->isi, 100); ?></p>	
																	</div>
																	<span><a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_berita); ?>" class="btn btn-primary btn-xs">Read more</a></span>
																</div>
															</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div> -->