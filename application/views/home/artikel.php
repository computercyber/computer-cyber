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
        color: #5E31C2;
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

    .btn-search {
        background-image: linear-gradient(to right, #6771E6, #5E31C2);
        border: none;
        text-decoration: none !important;
        color: white !important;
        opacity: .8;
    }

    .img-not-found {
        width: 400px;
        margin-bottom: 100px;
    }

    .card-img-top {
        transition: .4s;
    }

    .card-img-top:hover {
        filter: brightness(80%);
    }

    @media (min-width: 992px) {
        .row-artikel {
            margin-bottom: 150px
        }

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

<div class="container">
    <div class="row mt-5 row-artikel">
        <div class="col-md-8 mx-auto">
            <form action="<?php echo site_url('artikel'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <!-- <button class="btn btn-primary btn-search" type="submit" id="button-addon2">Search</button> -->
                        <input type="submit" name="submit" class="btn btn-primary btn-search" value="Search">
                    </div>

                    <!-- <?php foreach ($total_rows as $t) : ?>
                        <h4>Result : <?php echo $t; ?></h4>
                    <?php endforeach ?> -->
                </div>
            </form>
        </div>
    </div>
</div>


<div class="section-news">
    <div class="container">
        <div class="row mt-5 mb-5">
            <?php foreach ($artikel_all as $artikel_all) { ?>
                <div class="col-lg-4 col-sm-6 mb-4 portfolio-item col-artikel">
                    <div class="card h-100">
                        <a href="<?php echo base_url('artikel/' . $artikel_all->url); ?>"><img class="card-img-top lazyload" data-src="<?php if ($artikel_all->gambar_berita == null) {
                                                                                                                                            echo base_url('assets/img/img_placeholder_cc.svg');
                                                                                                                                        } else {
                                                                                                                                            echo base_url('assets/upload/image/thumbs/berita/' . $artikel_all->gambar_berita);
                                                                                                                                        } ?>" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" alt="gambar-<?php echo $artikel_all->judul; ?>"></a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-dark text-decoration-none" href="<?php echo base_url('artikel/' . $artikel_all->url); ?>"><?php echo $artikel_all->judul; ?></a>
                            </h5>
                        </div>
                        <div class="card-footer border-0" style="background: none">
                            <small class="text-muted">
                                <?php if ($artikel_all->update_berita != null) {
                                    echo '<strong>Diupdate pada ' . date('d F Y', $artikel_all->update_berita) . '</strong>';
                                } else {
                                    echo date('d F Y', $artikel_all->tanggal);
                                } ?>

                            </small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
        <!-- <div class="row">
            <div class="col-lg-8 col-md-10">
                <?php foreach ($artikel_all as $artikel_all) { ?>
                    <div class="row" style="margin-top: 100px">
                        <div class="col-md-5">
                            <img src="<?php echo base_url() ?>assets/upload/image/thumbs/artikel/<?php echo $artikel_all->gambar_artikel ?>" style="max-width: 300px" alt="...">
                        </div>
                        <div class="col-md-7">
                            <h5>FDFDFD</h5>

                            <p><?php echo character_limiter($artikel_all->isi, 280); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div> -->
    </div>
</div>

<!-- <section class="section-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="media position-relative">
                            <img src="https://via.placeholder.com/300.png/09f/fff" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">Media with stretched link</h5>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                <a href="#" class="stretched-link">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>


                <?php foreach ($artikel_all as $artikel_all) { ?>
                    <div class="post-preview">
                        <a class="text-decoration-none" href="<?php echo base_url('artikel/' . $artikel_all->url); ?>">
                            <h2 class="post-title">
                                <?php echo $artikel_all->judul ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?php echo character_limiter($artikel_all->isi, 280); ?>
                            </h3>
                        </a>
                        <p class="post-meta">Oleh Admin CC pada <?php echo date('d F Y', strtotime($artikel_all->tanggal)); ?></p>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
    </div>
</section> -->

<!-- Card artikel -->
<!-- <section class="page-selection">
		<div class="container">
			<div class="row">
				<?php foreach ($portfolio_all as $portfolio_all) { ?>
					<div class="col-lg-3 col-md-4 col-sm-6 mb-4 pl-3">
						<div class="card card-news h-100">
							<img class="card-img-top" src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $portfolio_all->gambar ?>" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">
									<a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_artikel); ?>">
										<?php echo $portfolio_all->judul ?>
									</a><br>
									<a class="text-small text-muted disabled" aria-disabled="true" href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_artikel); ?>#disqus_thread"></a>
								</h5>
								<p class="card-text"><?php echo character_limiter($portfolio_all->isi, 100); ?></p>
								<a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_artikel); ?>" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section> -->
<!-- End Card artikel -->

<!-- <div class="gtco-section" style="margin-bottom: 0px;">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-12">
					<?php foreach ($portfolio_all as $portfolio_all) { ?>
															<div class="portfolio-box col-md-6 col-sm-6 col-xs-12">
																<div class="box0">
																	<img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $portfolio_all->gambar ?>" alt="" class="portfolio-img img-responsive">
																	<a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_artikel); ?>"><h3><?php echo $portfolio_all->judul ?></h3></a>
																	<div class="box1">
																		<span class="tanggalbox"><?php echo date('d F Y', strtotime($portfolio_all->tanggal));  ?></span> <span class="tanggalbox">Oleh: <?php echo $title ?></span>
																		<p><?php echo character_limiter($portfolio_all->isi, 100); ?></p>	
																	</div>
																	<span><a href="<?php echo base_url('portfolio/portfolio_read/' . $portfolio_all->id_artikel); ?>" class="btn btn-primary btn-xs">Read more</a></span>
																</div>
															</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div> -->