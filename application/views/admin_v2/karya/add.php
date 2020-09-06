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
								<li class="breadcrumb-item"><a href="<?php echo site_url('admin/karya') ?>">Karya</a></li>
								<li class="breadcrumb-item active">Tambah karya</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<form action="<?php echo site_url('admin/karya/add'); ?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="judul_karya">Judul Karya</label>
										<input type="text" id="judul_karya" name="judul_karya" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('judul_karya') != null) {
																														echo "is-invalid";
																													} ?>" autofocus autocomplete="off" placeholder="Cth. E-voting" value="<?php echo set_value('judul_karya'); ?>">
										<?php echo form_error('judul_karya', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label for="user_karya">Dibuat oleh / Kepala tim</label>
											<input type="text" id="user_karya" name="user_karya" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('user_karya') != null) {
																															echo "is-invalid";
																														} ?>" placeholder="Cth. Dadang Suratang" value="<?php echo set_value('user_karya'); ?>">
											<?php echo form_error('user_karya', '<div class="invalid-feedback">', '</div>'); ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="jenis_karya">Jenis Karya</label>
										<select name="jenis_karya" id="jenis_karya" class="form-control">
											<option id="perorangan" value="Perorangan" <?php echo set_value('jenis_karya') == "Perorangan" ? "selected" : null ?>>Perorangan</option>
											<option id="tim" value="Tim" <?php echo set_value('jenis_karya') == 1 ? "Tim" : null ?>>Tim</option>
										</select>
										<?php echo form_error('jenis_karya', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="gambar_karya">Gambar</label>
										<i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
										</i>
										<br>
										<figure class="figure">
											<img src="<?= base_url('assets/img/img_placeholder.png') ?>" class="figure-img img-fluid rounded img-preview" alt="..." width="130px">
											<!-- <figcaption class="figure-caption">A caption for the above image.</figcaption> -->
										</figure>

										<div class="input-group input-group-lg" style="margin-bottom:-10px;">
											<input name="gambar_karya" class="custom-file-input <?php if (isset($error)) {
																									echo "is-invalid";
																								} ?>" type="file" class="mt-3" id="gambar">
											<label for="gambar_karya" class="custom-file-label text-muted">Seret atau pilih gambar</label>
											<?php if (isset($error)) { ?>
												<div class="invalid-feedback"><small><?php echo $error ?></small></div>
											<?php } ?>
											<small for="gambar_karya" class="form-text text-muted">
												Gambar harus berukuran 700 x 400
											</small>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="divisi">Divisi</label>
										<select class="form-control" name="karya_divisi" required>
											<option value="" selected disabled>Pilih divisi</option>
											<?php foreach ($divisi as $d) : ?>
												<option value="<?= $d->id_divisi ?>">
													<?php echo $d->nama_divisi ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row row-tim mt-3">
								<div class="col-md-12">
									<div class="card border border-primary">
										<div class="card-body">
											<label class="form-group">
												<label>Anggota tim</label>
											</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya" class="form-control" placeholder="Anggota karya ke-1">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya2" class="form-control" placeholder="Anggota karya ke-2">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya3" class="form-control" placeholder="Anggota karya ke-3">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya4" class="form-control" placeholder="Anggota karya ke-4">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya5" class="form-control" placeholder="Anggota karya ke-5">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya6" class="form-control" placeholder="Anggota karya ke-6">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya7" class="form-control" placeholder="Anggota karya ke-7">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya8" class="form-control" placeholder="Anggota karya ke-8">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya9" class="form-control" placeholder="Anggota karya ke-9">
													</div>
													<div class="form-group">
														<input type="text" name="anggota_karya[]" id="anggota_karya10" class="form-control" placeholder="Anggota karya ke-10">
													</div>
												</div>

												<p class="ml-3 mt-2 font-italic"><sup>*</sup> Harap memasukkan nama anggoa karya dengan menggunakan fitur autocomplete agar id anggota dapat dikenali</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-12">
									<div class="card border border-primary">
										<div class="card-body">
											<label class="form-group">
												<label>Daftar link</label>
											</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">Playstore</span>
															</div>
															<input type="text" name="link_playstore" class="form-control" placeholder="link">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">Appstore</span>
															</div>
															<input type="text" name="link_appstore" class="form-control" placeholder="link">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">Dribbble</span>
															</div>
															<input type="text" name="link_dribbble" class="form-control" placeholder="link">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">Adobe XD</span>
															</div>
															<input type="text" name="link_adobexd" class="form-control" placeholder="link">
														</div>
													</div>
												</div>
												<div class="col-md-6">

													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">GitHub</span>
															</div>
															<input type="text" name="link_github" class="form-control" placeholder="link">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">Youtube</span>
															</div>
															<input type="text" name="link_youtube" class="form-control" placeholder="link">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group mb-3">
															<div class="input-group-prepend">
																<span class="input-group-text">Link lain</span>
															</div>
															<input type="text" name="link_lain" class="form-control" placeholder="link">
														</div>
													</div>
												</div>
											</div>


										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="detail_karya">Detail Karya</label>
										<textarea name="detail_karya" id="detail_karya" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('detail_karya') != null) {
																												echo "is-invalid";
																											} ?>" placeholder="Tuliskan detail karya disini..." rows="8"></textarea>
										<?php echo form_error('detail_karya', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="status_karya">Status Karya</label>
										<select class="form-control" name="status_karya" required>
											<option value="Publish">Publish</option>
											<option value="Draft">Draft</option>
										</select>
									</div>
								</div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<button class="btn btn-primary event-btn" type="submit">
									<span class="spinner-border spinner-border-sm" role="status"></span>
									<span class="load-text">Loading...</span>
									<span class="btn-text">Update data</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<script>
	$(document).ready(function() {

		$('.row-tim').hide();

		$('#tim').on('click', function() {
			$('.row-tim').show(500);
		})

		$('#perorangan').on('click', function() {
			$('.row-tim').hide(500);
		})

		$('#user_karya').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});


		$('#anggota_karya').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya2').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya2').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya3').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya4').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya5').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya6').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya7').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya8').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya9').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#anggota_karya10').autocomplete({
			source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
		});

		$('#gambar').on('change', function() {
			const gambar = document.querySelector('#gambar');
			const gambarLabel = document.querySelector('.custom-file-label');
			const imgPreview = document.querySelector('.img-preview');

			gambarLabel.textContent = gambar.files[0].name;

			const fileGambar = new FileReader();

			fileGambar.readAsDataURL(gambar.files[0]);

			fileGambar.onload = function(e) {
				imgPreview.src = e.target.result;
			}
		})



	})
</script>