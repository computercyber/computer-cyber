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
                            <li class="breadcrumb-item active">Pengumuman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">

            <?php echo $this->session->flashdata('status'); ?>

            <?php

            //di atas list.php

            if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo $this->session->flashdata('sukses');
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
            }
            ?>
            <!-- flashdata untuk data berhasil -->

            <div class="section-body">
                <!-- <?php
                        include('add.php');
                        ?> -->


                <a href="<?php echo site_url('admin/pengumuman/addNews') ?>" class="btn btn-outline-primary ml-2"><i class="fas fa-pen-alt mr-1"></i> Edit Konten</a>

                <a href="http://localhost/register/prevcontent?token_sess=<?= time() ?>&user_id=" class="btn btn-outline-primary ml-2" target="_blank"><i class="fas fa-eye mr-1"></i> Preview Konten</a>

                <a href="<?php echo site_url('admin/pengumuman/resetData'); ?>" class="btn btn-danger tombol-reset-calon_anggota ml-2"><i class="far fa-trash-alt mr-2"></i> Reset Data</a>

                <div class="alert alert-primary shadow-sm mt-3 rounded fade show" role="alert">
                    <h4 class="alert-heading">Info <span class="pcoded-micon"><i class="ml-1 feather icon-info"></i></h4>
                    <p>Tombol Reset digunakan hanya pada saat ingin melakukan penerimaan anggota baru</p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php foreach ($berita as $news) : ?><?php endforeach; ?>
                                <div class="form-group">
                                    <label><strong>Judul : </strong></label>
                                    <p><?= $news->judul; ?></p>

                                    <label><strong>Pra konten : </strong></label>
                                    <p><?= $news->pra_konten; ?></p>
                                </div>



                                <div class="accordion shadow" id="accordionExample">
                                    <div class="card" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <strong>Lihat daftar peserta diterima</strong>
                                                </button>

                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">

                                            <div class="card-header">
                                                <a href="<?= site_url('admin/pendaftaran') ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">+ Tambah anggota diterima</a>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th width="5">No</th>
                                                                <th>Nama</th>
                                                                <th>Nim</th>
                                                                <th>Divisi</th>
                                                                <th>Status</th>
                                                                <th>Waktu Input</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($pengumuman as $p) :
                                                            ?>
                                                                <tr class="table-bordered">
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $p->nama_anggota ?></td>
                                                                    <td><?= $p->nim ?></td>
                                                                    <td><?= $p->nama_divisi ?></td>
                                                                    <td><?= $p->status ?></td>
                                                                    <td><?= $p->date_created ?></td>
                                                                </tr>
                                                            <?php endforeach  ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group mt-4">
                                    <label><strong>Post konten : </strong></label>
                                    <p><?= $news->post_konten; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>
</div>