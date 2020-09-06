<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftar Anggota Baru <?= date('Y') ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets') ?>/admin_v2/assets/css/plugins/bootstrap.min.css">

    <style>
        * {
            font-family: 'Quicksand', sans-serif;
        }

        #table {
            font-size: 12px !important;
            text-transform: capitalize;
        }
    </style>
</head>

<body>

    <h5>List Pendaftar Anggota Baru Computer Cyber <?= date('Y') ?></h5>
    <small>Melalui tautan <a href="http://register.computer-cyber.org" target="_blank" rel="noopener noreferrer">http://register.computer-cyber.org</a></small>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="table" width="100%" class="table table-sm table-bordered">
                <thead>
                    <tr align="center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nim</th>
                        <th>No HP</th>
                        <!-- <th>Jenis Kelamin</th> -->
                        <th>Tanggal Lahir</th>
                        <th>Jurusan</th>
                        <!-- <th>Pengelaman organisasi</th>
                        <th>Alamat</th>
                        <th>Alasan Masuk</th> -->
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($calon_anggota as $ca) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ucwords($ca->nama)  ?></td>
                            <td><?= strtolower($ca->email)  ?></td>
                            <td><?= $ca->nim ?></td>
                            <td><?= $ca->no_hp ?></td>
                            <!-- <td><?= $ca->jenis_kelamin ?></td> -->
                            <td><?= $ca->tanggal_lahir ?></td>
                            <td><?= $ca->judul_jurusan ?></td>
                            <!--  <td><?= $ca->pengalaman_organisasi ?></td>
                           <td><?= $ca->alamat ?></td>
                            <td><?= $ca->alasan_masuk ?></td>
                            <td><?= $ca->nama_divisi ?></td> -->
                            <td><?= $ca->date_created ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="<?php echo base_url('assets'); ?>/admin_v2/assets/js/plugins/bootstrap.min.js"></script>
</body>

</html>