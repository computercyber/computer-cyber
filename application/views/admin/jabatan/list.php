<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jabatan</h1>
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJabatanModal" style="margin-bottom: 20px;">
                <i class="fa fa-plus"></i> Tambah
            </button>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10">No</th>
                                            <th>Jabatan</th>
                                            <th>Tahun Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jabatan as $jabatan) :
                                            ?>
                                        <tr class="table-bordered">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $jabatan->nama_jabatan ?></td>
                                            <td><?php echo $jabatan->tahun_jabatan ?></td>
                                            <td>
                                                <a href="<?php echo site_url() ?>admin/jabatan/update/<?php echo $jabatan->id_jabatan ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo site_url('admin/jabatan/delete/' . $jabatan->id_jabatan); ?>" class="btn btn-danger tombol-hapus-jabatan">
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
    </section>
</div>
<!--End Advanced Tables -->

<div class="modal fade" tabindex="-1" role="dialog" id="addJabatanModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                $attribut = 'class="form-horizontal"';
                echo form_open(site_url('admin/jabatan'), $attribut); ?>
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="text" class="form-control" name="nama_jabatan" placeholder="Jabatan" required="required">
                </div>

                <div class="form-group">
                    <label>Tahun Jabatan</label>
                    <input type="text" class="form-control" name="tahun_jabatan" placeholder="Cth. 2017">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success float-right" name="submit" value="Simpan Data">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>