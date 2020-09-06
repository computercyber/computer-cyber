<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Berita</h1>
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

        <div class="section-body">
            <a href="<?php echo site_url('admin/berita/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($berita as $berita) :
                                            ?>
                                        <tr class="table-bordered">
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $berita->gambar ?>" width="60"></td>
                                            <td><?= $berita->judul ?><br><small><?= $berita->nama ?></small></td>
                                            <td><?php echo date('d M Y', strtotime($berita->tanggal)); ?></td>
                                            <td><?= $berita->jenis_berita ?></td>
                                            <td><strong><?= $berita->status_berita ?></strong></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>admin/berita/update/<?php echo $berita->id_berita ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo site_url('admin/berita/delete/' . $berita->id_berita) ?>" class="btn btn-danger tombol-hapus-berita">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
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