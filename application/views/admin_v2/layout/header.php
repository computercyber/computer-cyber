<header class="navbar pcoded-header navbar-expand-lg navbar-dark headerpos-fixed header-dark" style="background-color: #5E31C2">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!" title="Collapse toggle"><span></span></a>
        <a href="<?php echo site_url('admin/dashboard') ?>" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="<?php echo base_url('assets/img/logo/logo_cc_web_white.png'); ?>" alt="logo" class="logo" style="max-width: 160px" title="Logo Computer Cyber Study Club">
            <img src="<?php echo base_url('assets/upload/image/thumbs/original/logo/' . $site_config->logo); ?>" alt="" class="logo-thumb" style="max-width: 40px">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search" title="Pencarian"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search here">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
            <li class="nav-item">
                <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize" title="Fullscreen"></i></a>
            </li>
            <li class="nav-item">
                <strong>Accessed from IP :</strong>
                <?php

                function getUserIP()
                {
                    // Get real visitor IP behind CloudFlare network
                    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                    }
                    $client  = @$_SERVER['HTTP_CLIENT_IP'];
                    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
                    $remote  = $_SERVER['REMOTE_ADDR'];

                    if (filter_var($client, FILTER_VALIDATE_IP)) {
                        $ip = $client;
                    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
                        $ip = $forward;
                    } else {
                        $ip = $remote;
                    }

                    return $ip;
                }


                $user_ip = getUserIP();

                echo $user_ip; // Output IP address [Ex: 177.87.193.134]

                ?>

                &mdash;

                <?php
                $user_ip2 = getenv('REMOTE_ADDR');
                $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip2"));
                $country = $geo["geoplugin_countryName"];
                $city = $geo["geoplugin_city"];

                echo $city;
                ?>

                <?php
                $userdevice = "";

                $mobileAgent = array(
                    "iPhone", "iPod", "Android", "Blackberry",
                    "Opera Mini", "Windows ce", "Nokia", "sony", "Linux", "Windows", "MacOS", "iOS"
                );
                for ($i = 0; $i < sizeof($mobileAgent); $i++) {
                    if (stripos($_SERVER['HTTP_USER_AGENT'], $mobileAgent[$i])) {
                        $userdevice = $mobileAgent[$i];
                        break;
                    }
                }

                echo $userdevice;
                ?>

            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-mail"></i><span class="badge bg-danger"></span></a>
                    <div class="dropdown-menu dropdown-menu-right notification animate slideIn">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Message</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">Nothing message.</p>
                            </li>
                        </ul>
                        <div class="noti-footer">
                            <a href="#!">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i><span class="badge bg-danger"></span></a>
                    <div class="dropdown-menu dropdown-menu-right notification animate slideIn">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">Nothing notification.</p>
                            </li>

                        </ul>
                        <!-- <div class="noti-footer">
                            <a href="#!">show all</a>
                        </div> -->
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/upload/image/original/user/' . $user_login->gambar); ?>" class="img-radius wid-40" alt="User-Profile-Image"><span class="badge bg-success"><span class="sr-only"></span></span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification animate slideIn">
                        <div class="pro-head">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('assets/upload/image/original/user/' . $user_login->gambar); ?>" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <div class="col-md-9">
                                    <span>Hi, <span class="text-capitalize"><?php echo $user_login->nama; ?></span></span>
                                    <br><span style="font-size:12px;" class="text-muted text-white-50 text-uppercase">Super Admin</span>
                                </div>
                            </div>

                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li>
                                <a href="<?php echo site_url() ?>admin/user/detail21/<?php echo $user_login->username ?>" class="dropdown-item text-capitalize"><i class="feather icon-user"></i>
                                    Profile</a>
                            </li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i>
                                    My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i>
                                    Lock Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>


<!-- logoutModal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
                <button type="button" class="close" data-dismiss="modal1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin mengakhiri keluar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

                <?php

                $get_user_id = $this->session->userdata('id');
                $get_user = $this->db->get_where('users', array('id_user' => $get_user_id))->row()->password;

                ?>
                <?php if ($get_user == sha1('admincc')) { ?>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#warningDefaultPassword">
                        Ya, keluar sekarang
                    </button>
                <?php } else { ?>
                    <a href="<?php echo site_url('login/logout'); ?>" type="button" class="btn btn-danger">Ya, keluar sekarang</a>
                <?php } ?>

                <!-- warningDefaultPasswordModal -->
                <div class="modal bounceIn" id="warningDefaultPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Deteksi Keamanan!</h5>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger">
                                    <i class="feather icon-alert-triangle mr-1" style="font-size: 16px;"></i>
                                    Kami ingin mengingatkan anda sekali lagi bahwa password yang anda gunakan tidak aman! Mohon untuk segera mengganti password demi keamanan sistem
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="" type="button" class="btn btn-primary">Ganti dulu</a>
                                <a href="<?php echo site_url('login/logout'); ?>" type="button" class="btn btn-danger">Lanjut keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>