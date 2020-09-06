<!-- Main Content -->
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
</div>