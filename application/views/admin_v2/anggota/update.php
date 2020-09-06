<div class="pcoded-main-container">
	<div class="pcoded-content">

		<section class="section">

			<div class="page-header">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">
							<div class="page-header-title">
								<p class="m-b-10 lead header-title"><?= $title; ?></p>
							</div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
								<li class="breadcrumb-item active"><a href="<?= site_url('admin/anggota') ?>">Anggota</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<form action="<?php echo site_url('admin/anggota/update/' . $anggota->id_anggota); ?>" method="post" enctype="multipart/form-data">
				<div class="section-body">
					<div class="card">
						<div class="card-header">
							<img class="img-radius align-top m-r-15 lazyload shadow img-anggota_show" src="<?= base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?= ($anggota->gambar != 'profile_placeholder.png') ? base_url('assets/upload/image/' . $anggota->gambar) : base_url('assets/img/profile_placeholder.png') ?>" width="130px">

							<div class="form-row mt-3">
								<div class="col-md-3">
									<div class="form-group">
										<label for="gambar">Gambar</label>
										<i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
										</i>
										<div class="input-group input-group-lg" style="margin-bottom:-10px;">
											<input name="gambar" class="custom-file-input custom-file-input_show <?php if (isset($error)) {
																														echo "is-invalid";
																													} ?>" type="file" class="mt-3" id="gambar">
											<label for="gambar" class="custom-file-label text-muted"><?php echo $anggota->gambar; ?></label>
											<?php if (isset($error)) { ?>
												<div class="invalid-feedback"><small><?php echo $error ?></small></div>
											<?php } ?>
											<small for="gambar" class="form-text text-muted">
												Gambar harus berukuran 400 x 400
											</small>
										</div>
									</div>

									<a href="javascript:;" class="btn btn-danger mt-1" id="btn-update-profile" onclick="return confirm('Ingin menghapus profile?')">Hapus profile</a>

								</div>
							</div>

						</div>
						<div class="card-body">

							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nama_anggota">Nama Lengkap</label>
										<input type="text" id="nama_anggota" name="nama_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_anggota') != null) {
																															echo "is-invalid";
																														} ?>" autofocus autocomplete="off" placeholder="Cth. Dadang Suratang" value="<?php echo $anggota->nama_anggota; ?>">
										<?php echo form_error('nama_anggota', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label for="nim">NIM</label>
											<input type="text" id="nim" name="nim" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nim') != null) {
																											echo "is-invalid";
																										} ?>" placeholder="170155..." value="<?php echo $anggota->nim; ?>">
											<?php echo form_error('nim', '<div class="invalid-feedback">', '</div>'); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="tahun_masuk_anggota">Tahun Masuk Anggota</label>
										<input type="number" id="tahun_masuk_anggota" name="tahun_masuk_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tahun_masuk_anggota') != null) {
																																			echo "is-invalid";
																																		} ?>" placeholder="20..." maxlength="4" value="<?php echo $anggota->tahun_masuk_anggota; ?>">
										<?php echo form_error('tahun_masuk_anggota', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="form-group">
											<label for="tanggal_lahir">Tanggal Lahir</label>
											<input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tanggal_lahir') != null) {
																																echo "is-invalid";
																															} ?>" value="<?php echo $anggota->tanggal_lahir; ?>">
											<?php echo form_error('tanggal_lahir', '<div class="invalid-feedback">', '</div>'); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Jenis Kelamin Anggota</label>
										<br>
										<div class="form-radio custom-control custom-radio custom-control-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="jenis_kelamin_anggota" id="membershipRadios1" value="pria" <?php if ($anggota->jenis_kelamin_anggota == 'pria') {
																																									echo 'checked';
																																								} ?>>Pria</label>
										</div>
										<div class="form-radio custom-control custom-radio custom-control-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="jenis_kelamin_anggota" id="membershipRadios2" value="Wanita" <?php if ($anggota->jenis_kelamin_anggota == 'wanita') {
																																									echo 'checked';
																																								} ?>>Wanita</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="email_anggota">Email Anggota</label>
										<input type="email" name="email_anggota" id="email_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('email_anggota') != null) {
																															echo "is-invalid";
																														} ?>" placeholder="mail@domain.com" value="<?php echo $anggota->email_anggota; ?>">
										<?php echo form_error('email_anggota', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="jurusan">Jurusan</label>
										<select class="form-control" required name="jurusan">
											<option selected disabled>-- Jurusan --</option>
											<optgroup label="Teknik">
												<option value="1" <?php if ($anggota->jurusan == '1') {
																		echo 'selected';
																	} ?>>Teknik Informatika</option>
												<option value="2" <?php if ($anggota->jurusan == '2') {
																		echo 'selected';
																	} ?>>Teknik Elektro</option>
											</optgroup>
											<optgroup label="Ekonomi">
												<option value="3" <?php if ($anggota->jurusan == '3') {
																		echo 'selected';
																	} ?>>Akuntansi</option>
												<option value="4" <?php if ($anggota->jurusan == '4') {
																		echo 'selected';
																	} ?>>Manajemen</option>
											</optgroup>
											<optgroup label="Fakultas Ilmu Kelautan dan Perikanan">
												<option value="5" <?php if ($anggota->jurusan == '5') {
																		echo 'selected';
																	} ?>>Ilmu Kelautan</option>
												<option value="6" <?php if ($anggota->jurusan == '6') {
																		echo 'selected';
																	} ?>>Manajemen Sumberdaya Perairan</option>
												<option value="7" <?php if ($anggota->jurusan == '7') {
																		echo 'selected';
																	} ?>>Budidaya Perairan</option>
												<option value="8" <?php if ($anggota->jurusan == '8') {
																		echo 'selected';
																	} ?>>Teknologi Hasil Perikanan</option>
												<option value="9" <?php if ($anggota->jurusan == '9') {
																		echo 'selected';
																	} ?>>Sosial Ekonomi Perikanan</option>
											</optgroup>
											<optgroup label="Fakultas Keguruan dan Ilmu Pendidikan">
												<option value="10" <?php if ($anggota->jurusan == '10') {
																		echo 'selected';
																	} ?>>Pendidikan Bahasa dan Sastra Indonesia</option>
												<option value="11" <?php if ($anggota->jurusan == '11') {
																		echo 'selected';
																	} ?>>Pendidikan Bahasa Inggris</option>
												<option value="12" <?php if ($anggota->jurusan == '12') {
																		echo 'selected';
																	} ?>>Pendidikan Kimia</option>
												<option value="13" <?php if ($anggota->jurusan == '13') {
																		echo 'selected';
																	} ?>>Pendidikan Biologi</option>
												<option value="14" <?php if ($anggota->jurusan == '14') {
																		echo 'selected';
																	} ?>>Pendidikan Matematika</option>
											</optgroup>
											<optgroup label="Fakultas Ilmu Sosial dan Ilmu Politik">
												<option value="15" <?php if ($anggota->jurusan == '15') {
																		echo 'selected';
																	} ?>>Imu Administrasi Negara</option>
												<option value="16" <?php if ($anggota->jurusan == '16') {
																		echo 'selected';
																	} ?>>Ilmu Pemerintahan</option>
												<option value="17" <?php if ($anggota->jurusan == '17') {
																		echo 'selected';
																	} ?>>Sosiologi</option>
												<option value="18" <?php if ($anggota->jurusan == '18') {
																		echo 'selected';
																	} ?>>Ilmu Hukum</option>
												<option value="19" <?php if ($anggota->jurusan == '19') {
																		echo 'selected';
																	} ?>>Hubungan Internasional</option>
												<option value="20" <?php if ($anggota->jurusan == '20') {
																		echo 'selected';
																	} ?>>Administrasi Publik</option>
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="no_hp">No Hp</label>
										<input type="text" name="no_hp" id="no_hp" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('no_hp') != null) {
																											echo "is-invalid";
																										} ?>" maxlength="14" placeholder="+628 ..." value="<?php echo $anggota->no_hp; ?>">
										<?php echo form_error('no_hp', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-6">

								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Status Keanggotaan</label>
										<br>
										<div class="form-radio custom-control custom-radio custom-control-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios1" value="aktif" <?php if ($anggota->status_anggota == 'aktif') {
																																							echo 'checked';
																																						} ?>>Aktif</label>
										</div>
										<div class="form-radio custom-control custom-radio custom-control-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios2" value="purna" <?php if ($anggota->status_anggota == 'purna') {
																																							echo 'checked';
																																						} ?>>Purna</label>
										</div>
										<div class="form-radio custom-control custom-radio custom-control-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios2" value="calon" <?php if ($anggota->status_anggota == 'calon') {
																																							echo 'checked';
																																						} ?>>Calon</label>
										</div>
										<div class="form-radio custom-control custom-radio custom-control-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios2" value="keluar" <?php if ($anggota->status_anggota == 'keluar') {
																																								echo 'checked';
																																							} ?>>Keluar</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="divisi">Divisi</label>
										<select class="form-control" name="id_divisi" required>
											<?php foreach ($divisi as $divisi) : ?>
												<option value="<?= $divisi->id_divisi ?>" <?php if ($anggota->id_divisi == $divisi->id_divisi) {
																								echo "selected";
																							} ?>>
													<?php echo $divisi->nama_divisi ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="jabatan">Jabatan</label>
										<?php if ($anggota->id_jabatan == null) : ?>
											<select class="form-control" name="id_jabatan">
												<option value="" selected>Tidak ada</option>
												<?php foreach ($jabatan as $j) : ?>
													<option value="<?= $j->id_jabatan ?>"><?= $j->nama_jabatan ?> - <?= $j->tahun_jabatan ?></option>
												<?php endforeach ?>
											</select>
										<?php else : ?>
											<select class="form-control" name="id_jabatan">
												<option value="">Tidak ada</option>
												<?php foreach ($jabatan as $j) : ?>
													<option value="<?= $j->id_jabatan ?>" <?php if ($anggota->id_jabatan == $j->id_jabatan) {
																								echo "selected";
																							} ?>>
														<?= $j->nama_jabatan ?> - <?= $j->tahun_jabatan ?>
													</option>
												<?php endforeach ?>
											</select>
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="alamat_anggota">Alamat</label>
										<textarea name="alamat_anggota" id="alamat_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('alamat_anggota') != null) {
																													echo "is-invalid";
																												} ?>" placeholder="Alamat di Tanjungpinang" rows="4"><?php echo $anggota->alamat_anggota; ?></textarea>
										<?php echo form_error('alamat_anggota', '<div class="invalid-feedback">', '</div>'); ?>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<a href="<?= site_url('admin/anggota') ?>" type="button" class="btn btn-default">Batal</a>
								<button class="btn btn-primary event-btn" type="submit">
									<span class="spinner-border spinner-border-sm" role="status"></span>
									<span class="load-text">Loading...</span>
									<span class="btn-text">Update data</span>
								</button>
							</div>

						</div>
					</div>
				</div>
			</form>
		</section>
	</div>

</div>


<script>
	$('#btn-update-profile').click(function() {
		let idAnggota = '<?= $anggota->id_anggota ?>';

		$.ajax({
			url: '<?= site_url('admin/anggota/update_profile') ?>',
			type: 'post',
			data: {
				id_anggota: idAnggota
			},
			success: function() {

				$('.img-anggota_show').attr('src', `<?= base_url('assets/img/profile_placeholder.png') ?>`)


				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					onOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
				})

				Toast.fire({
					icon: 'success',
					title: 'Berhasil mengubah foto profile',
					type: 'success',
				});
			},
			error: function() {
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					onOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
				})

				Toast.fire({
					icon: 'error',
					title: 'Terjadi kesalahan',
					type: 'error',
				});
			}
		})

	})


	$('.custom-file-input_show').change(function() {
		const sampul = document.querySelector('.custom-file-input_show');
		const sampulLabel = document.querySelector('.custom-file-label');
		const imgPreview = document.querySelector('.img-anggota_show');

		sampulLabel.textContent = sampul.files[0].name;

		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	})
</script>