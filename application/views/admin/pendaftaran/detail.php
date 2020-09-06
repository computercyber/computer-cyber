<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Pendaftar</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <?php foreach ($pendaftaran as $pendaftar) : ?>
                                <img alt="<?php if ($pendaftar->gambar == "") {
                                                    echo "tidak ada profile";
                                                } ?>" src="<?php if ($pendaftar->gambar == "") {
                                                                    echo "https://demo.getstisla.com/assets/img/avatar/avatar-1.png";
                                                                } else {
                                                                    echo base_url('../register/uploads/img_member_candidate/' . $pendaftar->gambar);
                                                                } ?>" class="rounded-circle profile-widget-picture">
                            <?php endforeach; ?>
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Nim</div>
                                    <div class="profile-widget-item-value"><?php echo $pendaftar->nim; ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Tanggal lahir</div>
                                    <div class="profile-widget-item-value"><?php echo date('d M Y', strtotime($pendaftar->tanggal_lahir)); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?php echo $pendaftar->nama; ?> <div class="text-muted d-inline font-weight-normal"></div>
                            </div>
                            <strong>Rencana divisi : </strong>
                            <?php echo $pendaftar->divisi; ?>
                            <br>
                            <strong>Jenis kelamin : </strong>
                            <?php echo $pendaftar->jenis_kelamin; ?>
                            <br>
                            <strong>E-mail : </strong>
                            <?php echo $pendaftar->email; ?>
                            <br>
                            <strong>Jurusan : </strong>
                            <?php echo $pendaftar->jurusan; ?>
                            <br>
                            <strong>Alamat : </strong>
                            <?php echo $pendaftar->alamat; ?>
                            <br>
                            <strong>No HP : </strong>
                            <?php echo $pendaftar->no_hp; ?>
                            <br>
                            <strong>Portfolio : </strong>
                            <?php if ($pendaftar->link == "") {
                                echo '<span class="badge badge-danger">Tidak ada portfolio dicantumkan</span>';
                            } else {
                                echo '<a href="' . $pendaftar->link . '" target="_blank">' . $pendaftar->link . '</a>';
                            }
                            ?>
                            <br>
                            <strong>Pengalaman organisasi : </strong>
                            <?php echo $pendaftar->pengalaman_organisasi; ?>
                            <br>
                            <strong>Alasan masuk : </strong>
                            <?php echo $pendaftar->alasan_masuk; ?>
                            <br>
                            <strong>Tanggal mendaftar : </strong>
                            <?php echo $pendaftar->date_created . ' WIB'; ?>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php echo site_url('admin/pendaftaran/'); ?>" class="btn btn-primary"><i class="fas fa-angle-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>