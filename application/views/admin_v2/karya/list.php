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
                            <li class="breadcrumb-item active"><a href="<?php echo site_url('admin/karya') ?>">Karya</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <?php echo $this->session->flashdata('status'); ?>


        <section class="section">



            <div class="section-body">
                <a href="<?php echo site_url('admin/karya/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;">
                    <i class="fa fa-plus"></i> Tambah
                </a>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm  table-hover" id="dataKarya" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th data-orderable="false">Aksi</th>
                                                <th data-orderable="false">Judul Karya</th>
                                                <th data-orderable="false">Karya Dari</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($karya as $k) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td width="10">
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn  btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a href="<?= site_url('karya/' . $this->db->get_where('karya', array('id_karya' => $k->id_karya))->row()->url) ?>" class="dropdown-item edit-position" target="_blank"><i class="feather icon-eye mr-2"></i>Lihat</a>
                                                                <a href="<?= site_url('admin/karya/edit/' . urlencode(encrypt_url($k->id_karya))) ?>" class="dropdown-item edit-position"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                <a href="<?= site_url('admin/karya/delete/' . urlencode(encrypt_url($k->id_karya))); ?>" class="dropdown-item tombol-hapus-karya"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td><?= $k->judul_karya ?>
                                                        <br><small><strong><?= $k->nama_divisi ?></strong> &mdash; <?= $k->status_karya ?></small>
                                                    </td>
                                                    <td><?= $k->nama_anggota ?>
                                                        <br><small><strong><?= $k->jenis_karya ?></strong></small>
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


    <script>
        $(document).ready(function() {
            $('#dataKarya').dataTable();

        });
    </script>