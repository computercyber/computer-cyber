<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Anggota</h1>
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
					<?= form_open_multipart(base_url('admin/anggota/update/' . $anggota->id_anggota)); ?>
					<div class="row">


						<div class="col-md-6">
							<div class="form-group form-group-lg">
								<label>Nama</label>
								<input type="text" name="nama_anggota" class="form-control" placeholder="Nama anggota" value="<?= $anggota->nama_anggota ?>" /><br>
							</div>

							<div class="form-group form-group-lg">
								<label>NIM</label>
								<input type="text" name="nim" class="form-control" placeholder="NIM" value="<?= $anggota->nim ?>" /><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Tanggal Lahir</label>
								<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="tanggal form-control" placeholder="Tanggal lahir" value="<?= $anggota->tanggal_lahir ?>" /><br>
							</div>

							<div class="form-group">
								<label class="d-block">Jenis Kelamin</label>
								<div class="custom-control custom-radio">
									<input type="radio" id="customRadio1" name="jenis_kelamin_anggota" class="custom-control-input" value="Pria" <?php if ($anggota->jenis_kelamin_anggota == 'Pria') {
																																						echo "checked";
																																					} ?>>
									<label class="custom-control-label" for="customRadio1">Pria</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" id="customRadio2" name="jenis_kelamin_anggota" class="custom-control-input" value="Wanita" <?php if ($anggota->jenis_kelamin_anggota == 'Wanita') {
																																						echo "checked";
																																					} ?>>
									<label class="custom-control-label" for="customRadio2">Wanita</label>
								</div>
							</div>

							<div class="form-group form-group-lg">
								<label>Email</label>
								<input type="email" name="email_anggota" class="form-control" placeholder="Email" value="<?= $anggota->email_anggota ?>" /><br>
							</div>

						</div>

						<div class="col-md-6">
							<div class="form-group form-group-lg">
								<label>No Hp</label>
								<input type="text" name="no_hp" class="form-control" placeholder="+628..." value="<?php echo $anggota->no_hp ?>">
								<?php echo form_error('no_hp', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Jurusan</label>
								<input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?= $anggota->jurusan ?>" /><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Divisi</label>
								<select class="form-control" name="id_divisi">
									<?php foreach ($divisi as $divisi) : ?>
									<option value="<?= $divisi->id_divisi ?>" <?php if ($anggota->id_divisi == $divisi->id_divisi) {
																						echo "selected";
																					} ?>>
										<?= $divisi->nama_divisi ?>
									</option>
									<?php endforeach ?>
								</select><br>
							</div>
							<div class="form-group form-group-lg">
								<label>Jabatan</label>
								<select class="form-control" name="id_jabatan">
									<?php foreach ($jabatan as $jabatan) : ?>
									<option value="<?php echo $jabatan->id_jabatan ?>" <?php if ($anggota->id_jabatan == $jabatan->id_jabatan) {
																								echo "selected";
																							} ?>>
										<?php echo $jabatan->nama_jabatan ?> - <?php echo $jabatan->tahun_jabatan ?>
									</option>
									<?php endforeach ?>
								</select><br>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Profile</label>
								<?php echo form_upload('gambar', set_value('gambar', $anggota->gambar), 'class="form-control"'); ?>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group form-group-lg">
								<label>Alamat</label>
								<textarea name="alamat_anggota" class="form-control" placeholder="Alamat anggota"><?= $anggota->alamat_anggota ?></textarea><br>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
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