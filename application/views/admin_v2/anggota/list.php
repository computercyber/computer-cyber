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
                            <li class="breadcrumb-item active">Anggota</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->session->flashdata('status'); ?>

        <section class="section">

            <?php

            $get_member_not_approved = $this->db->get_where('anggota', array(
                'is_approved' => 0
            ));
            ?>

            <?php if ($get_member_not_approved->num_rows() >= 1) : ?>
                <div class="alert alert-warning shadow-sm p-3 mb-5 rounded fade show" role="alert">
                    <h4 class="alert-heading">Alert sistem <span class="pcoded-micon"><i class="ml-1 feather icon-bell"></i></h4>
                    <p>Kami mendeteksi ada <?= $get_member_not_approved->num_rows() ?> anggota yang belum disetujui status keanggotaanya.</p>
                    <hr>
                    <a href="<?= site_url('admin/anggota/setujui_anggota') ?>" class="btn btn-outline-warning mr-1" onclick="return confirm('Ingin mngesahkan keanggotaan?')">Setujui sekarang</a>
                    <a href="" class="btn btn-default text-muted" data-dismiss="alert" aria-label="Close">Abaikan</a>
                </div>

            <?php endif ?>


            <div class="row">
                <div class="col-md-12">
                    <div class="section-body">

                        <a href="#" data-toggle="modal" data-target="#addAnggotaModal" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                        <?php

                        $getAnggotaOnDivisi =  $this->db->select('anggota.id_divisi')
                            ->select('divisi.nama_divisi')
                            ->select("count(*) as total")
                            ->join('divisi', 'divisi.id_divisi = anggota.id_divisi')
                            ->from('anggota')
                            ->where('anggota.is_approved', 1)
                            ->group_by('divisi.nama_divisi')
                            ->get()
                            ->result();

                        $getYearAnggota =  $this->db->select('anggota.tahun_masuk_anggota')
                            ->select("count(*) as total")
                            ->from('anggota')
                            ->where('anggota.is_approved', 1)
                            ->group_by('anggota.tahun_masuk_anggota')
                            ->order_by('anggota.tahun_masuk_anggota', 'asc')
                            ->get()
                            ->result();

                        ?>

                        <?php
                        $nama_divisi = "";
                        $jumlah = null;
                        foreach ($getAnggotaOnDivisi as $item) {
                            $jur = $item->nama_divisi;
                            $nama_divisi .= "'$jur'" . ", ";
                            $jum = $item->total;
                            $jumlah .= "$jum" . ", ";
                        }

                        ?>

                        <?php
                        $tahun_masuk_anggota = "";
                        $jumlah_anggota_tahun_masuk = null;
                        foreach ($getYearAnggota as $getYear) {
                            $jur = $getYear->tahun_masuk_anggota;
                            $tahun_masuk_anggota .= "'$jur'" . ", ";
                            $jum = $getYear->total;
                            $jumlah_anggota_tahun_masuk .= "$jum" . ", ";
                        }

                        ?>



                        <div class="row my-4">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Grafik Divisi Anggota Terdaftar (non calon)</div>
                                    <div class="card-body"><canvas id="divisiChart" width="200px" height="200px"></canvas></div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">Grafik Tahun Masuk Anggota Terdaftar (non calon)</div>
                                    <div class="card-body"><canvas id="yearAnggotaChart" width="200px" height="200px"></canvas></div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var ctx = document.getElementById('divisiChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: [<?= $nama_divisi ?>],
                                    datasets: [{
                                        label: 'Data Pemilihan Divisi Calon Anggota Baru',
                                        data: [<?= $jumlah ?>],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>

                        <script>
                            var ctx = document.getElementById('yearAnggotaChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'line',
                                // The data for our dataset
                                data: {
                                    labels: [<?= $tahun_masuk_anggota ?>],
                                    datasets: [{
                                        label: 'Data Tahun Angkatan Anggota',
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 6,
                                        data: [<?= $jumlah_anggota_tahun_masuk; ?>]
                                    }]
                                },
                                // Configuration options go here
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>


                        <div class="card">
                            <div class="card-header">
                                <h5>Filter</h5>
                            </div>
                            <form action="<?= site_url('admin/anggota') ?>" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Status anggota : </label>
                                            <select name="status" id="status" class="custom-select">
                                                <option value="" selected disable>-- Status anggota --</option>
                                                <option value="aktif" <?= ($this->input->get('status') == 'aktif') ? 'selected' : null ?>>Aktif</option>
                                                <option value="purna" <?= ($this->input->get('status') == 'purna') ? 'selected' : null ?>>Purna</option>
                                                <option value="calon" <?= ($this->input->get('status') == 'calon') ? 'selected' : null ?>>Calon</option>
                                                <option value="keluar" <?= ($this->input->get('status') == 'keluar') ? 'selected' : null ?>>Keluar</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Tahun anggota</label>
                                            <select name="tahun" id="" class="custom-select">
                                                <option value="" selected disable>-- Tahun anggota --</option>
                                                <?php for ($y = date("Y") - 6; $y <= date("Y"); $y++) : ?>
                                                    <option value="<?= $y ?>" <?= ($this->input->get('tahun') == $y) ? 'selected' : null ?>><?= $y ?></option>
                                                <?php endfor ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Jurusan</label>
                                            <select name="jurusan" id="jurusan" class="custom-select">
                                                <option value="" selected disable>-- Jurusan --</option>
                                                <?php foreach ($jurusan as $j) : ?>
                                                    <option value="<?= $j->judul_jurusan ?>" <?= ($this->input->get('jurusan') == $j->judul_jurusan) ? 'selected' : null ?>><?= $j->judul_jurusan ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Divisi</label>
                                            <select name="divisi" id="divisi" class="custom-select">
                                                <option value="" selected disable>-- Divisi --</option>
                                                <?php foreach ($divisi as $div) : ?>
                                                    <option value="<?= $div->nama_divisi ?>" <?= ($this->input->get('divisi') == $div->nama_divisi) ? 'selected' : null ?>><?= $div->nama_divisi ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-outline-primary event-btn" type="submit">
                                                <span class="spinner-border spinner-border-sm" role="status"></span>
                                                <span class="load-text">Loading...</span>
                                                <span class="btn-text"><i class="fas fa-search mr-1"></i> Filter</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="anggotaTable" class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Aksi</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>E-mail</th>
                                                <th>No hp</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($anggota as $a) :
                                            ?>
                                                <tr class="<?= ($a->is_approved == 0) ? 'text-warning' : null; ?>">
                                                    <td>
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu shadow">
                                                                <a href="<?php echo site_url() ?>admin/anggota/detail/<?php echo $a->id_anggota ?>" class="dropdown-item" target="_blank"><i class="feather icon-eye mr-2"></i>Lihat</a>
                                                                <a href="<?php echo site_url() ?>admin/anggota/update/<?php echo $a->id_anggota ?>" class="dropdown-item"><i class="feather icon-edit-2 mr-2"></i>Edit</a>
                                                                <a href="<?php echo site_url('admin/anggota/delete/' . $a->id_anggota) ?>" class="dropdown-item tombol-hapus-anggota"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-inline-block align-middle">
                                                            <img class="img-radius align-top m-r-15 lazyload" src="<?php echo base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?= ($a->gambar != 'profile_placeholder.png' and $a->gambar != null) ? base_url('assets/upload/image/' . $a->gambar) : base_url('assets/img/profile_placeholder.png'); ?>" width="40" height="40">
                                                            <div class="d-inline-block">
                                                                <h6 class="m-b-0 <?= ($a->is_approved == 0) ? 'text-warning' : null; ?>"><?= $a->nama_anggota; ?></h6>
                                                                <small class="m-b-0"><?= $a->nama_divisi; ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if ($a->id_jabatan != null) : ?>
                                                            <?= $a->nama_jabatan; ?><br><small><?= $a->tahun_jabatan; ?></small>
                                                        <?php else : ?>
                                                            <?= ($a->is_approved == 0) ? 'Calon anggota' : 'Anggota <br>' . '<small>' . $a->tahun_masuk_anggota . '</small>'; ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?= $a->email_anggota; ?></td>
                                                    <td><?= $a->no_hp; ?></td>
                                                    <td><span class="badge <?php if ($a->status_anggota == "aktif") {
                                                                                echo 'badge-light-success';
                                                                            } elseif ($a->status_anggota == "purna") {
                                                                                echo 'badge-light-warning';
                                                                            } elseif ($a->status_anggota == "calon") {
                                                                                echo 'badge-light-secondary';
                                                                            } else {
                                                                                echo 'badge-light-danger';
                                                                            } ?> "><?php echo $a->status_anggota ?></span>
                                                </tr>
                                            <?php endforeach  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>

    <?php if ($this->form_validation->run() == FALSE && validation_errors('<div class="alert alert-warning">', '</div>') != null) { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#addAnggotaModal').modal('show');
            });
        </script>
    <?php } elseif (isset($error)) { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#addAnggotaModal').modal('show');
            });
        </script>
    <?php } ?>


    <div class="modal hide fade" tabindex="-1" role="dialog" id="addAnggotaModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Anggota</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/anggota'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_anggota">Nama Lengkap</label>
                                    <input type="text" id="nama_anggota" name="nama_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_anggota') != null) {
                                                                                                                        echo "is-invalid";
                                                                                                                    } ?>" autofocus autocomplete="off" placeholder="Cth. Dadang Suratang" value="<?php echo set_value('nama_anggota'); ?>">
                                    <?php echo form_error('nama_anggota', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" id="nim" name="nim" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nim') != null) {
                                                                                                        echo "is-invalid";
                                                                                                    } ?>" placeholder="170155..." value="<?php echo set_value('nim'); ?>">
                                        <?php echo form_error('nim', '<div class="invalid-feedback">', '</div>'); ?>
                                        <div id="nim-status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tahun_masuk_anggota">Tahun Masuk Anggota</label>
                                    <input type="number" id="tahun_masuk_anggota" name="tahun_masuk_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tahun_masuk_anggota') != null) {
                                                                                                                                        echo "is-invalid";
                                                                                                                                    } ?>" placeholder="20..." maxlength="4" value="<?php echo set_value('tahun_masuk_anggota'); ?>">
                                    <?php echo form_error('tahun_masuk_anggota', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tanggal_lahir') != null) {
                                                                                                                            echo "is-invalid";
                                                                                                                        } ?>" value="<?php echo set_value('tanggal_lahir'); ?>">
                                        <?php echo form_error('tanggal_lahir', '<div class="invalid-feedback">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin Anggota</label>
                                    <br>
                                    <div class="form-radio custom-control custom-radio custom-control-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jenis_kelamin_anggota" id="membershipRadios1" value="pria" <?php echo set_value('jenis_kelamin_anggota') == 'pria' ? "checked" : null ?>>Pria</label>
                                    </div>
                                    <div class="form-radio custom-control custom-radio custom-control-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="jenis_kelamin_anggota" id="membershipRadios2" value="wanita" <?php echo set_value('jenis_kelamin_anggota') == 'wanita' ? "checked" : null ?>>Wanita</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email_anggota">Email Anggota</label>
                                    <input type="email" name="email_anggota" id="email_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('email_anggota') != null) {
                                                                                                                        echo "is-invalid";
                                                                                                                    } ?>" placeholder="mail@domain.com" value="<?php echo set_value('email_anggota'); ?>">
                                    <?php echo form_error('email_anggota', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="custom-select" required name="jurusan">
                                        <option selected disabled>-- Jurusan --</option>
                                        <optgroup label="Teknik">
                                            <option value="1" <?php echo set_value('jurusan') == 1 ? "selected" : null ?>>Teknik Informatika</option>
                                            <option value="2" <?php echo set_value('jurusan') == 2 ? "selected" : null ?>>Teknik Elektro</option>
                                        </optgroup>
                                        <optgroup label="Ekonomi">
                                            <option value="3" <?php echo set_value('jurusan') == 3 ? "selected" : null ?>>Akuntansi</option>
                                            <option value="4" <?php echo set_value('jurusan') == 4 ? "selected" : null ?>>Manajemen</option>
                                        </optgroup>
                                        <optgroup label="Fakultas Ilmu Kelautan dan Perikanan">
                                            <option value="5" <?php echo set_value('jurusan') == 5 ? "selected" : null ?>>Ilmu Kelautan</option>
                                            <option value="6" <?php echo set_value('jurusan') == 6 ? "selected" : null ?>>Manajemen Sumberdaya Perairan</option>
                                            <option value="7" <?php echo set_value('jurusan') == 7 ? "selected" : null ?>>Budidaya Perairan</option>
                                            <option value="8" <?php echo set_value('jurusan') == 8 ? "selected" : null ?>>Teknologi Hasil Perikanan</option>
                                            <option value="9" <?php echo set_value('jurusan') == 9 ? "selected" : null ?>>Sosial Ekonomi Perikanan</option>
                                        </optgroup>
                                        <optgroup label="Fakultas Keguruan dan Ilmu Pendidikan">
                                            <option value="10" <?php echo set_value('jurusan') == 10 ? "selected" : null ?>>Pendidikan Bahasa dan Sastra Indonesia</option>
                                            <option value="11" <?php echo set_value('jurusan') == 11 ? "selected" : null ?>>Pendidikan Bahasa Inggris</option>
                                            <option value="12" <?php echo set_value('jurusan') == 12 ? "selected" : null ?>>Pendidikan Kimia</option>
                                            <option value="13" <?php echo set_value('jurusan') == 13 ? "selected" : null ?>>Pendidikan Biologi</option>
                                            <option value="14" <?php echo set_value('jurusan') == 14 ? "selected" : null ?>>Pendidikan Matematika</option>
                                        </optgroup>
                                        <optgroup label="Fakultas Ilmu Sosial dan Ilmu Politik">
                                            <option value="15" <?php echo set_value('jurusan') == 15 ? "selected" : null ?>>Imu Administrasi Negara</option>
                                            <option value="16" <?php echo set_value('jurusan') == 16 ? "selected" : null ?>>Ilmu Pemerintahan</option>
                                            <option value="17" <?php echo set_value('jurusan') == 17 ? "selected" : null ?>>Sosiologi</option>
                                            <option value="18" <?php echo set_value('jurusan') == 18 ? "selected" : null ?>>Ilmu Hukum</option>
                                            <option value="19" <?php echo set_value('jurusan') == 19 ? "selected" : null ?>>Hubungan Internasional</option>
                                            <option value="20" <?php echo set_value('jurusan') == 20 ? "selected" : null ?>>Administrasi Publik</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="number" name="no_hp" id="no_hp" class="form-control" maxlength="14" placeholder="+628 ..." value="<?php echo set_value('no_hp'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
                                    </i>
                                    <div class="input-group input-group-lg" style="margin-bottom:-10px;">
                                        <input name="gambar" class="custom-file-input <?php if (isset($error)) {
                                                                                            echo "is-invalid";
                                                                                        } ?>" type="file" class="mt-3" id="gambar">
                                        <label for="gambar" class="custom-file-label text-muted">Pilih atau seret gambar ...</label>
                                        <?php if (isset($error)) { ?>
                                            <div class="invalid-feedback"><small><?php echo $error ?></small></div>
                                        <?php } ?>
                                        <small for="gambar" class="form-text text-muted">
                                            Gambar harus berukuran 400 x 400
                                        </small>
                                    </div>

                                    <figure class="figure mt-3">
                                        <img src="<?= base_url('assets/img/profile_placeholder.png') ?>" class="figure-img img-fluid rounded img-placeholder-anggota" alt="..." width="150px">
                                        <br>
                                        <small class="form-text text-muted">
                                            Kompress gambar secara <em>lossless</em> untuk menghemat space penyimpanan. Kami merekomendasikan anda untuk kompres gambar pada tautan <a href="https://compressor.io/" target="_blank" rel="noopener noreferrer">Compressor.io</a> ini dan pilih <strong>Lossless</strong>.
                                        </small>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Status Keanggotaan</label>
                                    <br>
                                    <div class="form-radio custom-control custom-radio custom-control-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios1" value="aktif" <?php echo set_value('status_anggota') == 'aktif' ? "checked" : null ?>>Aktif</label>
                                    </div>
                                    <div class="form-radio custom-control custom-radio custom-control-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios2" value="purna" <?php echo set_value('status_anggota') == 'purna' ? "checked" : null ?>>Purna</label>
                                    </div>
                                    <div class="form-radio custom-control custom-radio custom-control-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status_anggota" id="membershipRadios2" value="keluar" <?php echo set_value('status_anggota') == 'keluar' ? "checked" : null ?>>Keluar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <select class="custom-select" name="id_divisi" required>
                                        <option selected disabled>-- Divisi --</option>
                                        <?php foreach ($divisi as $divisi) : ?>
                                            <option value="<?php echo $divisi->id_divisi ?>" <?php echo set_value('id_divisi') == $divisi->id_divisi ? "selected" : null ?>>
                                                <?php echo $divisi->nama_divisi ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select class="custom-select" name="id_jabatan">
                                        <option selected disabled>-- Jabatan --</option>
                                        <?php foreach ($jabatan as $jabatan) : ?>
                                            <option value="<?php echo $jabatan->id_jabatan ?>" <?php echo set_value('id_jabatan') == $jabatan->id_jabatan ? "selected" : null ?>>
                                                <?php echo $jabatan->nama_jabatan ?> - <?php echo $jabatan->tahun_jabatan ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat_anggota">Alamat</label>
                                    <textarea name="alamat_anggota" id="alamat_anggota" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('alamat_anggota') != null) {
                                                                                                                echo "is-invalid";
                                                                                                            } ?>" placeholder="Alamat di Tanjungpinang" rows="4"><?php echo set_value('alamat_anggota') ?></textarea>
                                    <?php echo form_error('alamat_anggota', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button class="btn btn-primary event-btn" type="submit">
                                <span class="spinner-border spinner-border-sm" role="status"></span>
                                <span class="load-text">Loading...</span>
                                <span class="btn-text">Tambah anggota</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#gambar').change(function() {
            const sampul = document.querySelector('#gambar');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-placeholder-anggota');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        })


        $('#anggotaTable').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
        });

        $('#nim').on('keyup', function() {

            const keyword = $(this).val();

            $.ajax({
                url: '<?php echo site_url('admin/anggota/check_nim'); ?>',
                data: {
                    nim: keyword
                },
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 1) {
                        $('#nim').removeClass('is-invalid');
                        $('#nim-status').addClass('invalid-feedback').html('NIM ' + data.nim + ' ' + data.message);
                        console.log(data.status);
                    } else {
                        $('#nim').addClass('is-invalid');
                        $('#nim-status').addClass('invalid-feedback').html('NIM ' + data.nim + ' ' + data.message);
                        console.log(data.status);
                    }
                }
            });
        });
    });
</script>