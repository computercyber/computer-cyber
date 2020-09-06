<style>
	* {
		font-family: 'Quicksand', sans-serif;
	}

	.jumbotron-head {
		min-height: 500px;
		background-size: cover;
	}

	.heading-menu {
		font-family: 'Quicksand', sans-serif;
		color: white;
		font-weight: 400;
		margin-top: 120px !important;
		/* text-shadow: 1px 1px 1px rgba(0, 0, 0, .3) !important; */
	}

	.subheading-menu a {
		color: white;
		transition: .4s;
	}

	.subheading-menu a:hover {
		color: #5E31C2;
	}

	.card-title {
		font-family: 'Quicksand', sans-serif;
		font-size: 18px;
		color: #5E31C2;
	}

	/* 
	.card-text-isi {
		font-size: 14px;
	} */

	.btn-search {
		background-image: linear-gradient(to right, #6771E6, #5E31C2);
		border: none;
		text-decoration: none !important;
		color: white !important;
		opacity: .8;
	}

	.card-informasi {
		transition: .4s;
	}

	.img-not-found {
		width: 400px;
		margin-bottom: 100px;
	}

	@media (min-width: 992px) {
		.card-informasi:hover {
			box-shadow: 0px 10px 20px 0px rgba(103, 113, 230, .2);
			/* rgba(70, 157, 250, .1); */
		}
	}


	@media (max-width: 575.98px) {
		.img-not-found {
			width: 250px;
			margin-bottom: 100px;
		}
	}
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/information/information.png)">
	<div class="container">
		<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
		<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
	</div>
</div>

<div class="container">

	<div class="row mt-5">
		<div class="col-md-8 mx-auto">
			<form action="<?php echo site_url('informasi'); ?>" method="post">
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

	<div class="row" style="margin-top:-10px">

		<div class="col-md-8 mx-auto">
			<hr>
			<div class="row">
				<div class="col-2">
					<small>Sort by :</small>
				</div>
				<div class="col-10">

					<div class="form-group">
						<select class="form-control" id="exampleFormControlSelect1">
							<option disabled selected>Sort by</option>
							<option>Newest Update</option>
							<option>Now Live</option>
							<option>End</option>
						</select>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-12">
			<?php if (empty($informasi)) : ?>
				<h5 class="text-center mb-5">Informasi tidak ditemukan!</h5>

				<img class="img-not-found mx-auto d-block pd-3" src="<?php echo base_url('assets/img/not_found.svg') ?>" alt="">
			<?php endif; ?>
			<?php foreach ($informasi as $informasi) { ?>
				<div class="card card-informasi mb-3">
					<div class="row no-gutters">
						<div class="col-md-12">
							<div class="card-body">
								<h5 class="card-title"><?php echo $informasi->judul ?></h5>
								<p class="card-text-isi"><?php echo $informasi->isi ?></p>
								<p class="card-text"><small class="text-muted"><?php echo date('d F Y', strtotime($informasi->tanggal));  ?></small></p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

			<?php
			echo $this->pagination->create_links();
			?>

			<!-- <div class="card mt-4">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="feature-left animate-box" data-animate-effect="fadeInLeft" style="border: 5px solid #253055; margin-bottom: 30px; padding: 20px;">
								<span class="icon">
									<img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $informasi->gambar ?>" alt="" class="img-responsive">
								</span>
								<div class="feature-copy">
									<h3><?php echo $informasi->judul ?></h3>
									<span><?php echo date('d F Y', strtotime($informasi->tanggal));  ?></span>
									<p style="border-top: 2px solid #303841;"><?php echo $informasi->isi ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->

		</div>
	</div>
</div>


<!-- <div class="gtco-section border-bottom">
	<div class="gtco-container">

	</div>
</div>

<div id="gtco-features" style="padding:0px;">
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="feature-center animate-box" data-animate-effect="fadeIn" style="border-top: 5px solid #18C09B; border-bottom: 5px solid #18C09B; padding-top: 30px;">
					<span class="icon">
						<i class="ti-announcement"></i>
					</span>
					<h3>INFORMASI</h3>
					<p>Temukan informasi menarik seputar teknologi. </p>
					<hr>
					<p><a href="<?php echo base_url('informasi'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="feature-center animate-box" data-animate-effect="fadeIn" style="border-top: 5px solid #18C09B; border-bottom: 5px solid #18C09B; padding-top: 30px;">
					<span class="icon">
						<i class="ti-settings"></i>
					</span>
					<h3>DIVISI</h3>
					<p>Computer Cyber memiliki 5 divisi. </p>
					<hr>
					<p><a href="<?php echo base_url('divisi'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="feature-center animate-box" data-animate-effect="fadeIn" style="border-top: 5px solid #18C09B; border-bottom: 5px solid #18C09B; padding-top: 30px;">
					<span class="icon">
						<i class="ti-user"></i>
					</span>
					<h3>PENGURUS</h3>
					<p>Pengerus serta anggota Computer Cyber. </p>
					<hr>
					<p><a href="<?php echo base_url('pengurus'); ?>" class="btn btn-primary">Lanjut Baca</a></p>
				</div>
			</div>
		</div>
	</div>
</div> -->