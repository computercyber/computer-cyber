<style>
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
		color: white;
		opacity: .8;
		transition: .4s;
	}

	.subheading-menu a:hover {
		color: #5E31C2;
	}


	.btn-primary,
	.btn-primary:hover {
		border: none;
		background-color: #5E31C2;
	}

	.btn-primary:hover {
		box-shadow: 0px 0px 20px 0px rgba(94, 49, 194, .3);
	}

	.single-service {
		text-align: center;
		border: 1px rgba(0, 0, 0, .1) solid;
		/* background-color: #f9f9ff; */
		border-radius: 0.25em;
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
		box-shadow: 0px 20px 20px 0px rgba(126, 90, 206, .1);
		color: #fff;
	}

	.single-service:hover p {
		color: #7E5ACE;
		text-decoration-line: none;
	}

	.single-service img {
		width: 15%;
	}

	.logo {
		filter: grayscale(100%);
		transition: .4s;
	}

	.logo:hover {
		filter: grayscale(0%);
	}

	@media (max-width: 575.98px) {
		.jumbotron-divisi {
			background-position-x: -420px;
		}

		.heading-menu {
			margin-top: 170px !important;
		}

		.single-service {
			margin-top: 30px;
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
		<div class="row">
			<?php foreach ($jabatan as $jabatan) : ?>
				<div class="col-4 mb-5">

					<div class="media mb-4">
						<i class="ti-agenda text-muted" style="font-size: 50px;"></i>

						<div class="media-body ml-3 ">
							<h3>Tahun</h3>
							<h5 class="mt-2 text-muted"><?= $jabatan->tahun_jabatan ?></h5>
							<a href="<?= base_url('pengurus/' . $jabatan->tahun_jabatan); ?>" class="btn btn-primary btn-pengurus mt-0">Lihat</a>
						</div>
					</div>

				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>