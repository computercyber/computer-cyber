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

	.subheading-menu {
		color: white;
		opacity: .8;
		transition: .4s;
	}

	.subheading-menu a:hover {
		color: #3ABAF4;
	}
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head">
	<div class="container">
		<h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
		<p class="lead text-center subheading-menu">Mohon maaf, halaman yang Anda cari tidak ada.</p>
		<div class="text-center">
			<button class="btn btn-outline-primary" onclick="goBack()">Go Back</button>
		</div>


		<script>
			function goBack() {
				window.history.back();
			}
		</script>
	</div>
</div>