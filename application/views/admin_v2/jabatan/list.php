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
                            <li class="breadcrumb-item active">Jabatan</li>
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
                        $('#addJabatanModal').modal('show');
                    });
                </script>
            <?php } ?>


            <div class="section-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJabatanModal" style="margin-bottom: 20px;">
                    <i class="fa fa-plus"></i> Tambah
                </button>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="dataPosition" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10">No</th>
                                                <th data-orderable="false">Aksi</th>
                                                <th data-orderable="false">Jabatan</th>
                                                <th>Tahun Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($jabatan as $jabatan) :
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td width="10">
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn  btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu shadow">
                                                                <a href="javascript:;" class="dropdown-item edit-position" data-target="#editJabatanModal" data-toggle="modal" data-id="<?php echo $jabatan->id_jabatan; ?>"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                <a href="<?php echo site_url('admin/jabatan/delete/' . $jabatan->id_jabatan); ?>" class="dropdown-item"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td><?php echo $jabatan->nama_jabatan ?></td>
                                                    <td><?php echo $jabatan->tahun_jabatan ?></td>
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

    <div class="modal hide fade" tabindex="-1" role="dialog" id="addJabatanModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJabatanLabel">Tambah Data</h5>
                </div>
                <form action="<?php echo site_url('admin/jabatan') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_jabatan') != null) {
                                                                        echo "is-invalid";
                                                                    } ?>" id="nama_jabatan" name="nama_jabatan" placeholder="Cth. Ketua Umum 2017" value="<?php echo set_value('nama_jabatan'); ?>">
                            <?php echo form_error('nama_jabatan', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tahun_jabatan">Tahun Jabatan</label>
                            <input type="number" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tahun_jabatan') != null) {
                                                                            echo "is-invalid";
                                                                        } ?>" id="tahun_jabatan" name="tahun_jabatan" placeholder="Cth. 2017" maxlength="4" value="<?php echo set_value('tahun_jabatan'); ?>">
                            <?php echo form_error('tahun_jabatan', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal hide fade" tabindex="-1" role="dialog" id="editJabatanModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJabatanLabel">Edit Data</h5>
                </div>
                <form action="<?php echo site_url('admin/update') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input type="text" class="form-control" id="nama_jabatan_show" name="nama_jabatan" placeholder="Cth. Ketua Umum 2017" required>
                        </div>

                        <div class="form-group">
                            <label for="tahun_jabatan">Tahun Jabatan</label>
                            <input type="number" class="form-control" id="tahun_jabatan_show" name="tahun_jabatan" placeholder="Cth. 2017" maxlength="4" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

<script>
    $(document).ready(function() {
        $('#dataPosition').dataTable();

        $('#dataPosition').on('click', '.edit-position', function() {

            $('#editJabatanModal ').modal('show')
            const id = $(this).data('id');

            $('#editJabatanModal form').attr('action', "<?php echo site_url('admin/jabatan/update/'); ?>" + id);


            $.ajax({
                url: '<?php echo site_url('admin/jabatan/get_data_position'); ?>',
                data: {
                    id: id
                },
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    $('#nama_jabatan_show').val(data.nama_jabatan);
                    $('#tahun_jabatan_show').val(data.tahun_jabatan);
                }
            });
        })
    });
</script>