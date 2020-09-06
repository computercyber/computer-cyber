<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Pendaftar</h1>
        </div>


        <!-- <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('sukses'); ?>"></div> -->

        <?php

        //di atas list.php

        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
            echo $this->session->flashdata('sukses');
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        } elseif ($this->session->flashdata('hapus_anggota')) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo $this->session->flashdata('hapus_anggota');
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        ?>

        <div class="section-body">

            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo site_url('admin/pendaftaran/resetData'); ?>" class="btn btn-danger tombol-reset-calon_anggota inline" style="margin-bottom: 20px;"><i class="far fa-trash-alt mr-2"></i> Reset Data</a>

                    <a href="<?php echo site_url('admin/pendaftaran/export_excel'); ?>" class="btn btn-warning ml-2" style="margin-bottom: 20px;"><i class="fas fa-download mr-2"></i> Export Excel</a>

                    <div class="dropdown inline">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-download mr-2"></i>
                            Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">PDF</a>
                            <a class="dropdown-item" href="<?php echo site_url('admin/pendaftaran/export_excel'); ?>">Excel</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jurusan</th>
                                            <th>Link</th>
                                            <th>Waktu Pendaftaran</th>
                                            <th style="width:100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pendaftaran as $pendaftaran) :
                                            ?>
                                            <tr class="table-bordered">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $pendaftaran->nama ?></td>
                                                <td><?php echo $pendaftaran->email ?></td>
                                                <td><?php echo $pendaftaran->no_hp ?></td>
                                                <td><?php echo $pendaftaran->jenis_kelamin ?></td>
                                                <td><?php echo $pendaftaran->jurusan ?></td>
                                                <td><?php echo $pendaftaran->link ?></td>
                                                <td><?php echo date('d M Y', strtotime($pendaftaran->date_created)); ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/pendaftaran/detail/' . $pendaftaran->id_peserta); ?>" class="btn btn-info"><i class="fa fa-user"></i></a>
                                                    <a href="<?php echo site_url('admin/pendaftaran/delete/' . $pendaftaran->id_peserta); ?>" class="ml-2 btn btn-danger tombol-hapus-calon_anggota"><i class="fa fa-user"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>