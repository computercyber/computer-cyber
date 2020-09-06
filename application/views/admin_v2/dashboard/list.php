<div class="pcoded-main-container">
    <div class="pcoded-content">

        <?php

        $get_user_id = $this->session->userdata('id');
        $get_user = $this->db->get_where('users', array('id_user' => $get_user_id))->row()->password;

        ?>

        <?php if ($get_user == sha1('admincc')) { ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#staticBackdrop').modal('show');
                });
            </script>
        <?php } ?>

        <!-- Modal -->
        <div class="modal hide fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Deteksi Keamanan!</h5>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            <i class="feather icon-alert-triangle mr-1" style="font-size: 16px;"></i>
                            Kami mendeteksi password yang anda gunakan tidak aman! Mohon untuk segera mengganti password demi keamanan sistem
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Urungkan</button>
                        <button type="button" class="btn btn-danger">Ganti sekarang</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $id_user = $this->session->userdata('id');
        $user_login = $this->user_model->detail($id_user);
        ?>

        <?php

        date_default_timezone_set("Asia/Jakarta");

        $b = time();
        $hour = date("G", $b);

        if ($hour >= 0 && $hour <= 11) {
            $greeting = "Selamat Pagi";
        } elseif ($hour >= 12 && $hour <= 14) {
            $greeting = "Selamat Siang";
        } elseif ($hour >= 15 && $hour <= 17) {
            $greeting = "Selamat Sore";
        } elseif ($hour >= 17 && $hour <= 18) {
            $greeting = "Selamat Petang";
        } elseif ($hour >= 19 && $hour <= 23) {
            $greeting = "Selamat Malam";
        }

        ?>

        <?php

        $name = $user_login->nama;
        $name = explode(' ', $name);

        $first_name = $name[0];
        $last_name = (isset($name[count($name) - 1])) ? $name[count($name) - 1] : '';

        ?>

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <p class="m-b-10 lead header-title">Hi, <?= $greeting ?> <?= $first_name ?> :)</p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Computer Cyber Admin Panel V2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="page-header breadcumb-sticky">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $title; ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/user') ?>">User</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="row">
            <div class="col-md-6">
                <h2>Dashboard</h2>
            </div>
        </div> -->

        <!-- [ Main Content ] start -->
        <div class="row mt-2">
            <!-- order-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Jumlah Informasi</h6>
                        <h2 class="text-right text-white"><i class="feather icon-info float-left"></i><span><?php echo $jumlah_informasi ?></span></h2>
                        <p class="m-b-0">Completed Orders<span class="float-right">351</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Jumlah Berita</h6>
                        <h2 class="text-right text-white"><i class="feather icon-tag float-left"></i><span><?php echo $jumlah_portofolio ?></span></h2>
                        <p class="m-b-0">This Month<span class="float-right">213</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Jumlah Gallery</h6>
                        <h2 class="text-right text-white"><i class="feather icon-aperture float-left"></i><span><?php echo $jumlah_gallery->num_rows(); ?></span></h2>
                        <p class="m-b-0">This Month<span class="float-right">$5,032</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Jumlah Anggota</h6>
                        <h2 class="text-right text-white"><i class="feather icon-users float-left"></i><span><?php echo $jumlah_anggota->num_rows(); ?></span></h2>
                        <p class="m-b-0">This Month<span class="float-right">$542</span></p>
                    </div>
                </div>
            </div>
            <!-- order-card end -->

        </div>
    </div>

    <!-- 
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-hero info-dashboard">
                        <div class="card-header">
                            <div class="card-icon text-white">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <div class="card-description">Informasi</div>
                            <h4><?php echo $jumlah_informasi ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-hero news-dashboard">
                        <div class="card-header">
                            <div class="card-icon text-white">
                                <i class="fab fa-neos"></i>
                            </div>
                            <div class="card-description">News</div>
                            <h4><?php echo $jumlah_portofolio ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-hero gallery-dashboard">
                        <div class="card-header">
                            <div class="card-icon text-white">
                                <i class="fab fa-envira"></i>
                            </div>
                            <div class="card-description">Gallery</div>
                            <h4><?php echo $jumlah_gallery->num_rows(); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-hero anggota-dashboard">
                        <div class="card-header">
                            <div class="card-icon text-white">
                                <i class="fas fa-braille"></i>
                            </div>
                            <div class="card-description">Anggota</div>
                            <h4><?php echo $jumlah_anggota->num_rows(); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="container">
                <h2 class="section-title">Upcoming Agenda</h2>

                <div class="row">
                    <?php foreach ($daftar_event as $agenda) { ?>
                        <div class="col-md-6">
                            <div class="card card-event">
                                <nav class="nav">
                                    <h5 class="mt-3 ml-4">Upcoming Event</h5>
                                    <a class="nav-link ml-auto mt-2 mr-1 disabled text-white" tabindex="-1" aria-disabled="true" href="#"><?php echo date("d M Y", strtotime($agenda->tanggal_mulai)); ?></a>
                                </nav>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h3 class="card-title card-event-title"><?php echo word_limiter($agenda->nama_agenda, 5); ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="btn btn-primary btn-event-detail" href="#">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php echo base_url(); ?>assets/img/card-event/event.svg" class="img-card-event" alt="">
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>

        <div class="section-body">
            <div class="container">
                <h2 class="section-title">Gallery Show</h2>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php $this->load->view('admin/dasbor/slider'); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="section-body">
            <div class="container">
                <h2 class="section-title">Latest Post</h2>
                <p class="section-lead">
                    Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
                </p>

                <div class="row">
                    <?php foreach ($berita as $berita) { ?>
                        <div class="col-md-4">
                            <div class="card card-latestpost-dashboard">
                                <div class="card-header">
                                    <h4><?php echo $berita->jenis_berita ?> - <strong><?php echo $berita->status_berita ?></strong></h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $berita->judul ?></h5>
                                    <p class="card-text"><?php echo character_limiter($berita->isi, 150); ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="<?php echo base_url() ?>admin/berita/update/<?php echo $berita->id_berita ?>" class="btn btn-primary btn-card-latestpost-dashboard">Edit news</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn btn-default text-muted" style="float: right"><?php echo date("d M Y", strtotime($berita->tanggal)); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="section-body mb-5">
                        <div class="container">
                            <a href="<?php echo base_url() ?>admin/berita" class="btn btn-primary btn-lg">Lihat semua berita</a>
                            <a href="<?php echo base_url() ?>admin/berita/add" class="ml-4 btn btn-primary btn-lg">Tambah Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> -->