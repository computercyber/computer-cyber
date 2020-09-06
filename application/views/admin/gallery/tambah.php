<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Galery</h1>
		</div>

		<?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>


		<?php if (isset($error)) {
			echo '<div class="alert alert-warning">';
			echo $error;
			echo '</div>';
		}
		?>

		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<?php echo form_open_multipart(base_url('admin/gallery/add')); ?>
					<div class="col-md-8">
						<div class="form-group form-group-lg">
							<label>Judul Gambar</label>
							<input type="text" name="judul_gallery" class="form-control" placeholder="Judul gambar" value="<?php echo set_value('judul_gallery') ?>">
						</div>
						<div class="form-group form-group-sm">
							<label>Gambar</label>
							<input type="file" name="gambar" class="form-control" required="required">
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group form-group-lg">
							<label>Keterangan Gambar</label>
							<textarea name="keterangan_gallery" class="form-control" placeholder="Keterangan gambar"><?php echo set_value('keterangan_gallery') ?></textarea>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="d-block">Status Gambar</label>
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio1" name="status_gallery" class="custom-control-input" value="Publish">
								<label class="custom-control-label" for="customRadio1">Publikasikan</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio2" name="status_gallery" class="custom-control-input" value="Draft">
								<label class="custom-control-label" for="customRadio2">Masuk Draft</label>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group form-group-lg">
							<input type="submit" name="submit" class="btn btn-success " value="Save" />
							<input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
						</div>
					</div>

					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>
</div>