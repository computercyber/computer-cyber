<style>
    * {
        font-family: 'Quicksand', sans-serif;
    }

    .jumbotron-divisi {
        height: 500px;
        background-size: cover;
    }

    .heading-menu {
        font-family: 'Quicksand', sans-serif;
        color: white;
        opacity: .8;
        font-weight: 400;
        margin-top: 120px !important;
    }

    .subheading-menu a {
        font-family: 'Quicksand', sans-serif;
        color: white;
        opacity: .8;
        transition: .4s;
    }

    .subheading-menu a:hover {
        color: #3ABAF4;
    }

    .single-service {
        text-align: center;
        background-color: #f9f9ff;
        padding: 40px 0;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    .single-service p {
        color: #222;
        transition: all 0.3s ease 0s;
    }

    .single-service:hover {
        cursor: default;
        box-shadow: 0px 20px 20px 0px rgba(58, 186, 244, .1);
        color: #fff;
    }

    .single-service:hover p {
        color: #3ABAF4;
        text-decoration-line: none;
    }

    .single-service img {
        width: 15%;
    }

    /* 
    .img-kadiv {
        box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, .1);
    } */


    @media (max-width: 575.98px) {
        .img-kadiv {
            width: 120px;
        }

        .jumbotron-divisi {
            background-position-x: -420px;
        }

        .heading-menu {
            font-size: 30px;
            margin-top: 170px !important;
        }

        .subheading-menu {
            font-size: 14px;
        }

        .row-detail-divisi {
            margin-top: -160px;
        }

        .single-service {
            margin-top: 30px;
        }

        .gallery-divisi {
            width: 100%;
            margin-bottom: 15px;
        }

        .card-anggota {
            margin-top: 20px;
        }
    }

    @media (min-width: 992px) {

        .jumbotron-kadiv {
            margin-top: -70px;
        }

        .img-kadiv {
            width: 230px;
        }

        .gallery-divisi {
            width: 100%;
            margin-right: 1px;
        }

        .section-detail {
            margin-top: -130px;
        }
    }
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-divisi">
    <div class="container">
        <div class="text-head-jumbotron">
            <h1 class="display-4 text-center heading-menu text-uppercase"><?php echo $divisi['nama_divisi']; ?></h1>
            <p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?></a></p>
        </div>
    </div>
</div>

<section class="section-detail">
    <!-- <div class="container">
        <?php if (!empty($ketua_divisi)) { ?>
            <div class="jumbotron jumbotron-fluid jumbotron-kadiv" style="background:none">
                <div class="text-center">
                    <img class="rounded-circle img-kadiv" src="<?= ($ketua_divisi->gambar != 'profile_placeholder.png') ? base_url('assets/upload/image/' . $ketua_divisi->gambar) : base_url('assets/img/profile_placeholder.png'); ?>" width="120" alt="profile-ketua-divisi-cc">
                    <h3 class="mt-3"><?php echo $ketua_divisi->nama_anggota ?></h3>
                    <p class="mt-1">Tahun kepengurusan <?php echo $ketua_divisi->tahun_jabatan ?></p>
                </div>
            </div>
        <?php } else { ?>
            <h6 class="text-center mb-5">Belum ada ketua divisi dipilih tahun kepengurusan ini.</h6>
        <?php } ?> -->


    <div class="row row-detail-divisi">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>Detail Divisi</h3>
                    <?php if (!empty($divisi)) { ?>
                        <?php echo $divisi['keterangan_divisi']; ?>
                    <?php } else { ?>
                        <h6 class="ml-3">Belum ada detail untuk divisi ini.</h6>
                    <?php } ?>

                    <h3 class="mt-5">Gallery Divisi</h3>
                    <div class="row mt-4">
                        <?php if (!empty($gallery_divisi)) { ?>
                            <?php foreach ($gallery_divisi as $gd) : ?>
                                <div class="col-md-4">
                                    <a href="javascript:;" data-toggle="modal" data-target="#showModal">
                                        <img class="gallery-divisi rounded modal-gallery-divisi" src="<?= ($gd->gambar != null and $gd->gambar != 'img_placeholder.png') ? base_url('assets/upload/image/' . $gd->gambar) : base_url('assets/img/profile_placeholder.png') ?>" class="" alt="gallery-<?= $gd->judul_gallery ?>" width="240px">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <h6 class="ml-3">Belum ada gallery untuk divisi ini.</h6>
                        <?php } ?>
                    </div>
                    <div class="text-center">
                        <div class="btn btn-outline-primary mx-auto mt-3">More</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-anggota bg-default mb-3">
                <div class="card-header ">Daftar Anggota Aktif</div>
                <?php foreach ($anggota_aktif as $a_aktif) : ?>
                    <div class="card-body border-bottom p-2">

                        <div class="d-inline-block align-middle ml-1">
                            <img class="img-radius rounded-circle  align-top m-r-15 mr-2" src="<?= ($a_aktif->gambar != null and $a_aktif->gambar != 'profile_placeholder.png') ? base_url('assets/upload/image/' . $a_aktif->gambar) : base_url('assets/img/profile_placeholder.png') ?>" width="50" height="50">
                            <div class="d-inline-block mt-2"><?= $a_aktif->nama_anggota; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($this->db->get_where('anggota', array('id_divisi' => $divisi['id_divisi']))->num_rows() > 1) { ?>
                    <a href="<?php echo site_url('divisi/' . $url . '?anggota=all') ?>" class="btn btn-outline-primary mx-auto mt-3 mb-3">More</a>
                <?php } ?>
            </div>


            <div class="card card-anggota bg-default mb-3">
                <div class="card-header ">Hasil Karya Divisi</div>
                <?php if (!empty($karya_divisi)) { ?>
                    <?php foreach ($karya_divisi as $kd) : ?>
                        <div class="card-body border-bottom p-2">
                            <img src="<?= ($kd->gambar_karya != null and $kd->gambar_karya != 'img_placeholder.png') ? base_url('assets/upload/image/' . $kd->gambar_karya) : base_url('assets/img/img_placeholder.png') ?>" class="img-fluid rounded mr-2" alt="img-karya-<?= $kd->judul_karya; ?>" width="80" height="">
                            <a href="<?= site_url('karya/' . $kd->url) ?>" target="_blank" rel="noopener noreferrer"><?= $kd->judul_karya; ?></a>
                        </div>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <div class="card-body border-bottom p-2">
                        <h6 class="ml-2 mt-2">Belum ada karya dipublish.</h6>
                    </div>

                <?php } ?>
                <?php if ($this->db->get_where('karya', array('karya_divisi' => $divisi['id_divisi']))->num_rows() >= 1) { ?>
                    <a href="<?php echo site_url('karya?divisi=' . $url) ?>" class="btn btn-outline-primary mx-auto mt-3 mb-3">More</a>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</section>


<!-- Modal load karya -->
<div class="portfolio-modal modal fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="text-uppercase" id="data_title"></h2>
                            <img class="img-fluid d-block mx-auto" id="img_gallery" src="" alt="">
                            <p id="data_desc"></p>
                            <ul class="list-inline">
                                <li id="date_gallery"></li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <i class="fas fa-times mr-2"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.modal-gallery-divisi').on('click', function() {

    });
</script>