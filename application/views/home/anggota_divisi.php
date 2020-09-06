<style>
    * {
        font-family: 'Quicksand', sans-serif;
    }

    .jumbotron-divisi {
        height: 500px;
        background-size: cover;
    }

    .jumbotron-kadiv {
        max-height: 230px;
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
            margin-top: -10px;
        }

        .img-kadiv {
            width: 100px;
            height: 100px;
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
            <h1 class="display-4 text-center heading-menu text-uppercase"><?php echo $title_sub ?></h1>
            <p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $divisi['nama_divisi']; ?></a></p>
        </div>
    </div>
</div>

<section class="section-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="form-row">
                    <div class="col-2 mt-1">
                        <label for="filter">Filter : </label>
                    </div>
                    <div class="col-10">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option disabled selected>Filter</option>
                            <option id="all" <?php echo ($this->input->get('anggota') == 'all') ? 'selected' : null; ?>>All</option>
                            <option id="aktif" <?php echo ($this->input->get('anggota') == 'aktif') ? 'selected' : null; ?>>Aktif</option>
                            <option id="purna" <?php echo ($this->input->get('anggota') == 'purna') ? 'selected' : null; ?>>Purna</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <?php foreach ($anggota_all as $anggota_all) : ?>
                <div class="col-md-3">
                    <div class="jumbotron jumbotron-fluid jumbotron-kadiv text-center" style="background:none">
                        <img class="rounded-circle img-kadiv" src="<?= ($anggota_all->gambar != null and $anggota_all->gambar != 'profile_placeholder.png') ? base_url('assets/upload/image/' . $anggota_all->gambar) : base_url('assets/img/profile_placeholder.png') ?>" width="120px" height="120px" alt="profile-ketua-divisi-cc">
                        <h5 class="mt-3"><?php echo $anggota_all->nama_anggota ?></h5>
                        <p class="mt-1"><?php echo $anggota_all->tahun_masuk_anggota ?> &mdash; <strong class="text-capitalize"><?php echo $anggota_all->status_anggota ?></strong></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#all').on('click', function() {
            window.location.replace('<?php echo site_url('divisi/' . $url . '?anggota=all') ?>');
        });

        $('#aktif').on('click', function() {
            window.location.replace('<?php echo site_url('divisi/' . $url . '?anggota=aktif') ?>');
        })

        $('#purna').on('click', function() {
            window.location.replace('<?php echo site_url('divisi/' . $url . '?anggota=purna') ?>');
        })
    });
</script>