<?php
$id_user = $this->session->userdata('id');
$user_login = $this->user_model->detail($id_user);
if ($user_login->akses_level == "99" || $user_login->akses_level == "1") {
	redirect('oops', 'refresh');
} else if ($user_login->akses_level == "21") {

	validation_errors('<div class="alert alert-warning">', '</div>'); ?>

	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Tambah User</h1>
			</div>


			<div class="section-body">
				<div class="card">
					<div class="card-body">
						<form action="<?php echo base_url('admin/user/add') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-group-lg">
										<label>Nama User</label>
										<input type="text" name="nama" class="form-control" placeholder="Nama user" required="required" value="<?php echo set_value('nama') ?>" />
										<div class="invalid-feedback">
											Siapa namamu?.
										</div><br>
									</div>
									<div class="form-group form-group-lg">
										<label>Username</label>
										<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required="" />
										<div class="invalid-feedback">
											Apa usernamemu?.
										</div><br>
									</div>
									<div class="form-group form-group-lg">
										<label>Password</label>
										<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required="">
										<div class="invalid-feedback">
											Isi paswordmu!.
										</div><br>
									</div>
									<div class="form-group form-group-lg">
										<label>Email</label>
										<input type="email" name="email" class="form-control" placeholder="email@domain.com" value="<?php echo set_value('email') ?>" required="">
										<div class="invalid-feedback">
											Email tidak valid!.
										</div><br>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-group-lg">
										<label>Gambar</label>
										<input type="file" name="gambar" required="required" class="form-control" value="<?php echo set_value('gambar') ?>"><br>
									</div>
									<div class="form-group">
										<label class="form-label">Akses Level</label>
										<div class="selectgroup w-100">
											<label class="selectgroup-item">
												<input type="radio" name="akses_level" value="21" class="selectgroup-input" checked="">
												<span class="selectgroup-button">Administrator</span>
											</label>
											<label class="selectgroup-item">
												<input type="radio" name="akses_level" value="1" class="selectgroup-input">
												<span class="selectgroup-button">Staff</span>
											</label>
											<label class="selectgroup-item">
												<input type="radio" name="akses_level" value="2" class="selectgroup-input">
												<span class="selectgroup-button">Member</span>
											</label>
											<label class="selectgroup-item">
												<input type="radio" name="akses_level" value="99" class="selectgroup-input">
												<span class="selectgroup-button">Block</span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary">Kirim</button>
									<button type="reset" class="btn btn-secondary ml-3">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>





<?php } else {
	echo ("Hayo mau ngapain ? :p");
} ?>