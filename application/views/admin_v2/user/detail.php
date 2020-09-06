<style>
    /*Profile card 4*/
    .profile-card-4 .card-img-block {
        float: left;
        width: 100%;
        height: 150px;
        overflow: hidden;
    }

    .profile-card-4 .card-body {
        position: relative;
    }

    .profile-card-4 .profile {
        border-radius: 50%;
        position: absolute;
        top: -62px;
        left: 50%;
        width: 100px;
        border: 3px solid rgba(255, 255, 255, 1);
        margin-left: -50px;
    }

    .profile-card-4 .card-img-block {
        position: relative;
    }

    .profile-card-4 .card-img-block>.info-box {
        position: absolute;
        background: rgba(0, 0, 0, 0.3);
        width: 100%;
        height: 100%;
        color: #fff;
        padding: 20px;
        text-align: center;
        font-size: 14px;
        -webkit-transition: 1s ease;
        transition: 1s ease;
        opacity: 0;
    }

    .profile-card-4 .card-img-block:hover>.info-box {
        opacity: 1;
        -webkit-transition: all 1s ease;
        transition: all 1s ease;
    }

    .profile-card-4 h5 {
        font-weight: 600;
    }

    .profile-card-4 .text-email {
        margin-top: -60px;
    }

    .profile-card-4 .card-text {
        font-weight: 300;
        font-size: 15px;
    }

    .profile-card-4 .icon-block {
        float: left;
        width: 100%;
    }

    .profile-card-4 .icon-block a {
        text-decoration: none;
    }

    .profile-card-4 i {
        display: inline-block;
        font-size: 16px;
        color: #d90be1;
        text-align: center;
        border: 1px solid #d90be1;
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 50%;
        margin: 0 5px;
    }

    .profile-card-4 i:hover {
        background-color: #d90be1;
        color: #fff;
    }
</style>

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
                            <li class="breadcrumb-item"><a href="<?= site_url('admin/user') ?>">User</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/user/detail21/<?= $username ?>">Detail</a></li>
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

            <section>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card profile-card-4">
                            <div class="card-img-block">
                                <div class="info-box">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <img class="img-fluid" src="https://images.pexels.com/photos/946351/pexels-photo-946351.jpeg?w=500&h=650&auto=compress&cs=tinysrgb" alt="profile-sample1" class="background" alt="Background">
                            </div>
                            <div class="card-body pt-5">
                                <img src="<?= base_url('assets/upload/image/original/user/' . $users->gambar); ?>" alt="profile-image" class="profile">

                                <h5 class="card-title text-center text-capitalize"><?= $users->nama; ?></h5>

                                <span class="text-email text-center text-muted"><?= $users->email; ?></span>

                                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="icon-block text-center"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail User</h4>
                                <div class="card-header-right">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-more-horizontal"></i>
                                        </button>
                                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                                        Restore</span></a></li>
                                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i>
                                                        expand</span></a></li>
                                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <span class="border border-left border-primary"></span> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <th>:</th>
                                                <td><?= $users->email ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Username</th>
                                                <th width="10">:</th>
                                                <td><?= $users->username ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Daftar</th>
                                                <th>:</th>
                                                <td><?= date('d M Y', strtotime($users->tanggal)) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a class="btn btn-outline-primary" href="<?= site_url('admin/user/update/' . $users->id_user) ?>"><i class="feather icon-edit-2 ml-1"></i> Ubah info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>