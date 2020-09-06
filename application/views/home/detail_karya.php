<style>
    .jumbotron-karya {
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
        color: white;
        opacity: .8;
        transition: .4s;
    }

    .subheading-menu a:hover {
        color: #3ABAF4;
    }

    .single-service {
        text-align: center;
        border: 1px rgba(0, 0, 0, .1) solid;
        /* background-color: #f9f9ff; */
        border-radius: 0.25em;
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

    .bg-default {
        background-color: #F7F7F7;
    }

    .btn-dribbble:hover {
        background-color: #E94E8A;
        color: white;
    }

    .btn-download {
        background-color: #7E5ACE !important;
        border-color: #7E5ACE !important;
        color: white !important;
    }

    .btn-youtube {
        background-color: #FF0000 !important;
        border-color: #FF0000 !important;
        color: white !important;
    }

    .badge-divisi {
        background-color: #7E5ACE !important;
        border-color: #7E5ACE !important;
        color: white !important;
        box-shadow: 0px 0px 20px 0px rgba(126, 90, 206, .8) !important;
    }

    @media (max-width: 575.98px) {
        .jumbotron-karya {
            background-position-x: -420px;
        }

        .heading-menu {
            margin-top: 170px !important;
        }

        .img-karya {
            margin-top: 100px;
        }

        .single-service {
            margin-top: 30px;
        }
    }
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-karya">
    <div class="container text-center">
        <h1 class="display-4 text-center heading-menu"><?php echo $detail_karya['judul_karya'] ?></h1>
        <p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $detail_karya['nama_anggota'] ?></a></p>
    </div>
</div>

<section class="section-detail">
    <div class="container">
        <div class="row" style="margin-top: -90px">
            <div class="col-md-12">
                <img class="img-fluid rounded mx-auto img-karya" src="<?= ($detail_karya['gambar_karya'] != null && $detail_karya['gambar_karya'] != 'img_placeholder.png') ? base_url('assets/upload/image/' .  $detail_karya['gambar_karya']) : base_url('assets/img/img_placeholder.png') ?>" alt="karya-<?= $detail_karya['nama_anggota'] ?>" style="width:100%">

                <h2 class="mt-4 text-capitalize"><?php echo $detail_karya['judul_karya']; ?></h2>

                <h5 class="mt-5">Deskripsi : </h5>
                <p><?php echo $detail_karya['detail_karya']; ?></p>

                <h5 class="mt-5 mb-4">Anggota Team : </h5>

                <?php foreach ($anggota_karya as $anggota_karya) : ?>
                    <div class="card bg-default mb-2 col-md-5">
                        <div class="card-body p-2">
                            <img src="<?= ($anggota_karya['gambar'] != 'profile_placeholder.png') ? base_url('assets/upload/image/' . $anggota_karya['gambar']) : base_url('assets/img/profile_placeholder.png'); ?>" class="rounded-circle mr-2" alt="profile-tim-karya" width="50px" height="50px">
                            <?php echo $anggota_karya['nama_anggota']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <h5 class="mt-5">Lihat : </h5>

                <?php if ($detail_karya['link_playstore'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_playstore']; ?>" target="_blank"><img src="<?php echo base_url('assets/img/karya/badge_google-play.png') ?>" class="img-fluid mt-2" alt="..." width="148px"></a>
                <?php } ?>

                <?php if ($detail_karya['link_appstore'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_appstore']; ?>" target="_blank"><img src="<?php echo base_url('assets/img/karya/badge_appstore.svg') ?>" class="img-fluid mt-2" alt="..." width="118px"></a>
                <?php } ?>

                <?php if ($detail_karya['link_github'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_github']; ?>" class="btn btn-secondary ml-2 mt-2" style="background-color: black" target="_blank"><i class="fab fa-github mr-1"></i> View on GitHub</a>
                <?php } ?>

                <?php if ($detail_karya['link_adobexd'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_github']; ?>" class="btn btn-secondary ml-2 mt-2" style="background-color: #31001E" target="_blank"><img src="<?php echo base_url('assets/img/karya/icon_adobexd.png') ?>" class="img-fluid mr-1 align-middle" alt="..." width="24px"> View on XD</a>
                <?php } ?>

                <?php if ($detail_karya['link_dribbble'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_github']; ?>" class="btn btn-default btn-dribbble ml-2 mt-2" style="border-color: #E94E8A;" target="_blank"><img src="<?php echo base_url('assets/img/karya/icon_dribbble.webp') ?>" class="img-fluid mr-1 align-middle" alt="..." width="24px"> View on Dribbble</a>
                <?php } ?>

                <?php if ($detail_karya['link_lain'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_lain']; ?>" class="btn btn-primary btn-download ml-2 mt-2"><i class="fas fa-cloud-download-alt mr-1"></i> Download</a>
                <?php } ?>

                <?php if ($detail_karya['link_youtube'] != null) { ?>
                    <a href="<?php echo $detail_karya['link_youtube']; ?>" class="btn btn-primary btn-youtube ml-2 mt-2"><i class="fab fa-youtube mr-1"></i> View on YouTube</a>
                <?php } ?>

                <hr class="mt-5">

                <?php if ($divisi_for_badges != null) { ?>
                    <div class="text-center mb-5">
                        <button type="button" class="btn btn-outline-primary rounded-pill mt-3 ml-3 badge-divisi active"><?php echo $divisi_for_badges['nama_divisi']; ?></button>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>