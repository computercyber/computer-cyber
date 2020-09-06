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
                <a href="<?php echo site_url('artikel') ?>">News</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $artikel_detail->judul ?></li>
        </ol>
    </div>
</section><!-- END: CTA BEFORE CONTENT -->

<div class="section page-section">

    <div class="container">
        <!-- Page Heading/Breadcrumbs -->


        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8 col-md-10 mx-auto">

                <h1 class="mb-3 text-capitalize title"><?php echo $artikel_detail->judul ?>
                </h1>
                <p class="text-muted">Ditulis oleh <strong><a href=""><?php echo $artikel_detail->nama; ?></a></strong> pada <?php echo date('d F Y', strtotime($artikel_detail->tanggal)); ?> dalam kategori <strong><a href="">Artikel</a></strong></p>

                <!-- Preview Image -->
                <img class="img-fluid rounded lazyload mt-3 mb-3" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?php echo base_url() ?>assets/upload/image/thumbs/artikel/<?php echo $artikel_detail->gambar_berita ?>" alt="">

                <!-- Post Content -->
                <p class="content"><?php echo $artikel_detail->isi ?></p>

                <div class="card mt-5 mb-5" style="background-color: #F7F7F7">
                    <div class="card-body">
                        <strong>Lampiran : </strong>
                        <br>
                        <div class="mt-2">
                            <div class="btn btn-info btn-sm"><i class="fas fa-file-download mr-1"></i> Data.pdf</div>
                            <div class="btn btn-info btn-sm"><i class="fas fa-file-download mr-1"></i> Data2.pdf</div>
                        </div>
                    </div>
                </div>


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
                <div class="fb-share-button mb-4" data-href="http://localhost/computer-cyber/artikel/ your-page.html" data-layout="button" data-size="large">
                </div>


                <!-- <div id="disqus_thread"></div>
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
-->
            </div>

        </div>



    </div>
    <!-- /.row -->

    <section class="section-new-article" style="min-height: 300px; margin-bottom:-100px; background-color:#F7F7F7; border-top: 1px solid rgba(0, 0, 0, .1)">
        <div class="row">
            <div class="container">
                <div class="col-md-12 mx-auto">
                    <div class="pt-5 pb-5">
                        <div class="row">
                            <?php foreach ($artikel_lainnya as $al) : ?>
                                <div class="col-md-3 mb-4 portfolio-item col-artikel">
                                    <div class="card h-100">
                                        <a href=""><img class="card-img-top lazyload" data-src="<?php if ($al['gambar_berita'] == null) {
                                                                                                    echo base_url('assets/img/img_placeholder_cc.svg');
                                                                                                } else {
                                                                                                    echo base_url('assets/upload/image/thumbs/berita/' . $al['gambar_berita']);
                                                                                                } ?>" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" alt="gambar-<?php echo $al['judul']; ?>"></a>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="text-dark text-decoration-none" href="<?php echo base_url('artikel/' . $al['url']); ?>"><?php echo $al['judul']; ?></a>
                                            </h5>
                                        </div>
                                        <div class="card-footer border-0" style="background: none">
                                            <small class="text-muted">
                                                <?php if ($al['update_berita'] != null) {
                                                    echo '<strong>Diupdate pada ' . date('d F Y', $al['update_berita']) . '</strong>';
                                                } else {
                                                    echo date('d F Y', $al['tanggal']);
                                                } ?>

                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
<!-- /.container -->

</div>