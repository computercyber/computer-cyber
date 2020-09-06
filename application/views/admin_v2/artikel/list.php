<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="page-header breadcumb-sticky">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $title; ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active"><a href="<?php echo site_url('admin/gallery') ?>">Gallery</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">

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
                <a href="<?php echo site_url('admin/artikel/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="dataArticle" width="100%" cellspacing="0">
                                        <caption>List artikel</caption>
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>Aksi</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                                <th>Jenis - Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($artikel as $berita) :
                                            ?>
                                                <tr>
                                                    <td width="10"><?php echo $no++; ?></td>
                                                    <td width="10">
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn  btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a href="<?php echo base_url() ?>admin/artikel/update/<?php echo $berita->id_berita ?>" class="dropdown-item"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                <?php if ($berita->status_berita == 'Publish') { ?>
                                                                    <a href="<?php echo site_url('admin/artikel/archive/' . $berita->id_berita); ?>" class="dropdown-item"><i class="feather icon-file-minus mr-2"></i>Archive</a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo site_url('admin/artikel/unarchive/' . $berita->id_berita); ?>" class="dropdown-item"><i class="feather icon-file-plus mr-2"></i>Unarchive</a>
                                                                <?php } ?>
                                                                <a href="<?php echo site_url('admin/artikel/delete/' . $berita->id_berita) ?>" class="dropdown-item"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td><img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $berita->gambar ?>" width="60"></td>
                                                    <td><?php echo $berita->judul ?>
                                                        <br>
                                                        <small>
                                                            <?php if ($berita->user_update_berita == null) { ?>
                                                                <?php echo $berita->nama ?>
                                                            <?php } else { ?>
                                                                <?php echo '<strong>Diupdate oleh ' . $berita->nama . '</strong>'; ?>
                                                            <?php } ?>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <?php if ($berita->update_berita == null) { ?>
                                                            <?php echo date('d F Y', $berita->tanggal); ?>
                                                        <?php } else { ?>
                                                            <?php echo date('d F Y', $berita->tanggal); ?><br>
                                                            <small>
                                                                <strong><?php echo 'Diupdate pada ' . date('d F Y', $berita->update_berita); ?></strong>
                                                            </small>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo $berita->jenis_berita ?> &mdash; <strong><?= $berita->status_berita ?></strong></td>
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
</div>

<script>
    $(document).ready(function() {
        $('#dataArticle').dataTable();

    });
</script>


<!-- Non complete AJAX REQUEST -->


<!-- <script>
    $(function() {

        

        $('.btn-archive').on('click', function() {

            const id = $(this).data('id');

            $.ajax({
                url: '<?php echo site_url('admin/artikel/archive') ?>',
                data: {
                    id: id
                },
                dataType: 'JSON',
                method: 'POST',
                success: function(data) {
                    if (data.status == 'archived') {
                        $('.badge-status' + data.id).html('Draft');
                    }
                }
            });
        });
    });
</script> -->