<?php
$site_config = $this->konfigurasi_model->listing();
?>


<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg" style="background-image: linear-gradient(to right, #6771E6, #5E31C2);"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown list-unstyled"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <?php
                        $id_user = $this->session->userdata('id');
                        $user_login = $this->user_model->detail($id_user);
                        ?>
                        <img alt="image" src="<?php echo base_url('assets/upload/image/original/user/' . $user_login->gambar); ?>" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">
                            Hi, <?php echo $user_login->nama ?>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn">
                        <div class="dropdown-title">Logged in 5 min ago</div>
                        <a href="<?php echo site_url() ?>admin/user/detail21/<?php echo $user_login->username ?>" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <a href="<?php echo site_url('/') ?>" class="dropdown-item has-icon" target="_blank">
                            <i class="fas fa-globe-americas"></i> View Web
                        </a>
                        <?php if ($user_login->akses_level == "21" || $user_login->akses_level == "1") { ?>
                            <a href="<?php echo site_url() ?>admin/user/update/<?php echo $user_login->id_user ?>" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>