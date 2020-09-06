<div class="pcoded-main-container">
	<div class="pcoded-content">

		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<p class="m-b-10 lead header-title"><?php echo $title; ?></p>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
							<li class="breadcrumb-item active"><a href="<?php echo site_url('admin/gallery') ?>">Gallery</a></li>
						</ul>
					</div>
				</div>
			</div>
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
					<div class="form-row">
						<div class="col-md-8">
							<div class="form-group form-group-lg">
								<label>Judul Gambar</label>
								<input type="text" name="judul_gallery" class="form-control" placeholder="Judul gambar" value="<?php echo set_value('judul_gallery') ?>">
							</div>
							<div class="form-group form-group-sm">
								<label>Gambar</label>
								<label for="gambar">Gambar</label>
								<i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
								</i>
								<div class="input-group input-group-lg" style="margin-bottom:-10px;">
									<input name="gambar" class="custom-file-input <?php if (isset($error)) {
																						echo "is-invalid";
																					} ?>" type="file" class="mt-3" id="gambar">
									<label for="gambar" class="custom-file-label text-muted">Pilih atau seret gambar ...</label>
									<?php if (isset($error)) { ?>
										<div class="invalid-feedback"><small><?php echo $error ?></small></div>
									<?php } ?>
								</div>


								<br>
								<figure class="figure mt-2">
									<img src="<?= base_url('assets/img/img_placeholder.png') ?>" class="figure-img img-fluid rounded img-placeholder-gallery" alt="..." width="400px">
									<br>
									<small class="form-text text-muted">
										Kompress gambar secara <em>lossless</em> untuk menghemat space penyimpanan. Kami merekomendasikan anda untuk kompres gambar pada tautan <a href="https://compressor.io/" target="_blank" rel="noopener noreferrer">Compressor.io</a> ini dan pilih <strong>Lossless</strong>.
									</small>
								</figure>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group form-group-lg">
								<label>Keterangan Gambar</label>
								<textarea name="keterangan_gallery" class="form-control" placeholder="Keterangan gambar" rows="20"><?php echo set_value('keterangan_gallery') ?></textarea>
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="gallery_divisi">Tag divisi <sup>(optional)</sup></label>
								<select class="custom-select" name="gallery_divisi" id="gallery_divisi">
									<option selected disabled>Pilih divisi...</option>
									<?php foreach ($divisi as $d) : ?>
										<option value="<?= $d->id_divisi ?>"><?= $d->nama_divisi ?></option>
									<?php endforeach ?>
									<option value="">Tidak ada</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<label for="tanggal_acara">Tanggal kegiatan</label>
							<input type="date" name="tanggal_acara" id="tanggal_acara" class="form-control" value="<?= set_value('tanggal_acara') ?>">
						</div>
					</div>

					<div class="form-row">
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
					</div>

					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group form-group-lg">
								<input type="submit" name="submit" class="btn btn-primary " value="Upload" />
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

</div>

<script>
	$('.custom-file-input').change(function() {
		const sampul = document.querySelector('.custom-file-input');
		const sampulLabel = document.querySelector('.custom-file-label');
		const imgPreview = document.querySelector('.img-placeholder-gallery');

		sampulLabel.textContent = sampul.files[0].name;

		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	})
</script>