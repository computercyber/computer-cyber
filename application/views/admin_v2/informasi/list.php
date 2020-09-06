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

            <?php echo $this->session->flashdata('status'); ?>


            <div class="border-0" style="position:absolute;top:40px;right: 40px">
                <div id="toast-add-information" class="toast hide toast-5s toast-right" style="background-color: #00B75B; opacity:.8;" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">
                    <div class="toast-header border-0" style="background-color: #00B75B; opacity:.8;">
                        <strong class="mr-auto text-white">Success</strong>
                        <small class="text-white-50 mr-2">{elapsed_time} second ago</small>
                        <button type="button" class="m-l-5 mb-1 mt-1 close text-white" data-dismiss="toast" aria-label="Close">
                            <span class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body text-white">
                        Sukses menambahkan informasi
                    </div>
                </div>
            </div>

            <div class="border-0" style="position:absolute;top:40px;right: 40px">
                <div id="toast-edit-information" class="toast hide toast-5s toast-right" style="background-color: #00B75B; opacity:.8;" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">
                    <div class="toast-header border-0" style="background-color: #00B75B; opacity:.8;">
                        <strong class="mr-auto text-white">Success</strong>
                        <small class="text-white-50 mr-2">{elapsed_time} second ago</small>
                        <button type="button" class="m-l-5 mb-1 mt-1 close text-white" data-dismiss="toast" aria-label="Close">
                            <span class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body text-white">
                        Sukses mengubah informasi
                    </div>
                </div>
            </div>

            <div class="border-0" style="position:absolute;top:40px;right: 40px">
                <div id="toast-delete-information" class="toast hide toast-5s toast-right" style="background-color: #E43329; opacity:.8;" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">
                    <div class="toast-header border-0" style="background-color: #E43329; opacity:.8;">
                        <strong class="mr-auto text-white">Success</strong>
                        <small class="text-white-50 mr-2">{elapsed_time} seconds ago</small>
                        <button type="button" class="m-l-5 mb-1 mt-1 close text-white" data-dismiss="toast" aria-label="Close">
                            <span class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body text-white">
                        Sukses menghapus informasi
                    </div>
                </div>
            </div>

            <?php if ($this->form_validation->run() == FALSE && validation_errors('<div class="alert alert-warning">', '</div>') != null) { ?>
                <script type="text/javascript">
                    $(window).on('load', function() {
                        $('#addModal').modal('show');
                    });
                </script>
            <?php } ?>

            <div class="section-body">
                <button class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah</button>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="dataInformation" width="100%" cellspacing="0">
                                        <caption>List informasi</caption>
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th>Aksi</th>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                                <th>Jenis - Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($informasi as $berita) :
                                            ?>
                                                <tr>
                                                    <td width="10"><?php echo $no++; ?></td>
                                                    <td width="10">
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn  btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a href="javascript:;" class="dropdown-item edit-information" data-toggle="modal" data-target="#addModal" data-id="<?php echo $berita->id_berita ?>"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                <?php if ($berita->status_berita == 'Publish') { ?>
                                                                    <a href="<?php echo site_url('admin/informasi/archive/' . $berita->id_berita); ?>" class="dropdown-item"><i class="feather icon-file-minus mr-2"></i>Archive</a>
                                                                <?php } else { ?>
                                                                    <a href="<?php echo site_url('admin/informasi/unarchive/' . $berita->id_berita); ?>" class="dropdown-item"><i class="feather icon-file-plus mr-2"></i>Unarchive</a>
                                                                <?php } ?>
                                                                <a href="<?php echo site_url('admin/informasi/delete/' . $berita->id_berita) ?>" class="dropdown-item"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>

                                                    </td>
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

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Informasi Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('admin/informasi') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="judul">Judul Informasi</label>
                        <input type="text" name="judul" id="judul" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('judul') != null) {
                                                                                            echo "is-invalid";
                                                                                        } ?>" placeholder="Judul Berita" value="<?php echo set_value('judul'); ?>" placeholder="Judul informasi">
                        <?php echo form_error('judul', '<div class="invalid-feedback">', '</div>'); ?>
                    </div>

                    <textarea id="summernote" name="isi" class="form-control text-isi" placeholder="Isi berita"><?php echo set_value('isi') ?></textarea>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow-none border border-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="d-block">Status Informasi</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="publish" name="status_berita" class="custom-control-input" value="Publish" <?php echo set_value('status_berita') == 'Publish' ? "checked" : null ?>>
                                            <label class="custom-control-label" for="publish">Publikasikan</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="draft" name="status_berita" class="custom-control-input" value="Draft" <?php echo set_value('status_berita') == 'Draft' ? "checked" : null ?>>
                                            <label class="custom-control-label" for="draft">Masuk Draft</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="scheduling" name="status_berita" class="custom-control-input" required value="Scheduling" <?php echo set_value('status_berita') == 'Scheduling' ? "checked" : null ?>>
                                            <label class="custom-control-label" for="scheduling">Jadwalkan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 card-scheduling">
                            <div class="card bg-primary shadow-md">
                                <div class="card-body">
                                    <label for="tanggal" class="text-white">Jadwalkan</label>
                                    <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" value="<?php echo set_value('tanggal'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="alert alert-danger" role="alert" id="alert-scheduling">
                            <i class="feather icon-alert-triangle mr-1" style="font-size: 16px;"></i>
                            Anda tidak terdeteksi menggunakan browser <strong>Google Chrome</strong>, mungkin fungsi penjadwalan informasi tidak berjalan pada browser selain <strong>Chrome</strong>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() . 'assets/summernote/summernote-bs4.js'; ?>"></script>
<script>
    $(document).ready(function() {

        $('.card-scheduling').hide();

        $('#dataInformation').dataTable();

        $('#summernote').summernote({
            height: "200px",
            placeholder: "Tulis informasi"
        });

        $('#publish').on('click', function() {
            $('.card-scheduling').hide(500);
        });

        $('#draft').on('click', function() {
            $('.card-scheduling').hide(500);
        });

        $('#scheduling').on('click', function() {
            $('.card-scheduling').show(500);
        });

        let isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor)

        if (isChrome == true) {
            $('#alert-scheduling').hide(500);
        } else {
            $('#alert-scheduling').show(500);
        }

        $('.edit-information').on('click', function() {

            $('#addModalLabel').html('Edit Informasi');

            const id = $(this).data('id');

            $.ajax({
                url: '<?php echo site_url('admin/informasi/get_data_information'); ?>',
                data: {
                    id: id
                },
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#judul').val(data.judul);
                    $('#summernote').summernote('code', data.isi);
                }
            });
        });


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