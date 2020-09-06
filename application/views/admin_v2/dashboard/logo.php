<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Ganti Logo</h1>
		</div>

		<?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>

		<?php

		//di atas list.php 

		if ($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo $this->session->flashdata('sukses');
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>';
		}
		?>

		<div class="section-body">
			<div class="container">
				<h2 class="section-title">Info</h2>
				<p class="section-lead">
					Penggantian logo harus melalui kesepakatan AD/ART pada Musyawarah Besar Computer Cyber
				</p>

				<div class="row">
					<div class="col-md-6">

						<div class="card">
							<div class="card-body">
								<?php echo form_open_multipart(base_url('admin/dasbor/logo')); ?>
								<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
								<div class="form-group form-group-lg">
									<label>Upload logo baru</label>
									<input type="file" name="logo" class="form-control" /><br>
								</div>

								<div class="form-group form-group-lg">
									<input type="submit" name="submit" class="btn btn-success" value="Save" />
									<input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
								</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-body form-group">
								<label>Logo saat ini</label>
								<p><img src="<?php echo base_url('assets/upload/image/thumbs/' . $konfigurasi->logo); ?>" alt="" class="img-responsive mt-4" style="display: block; margin: auto; width: 50%"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>