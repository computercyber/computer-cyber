<div class="pcoded-main-container">
    <div class="pcoded-content">

        <section class="section">

            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <p class="m-b-10 lead header-title"><?php echo $title; ?></p>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('admin/settings') ?>">Settings</a></li>
                                <li class="breadcrumb-item active">Engine Information</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <p>Versi Aplikasi : <strong>v2.3</strong></p>
                        Web Framework : <strong>Codeigniter <?= CI_VERSION ?></strong>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <iframe src="http://localhost/computer-cyber/engine.php" frameborder="0" width="100%" height="24000px"></iframe>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>