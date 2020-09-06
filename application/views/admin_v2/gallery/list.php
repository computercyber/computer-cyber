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
                            <li class="breadcrumb-item active"><a href="<?php echo site_url('admin/gallery') ?>">Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->session->flashdata('status'); ?>

        <div class="section-body">
            <a href="<?= site_url('admin/gallery/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover" id="galleryTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20px" data-orderable="false">Aksi</th>
                                            <th>Gambar</th>
                                            <th>Judul Gambar</th>
                                            <th>Tag Divisi</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($gallery as $g) : ?>
                                            <tr>
                                                <td>
                                                    <div class="btn-group mb-2 mr-2">
                                                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                        <div class="dropdown-menu shadow">
                                                            <a href="" class="dropdown-item edit-position" target="_blank"><i class="feather icon-eye mr-2"></i>Lihat</a>
                                                            <a href="<?= site_url('admin/gallery/update/' . $g->id_gallery) ?>" class="dropdown-item edit-position"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                            <a href="<?= site_url('admin/gallery/delete/' . $g->id_gallery) ?>" class="dropdown-item tombol-hapus-gallery"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><img class="img-responsive rounded lazyload" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?php echo base_url('assets/upload/image/' . $g->gambar); ?>" width="60"></td>
                                                <td><?php echo $g->judul_gallery; ?></td>
                                                <td>
                                                    <?php if ($g->gallery_divisi != null) : ?>
                                                        <?php echo $g->nama_divisi; ?>
                                                    <?php else : ?>
                                                        Umum
                                                    <?php endif ?>

                                                </td>
                                                <td><?= date('d F Y', $g->tanggal_acara); ?></td>
                                                <td><?php echo $g->status_gallery; ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        $('#galleryTable').dataTable();

    });
</script>