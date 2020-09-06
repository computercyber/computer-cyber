<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Divisi</h1>
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
            <a href="<?php echo base_url('admin/divisi/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

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
                                            <th>Nama Divisi</th>
                                            <th>Keterangan Divisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($divisi as $divisi) :
                                            ?>
                                        <tr class="table-bordered">
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td><img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $divisi->gambar_divisi ?>" width="60"></td>
                                            <td><?= $divisi->nama_divisi ?></td>
                                            <td><?= $divisi->keterangan_divisi ?></td>
                                            <td>
                                                <a href="<?php echo base_url() ?>admin/divisi/update/<?php echo $divisi->id_divisi ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url('admin/divisi/delete/' . $divisi->id_divisi) ?>" class="btn btn-danger tombol-hapus-divisi">
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