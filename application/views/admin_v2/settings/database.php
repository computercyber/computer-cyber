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
                                <li class="breadcrumb-item active">Database Information</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $this->session->flashdata('status'); ?>

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
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Backup database</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">cPanel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row ml-2 mt-2">
                                    <div class="col-md-12">

                                        <?php $mysqli = new mysqli($this->db->hostname, $this->db->username, $this->db->password, $this->db->database);

                                        if ($mysqli->connect_errno) {
                                            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                                            exit();
                                        }

                                        ?>
                                        <p>Database : <strong>MariaDB</strong></p>
                                        <p>Version : <strong><?php echo $mysqli->server_info;
                                                                $mysqli->close(); ?></strong>
                                        </p>

                                        <h5>Backup database</h5>
                                        <p>Klik tombol dibawah ini untuk backup database agar memudahkan admin tidak perlu masuk ke cpanel server</p>
                                        <a class="btn btn-success event-btn btn-backup">
                                            <span class="spinner-border spinner-border-sm mr-1" role="status"></span>
                                            <span class="load-text">Creating backup ... </span>
                                            <span class="btn-text"><i class="feather icon-download-cloud mr-2"></i> Backup</span>
                                        </a>

                                        <p>
                                            <?php
                                            $get_db_name = $this->db->database;
                                            $tables = $this->db->query("SELECT t.TABLE_NAME AS myTables FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = '" . $get_db_name . "' AND t.TABLE_NAME LIKE '%a%' ")->result_array();
                                            ?>

                                            <table class="table table-hover table-sm col-md-4">
                                                <thead>
                                                    <tr>
                                                        <th>Name table</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($tables as $key => $val) :  ?>
                                                        <tr>
                                                            <td><?= $val['myTables'] ?></td>
                                                            <td><a href="<?= site_url('admin/settings/database/' . urlencode(encrypt_url('truncate'))  . '/' . encrypt_url($val['myTables'])) ?>" class="btn btn-danger btn-sm btn-truncate" data-name="<?= $val['myTables'] ?>" onclick="return confirm('Ingin mengosongkan table?')"><i class="feather icon-trash mr-1"></i> Truncate</a></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row ml-2 mt-2">
                                    <div class="col-md-12">
                                        <p>Username dan Password cPanel Computer Cyber ada di inbox email Computer Cyber</p>
                                        <a href="<?= site_url() ?>cpanel" class="btn btn-warning" target="_blank"><i class="feather icon-server mr-1"></i> Open cPanel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-backup').on('click', function() {
            window.location.replace('<?= site_url('admin/settings/database/' . urlencode(encrypt_url('backup'))) ?>');
        });

        // $('.btn-truncate').on('click', function() {
        //     const before_name = $(this).data('name');

        //     window.location.replace(`<?= site_url('admin/settings/database/' . urlencode(encrypt_url('truncate')) . '/' . urlencode(encrypt_url(`fgxggsgfg`))) ?>`);
        // })
    });
</script>