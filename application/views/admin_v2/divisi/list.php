<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <p class="m-b-10 lead header-title"><?= $title; ?></p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">Divisi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->session->flashdata('status'); ?>

        <section class="section">

            <div class="section-body">
                <a href="<?php echo base_url('admin/divisi/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                <div class="row">
                    <div class="col-md-12">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="divisiTable">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false" width="20px">Aksi</th>
                                            <th data-orderable="false">Logo</th>
                                            <th data-orderable="false">Nama Divisi</th>
                                            <th data-orderable="false">Keterangan Divisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($divisi as $divisi) :
                                        ?>

                                            <?php

                                            $countAnggota = count($this->db->get_where('anggota', [
                                                'id_divisi' => $divisi->id_divisi
                                            ])->result());

                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="btn-group mb-2 mr-2">
                                                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                        <div class="dropdown-menu shadow">
                                                            <a href="<?= site_url('divisi/' . $divisi->url) ?>" class="dropdown-item edit-position" target="_blank" rel="noopener noreferrer"><i class="feather icon-eye mr-2"></i>Detail</a>
                                                            <a class="dropdown-item btn-edit-agenda" href="<?= base_url('admin/divisi/update/' . $divisi->id_divisi); ?>"><i class="feather icon-edit-2 mr-1"></i> Edit</a>
                                                            <a class="dropdown-item  tombol-hapus-divisi" href="<?= base_url('admin/divisi/delete/' . $divisi->id_divisi); ?>">
                                                                <i class="far fa-trash-alt mr-1"></i> Hapus</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <img class="align-top m-r-15 lazyload" src="<?= base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?= base_url('assets/upload/image/' . $divisi->gambar_divisi); ?>" width="60">
                                                </td>

                                                <td><?= $divisi->nama_divisi ?>
                                                    <br>
                                                    <small class="text-muted"><?= $countAnggota ?> anggota</small>
                                                </td>
                                                <td><?= character_limiter($divisi->keterangan_divisi, 80); ?></td>

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
</div>

<script>
    $(document).ready(function() {
        $('#divisiTable').DataTable();
    });
</script>