<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Anggota</h1>
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
					<?php echo form_open_multipart(base_url('admin/anggota/add')); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-group-lg">
								<label>Nama</label>
								<input type="text" name="nama_anggota" class="form-control" placeholder="Nama anggota" value="<?php echo set_value('nama_anggota') ?>" />
								<?php echo form_error('nama_anggota', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>
							<div class="form-group form-group-lg">
								<label>NIM</label>
								<input type="text" name="nim" class="form-control" placeholder="NIM" value="<?php echo set_value('nim') ?>" />
								<?php echo form_error('nim', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>
							<div class="form-group form-group-lg">
								<label>Tanggal Lahir</label>
								<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="tanggal form-control" placeholder="Tanggal lahir" value="<?php echo set_value('tanggal_lahir') ?>" /><br>
							</div>

							<div class="form-group">
								<label class="d-block">Jenis Kelamin</label>
								<div class="custom-control custom-radio">
									<input type="radio" id="customRadio1" name="jenis_kelamin_anggota" class="custom-control-input">
									<label class="custom-control-label" for="customRadio1" value="Pria">Pria</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" id="customRadio2" name="jenis_kelamin_anggota" class="custom-control-input">
									<label class="custom-control-label" for="customRadio2" value="Wanita">Wanita</label>
								</div>
							</div>

							<div class="form-group form-group-lg">
								<label>Email</label>
								<input type="email" name="email_anggota" class="form-control" placeholder="email@domain.com" value="<?php echo set_value('email_anggota') ?>" />
								<?php echo form_error('email_anggota', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Profile Anggota</label>
								<input type="file" name="gambar" class="form-control" /><br>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-group-lg">
								<label>No Hp</label>
								<input type="text" name="no_hp" class="form-control" placeholder="+628..." value="<?php echo set_value('no_hp') ?>">
								<?php echo form_error('no_hp', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Jurusan</label>
								<input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?php echo set_value('jurusan') ?>" />
								<?php echo form_error('jurusan', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Divisi</label>
								<select class="form-control" name="id_divisi">
									<?php foreach ($divisi as $divisi) : ?>
										<option value="<?php echo $divisi->id_divisi ?>">
											<?php echo $divisi->nama_divisi ?>
										</option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_divisi', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>

							<div class="form-group form-group-lg">
								<label>Jabatan</label>
								<select class="form-control" name="id_jabatan">
									<?php foreach ($jabatan as $jabatan) : ?>
										<option value="<?php echo $jabatan->id_jabatan ?>">
											<?php echo $jabatan->nama_jabatan ?> - <?php echo $jabatan->tahun_jabatan ?>
										</option>
									<?php endforeach ?>
								</select><br>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group form-group-lg">
								<label>Alamat</label>
								<textarea name="alamat_anggota" class="form-control" placeholder="Alamat anggota" value="<?php echo set_value('alamat_anggota') ?>"></textarea>
								<?php echo form_error('alamat_anggota', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br>
							</div>
						</div>

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