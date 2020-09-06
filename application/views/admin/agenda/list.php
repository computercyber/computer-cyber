<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Agenda</h1>
        </div>

        <?php echo $this->session->flashdata('message'); ?>
        <!-- flashdata untuk data berhasil -->

        <div class="section-body">
            <!-- <?php
                    include('add.php');
                    ?> -->
            <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5">No</th>
                                            <th>Nama Agenda</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Undangan</th>
                                            <th>Lokasi</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($agenda as $agenda) :
                                        ?>
                                            <tr class="table-bordered">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $agenda->nama_agenda ?></td>
                                                <td><?php echo date('d M Y', strtotime($agenda->tanggal_mulai)); ?></td>
                                                <td><?php echo date('d M Y', strtotime($agenda->tanggal_selesai)); ?></td>
                                                <td><?php echo $agenda->undangan ?></td>
                                                <td><?php echo $agenda->lokasi ?></td>
                                                <td><?php echo $agenda->keterangan ?></td>
                                                <td><?php echo $agenda->status ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/agenda/deleteAgenda/' . $agenda->id_agenda); ?>" class="btn btn-danger tombol-hapus-agenda">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
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
    </section>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?php echo site_url('admin/agenda/add') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_agenda">Nama Agenda</label>
                        <input type="text" name="nama_agenda" class="form-control"><br>

                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control"><br>

                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control"><br>

                        <label for="undangan">Undangan</label>
                        <input type="text" name="undangan" class="form-control"><br>


                        <label for="lokasi">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control"><br>

                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>