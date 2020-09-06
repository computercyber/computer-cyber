<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Konfigurasi Web</h1>
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
			<div class="card">
				<div class="card-body">

					<?php echo form_open(base_url('admin/dasbor/konfigurasi')); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-group-lg">
								<label>Nama Organisasi</label>
								<input type="text" name="namaweb" class="form-control" placeholder="Nama organisasi" value="<?php echo $konfigurasi->namaweb ?>" />
							</div>
							<div class="form-group">
								<label>Tagline/motto</label>
								<input type="text" name="tagline" class="form-control" placeholder="Tagline/motto" value="<?php echo $konfigurasi->tagline ?>" />
							</div>
							<div class="form-group">
								<label>Website</label>
								<input type="url" name="website" class="form-control" placeholder="http://website.com" value="<?php echo $konfigurasi->website ?>" />
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Email resmi" value="<?php echo $konfigurasi->email ?>" />
							</div>
							<div class="form-group">
								<label>Facebook</label>
								<input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" />
							</div>
							<div class="form-group">
								<label>Twitter</label>
								<input type="url" name="twitter" class="form-control" placeholder="Twitter" value="<?php echo $konfigurasi->twitter ?>" />
							</div>
							<div class="form-group">
								<label>Instagram</label>
								<input type="url" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" />
							</div>
							<div class="form-group">
								<label>Telepon</label>
								<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" />
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control" placeholder="Alamat lengkap"><?php echo $konfigurasi->alamat ?></textarea>
							</div>
							<div class="form-group">
								<label>Keywords (untuk pencarian Google)</label>
								<textarea name="keywords" class="form-control" placeholder="Keywords"><?php echo $konfigurasi->keywords ?></textarea>
							</div>
							<div class="form-group">
								<label>Visi Organisasi</label>
								<textarea name="description" class="form-control" placeholder="Description"><?php echo $konfigurasi->description ?></textarea>
							</div>
							<div class="form-group">
								<label>Metatext (kode Google Webmaster)</label>
								<textarea name="metatext" class="form-control" placeholder="Metatext" rows="5"><?php echo $konfigurasi->metatext ?></textarea>
							</div>

							<!-- SEMATKAN PETA -->
							<div class="form-group">
								<label>Google Map</label>
								<textarea name="google_map" class="form-control" placeholder="Kode iframe Google Map" rows="3"><?php echo $konfigurasi->google_map ?></textarea>
							</div>
							<style>
								iframe {
									width: 100%;
									height: 300px;
								}
							</style>
							<?php echo $konfigurasi->google_map ?>
							<!-- END SEMATKAN PETA -->
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">
							<div class="form-group form-group-lg">
								<input type="submit" name="submit" class="btn btn-success" value="Save" />
								<input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
							</div>
						</div>
					</div>


					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>
</div>