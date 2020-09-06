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

            <?php if ($this->form_validation->run() == FALSE && validation_errors('<div class="alert alert-warning">', '</div>') != null) { ?>
                <script type="text/javascript">
                    $(window).on('load', function() {
                        $('#addPembinaModal').modal('show');
                    });
                </script>
            <?php } ?>

            <div class="section-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPembinaModal" style="margin-bottom: 20px;">
                    <i class="fa fa-plus"></i> Tambah
                </button>

                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm" id="dataPembina" width="auto" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10px">No</th>
                                                <th width="40px" data-orderable="false">Aksi</th>
                                                <th width="360px" data-orderable="false">Nama</th>
                                                <th width="100px">Jenis Pembina</th>
                                                <th width="100px">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pembina as $pembina) :
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td width="10">
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu shadow">
                                                                <a href="javascript:;" class="dropdown-item edit-pembina" data-toggle="modal" data-target="#editPembinaModal" data-id="<?php echo $pembina->id_pembina; ?>"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                <a href="<?php echo site_url('admin/pembina/delete/' . $pembina->id_pembina); ?>" class="dropdown-item"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="media">
                                                            <img src="<?php echo base_url('assets/upload/image/' . $pembina->gambar_pembina); ?>" class="mr-3 rounded-circle" alt="<?php echo $pembina->nama_pembina; ?>" width="60px">
                                                            <div class="media-body mt-2">
                                                                <h6 class="mt-0"><?php echo $pembina->nama_pembina; ?></h6>
                                                                <small><?php echo $pembina->dosen ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $pembina->jenis_pembina ?></td>
                                                    <td><?php if ($pembina->status_pembina == 'Aktif') { ?>
                                                            <span class="badge badge-light-success">Aktif</span>
                                                        <?php } elseif ($pembina->status_pembina == 'Non aktif') { ?>
                                                            <span class="badge badge-light-secondary">Non aktif</span>
                                                        <?php } elseif ($pembina->status_pembina == 'Pindah') { ?>
                                                            <span class="badge badge-light-warning">Pindah</span>
                                                        <?php } elseif ($pembina->status_pembina == 'Mengundurkan diri') { ?>
                                                            <span class="badge badge-light-secondary">Mengundurkan diri</span>
                                                        <?php } ?>

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

    <div class="modal fade" tabindex="-1" role="dialog" id="addPembinaModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPembinaLabel">Tambah Data</h5>
                </div>
                <form action="<?php echo site_url('admin/pembina') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pembina">Nama Pembina</label>
                                    <input type="text" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_pembina') != null) {
                                                                                echo "is-invalid";
                                                                            } ?>" id="nama_pembina" name="nama_pembina" placeholder="Nama pembina" value="<?php echo set_value('nama_pembina'); ?>">
                                    <?php echo form_error('nama_pembina', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dosen">Dosen</label>
                                    <input type="text" id="dosen" name="dosen" class="form-control" placeholder="Cth. Teknik Informatika" value="<?php echo set_value('dosen'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_pembina">Jenis Pembina</label>
                                    <input type="text" class="form-control" id="jenis_pembina" name="jenis_pembina" placeholder="Cth. Pembina 1" value="<?php echo set_value('jenis_pembina'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar_pembina">Gambar</label>
                                    <i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
                                    </i>
                                    <div class="input-group input-group-lg" style="margin-bottom:-10px;">
                                        <input name="gambar_pembina" class="custom-file-input <?php if (isset($error)) {
                                                                                                    echo "is-invalid";
                                                                                                } ?>" type="file" class="mt-3" id="gambar_pembina">
                                        <label for="gambar_pembina" class="custom-file-label custom-file-label_pembina text-muted">Pilih atau seret gambar ...</label>
                                        <?php if (isset($error)) { ?>
                                            <div class="invalid-feedback"><small><?php echo $error ?></small></div>
                                        <?php } ?>
                                        <small for="gambar_pembina" class="form-text text-muted">
                                            Gambar harus berukuran 400 x 400
                                        </small>
                                    </div>

                                    <br>

                                    <img class="rounded-circle img-placeholder-pembina" src="<?= base_url('assets/img/profile_placeholder.png') ?>" alt="" width="100px">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_pembina">E-mail</label>
                                    <input type="email" id="email_pembina" name="email_pembina" class="form-control" value="<?php echo set_value('email_pembina'); ?>" placeholder="name@domain.com">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_pembina">Status Pembina</label>
                                    <select name="status_pembina" id="status_pembina" class="custom-select">
                                        <option disabled selected>Status Pembina</option>
                                        <option value="Aktif" <?php echo set_value('status_pembina') == 'Aktif' ? "selected" : null ?>>Aktif</option>
                                        <option value="Non aktif" <?php echo set_value('status_pembina') == 'Non aktif' ? "selected" : null ?>>Non aktif</option>
                                        <option value="Pindah" <?php echo set_value('status_pembina') == 'Pindah' ? "selected" : null ?>>Pindah</option>
                                        <option value="Mengundurkan diri" <?php echo set_value('status_pembina') == 'Mengundurkan diri' ? "selected" : null ?>>Mengundurkan diri</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->

                        <button class="btn btn-primary event-btn" type="submit">
                            <span class="spinner-border spinner-border-sm" role="status"></span>
                            <span class="load-text">Loading...</span>
                            <span class="btn-text">Tambah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" id="editPembinaModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPembinaLabel">Edit Data</h5>
                </div>
                <form action="<?php echo site_url('admin/pembina/update/' . $this->session->flashdata('id_pembina')) ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row pb-1 pt-1 row-profile-pembina">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img id="edit-img-profile-pembina" class="rounded-circle" alt="" width="100px">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pembina">Nama Pembina</label>
                                    <input type="text" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_pembina') != null) {
                                                                                echo "is-invalid";
                                                                            } ?>" id="edit-nama_pembina" name="nama_pembina" placeholder="Nama pembina" value="<?php echo set_value('nama_pembina'); ?>">
                                    <?php echo form_error('nama_pembina', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dosen">Dosen</label>
                                    <input type="text" id="edit-dosen" name="dosen" class="form-control" placeholder="Cth. Teknik Informatika" value="<?php echo set_value('dosen'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_pembina">Jenis Pembina</label>
                                    <input type="text" class="form-control" id="edit-jenis_pembina" name="jenis_pembina" placeholder="Cth. Pembina 1" value="<?php echo set_value('jenis_pembina'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar_pembina">Gambar</label>
                                    <i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
                                    </i>
                                    <div class="input-group input-group-lg" style="margin-bottom:-10px;">
                                        <input name="gambar_pembina" class="custom-file-input <?php if (isset($error)) {
                                                                                                    echo "is-invalid";
                                                                                                } ?>" type="file" class="mt-3" id="gambar_pembina_show">
                                        <label for="gambar_pembina" class="custom-file-label custom-file-label_pembina_show text-muted">Pilih atau seret gambar ...</label>
                                        <?php if (isset($error)) { ?>
                                            <div class="invalid-feedback"><small><?php echo $error ?></small></div>
                                        <?php } ?>
                                        <small for="gambar_pembina" class="form-text text-muted">
                                            Gambar harus berukuran 400 x 400
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_pembina">E-mail</label>
                                    <input type="email" id="edit-email_pembina" name="email_pembina" class="form-control" value="<?php echo set_value('email_pembina'); ?>" placeholder="name@domain.com">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_pembina">Status Pembina</label>
                                    <select name="status_pembina" id="edit-status_pembina" class="custom-select">
                                        <option disabled selected>Status Pembina</option>
                                        <option value="Aktif" <?php echo set_value('status_pembina') == 'Aktif' ? "selected" : null ?>>Aktif</option>
                                        <option value="Non aktif" <?php echo set_value('status_pembina') == 'Non aktif' ? "selected" : null ?>>Non aktif</option>
                                        <option value="Pindah" <?php echo set_value('status_pembina') == 'Pindah' ? "selected" : null ?>>Pindah</option>
                                        <option value="Mengundurkan diri" <?php echo set_value('status_pembina') == 'Mengundurkan diri' ? "selected" : null ?>>Mengundurkan diri</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->

                        <button class="btn btn-primary event-btn" type="submit">
                            <span class="spinner-border spinner-border-sm" role="status"></span>
                            <span class="load-text">Loading...</span>
                            <span class="btn-text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataPembina').dataTable();

        $('.edit-pembina').on('click', function() {

            const id = $(this).data('id');

            $('.modal-content form').attr('action', "<?php echo site_url('admin/pembina/update/'); ?>" + id);

            $.ajax({
                url: '<?php echo site_url('admin/pembina/get_data_pembina'); ?>',
                data: {
                    id: id
                },
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#edit-nama_pembina').val(data.nama_pembina);
                    $('#edit-dosen').val(data.dosen);
                    $('#edit-jenis_pembina').val(data.jenis_pembina);
                    $('#edit-email_pembina').val(data.email_pembina);
                    $('#edit-status_pembina').val(data.status_pembina);
                    $('#edit-img-profile-pembina').attr("src", '<?= base_url(); ?>assets/upload/image/' + data.gambar_pembina);
                }
            });
        });

        $('#gambar_pembina').change(function() {
            const sampul = document.querySelector('#gambar_pembina');
            const sampulLabel = document.querySelector('.custom-file-label_pembina');
            const imgPreview = document.querySelector('.img-placeholder-pembina');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        })

        $('#gambar_pembina_show').change(function() {
            const sampul = document.querySelector('#gambar_pembina_show');
            const sampulLabel = document.querySelector('.custom-file-label_pembina_show');
            const imgPreview = document.querySelector('#edit-img-profile-pembina');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        })

        // img-placeholder-pembina
    });
</script>