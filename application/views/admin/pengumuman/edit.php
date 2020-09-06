<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Anggota Diterima</h1>
        </div>

        <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>


        <?php if (isset($error)) {
            echo '<div class="alert alert-warning">';
            echo $error;
            echo '</div>';
        }
        ?>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart(site_url('admin/pengumuman/update/' . $pengumuman->id_anggota)); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-lg">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama anggota" value="<?= $pengumuman->nama ?>" /><br>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-lg">
                                    <label>Nim</label>
                                    <input type="text" name="nim" class="form-control" placeholder="+628..." value="<?php echo $pengumuman->nim ?>">
                                    <!-- <?php echo form_error('no_hp', '<div class="text-danger small mt-2 ml-2">* ', '</div>') ?><br> -->
                                </div>

                                <div class="form-group form-group-lg">
                                    <label>Dvisi</label>
                                    <input type="text" name="divisi" class="form-control" placeholder="Jurusan" value="<?= $pengumuman->divisi ?>" /><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-lg">
                                        <input type="submit" name="submit" class="btn btn-success" value="Save" />
                                        <input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
                                    </div>
                                </div>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
    </section>
</div>