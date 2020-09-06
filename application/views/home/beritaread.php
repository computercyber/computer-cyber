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
<div class="section page-section">
	<div class="container">

		<!-- Page Heading/Breadcrumbs -->
		<h1 class="mt-4 mb-3 text-capitalize"><?php echo $portfolio_read->judul ?>
		</h1>

		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo site_url('/') ?>">Home</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?php echo site_url('portfolio') ?>">News</a>
			</li>
			<li class="breadcrumb-item active"><?php echo $portfolio_read->judul ?></li>
		</ol>

		<div class="row">

			<!-- Post Content Column -->
			<div class="col-lg-8">

				<!-- Preview Image -->
				<img class="img-fluid rounded" src="<?php echo base_url() ?>assets/upload/image/<?php echo $portfolio_read->gambar ?>" alt="">

				<!-- Date/Time -->
				<p class="mt-4">Dibuat pada <?php echo date('d F Y', strtotime($portfolio_read->tanggal)); ?></p>

				<!-- Post Content -->
				<p><?php echo $portfolio_read->isi ?></p>


				<hr>
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
					<h5 class="card-header">Cari</h5>
					<div class="card-body">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Cari...">
							<span class="input-group-btn">
								<button class="btn btn-secondary" type="button">Cari!</button>
							</span>
						</div>
					</div>
				</div>

				<!-- Categories Widget -->
				<div class="card my-4">
					<h5 class="card-header">Divisi</h5>
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6">
								<ul class="list-unstyled mb-0">
									<li>
										<a href="<?php echo site_url('divisi/detail/1'); ?>">Programming</a>
									</li>
									<li>
										<a href="<?php echo site_url('divisi/detail/2'); ?>">Web Programming</a>
									</li>
									<li>
										<a href="<?php echo site_url('divisi/detail/3'); ?>">Robotik</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list-unstyled mb-0">
									<li>
										<a href="<?php echo site_url('divisi/detail/4'); ?>">Networking</a>
									</li>
									<li>
										<a href="<?php echo site_url('divisi/detail/5'); ?>">Multimedia</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Side Widget -->
				<div class="card my-4">
					<h5 class="card-header">Berita Terkait</h5>
					<div class="card-body">
						Belum ada berita terkait.
					</div>
				</div>

			</div>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->
</div>