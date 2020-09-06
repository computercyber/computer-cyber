<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman profile</h1>
        </div>

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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordeless">
                                    <tbody>
                                        <tr>
                                            <th rowspan="3" scope="col">
                                                <img style="display: block; margin: auto;" class="img-responsive" width="150" src="<?php echo base_url('assets/upload/image/' . $users->gambar); ?>" alt="">
                                            </th>
                                            <th scope="col">Nama</th>
                                            <th>:</th>
                                            <td scope="col"><?php echo $users->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <th>:</th>
                                            <td><?php echo $users->email ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Username</th>
                                            <th>:</th>
                                            <td><?php echo $users->username ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="font-weight: bold; text-align: center;">Profile</th>
                                            <th>Tanggal Masuk</th>
                                            <th>:</th>
                                            <td><?php echo date('d M Y', strtotime($users->tanggal)); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-primary" href="<?php echo site_url() ?>admin/user/update/<?php echo $users->id_user ?>">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>