<!-- 
	<div class="gtco-section" style="margin-bottom: 0px;">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-12">
					<div class="portfolio-box col-md-12 col-sm-12 col-xs-12">
						<div class="box">
							<img style="margin-bottom: 20px;" src="<?php echo base_url() ?>assets/upload/image/<?php echo $portfolio_read->gambar ?>" alt="" class="portfolio-img img-responsive col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h1 class="space2px"><?php echo $portfolio_read->judul ?></h1>
								<span class="tanggalbox"><?php echo date('d F Y', strtotime($portfolio_read->tanggal)); ?></span>
								<hr>
								<p><?php echo $portfolio_read->isi ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div> -->


<!-- Page Content -->

<style>
    * {
        font-family: 'Quicksand', sans-serif;
    }

    .navbar {
        box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, .1);
    }

    a {
        color: #5E31C2;
    }

    .title {
        margin-top: -55px;
        font-size: 30px;
    }

    .card-title {
        font-family: 'Quicksand', sans-serif;
        font-size: 18px;
        font-weight: 600;
    }

    .bg--secondary {
        background-color: #FAFAFA;
        border-bottom: 1px solid rgba(0, 0, 0, .1);
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .breadcrumb {
        padding: 0;
    }


    @media (max-width: 575.98px) {
        .navbar {
            box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, .1);
        }

        .title {
            margin-top: -55px;
            font-size: 21px;
        }

        .breadcrumb {
            margin-top: -13px;
        }

        .breadcrumb-item {
            font-size: 13px;
        }

        .content {
            font-size: 12px;
        }


    }

    .btn-search {
        background-image: linear-gradient(to right, #6771E6, #5E31C2);
        border: none;
        text-decoration: none !important;
        color: white !important;
        opacity: .8;
    }
</style>

<section class="bg--secondary mt-5 text-center">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item">
                <a href="<?php echo site_url('/') ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo site_url('berita') ?>">News</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $berita_detail->judul ?></li>
        </ol>
    </div>
</section><!-- END: CTA BEFORE CONTENT -->

<div class="section page-section">

    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mb-3 text-capitalize title"><?php echo $berita_detail->judul ?>
        </h1>
        <p class="text-muted">Ditulis oleh <strong><a href=""><?php echo $berita_detail->nama; ?></a></strong> pada <?php echo date('d F Y', strtotime($berita_detail->tanggal)); ?> dalam kategori <strong><a href="">Berita</a></strong></p>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded lazyload mt-3 mb-3" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?php echo base_url() ?>assets/upload/image/thumbs/berita/<?php echo $berita_detail->gambar_berita ?>" alt="">

                <!-- Post Content -->
                <p class="content"><?php echo $berita_detail->isi ?></p>

                <?php if (!empty($berita_detail->dokumen1)) { ?>
                    <div class="card mt-5 mb-5" style="background-color: #F7F7F7">
                        <div class="card-body">
                            <strong>Lampiran : </strong>
                            <br>
                            <div class="mt-2">
                                <?php if ($berita_detail->dokumen1 != null) { ?>
                                    <div class="btn btn-info btn-sm"><i class="fas fa-file-download mr-1"></i> Data.pdf</div>
                                <?php } ?>

                                <?php if ($berita_detail->dokumen2 != null) { ?>
                                    <div class="btn btn-info btn-sm ml-2"><i class="fas fa-file-download mr-1"></i> Data2.pdf</div>
                                <?php } ?>

                                <?php if ($berita_detail->dokumen3 != null) { ?>
                                    <div class="btn btn-info btn-sm ml-2"><i class="fas fa-file-download mr-1"></i> Data3.pdf</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <hr>
                <?php foreach ($tag as $tag) : ?>
                    <div class="badge badge-secondary">
                        <?php echo $tag['nama_tag']; ?>
                    </div>
                <?php endforeach; ?>
                <hr>

                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

                <!-- Your share button code -->
                <div class="fb-share-button" data-href="http://localhost/computer-cyber/berita/ your-page.html" data-layout="button" data-size="large">
                </div>


                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://computer-cyber.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header border-bottom-0 card-title" style="background: none">Cari</h5>
                    <div class="card-body">
                        <form action="<?php echo site_url('berita'); ?>" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." name="keyword" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                    <input type="submit" name="submit" class="btn btn-primary btn-search" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header border-bottom-0 card-title" style="background: none">Divisi</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="<?php echo site_url('divisi/programming'); ?>">Programming</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('divisi/web-programming'); ?>">Web Programming</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('divisi/robotik'); ?>">Robotik</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="<?php echo site_url('divisi/networking'); ?>">Networking</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('divisi/multimedia'); ?>">Multimedia</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header border-bottom-0 card-title" style="background: none">Berita Lainnya</h5>
                    <?php if ($berita_lainnya) { ?>
                        <?php foreach ($berita_lainnya as $lainnya) : ?>
                            <div class="card-body" style="border-top: 1px rgba(0,0,0,.1) solid;">
                                <div class="media position-relative">
                                    <img class="rounded lazyload mr-3" width="80px" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?php echo base_url() ?>assets/upload/image/thumbs/berita/<?php echo $berita_detail->gambar_berita ?>" alt="">
                                    <div class="media-body">
                                        <h6 class="mt-0"><a href="<?php echo $lainnya['url']; ?>"><?php echo $lainnya['judul'] ?></a></h6>
                                        <small class="text-muted"><?php echo date('d F Y', strtotime($lainnya['tanggal'])); ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div class="card-body" style="border-top: 1px rgba(0,0,0,.1) solid;">
                            <small class="text-muted">Belum ada berita terbaru.</small>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>