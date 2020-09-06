<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Anggota</h1>
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
            <a href="<?php echo site_url('admin/anggota/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5">No</th>
                                            <th>Profile</th>
                                            <th>Nama</th>
                                            <th width="35">Jabatan</th>
                                            <th>Jurusan</th>
                                            <th>No Hp</th>
                                            <th width="35">Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($anggota as $anggota) :
                                            ?>
                                        <tr class="table-bordered">
                                            <td><?php echo $no++; ?></td>
                                            <td><img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $anggota->gambar ?>" width="60"></td>
                                            <td><?= $anggota->nama_anggota ?><br><small><?= $anggota->nama_divisi ?></small></td>
                                            <td><?php echo $anggota->nama_jabatan ?><br><small><?php echo $anggota->tahun_jabatan ?></small></td>
                                            <td><?= $anggota->jurusan ?></td>
                                            <td><?= $anggota->no_hp ?></td>
                                            <td><?= $anggota->jenis_kelamin_anggota ?></td>
                                            <td>
                                                <a href="<?php echo site_url() ?>admin/anggota/update/<?php echo $anggota->id_anggota ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo site_url() ?>admin/anggota/detail/<?php echo $anggota->id_anggota ?>" class="btn btn-info"><i class="fa fa-user"></i></a>
                                                <!-- <a href="<?php echo site_url('admin/anggota/delete/' . $anggota->id_anggota) ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal" title="Delete">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a> -->
                                                <a href="<?php echo site_url('admin/anggota/delete/' . $anggota->id_anggota) ?>" class="btn btn-danger tombol-hapus-anggota">
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

<!-- modal has been crash -->
<!-- <div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pilih <span class="text-danger"><strong>Hapus</strong></span> untuk menghapus data</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?php echo site_url('admin/anggota/delete/' . $anggota->id_anggota) ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div> -->