<?php $id_user = $this->session->userdata('id');
$user_login = $this->user_model->detail($id_user);
if ($user_login->akses_level == "99" || $user_login->akses_level == "1") {
    redirect('oops', 'refresh');
} else if ($user_login->akses_level == "21") { ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar User</h1>
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
                <a href="<?php echo base_url('admin/user/add') ?>" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="20">No</th>
                                                <th>Gambar</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $no = 1;
                                            foreach ($users as $users) :  ?>
                                                <tr class="table-bordered">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><img class="img-responsive" src="<?php echo base_url('assets/upload/image/' . $users->gambar); ?>" width="60" alt=""></td>
                                                    <td><?= $users->nama ?></td>
                                                    <td><?= $users->username ?></td>
                                                    <td><?= $users->email ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url() ?>admin/user/update/<?php echo $users->id_user ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo base_url() ?>admin/user/detail21/<?php echo $users->username ?>" class="btn btn-info"><i class="fa fa-user"></i></a>
                                                        <a href="<?php echo base_url('admin/user/delete/' . $users->id_user) ?>" class="btn btn-danger tombol-hapus-user">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                            <i class="far fa-trash-alt"></i>
                                                        </!-->

                                                    </td>
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