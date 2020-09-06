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
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/gallery') ?>">Pendaftaran</a></li>
                            <li class="breadcrumb-item active">Detail pendaftar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <img class="img-radius align-top m-r-15 lazyload" src="http://localhost/computer-cyber/assets/img/img_placeholder_cc.svg" data-src="<?php if ($pendaftar->gambar == "") {
                                                                                                                                                                        echo "https://demo.getstisla.com/assets/img/avatar/avatar-1.png";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo base_url('../register/uploads/img_member_candidate/' . $pendaftar->gambar);
                                                                                                                                                                    } ?>" width="100" height="100">
                            </div>
                            <div class="card-body">
                                <div class="profile-widget-description">

                                    <?php echo $pendaftar->nama; ?>
                                    <br>

                                    <br>
                                    <strong>NIM: </strong><br>
                                    <?php echo $pendaftar->nim; ?>
                                    <br>

                                    <br>
                                    <strong>Rencana divisi : </strong><br>
                                    <?php echo $pendaftar->nama_divisi; ?>
                                    <br>

                                    <br>
                                    <strong>Jenis kelamin : </strong><br>
                                    <?php echo $pendaftar->jenis_kelamin; ?>
                                    <br>

                                    <br>
                                    <strong>Tanggal lahir : </strong><br>
                                    <?php echo $pendaftar->tanggal_lahir; ?>
                                    <br>

                                    <br>
                                    <strong>E-mail : </strong><br>
                                    <?php echo $pendaftar->email; ?>
                                    <br>

                                    <br>
                                    <strong>Jurusan : </strong><br>
                                    <?php echo $pendaftar->judul_jurusan; ?>
                                    <br>

                                    <br>
                                    <strong>Alamat : </strong><br>
                                    <?php echo $pendaftar->alamat; ?>
                                    <br>

                                    <br>
                                    <strong>No HP : </strong><br>
                                    <?php echo $pendaftar->no_hp; ?>
                                    <br>

                                    <br>
                                    <strong>Portfolio : </strong><br>
                                    <?php if ($pendaftar->link == "") {
                                        echo '<span class="badge badge-danger">Tidak ada portfolio dicantumkan</span>';
                                    } else {
                                        echo '<a href="' . $pendaftar->link . '" target="_blank" rel="noopener noreferrer">' . $pendaftar->link . '</a>';
                                    }
                                    ?>
                                    <br>

                                    <br>
                                    <strong>Pengalaman organisasi : </strong><br>
                                    <?php echo $pendaftar->pengalaman_organisasi; ?>
                                    <br>

                                    <br>
                                    <strong>Alasan masuk : </strong><br>
                                    <?php echo $pendaftar->alasan_masuk; ?>
                                    <br>

                                    <br>
                                    <strong>Tanggal mendaftar : </strong><br>
                                    <?php echo $pendaftar->date_created . ' WIB'; ?>
                                </div>

                            </div>
                        </div>

                        <div class="text-center">
                            <a href="javascript:window.top.close();" class="btn btn-danger"><i class="feather icon-x mr-1"></i> close</a>
                        </div>



                    </div>
                </div>
            </div>
        </section>
    </div>

</div>