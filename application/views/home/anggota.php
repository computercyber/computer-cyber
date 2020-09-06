<style>
	* {
		font-family: 'Quicksand', sans-serif;
	}

	.jumbotron-pengurus {
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
		font-family: 'Quicksand', sans-serif;
		color: white;
		opacity: .8;
		transition: .4s;
	}

	.subheading-menu a:hover {
		color: #3ABAF4;
	}

	@media (max-width: 575.98px) {
		.jumbotron-pengurus-list {
			margin-bottom: -170px;
		}
	}
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-pengurus">
	<div class="container">
		<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
		<p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?></a></p>
	</div>
</div>


<section>
	<div class="container">
		<div class="row mb-5">
			<?php if (!empty($jabatan)) { ?>
				<?php foreach ($jabatan as $jabatan) : ?>
					<div class="col-md-3">
						<div class="jumbotron jumbotron-fluid jumbotron-pengurus-list text-center" style="background:none">
							<img class="rounded-circle img-kadiv" src="<?= ($jabatan->gambar != 'profile_placeholder.png') ? base_url('assets/upload/image/' . $jabatan->gambar) : base_url('assets/img/profile_placeholder.png'); ?>" width="120px" height="120px" alt="profile-ketua-divisi-cc">
							<h5 class="mt-3"><?= $jabatan->nama_anggota ?></h5>
							<p class="mt-1"><?= $jabatan->nama_jabatan ?></p>
						</div>
					</div>
				<?php endforeach ?>
			<?php } else { ?>

				<div class="col-md-12">
					<div class="alert alert-warning" role="alert">
						Belum ada pengurus terpilih di tahun ini.
					</div>
				</div>


			<?php } ?>
		</div>
	</div>
</section>