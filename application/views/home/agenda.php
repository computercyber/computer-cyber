<style>
    * {
        font-family: 'Quicksand', sans-serif;
    }

    .jumbotron-head {
        min-height: 500px;
        background-size: cover;
    }

    .event-detail {
        font-size: 15px;
    }

    .heading-menu {
        font-family: 'Quicksand', sans-serif;
        color: white;
        font-weight: 400;
        margin-top: 120px !important;
        /* text-shadow: 1px 1px 1px rgba(0, 0, 0, .3) !important; */
    }

    .subheading-menu a {
        color: white;
        transition: .4s;
    }

    .subheading-menu a:hover {
        color: #5E31C2;
    }

    .card {
        transition: .4s;
    }

    .card-title {
        color: #5E31C2;
        font-size: 18px;
        font-weight: 600;
    }

    .card-text {
        font-size: 15px;
    }

    .btn-search {
        background-image: linear-gradient(to right, #6771E6, #5E31C2);
        border: none;
        text-decoration: none !important;
        color: white !important;
        opacity: .8;
    }

    .img-not-found {
        width: 400px;
        margin-bottom: 100px;
    }

    @media (min-width: 992px) {
        .card-agenda:hover {
            box-shadow: 0px 10px 20px 0px rgba(103, 113, 230, .2);
            /* rgba(70, 157, 250, .1); */
        }
    }

    @media (max-width: 575.98px) {
        .img-not-found {
            width: 250px;
            margin-bottom: 100px;
        }
    }
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/event/event3.jpg)">
    <div class="container">
        <h1 class="display-4 text-center heading-menu">EVENT</h1>
        <p class="lead text-center subheading-menu text-white"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
    </div>
</div>

<div class="container">

    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <form action="<?php echo site_url('agenda'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search ..." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <!-- <button class="btn btn-primary btn-search" type="submit" id="button-addon2">Search</button> -->
                        <input type="submit" name="submit" class="btn btn-primary btn-search" value="Search">
                    </div>

                    <!-- <?php foreach ($total_rows as $t) : ?>
                        <h4>Result : <?php echo $t; ?></h4>
                    <?php endforeach ?> -->
                </div>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top:-10px">

        <div class="col-md-8 mx-auto">
            <hr>
            <div class="row">
                <div class="col-2">
                    <small>Sort by :</small>
                </div>
                <div class="col-10">

                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option disabled selected>Sort by</option>
                            <option id="news">Newest Update</option>
                            <option>Now Live</option>
                            <option>End</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <?php if (empty($agenda)) : ?>
                <h5 class="text-center mb-5">Agenda tidak ditemukan!</h5>

                <img class="img-not-found mx-auto d-block pd-3" src="<?php echo base_url('assets/img/not_found.svg') ?>" alt="">
            <?php endif; ?>
            <?php foreach ($agenda as $agenda) { ?>
                <div class="card card-agenda mb-4">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5 class="card-title"><?php echo $agenda->nama_agenda ?></h5>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                <p class="card-text"><?php echo $agenda->keterangan ?></p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="event-detail"><i class="fas fa-hourglass-start mr-2 text-muted"></i> Mulai : <?php echo date('d F Y', strtotime($agenda->tanggal_mulai));  ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="event-detail"><i class="fas fa-hourglass-end mr-2 text-muted"></i> Selesai : <?php echo date('d F Y', strtotime($agenda->tanggal_selesai));  ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="event-detail"><i class="fas fa-users mr-2 text-muted"></i> Untuk : <?php echo $agenda->undangan ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="event-detail"><i class="fas fa-map-marker-alt mr-2 text-muted"></i> <?php echo $agenda->lokasi ?></p>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">
                                <span class="text-muted">Status :</span>
                                <?php
                                $start = $agenda->tanggal_mulai;
                                $end = $agenda->tanggal_selesai;

                                $now = date("Y-m-d");

                                // pending bentar
                                if (strtotime($now) < strtotime($start)) {
                                    echo '<span class="text-primary font-weight-bold">Akan datang</span>';
                                } elseif (strtotime($now) <= strtotime($end)) {
                                    echo '<span class="text-success font-weight-bold">Sedang berlangsung</span>';
                                } elseif (strtotime($now) > strtotime($end)) {
                                    echo '<span class="text-danger font-weight-bold">Telah usai</span>';
                                }


                                if (strtotime($now) < strtotime($start)) {
                                    $this->agenda_model->setComingEvent();
                                } elseif (strtotime($now) <= strtotime($end)) {
                                    $this->agenda_model->setRunningEvent();
                                } elseif (strtotime($now) > strtotime($end)) {
                                    $this->agenda_model->setEndEvent();
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php
            if ($this->db->get('agenda')->num_rows() > 10) {
                echo $this->pagination->create_links();
            } else {
            }
            ?>

            <!-- <div class="card mt-4">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="feature-left animate-box" data-animate-effect="fadeInLeft" style="border: 5px solid #253055; margin-bottom: 30px; padding: 20px;">
								<span class="icon">
									<img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $informasi->gambar ?>" alt="" class="img-responsive">
								</span>
								<div class="feature-copy">
									<h3><?php echo $informasi->judul ?></h3>
									<span><?php echo date('d F Y', strtotime($informasi->tanggal));  ?></span>
									<p style="border-top: 2px solid #303841;"><?php echo $informasi->isi ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->

        </div>
    </div>
</div>