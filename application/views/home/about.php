<style>
	.jumbotron-about {
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
		color: #3ABAF4;
	}

	#about {
		font-family: 'Quicksand', sans-serif !important;
	}

	.subheading {
		font-size: 16px;
		font-weight: 400;
	}

	.btn-link {
		color: #6771E6;
		font-weight: 500;
	}

	.icon-timeline {
		margin-top: 43px;
		margin-left: 6px;
	}

	.title-jadwal {
		margin-top: -60px;
	}

	.bg-registration {
		/* background-image: radial-gradient(circle farthest-side at top-left, #6771E6, #5E31C2); */
		background-image: linear-gradient(to right, #6771E6, #5E31C2);
	}

	.btn-yes {
		width: 180px;
		font-size: 100%;
		border-radius: 5rem;
		letter-spacing: .1rem;
		font-weight: bold;
		padding: .7rem;
		transition: all 0.2s;
		box-shadow: 0px 0px 20px 0px rgba(94, 49, 194, .5);
		background-image: linear-gradient(to right, #6771E6, #5E31C2);
	}

	.btn-submit {
		width: 200px;
		font-size: 95%;
		border-radius: 5rem;
		letter-spacing: .1rem;
		font-weight: bold;
		padding: .7rem;
		transition: all 0.2s;
		box-shadow: 0px 0px 20px 0px rgba(94, 49, 194, .5);
		background-image: linear-gradient(to right, #6771E6, #5E31C2);
	}

	.text-primary {
		color: #5E31C2;
	}

	@media (max-width: 575.98px) {
		.icon-timeline {
			margin-top: 15px;
			width: 50%;
		}

		.accordion {
			padding-bottom: 40px;
		}

		.title-faq {
			margin-top: 50px;
		}

	}

	@media (min-width: 992px) {
		.timeline-panel {
			margin-top: 50px;
		}
	}
</style>


<div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-about" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/about/about2.png)">
	<div class="container">
		<div class="text-head-jumbotron">
			<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
			<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
		</div>

	</div>
</div>

<section class="page-section" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<div class="title-jadwal text-center">
					<h2 class="mb-10 text-uppercase">Fase Kepemimpinan Computer Cyber</h2>
					<p>Perjalanan panjang kami hingga menjadi seperti sekarang :)</p>
				</div>

				<ul class="timeline mt-5">
					<li>
						<div class="timeline-image bg-registration">
							<img class="img-fluid icon-timeline">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h5>2014</h5>
								<h5 class="subheading">Computer Cyber Terbentuk</h5>
							</div>
							<div class="timeline-body">
								<p class="text-muted">Pada tahun 2014 terbentuklah komunitas kecil yang berawal dari sekumpulan orang-orang hebat yang mempunyai semangat juang yang tinggi, komunitas ini dinamakan <strong>Computer Cyber</strong> yang diketuai oleh <strong>Aris Kurniawan</strong> dan Wakil <strong>Arief Syahfutra</strong>. Terdapat 4 divisi yang terbentuk yaitu, Web Programming, Java Programming, Networking, dan Multimedia</p>
							</div>
						</div>
					</li>
					<li class="timeline-inverted">
						<div class="timeline-image bg-registration">
							<img class="img-fluid icon-timeline">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h5>28 Mei 2016</h5>
								<h4 class="subheading">Pergantian Kepengurusan Tahun 2015/2016</h4>
							</div>
							<div class="timeline-body">
								<p class="text-muted">Hasil yang diperoleh dari kegiatan rapat ini adalah kepengurusan tahun 2015/2016 akan dipimpin oleh <strong>Ade Putra Nurholik</strong> sebagai Ketua dan <strong>Muhammad Sarimin</strong> sebagai Wakil Ketua.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-image bg-registration">
							<img class="img-fluid icon-timeline">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h5>2017</h5>
								<h4 class="subheading">Kepengurusan Tahun 2016/2017</h4>
							</div>
							<div class="timeline-body">
								<p class="text-muted">Pada tahun ini hasil yang didapatkan dari Musyawarah Besar Computer Cyber 2017 yaitu terpilihnya Ketua <strong>Alga Mahargarika</strong> dan <strong>Edo Lorenza</strong></p>
							</div>
						</div>
					</li>
					<li class="timeline-inverted">
						<div class="timeline-image bg-registration">
							<img class="img-fluid icon-timeline">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h5>20 Oktober 2018</h5>
								<h4 class="subheading">Kepengurusan Tahun 2018/2019</h4>
							</div>
							<div class="timeline-body">
								<p class="text-muted">Pada 20 Oktober 2018 dilakukanlah Musyawarah Besar untuk memilih Kepengurusan untuk tahun 2018/2019, dan disepakatilah hasil akhir yaitu Ketua <strong>Sulthan Syarif Hanisetya Putra</strong> dan Wakil <strong>Dimas Ngroho Putro</strong></p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-image bg-registration">
							<img class="img-fluid icon-timeline">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h5>20 Oktober 2020</h5>
								<h4 class="subheading">Kepengurusan Tahun 2020/2021</h4>
							</div>
							<div class="timeline-body">
								<p class="text-muted">Pada 25 Juni 2020 dilakukanlah Musyawarah Besar untuk memilih Kepengurusan untuk tahun 2020/2021, dan disepakatilah hasil akhir yaitu Ketua <strong>Christoper Ray Manurung</strong> dan Wakil <strong>Dendi</strong></p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-image bg-registration">
							<h4>Inilah
								<br>Perjalananmu
								<br>Sekarang!</h4>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- INformasi-->
<section class="page-section" id="services">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="section-heading text-uppercase">Our Info</h2>
				<h3 class="section-subheading text-muted">Kami memiliki 5 divisi.</h3>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
				</span>
				<h4 class="service-heading">Informasi</h4>
				<p class="text-muted">Temukan informasi menarik seputar teknologi.</p>
				<a href="<?php echo base_url('informasi'); ?>" class="btn btn-primary" target="_blank">Read More</a>
			</div>
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
				</span>
				<h4 class="service-heading">Divisi</h4>
				<p class="text-muted">Computer Cyber memiliki 5 divisi. </p>
				<a href="<?php echo base_url('divisi'); ?>" class="btn btn-primary" target="_blank">Read More</a>
			</div>
			<div class="col-md-4">
				<span class="fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x text-primary"></i>
					<i class="fas fa-lock fa-stack-1x fa-inverse"></i>
				</span>
				<h4 class="service-heading">Pengurus</h4>
				<p class="text-muted">Pengurus serta anggota Computer Cyber. </p>
				<a href="<?php echo base_url('pengurus'); ?>" class="btn btn-primary" target="_blank">Read More</a>
			</div>
		</div>
	</div>
</section>