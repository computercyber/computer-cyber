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
							<li class="breadcrumb-item"><a href="<?php echo site_url('admin/user') ?>">User</a></li>
							<li class="breadcrumb-item active">Detail</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<?php

		$id_user = $this->session->userdata('id');
		$get_password_update = $this->user_model->detail($id_user)->update_password_at;
		$get_user_password = $this->db->get_where('users', array('id_user' => $id_user))->row()->password;

		if ((time() - $get_password_update) > (60 * 60 * 24 * 30 * 6)) { ?>
			<div class="alert alert-warning shadow-sm p-3 mb-5 rounded fade show" role="alert">
				<h4 class="alert-heading">Tips Keamanan <span class="pcoded-micon"><i class="ml-1 feather icon-bell"></i></h4>
				<p>Anda terakhir menganti password bulan <?php echo date('F Y', time() - $get_password_update); ?> yang lalu. Kami menyarankan anda untuk mengganti password setiap 6 bulan sekali untuk menjaga keamanan sistem.</p>
				<hr>
				<a href="" class="btn btn-outline-warning">Ganti sekarang</a>
				<a href="" class="btn btn-default text-muted" data-dismiss="alert" aria-label="Close">Abaikan</a>
			</div>
		<?php } else if ($get_user_password == sha1('admincc')) { ?>
			<div class="alert alert-warning shadow-sm p-3 mb-5 rounded fade show" role="alert">
				<h4 class="alert-heading">Deteksi Keamanan <span class="pcoded-micon"><i class="ml-1 feather icon-bell"></i></h4>
				<p>Kami mendeteksi password yang anda gunakan tidak aman! Mohon untuk segera mengganti password demi keamanan sistem.</p>
				<hr>
				<a href="" class="btn btn-outline-warning">Ganti sekarang</a>
				<a href="" class="btn btn-default text-muted" data-dismiss="alert" aria-label="Close">Abaikan</a>
			</div>
		<?php } ?>
		<section class="section">

			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<?php echo form_open_multipart(base_url('admin/user/update/' . $users->id_user)); ?>
						<style>
							input[type=text]:focus {
								border: 1px solid #0D7EFF;
							}
						</style>

						<input type="hidden" name="type" value="updateProfile">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama User</label>
									<input type="text" name="nama" class="form-control color-class <?php if ($this->form_validation->run() == FALSE && form_error('nama') != null) {
																										echo "is-invalid";
																									} ?>" placeholder="Nama User" value="<?= $users->nama ?>" autofocus maxlength="50">


									<?php echo form_error('nama', '<div class="invalid-feedback">', '</div>'); ?>


								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" placeholder="Email" value="<?= $users->email ?>" readonly>
									<small id="passwordHelpBlock" class="form-text text-muted">
										Email tidak dapat diganti!
									</small>
								</div>
								<div class="form-group">
									<label>Username</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="inputGroupPrepend3">@</span>
										</div>
										<input type="text" class="form-control" id="validationServerUsername" aria-describedby="inputGroupPrepend3" value="<?= $users->username ?>" readonly>
										<div class="invalid-feedback">
											Please choose a username.
										</div>
									</div>
									<small class="form-text text-muted">
										Username tidak dapat diganti!
									</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form form-group form-group-lg">
									<?php $id_user = $this->session->userdata('id');
									$user_login = $this->user_model->detail($id_user);
									if ($user_login->akses_level == "21") {  ?>
										<label>Akses_level</label>
										<select class="form-control" name="akses_level" readonly>
											<option value="21">Administrator</option>
											<option value="1" <?php if ($users->akses_level == '1') {
																	echo "selected";
																} ?> disabled>User/Staff</option>
											<option value="99" <?php if ($users->akses_level == '99') {
																	echo "selected";
																} ?> disabled>Block</option>
										</select>
										<small class="form-text text-muted">
											Super Admin tidak dapat mengganti akses levelnya sendiri demi keamanan!
										</small>
										<br>
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
									<label for="gambar">Ganti Profile</label>
									<i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
									</i>
									<div class="input-group input-group-lg" style="margin-bottom:-10px;">
										<input name="gambar" class="custom-file-input" type="file" class="mt-3" id="gambar">
										<label for="gambar" class="custom-file-label text-muted">Pilih atau seret gambar ...</label>
										<small for="gambar" class="form-text text-muted">
											Gambar harus berukuran 200 x 200
										</small>
									</div><br>

									<label>Profile Sekarang</label><br>
									<img src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?php echo base_url('assets/upload/image/thumbs/user/' . $users->gambar); ?>" alt="" class="img-responsive lazyload" width="200">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<a href="<?= site_url('admin/user/detail21/' . $users->username) ?>" class="btn btn-outline-default mr-1">Batal</a>
									<button class="btn btn-primary event-btn" type="submit">
										<span class="spinner-border spinner-border-sm" role="status"></span>
										<span class="load-text">Loading...</span>
										<span class="btn-text">Update informasi</span>
									</button>
								</div>
							</div>

							<?php echo form_close(); ?>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
</div>