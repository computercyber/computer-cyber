<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Data User</h1>
		</div>

		<?php echo validation_errors('<div class="alert alert-warning">', '</div>') ?>

		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<?php echo form_open_multipart(base_url('admin/user/update/' . $users->id_user)); ?>
					<div class="row">
						<div class="col-md-6">
							<div class="form form-group form-group-lg">
								<label>Nama User</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?= $users->nama ?>" /><br>

								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Email" value="<?= $users->email ?>" /><br>


								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="username" value="<?= $users->username ?>" readonly /><br>

								<label>password</label>
								<input type="password" name="password" class="form-control" placeholder="password" value="<?= set_value('password') ?>" /><br>
							</div>
						</div>
						<div class="col-md-6">
							<!-- <div class="form-group">
							<?php $id_user = $this->session->userdata('id');
							$user_login = $this->user_model->detail($id_user);
							if ($user_login->akses_level == "21") {  ?>
							<label class="form-label">Akses Level</label>
							<div class="selectgroup w-100">
								<label class="selectgroup-item">
									<input type="radio" name="akses_level" value="21" class="selectgroup-input">
									<span class="selectgroup-button">Administrator</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="akses_level" value="1" class="selectgroup-input" <?php if ($users->akses_level == '1') {
																														echo "checked";
																													} ?>>
									<span class="selectgroup-button">Staff</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="akses_level" value="99" class="selectgroup-input" <?php if ($users->akses_level == '99') {
																														echo "checked";
																													} ?>>
									<span class="selectgroup-button">Block</span>
								</label>
								<?php } else if ($user_login->akses_level == "1") { ?>

								<?php } else { ?>

								<?php } ?>
							</div>
						</div> -->
							<div class="form form-group form-group-lg">
								<?php $id_user = $this->session->userdata('id');
								$user_login = $this->user_model->detail($id_user);
								if ($user_login->akses_level == "21") {  ?>
								<label>akses_level</label>
								<select class="form-control" name="akses_level">
									<option value="21">Administrator</option>
									<option value="1" <?php if ($users->akses_level == '1') {
																echo "selected";
															} ?>>User/Staff</option>
									<option value="99" <?php if ($users->akses_level == '99') {
																echo "selected";
															} ?>>Block</option>
								</select><br>
								<?php } else if ($user_login->akses_level == "1") { ?>

								<select class="form-control" name="akses_level" readonly>
									<option value="1" <?php if ($users->akses_level == '1') {
																echo "selected";
															} ?>>User/Staff</option>
								</select><br>

								<?php } else { ?>
								<select class="form-control" name="akses_level" readonly>
									<option value="99" <?php if ($users->akses_level == '99') {
																echo "selected";
															} ?>>Block</option>
								</select><br>
								<?php } ?>

								<label>Ganti Profile</label>
								<input type="file" name="gambar" class="form-control"><br>

								<label>Profile Sekarang</label><br>
								<img src="<?php echo base_url('assets/upload/image/thumbs/' . $users->gambar); ?>" alt="" class="img-responsive" width="200">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<input type="submit" name="submit" class="btn btn-success" value="Save" />
							<input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
						</div>
						<?php echo form_close(); ?>
					</div>

				</div>
			</div>
		</div>
	</section>
</div>