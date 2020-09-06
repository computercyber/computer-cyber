<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Data Anggota</h1>
        </div>
    </section>

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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?php echo $anggota->nama_anggota ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIM</td>
                                        <td><?php echo $anggota->nim ?></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $anggota->email_anggota ?></td>
                                    </tr>
                                    <td>Jurusan</td>
                                    <td><?php echo $anggota->jurusan ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td><?php echo $anggota->nama_jabatan ?> - <?php echo $anggota->tahun_jabatan ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?php echo $anggota->jenis_kelamin_anggota ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td><?php echo date('d M Y', strtotime($anggota->tanggal_lahir)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?php echo $anggota->alamat_anggota ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="<?php echo base_url() ?>admin/anggota/update/<?php echo $anggota->id_anggota ?>" class="btn btn-primary btn-lg">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>