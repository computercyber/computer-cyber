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
                            <li class="breadcrumb-item active">Agenda dan Event</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->session->flashdata('status'); ?>

        <?php if ($konfigurasi->auto_emailer_agenda == 0) { ?>
            <div class="alert alert-info shadow-sm mt-3 rounded fade show" role="alert">
                <h4 class="alert-heading">Tips efektif <span class="pcoded-micon"><i class="ml-1 feather icon-sun"></i></h4>
                <p>Pengurus sudah membuat agenda tapi terkadang peserta banyak yang tidak datang? Pasti mengesalkan bukan. 8 dari 10 orang mengatakan bahwa mereka lupa akan agenda tersebut atau tidak membaca pengumuman di grup. Maka dari itu Kami akan membantu anda untuk mengingatkan para anggota aktif dengan cara mengirimkan email ke mereka. Mohon untuk mengaktifkan pengiriman email otomatis pada tiap agenda yang akan diselenggarakan</p>
                <hr>
                <a href="<?php echo site_url('admin/agenda/konfigurasi_auto_emailer'); ?>" class="btn btn-info btn-sm">Aktifkan</a>
            </div>
        <?php } ?>


        <section class="section">
            <?php echo $this->session->flashdata('message'); ?>
            <!-- flashdata untuk data berhasil -->

            <div class="section-body">
                <a href="#" data-toggle="modal" data-target="#addModalAgenda" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body m-0">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="dataEvent" width="100%" cellspacing="0">
                                        <caption>All Event</caption>
                                        <thead>
                                            <tr>
                                                <th width="5">No</th>
                                                <th width="40px" data-orderable="false">Aksi</th>
                                                <th data-orderable="false">Sampul</th>
                                                <th data-orderable="false">Nama Agenda</th>
                                                <th>Tanggal Mulai &mdash; Tanggal Selesai</th>
                                                <th>Undangan</th>
                                                <th data-orderable="false">Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($agenda as $agenda) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td>
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu shadow">
                                                                <a class="dropdown-item btn-edit-agenda" data-toggle="modal" data-target="#editModalAgenda" data-id="<?= $agenda->id_agenda ?>" href="#!"><i class="feather icon-edit-2 mr-1"></i> Edit</a>
                                                                <a class="dropdown-item tombol-hapus-agenda" href="<?= site_url('admin/agenda/delete/' . $agenda->id_agenda); ?>">
                                                                    <i class="far fa-trash-alt mr-1"></i> Hapus</a>
                                                                <a class="dropdown-item" href="<?= site_url('admin/agenda/changestatus/' . 'tunda' . '/' . $agenda->id_agenda);  ?>"><i class="feather icon-pause-circle mr-1"></i> Tunda Acara</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <figure class="figure">
                                                            <img src="<?= base_url('assets/upload/image/'  . $agenda->sampul_agenda) ?>" class="figure-img img-fluid rounded shadow" alt="" width="50px">
                                                        </figure>

                                                    </td>
                                                    <td><?= $agenda->nama_agenda ?>
                                                        <br>
                                                        <small><strong><?= $agenda->status; ?></strong></small>
                                                    </td>
                                                    <td><?= date('d M Y', $agenda->tanggal_mulai); ?> &mdash; <?= date('d M Y', $agenda->tanggal_selesai); ?></td>
                                                    <td><?= $agenda->undangan ?></td>
                                                    <td><?= $agenda->lokasi ?></td>

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

    <?php if ($this->form_validation->run() == FALSE && validation_errors('<div class="alert alert-warning">', '</div>') != null) { ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#addModal').modal('show');
            });
        </script>
    <?php } ?>

    <div class="modal hide fade" tabindex="-1" role="dialog" id="addModalAgenda">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Agenda</h5>
                </div>
                <div class="modal-body">
                    <form class="form" action="<?php echo site_url('admin/agenda') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_agenda">Nama Agenda</label>
                                    <input type="text" name="nama_agenda" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_agenda') != null) {
                                                                                                    echo "is-invalid";
                                                                                                } ?>" placeholder="Cth. Makrab CC <?php echo date('Y'); ?>" autofocus value="<?php echo set_value('nama_agenda'); ?>">
                                    <?php echo form_error('nama_agenda', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tanggal_mulai') != null) {
                                                                                                    echo "is-invalid";
                                                                                                } ?>" value="<?php echo set_value('tanggal_mulai'); ?>">
                                    <?php echo form_error('tanggal_mulai', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('lokasi') != null) {
                                                                                                echo "is-invalid";
                                                                                            } ?>" placeholder="Cth. Trikora 4 Km 40" value="<?php echo set_value('lokasi'); ?>">
                                    <?php echo form_error('lokasi', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('tanggal_selesai') != null) {
                                                                                                        echo "is-invalid";
                                                                                                    } ?>" value="<?php echo set_value('tanggal_selesai'); ?>">
                                    <?php echo form_error('tanggal_selesai', '<div class="invalid-feedback">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="undangan">Undangan untuk</label>
                                    <input type="text" name="undangan" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('undangan') != null) {
                                                                                                echo "is-invalid";
                                                                                            } ?>" placeholder="Cth. Anggota aktif <?php echo date('Y'); ?>" value="<?php echo set_value('undangan'); ?>">
                                    <?php echo form_error('undangan', '<div class="invalid-feedback">', '</div>'); ?>
                                    <small class="form-text text-muted">
                                        Undangan ditujukan untuk peserta yang dapat hadir dalam agenda/event tersebut. Cth. <strong>Semua anggota</strong> berarti semua anggota dapat hadir. Atau bisa juga <strong>Anggota aktif</strong>, <strong>Calon anggota</strong>, dll.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group input-avatar">
                                    <label for="name_customer">Upload sampul event</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="sampul_agenda" id="sampul_agenda">
                                            <label class="custom-file-label" for="sampul_agenda">Pilih atau seret file . . . </label>
                                        </div>
                                    </div>
                                </div>


                                <figure class="figure">
                                    <img src="<?= base_url('assets/img/img_placeholder.png') ?>" class="figure-img img-fluid rounded img-placeholder-event" alt="..." width="150px">
                                    <small class="form-text text-muted">
                                        Kompress gambar secara <em>lossless</em> untuk menghemat space penyimpanan. Kami merekomendasikan anda untuk kompres gambar pada tautan <a href="https://compressor.io/" target="_blank" rel="noopener noreferrer">Compressor.io</a> ini dan pilih <strong>Lossless</strong>.
                                    </small>
                                </figure>



                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" placeholder="Tulis apabila butuh keterangan kegiatan" rows="4"><?php echo set_value('nama_agenda'); ?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button class="btn btn-primary event-btn" type="submit">
                                <span class="spinner-border spinner-border-sm" role="status"></span>
                                <span class="load-text">Loading...</span>
                                <span class="btn-text">Tambah agenda</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" tabindex="-1" role="dialog" id="editModalAgenda">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Agenda</h5>
                </div>
                <div class="modal-body">
                    <form class="form" action="<?= site_url('admin/agenda/update') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="id_agenda" id="id_agenda_show" class="form-control">
                                    <label for="nama_agenda">Nama Agenda</label>
                                    <input type="text" name="nama_agenda" id="nama_agenda_show" class="form-control" placeholder="Cth. Makrab CC <?php echo date('Y'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_mulai">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai_show" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi_show" class="form-control" placeholder="Cth. Trikora 4 Km 40" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai_show" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="undangan">Undangan untuk</label>
                                    <input type="text" name="undangan" id="undangan_show" class="form-control" placeholder="Cth. Anggota aktif <?php echo date('Y'); ?>" required>

                                    <small class="form-text text-muted">
                                        Undangan ditujukan untuk peserta yang dapat hadir dalam agenda/event tersebut. Cth. <strong>Semua anggota</strong> berarti semua anggota dapat hadir. Atau bisa juga <strong>Anggota aktif</strong>, <strong>Calon anggota</strong>, dll.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group input-avatar">
                                    <label for="name_customer">Upload sampul event</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="sampul_agenda" id="sampul_agenda_show">
                                            <label class="custom-file-label custom-file-label_show" for="sampul_agenda_show">Pilih atau seret file . . . </label>
                                        </div>
                                    </div>
                                </div>


                                <figure class="figure">
                                    <img src="<?= base_url('assets/img/img_placeholder.png') ?>" class="figure-img img-fluid rounded img-placeholder-event_show" alt="..." width="150px">
                                    <br>
                                    <a href="javascript:;" class="btn btn-sm btn-danger my-2 btn-delete-sampul_agenda">Hapus sampul</a>
                                    <small class="form-text text-muted">
                                        Kompress gambar secara <em>lossless</em> untuk menghemat space penyimpanan. Kami merekomendasikan anda untuk kompres gambar pada tautan <a href="https://compressor.io/" target="_blank" rel="noopener noreferrer">Compressor.io</a> ini dan pilih <strong>Lossless</strong>.
                                    </small>
                                </figure>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan_show" class="form-control" placeholder="Tulis apabila butuh keterangan kegiatan" rows="4"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button class="btn btn-primary event-btn" type="submit">
                                <span class="spinner-border spinner-border-sm" role="status"></span>
                                <span class="load-text">Loading...</span>
                                <span class="btn-text">Update agenda</span>
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

        $('#dataEvent').dataTable();


        function convert(date_event) {

            let myDate = new Date(date_event * 1000);

            let year = myDate.getFullYear();

            let month = myDate.getMonth() + 1;
            if (month <= 9)
                month = '0' + month;

            let day = myDate.getDate();
            if (day <= 9)
                day = '0' + day;

            return prettyDate = year + '-' + month + '-' + day;

        }


        $('#dataEvent').on('click', '.btn-edit-agenda', function() {
            let idAgenda = $(this).data('id')

            $('#editModalAgenda').modal('show')


            $.ajax({
                url: '<?= site_url('admin/agenda/get_data_agenda') ?>',
                type: 'post',
                data: {
                    id_agenda: idAgenda
                },
                dataType: 'json',
                success: function(data) {
                    $('#id_agenda_show').val(data.id_agenda)
                    $('#nama_agenda_show').val(data.nama_agenda)
                    $('#lokasi_show').val(data.lokasi)
                    $('#undangan_show').val(data.undangan)
                    $('#keterangan_show').val(data.keterangan)
                    $('#tanggal_mulai_show').val(convert(data.tanggal_mulai))
                    $('#tanggal_selesai_show').val(convert(data.tanggal_selesai))
                    $('.custom-file-label_show').html(data.sampul_agenda)

                    if (data.sampul_agenda != 'img_placeholder.png') {
                        $('.img-placeholder-event_show').attr('src', `<?= base_url('assets/upload/image/') ?>${data.sampul_agenda}`)
                        $('.btn-delete-sampul_agenda').removeClass('d-none')
                        $('#sampul_agenda_show').attr('disabled', true);
                    } else {
                        $('.img-placeholder-event_show').attr('src', `<?= base_url('assets/img/img_placeholder.png') ?>`)
                        $('.btn-delete-sampul_agenda').addClass('d-none')
                    }
                },
                error: function() {
                    alert("Terjadi kesalahan!")
                }
            })


        })

        $('.btn-delete-sampul_agenda').click(function() {
            let idAgenda = $('#id_agenda_show').val()

            let decicion = confirm('Hapus sampul agenda ini?')

            if (decicion == true) {
                $.ajax({
                    url: '<?= site_url('admin/agenda/delete_image') ?>',
                    type: 'post',
                    data: {
                        id_agenda: idAgenda
                    },
                    success: function() {

                        $('.img-placeholder-event_show').attr('src', `<?= base_url('assets/img/img_placeholder.png') ?>`)
                        $('#sampul_agenda_show').attr('disabled', false);

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'Foto profile dihapus',
                            type: 'success',
                        });
                    },
                    error: function() {
                        alert("Terjadi kesalahan!")
                    }
                })
            }



        })

        $('#sampul_agenda').change(function() {
            const sampul = document.querySelector('#sampul_agenda');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-placeholder-event');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        })

        $('#sampul_agenda_show').change(function() {
            const sampul = document.querySelector('#sampul_agenda_show');
            const sampulLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-placeholder-event_show');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        })


    });
</script>