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
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/pendaftaran') ?>">Pendaftaran</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo site_url('admin/pendaftaran/konfigurasi') ?>">Konfigurasi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->session->flashdata('status'); ?>

        <div class="alert alert-primary shadow-sm mt-3 rounded fade show" role="alert">
            <h4 class="alert-heading">Catatan <span class="pcoded-micon"><i class="ml-1 feather icon-clipboard"></i></h4>
            <p>Tanggal selesai dan tanggal mulai digunakan untuk membuka sesi pendaftaran dan pengumuman, jika belum mencapai hari yang telah ditentukan maka halaman web akan menampilkan pemberitahuan. Dan data yang diinputkan tidak akan masuk ke dalam database</p>
        </div>

        <section>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>Panel pengaturan</h4>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pendaftaran</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pengumuman</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Lain-lain</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="container mt-4">
                                        <form action="<?php echo site_url('admin/pendaftaran/konfigurasi'); ?>" method="post">
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="hidden" name="type" value="pendaftaran">
                                                    <label for="tanggal_pendaftaran_mulai">Tanggal mulai pendaftaran</label>
                                                    <input type="date" name="tanggal_pendaftaran_mulai" id="tanggal_pendaftaran_mulai" class="form-control" value="<?= $konfigurasi_pendaftaran['tanggal_mulai'] ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="tanggal_pendaftaran_mulai">Tanggal selesai pendaftaran</label>
                                                    <input type="date" name="tanggal_pendaftaran_selesai" id="tanggal_pendaftaran_selesai" class="form-control" value="<?= $konfigurasi_pendaftaran['tanggal_selesai'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <button class="btn btn-primary event-btn mt-3" type="submit">
                                                        <span class="spinner-border spinner-border-sm" role="status"></span>
                                                        <span class="load-text">Loading...</span>
                                                        <span class="btn-text">Atur konfigurasi</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="container mt-4">
                                        <form action="<?php echo site_url('admin/pendaftaran/konfigurasi'); ?>" method="post">
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="hidden" name="type" value="pengumuman">
                                                    <label for="tanggal_pengumuman_mulai">Tanggal mulai pengumuman</label>
                                                    <input type="date" name="tanggal_pengumuman_mulai" id="tanggal_pengumuman_mulai" class="form-control" value="<?= $konfigurasi_pengumuman['tanggal_mulai'] ?>">
                                                </div>
                                                <div class="col">
                                                    <label for="tanggal_pengumuman_mulai">Tanggal selesai pengumuman</label>
                                                    <input type="date" name="tanggal_pengumuman_selesai" id="tanggal_pengumuman_selesai" class="form-control " value="<?= $konfigurasi_pengumuman['tanggal_selesai'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <button class="btn btn-primary event-btn mt-3 " type="submit">
                                                        <span class="spinner-border spinner-border-sm" role="status"></span>
                                                        <span class="load-text">Loading...</span>
                                                        <span class="btn-text">Atur konfigurasi</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</div>