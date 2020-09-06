<div class="pcoded-main-container">
	<div class="pcoded-content">

		<section class="section">

			<div class="page-header">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">
							<div class="page-header-title">
								<p class="m-b-10 lead header-title"><?php echo $title; ?></p>
							</div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('admin/gallery') ?>">Gallery</a></li>
								<li class="breadcrumb-item active"><a href="<?php echo site_url('admin/gallery/update/' . $gallery->id_gallery) ?>">Edit</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<form action="<?php echo site_url('admin/gallery/update/' . $gallery->id_gallery); ?>" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group form-group-lg">
										<label>Judul Gambar</label>
										<input type="text" name="judul_gallery" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('judul_gallery') != null) {
																										echo "is-invalid";
																									} ?>" placeholder="Judul gambar" value="<?php echo $gallery->judul_gallery ?>">
										<?php echo form_error('judul_gallery', '<div class="invalid-feedback">', '</div>'); ?>
									</div>

									<div class="form-group form-group-sm">
										<label for="">Pilih gambar</label>
										<div class="input-group input-group-lg" style="margin-bottom:-10px;">
											<input name="gambar" class="custom-file-input <?php if (isset($error)) {
																								echo "is-invalid";
																							} ?>" type="file" class="mt-3" id="gambar">
											<label for="gambar" class="custom-file-label text-muted"><?php if ($gallery->gambar != null) {
																											echo $gallery->gambar;
																										} else {
																											echo 'Pilih atau seret gambar ...';
																										} ?></label>
											<?php if (isset($error)) { ?>
												<div class="invalid-feedback"><small><?php echo $error ?></small></div>
											<?php } ?>
											<small for="gambar" class="form-text text-muted">
												Gambar harus berukuran 1366 x 768
											</small>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="gallery_divisi">Tag divisi <sup>(optional)</sup></label>
												<select class="custom-select" name="gallery_divisi" id="gallery_divisi">
													<option selected disabled>Pilih divisi...</option>
													<?php foreach ($divisi as $d) : ?>
														<option value="<?= $d->id_divisi ?>" <?= ($gallery->gallery_divisi == $d->id_divisi) ? "selected" : null; ?>><?= $d->nama_divisi ?></option>
													<?php endforeach ?>
													<option value="" <?= ($gallery->gallery_divisi == null) ? "selected" : null; ?>>Tidak ada</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="tanggal_acara">Tanggal kegiatan</label>
												<input type="date" name="tanggal_acara" id="tanggal_acara" class="form-control" value="<?= date('Y-m-d', $gallery->tanggal_acara) ?>">
											</div>
										</div>
									</div>






									<div class="form-group form-group-lg">
										<label>Keterangan Gambar</label>
										<textarea name="keterangan_gallery" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('keterangan_gallery') != null) {
																									echo "is-invalid";
																								} ?>" placeholder="Keterangan gambar" rows="10"><?php echo $gallery->keterangan_gallery ?></textarea>
										<?php echo form_error('keterangan_gallery', '<div class="invalid-feedback">', '</div>'); ?>
									</div>

									<div class="form-group">
										<label class="d-block">Status Berita</label>
										<div class="custom-control custom-radio">
											<input type="radio" id="customRadio1" name="status_gallery" class="custom-control-input" value="Publish" <?php if ($gallery->status_gallery == "Publish") {
																																							echo "checked";
																																						} ?>>
											<label class="custom-control-label" for="customRadio1">Publikasikan</label>
										</div>
										<div class="custom-control custom-radio">
											<input type="radio" id="customRadio2" name="status_gallery" class="custom-control-input" value="Draft" <?php if ($gallery->status_gallery == "Draft") {
																																						echo "checked";
																																					} ?>>
											<label class="custom-control-label" for="customRadio2">Masuk Draft</label>
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label id="label-gallery_show">Preview gambar sebelumnya</label>

										<figure class="figure mt-2">
											<img src="<?= base_url('assets/upload/image/' . $gallery->gambar) ?>" class="figure-img img-fluid rounded img-placeholder-gallery_show" alt="..." width="400px">
											<br>
											<small class="form-text text-muted">
												Kompress gambar secara <em>lossless</em> untuk menghemat space penyimpanan. Kami merekomendasikan anda untuk kompres gambar pada tautan <a href="https://compressor.io/" target="_blank" rel="noopener noreferrer">Compressor.io</a> ini dan pilih <strong>Lossless</strong>.
											</small>
										</figure>

										<!-- <img  src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" alt="img-thumbnail" class="img-thumbnail lazyload" data-src="<?php echo base_url('assets/upload/image/thumbs/gallery/' . $gallery->gambar) ?>"> -->

										<div class="form-text text-muted text-center">
											<!-- <?php echo $gallery->gambar; ?> -->
											<script>
												let img = $("#img-before-preview");

												$("<img>").attr("data-src", $(img).attr("data-src")).load(function() {
													let realWidth = this.width;
													let realHeight = this.height;


												});
												// alert("Original width=" + realWidth + ", " + "Original height=" + realHeight);
											</script>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<button class="btn btn-primary event-btn" type="submit">
											<span class="spinner-border spinner-border-sm" role="status"></span>
											<span class="load-text">Loading...</span>
											<span class="btn-text">Edit data</span>
										</button>
										<a href="<?php echo site_url('admin/gallery'); ?>" type="button" class="btn btn-default">Kembali</a>
									</div>
								</div>
							</div>
						</form>
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
		const imgPreview = document.querySelector('.img-placeholder-gallery_show');

		sampulLabel.textContent = sampul.files[0].name;

		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPreview.src = e.target.result;

			$('#label-gallery_show').html("Preview gambar")
		}
	})
</script>