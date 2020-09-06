<div class="pcoded-main-container">
	<div class="pcoded-content">

		<section class="section">

			<div class="page-header breadcumb-sticky">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">
							<div class="page-header-title">
								<h5 class="m-b-10"><?php echo $title; ?></h5>
							</div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
								<li class="breadcrumb-item active"><a href="<?php echo site_url('admin/anggota') ?>">Anggota</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart(base_url('admin/artikel/update/' . $artikel->id_berita)); ?>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-group-lg">
									<label>Judul</label>
									<input type="text" name="judul" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('judul') != null) {
																							echo "is-invalid";
																						} ?>" placeholder="Judul Berita" value="<?php echo $artikel->judul; ?>" /><br>
									<?php echo form_error('judul', '<div class="invalid-feedback">', '</div>'); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-lg">
									<label>Perbaiki url <sup class="text-primary">untuk SEO</sup></label>
									<input type="text" name="url" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('url') != null) {
																							echo "is-invalid";
																						} ?>" placeholder="Judul Berita" value="<?php echo $artikel->url; ?>" /><br>
									<?php echo form_error('url', '<div class="invalid-feedback">', '</div>'); ?>
								</div>
							</div>
						</div>


						<div class="row" style=" margin-top:-10px">
							<div class="col-md-6">
								<div class="form-group form-group-lg">
									<label>Sampul Artikel</label>
									<i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
									</i>
									<div class="input-group input-group-lg" style="margin-bottom:20px;">
										<input name="gambar" class="custom-file-input <?php if (isset($error)) {
																							echo "is-invalid";
																						} ?>" type="file" class="mt-3" id="gambar">
										<label for="gambar" class="custom-file-label text-muted">Pilih atau seret gambar ...</label>
										<?php if (isset($error)) { ?>
											<div class="invalid-feedback"><small><?php echo $error ?></small></div>
										<?php } ?>
										<small for="gambar" class="form-text text-muted">
											Gambar harus berukuran 1360 x 720
										</small>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group form-group-lg">
									<label>Jenis Berita</label>
									<select name="jenis_berita" class="form-control">
										<option value="Berita">Berita</option>
										<option value="Artikel" <?php if ($artikel->jenis_berita == "Artikel") {
																	echo "selected";
																} ?>>Artikel</option>
										<option value="Informasi" <?php if ($artikel->jenis_berita == "Informasi") {
																		echo "selected";
																	} ?>>Informasi</option>

									</select>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12">
								<div class="form-group form-group-lg">
									<label>Isi Artikel</label>
									<textarea id="summernote" name="isi" class="form-control" placeholder="Isi berita"><?php echo $artikel->isi ?></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group form-group-lg">
									<label>Lampiran Dokumen <sup class="text-danger">optional</sup></label>
									<div class="input-group input-group-lg" style="margin-bottom:20px;">
										<input name="dokumen1" class="custom-file-input <?php if (isset($error)) {
																							echo "is-invalid";
																						} ?>" type="file" class="mt-3" id="dokumen1">
										<label for="dokumen1" class="custom-file-label text-muted">Pilih atau seret file ...</label>
										<?php if (isset($error)) { ?>
											<div class="invalid-feedback"><small><?php echo $error ?></small></div>
										<?php } ?>
										<small for="dokumen1" class="form-text text-muted">
											Dokumen tidak lebih besar dari 10 MB
										</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-lg">
									<label>Lampiran Dokumen 2 <sup class="text-danger">optional</sup></label>
									<div class="input-group input-group-lg" style="margin-bottom:20px;">
										<input name="dokumen2" class="custom-file-input <?php if (isset($error)) {
																							echo "is-invalid";
																						} ?>" type="file" class="mt-3" id="dokumen2">
										<label for="dokumen2" class="custom-file-label text-muted">Pilih atau seret file ...</label>
										<?php if (isset($error)) { ?>
											<div class="invalid-feedback"><small><?php echo $error ?></small></div>
										<?php } ?>
										<small for="dokumen2" class="form-text text-muted">
											Dokumen tidak lebih besar dari 10 MB
										</small>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group form-group-lg">
									<label>Lampiran Dokumen 3 <sup class="text-danger">optional</sup></label>
									<div class="input-group input-group-lg" style="margin-bottom:20px;">
										<input name="dokumen3" class="custom-file-input <?php if (isset($error)) {
																							echo "is-invalid";
																						} ?>" type="file" class="mt-3" id="dokumen3">
										<label for="dokumen3" class="custom-file-label text-muted">Pilih atau seret file ...</label>
										<?php if (isset($error)) { ?>
											<div class="invalid-feedback"><small><?php echo $error ?></small></div>
										<?php } ?>
										<small for="dokumen3" class="form-text text-muted">
											Dokumen tidak lebih besar dari 10 MB
										</small>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="card shadow-none border border-primary">
									<div class="card-body">
										<div class="form-group">
											<label class="d-block">Status Berita</label>
											<div class="custom-control custom-radio">
												<input type="radio" id="customRadio1" name="status_berita" class="custom-control-input" value="Publish" <?php if ($artikel->status_berita == "Publish") {
																																							echo "checked";
																																						} ?>>
												<label class="custom-control-label" for="customRadio1">Publikasikan</label>
											</div>
											<div class="custom-control custom-radio">
												<input type="radio" id="customRadio2" name="status_berita" class="custom-control-input" value="Draft" <?php if ($artikel->status_berita == "Draft") {
																																							echo "checked";
																																						} ?>>
												<label class="custom-control-label" for="customRadio2">Masuk Draft</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group form-group-lg">
									<button class="btn btn-primary event-btn" type="submit">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										<span class="load-text">Loading...</span>
										<span class="btn-text">Posting</span>
									</button>
									<a href="<?php echo site_url('admin/artikel') ?>" class="btn btn-secondary ml-2">Kembali</a>
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

<script type="text/javascript" src="<?php echo base_url() . 'assets/summernote/summernote-bs4.js'; ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#summernote').summernote({
			height: "500px",
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});



		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?php echo site_url('admin/artikel/upload_image') ?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$('#summernote').summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "<?php echo site_url('admin/artikel/delete_image') ?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}

	});
</script>