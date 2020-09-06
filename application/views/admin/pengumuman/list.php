<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Anggota Diterima</h1>
        </div>

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

            <div data-toggle="modal" data-target="#addPengumumanModal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</div>

            <a href="<?php echo site_url('admin/pengumuman/addNews') ?>" class="btn btn-primary ml-2"><i class="fas fa-pen-alt mr-1"></i> Edit Konten</a>

            <a href="<?php echo site_url('admin/pengumuman/resetData'); ?>" class="btn btn-danger tombol-reset-calon_anggota ml-2"><i class="far fa-trash-alt mr-2"></i> Reset Data</a>


            <div class="row mt-3">
                <div class="col-md-12">
                    <form action="<?php echo site_url('admin/pengumuman/import_excel'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="import_excel">

                            <button class="btn btn-sm btn-warning" type="submit" value="upload"><i class="fas fa-upload mr-1"></i> Upload Data</button>
                        </div>
                    </form>
                </div>
            </div>



            <h2 class="section-title">Info</h2>
            <p class="section-lead">
                Tombol Reset digunakan hanya pada saat ingin melakukan penerimaan anggota baru
            </p>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($berita as $news) : ?><?php endforeach; ?>
                            <div class="form-group">
                                <label><strong>Judul : </strong></label>
                                <p><?php echo $news->judul; ?></p>

                                <label><strong>Pra konten : </strong></label>
                                <p><?php echo $news->pra_konten; ?></p>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5">No</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Divisi</th>
                                            <th>Status</th>
                                            <th>Waktu Input</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pengumuman as $pengumuman) :
                                            ?>
                                            <tr class="table-bordered">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $pengumuman->nama ?></td>
                                                <td><?php echo $pengumuman->nim ?></td>
                                                <td><?php echo $pengumuman->divisi ?></td>
                                                <td><?php echo $pengumuman->status ?></td>
                                                <td><?php echo $pengumuman->date_created ?></td>
                                                <!-- <td><?php echo date('d M Y', strtotime($pengumuman->date_created)); ?></td> -->
                                                <td>
                                                    <!-- <a class="btn btn-success" href="<?php echo site_url('Admin/Item/editItem/' . $b->id_barang); ?>">Edit</a> -->
                                                    <a href="<?php echo site_url('admin/pengumuman/editAnggota/' . $pengumuman->id_anggota); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('admin/pengumuman/delete/' . $pengumuman->id_anggota); ?>" class="btn btn-danger tombol-hapus-anggota_diterima">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach  ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group mt-4">
                                <label><strong>Post konten : </strong></label>
                                <p><?php echo $news->post_konten; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="addPengumumanModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Anggota Diterima</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo site_url('admin/pengumuman/add') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap"><br>

                        <label for="nim">Nim</label>
                        <input type="text" name="nim" id="nim" class="form-control" placeholder="170155..."><br>

                        <label for="divisi">Divisi</label>
                        <input type="text" name="divisi" id="divisi" class="form-control" placeholder="cth. Programming"><br>

                        <label for="status">Status</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="diterima" class="selectgroup-input" checked="">
                                <span class="selectgroup-button">Diterima</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="status" value="ditolak" class="selectgroup-input" disabled>
                                <span class="selectgroup-button">Ditolak</span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
</div>