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

    .badge-divisi {
        border-color: #7E5ACE !important;
        color: #7E5ACE !important;
    }

    .badge-divisi:hover {
        background-color: #7E5ACE !important;
        border-color: #7E5ACE !important;
        color: white !important;
    }

    .col-badge-divisi .active {
        background-color: #7E5ACE !important;
        border-color: #7E5ACE !important;
        box-shadow: 0px 0px 20px 0px rgba(126, 90, 206, .8) !important;
        color: white !important;
    }

    .card-karya {
        border: 1px rgba(0, 0, 0, .1) solid;
        border-radius: 0.25em;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    .detail-karya,
    .detail-karya:hover {
        color: #7E5ACE;
        text-decoration: none;
    }

    .card-karya:hover {
        cursor: default;
        box-shadow: 0px 20px 20px 0px rgba(126, 90, 206, .1);
    }

    .single-service:hover p {
        color: #3ABAF4;
        text-decoration-line: none;
    }

    .single-service img {
        width: 15%;
    }

    @media (max-width: 575.98px) {
        .jumbotron-karya {
            background-position-x: -420px;
        }

        .heading-menu {
            margin-top: 170px !important;
        }

        .single-service {
            margin-top: 30px;
        }
    }
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head jumbotron-karya">
    <div class="container text-center">
        <h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
        <p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
        <a href="" class="btn btn-outline-primary">Masukan Karya Saya</a>
    </div>
</div>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 text-center col-badge-divisi">
            <?php foreach ($divisi_for_badges as $divisi) : ?>
                <a href="<?php echo site_url('karya?divisi=' . $divisi->url); ?>" class="btn btn-outline-primary rounded-pill mt-3 ml-3 badge-divisi <?php echo ($this->input->get('divisi') == $divisi->url) ? 'active' : null; ?>"><?php echo $divisi->nama_divisi; ?></a>
            <?php endforeach; ?>
            <a href="<?php echo site_url('karya?divisi=all'); ?>" class="btn btn-outline-primary ml-3 rounded-pill mt-3 badge-divisi <?php echo ($this->input->get('divisi') == 'all') ? 'active' : null; ?>">All</a>
        </div>
    </div>
    <div class="row mb-4">
        <?php foreach ($list_karya as $karya) : ?>
            <div class="col-lg-4 col-sm-6 portfolio-item my-3">
                <div class="card card-karya h-100">
                    <a href="<?php echo site_url('karya/' . $karya['url']); ?>">
                        <img class="card-img-top" src="<?= ($karya['gambar_karya'] != null && $karya['gambar_karya'] != 'img_placeholder.png') ? base_url('assets/upload/image/' .  $karya['gambar_karya']) : base_url('assets/img/img_placeholder.png') ?>" alt="">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $karya['judul_karya'] ?></h5>
                        <p class="card-text"><span class="text-muted">By</span> <?php echo $karya['nama_anggota']; ?></p>
                    </div>
                    <div class="card-footer border-top-0" style="background: none">
                        <a href="<?php echo site_url('karya/' . $karya['url']); ?>" class="detail-karya">Lihat detail<i class="ml-2 pb-1" width="16px" data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>