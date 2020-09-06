<?php
$site_config = $this->konfigurasi_model->listing();
?>


<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo site_url('admin/dasbor') ?>">Computer Cyber</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo site_url('admin/dasbor') ?>">CC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header" style="color: white;">Dashboard</li>

            <?php if ($user_login->akses_level == "21" || $user_login->akses_level == "1") { ?>
                <li class="<?php if ($this->uri->segment(2) == "dasbor") {
                                    echo "active";
                                } ?>"><a class="nav-link" href="<?php echo site_url() ?>admin/dasbor"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <?php } else { } ?>

            <li class="<?php if ($this->uri->segment(3) == "detail21") {
                            echo "active";
                        } ?>"><a class="nav-link" href="<?php echo site_url() ?>admin/user/detail21/<?php echo $user_login->username ?>"><i class="fas fa-user"></i> <span>Profile</span></a></li>

            <?php if ($user_login->akses_level == "21" || $user_login->akses_level == "1") { ?>
                <li class="<?php if ($this->uri->segment(2) == "agenda") {
                                    echo "active";
                                } ?>"><a class="nav-link" href="<?php echo site_url('admin/agenda') ?>"><i class="fas fa-calendar-alt"></i> <span>Agenda dan Event</span></a></li>
            <?php } else { } ?>

            <?php
            $id_user = $this->session->userdata('id');
            $user_login = $this->user_model->detail($id_user); ?>

            <?php if ($user_login->akses_level == "21") { ?>
                <!-- <li class="menu-header">User</li> -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>User</span></a>
                    <ul class="dropdown-menu">
                        <li class=" <?php if ($this->uri->segment(2) == "user" && $this->uri->segment(3) == "add") {
                                            echo "active";
                                        } ?>"><a class="nav-link" href="<?php echo site_url() ?>admin/user">Data User</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/user/add">Tambah User</a></li>
                    </ul>
                </li>
            <?php } ?>

            <!-- <li><a class="nav-link" href="#"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->

            <?php if ($user_login->akses_level == "21" || $user_login->akses_level == "1") { ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sitemap"></i> <span>Kepengurusan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/anggota">Data Anggota</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/anggota/add">Tambah Anggota</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/divisi">Divisi</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/divisi/add">Tambah Divisi</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/jabatan">Jabatan</a></li>
                    </ul>
                </li>
            <?php } else { } ?>

            <?php if ($user_login->akses_level == "21" || $user_login->akses_level == "1") { ?>
                <!-- <li class="menu-header">Stisla</li> -->
                <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "berita") {
                                                        echo "active";
                                                    } ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i> <span>Berita</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/berita">Data Berita</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/berita/add">Tambah Berita</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "gallery") {
                                                        echo "active";
                                                    } ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="far fa-image"></i> <span>Galeri</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/gallery">Data Galeri</a></li>
                        <li><a class="nav-link" href="<?php echo site_url() ?>admin/gallery/add">Tambah Gambar</a></li>
                    </ul>
                </li>
            <?php } else { } ?>

            <?php if ($user_login->akses_level == "21" || $user_login->akses_level == "1") { ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Konfigurasi Web</span></a>
                    <ul class="dropdown-menu">
                        <li clas><a href="<?php echo site_url() ?>admin/dasbor/konfigurasi">Konfigurasi Data Website</a></li>
                        <li><a href="<?php echo site_url() ?>admin/dasbor/about">Tentang Organisasi</a></li>
                        <li><a href="<?php echo site_url() ?>admin/dasbor/logo">Ganti Logo</a></li>
                    </ul>
                </li>
            <?php } else { } ?>

            <li class="menu-header" style="color: white;">Register <span class="text-primary font-weight-bold"> subdomain</span> </li>

            <li class="<?php if ($this->uri->segment(2) == "pendaftaran") {
                            echo "active";
                        } ?>"><a class="nav-link" href="<?php echo site_url() ?>admin/pendaftaran"><i class="fas fa-clipboard-list"></i><span>Pendaftar</span></a></li>

            <li class="<?php if ($this->uri->segment(2) == "pengumuman") {
                            echo "active";
                        } ?>"><a class="nav-link" href="<?php echo site_url() ?>admin/pengumuman"><i class="fas fa-bullhorn"></i><span>Pengumuman Diterima</span></a></li>

            <li><a class="nav-link text-danger" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
            <!-- href="<?php echo site_url() ?>login/logout" -->
        </ul>
    </aside>
</div>