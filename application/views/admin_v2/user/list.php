<?php $id_user = $this->session->userdata('id');
$user_login = $this->user_model->detail($id_user);
if ($user_login->akses_level == "99" || $user_login->akses_level == "1") {
    redirect('oops', 'refresh');
} else if ($user_login->akses_level == "21") { ?>

    <div class="pcoded-main-container">
        <div class="pcoded-content">

            <div class="page-header breadcumb-sticky">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10"><?= $title; ?></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/user') ?>">User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <?php

                        //di atas list.php

                        if ($this->session->flashdata('sukses')) {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>


                <div class="section-body">
                    <a href="<?php echo base_url('admin/user/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered table-striped" id="dataUserAdmin" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="20">No</th>
                                                    <th>Aksi</th>
                                                    <th>Gambar</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $no = 1;
                                                foreach ($users as $users) :  ?>
                                                    <tr class="table-bordered">
                                                        <td><?= $no++; ?></td>
                                                        <td>
                                                            <div class="btn-group mb-2 mr-2">
                                                                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                <div class="dropdown-menu shadow">
                                                                    <a href="<?= base_url() ?>admin/user/update/<?= $users->id_user ?>" class="dropdown-item"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                    <a href="<?= base_url() ?>admin/user/detail21/<?= $users->username ?>" class="dropdown-item"><i class="feather icon-user mr-2"></i>Lihat detail</a>
                                                                    <a href="<?= base_url('admin/user/delete/' . $users->id_user) ?>" class="dropdown-item tombol-hapus-user"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><img class="img-responsive" src="<?= base_url('assets/upload/image/original/user/' . $users->gambar); ?>" width="60" alt=""></td>
                                                        <td><?= $users->nama ?></td>
                                                        <td><?= $users->username ?></td>
                                                        <td><?= $users->email ?></td>

                                                    </tr>
                                                <?php endforeach;  ?>
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
            $('#dataUserAdmin').dataTable();
        });
    </script>


<?php } else {
    echo ("Hayo mau ngapain ? :p");
} ?>
<!--End Advanced Tables -->


<!-- <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
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
                <a href="<?php echo base_url('admin/user/delete/' . $users->id_user) ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div> -->