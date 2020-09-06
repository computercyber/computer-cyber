<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <p class="m-b-10 lead header-title"><?php echo $title; ?></p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">

            <?php echo $this->session->flashdata('status'); ?>



            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline mb-4">
                        <a href="<?php echo site_url('admin/pendaftaran/resetData'); ?>" class="btn btn-danger tombol-reset-calon_anggota inline" style=""><i class="far fa-trash-alt mr-2"></i> Reset Data</a>

                        <div class="dropdown ml-2">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-download-cloud mr-2"></i>
                                Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="<?php echo site_url('admin/pendaftaran/export_pdf'); ?>" id="btn-export-pdf" target="_blank" rel="noopener noreferrer">PDF</a>
                                <a class="dropdown-item" href="<?php echo site_url('admin/pendaftaran/export_excel'); ?>">Excel</a>
                            </div>
                        </div>

                        <button type="button" class="btn btn-success inline ml-2" onclick="location.reload();"><i class="fas fa-sync mr-2"></i> Refresh</button>
                    </form>
                </div>
            </div>

            <?php

            $getCalonAnggotaOnDivisi =  $this->db->select('calon_anggota.divisi')
                ->select('divisi.nama_divisi')
                ->select("count(*) as total")->from('calon_anggota')
                ->join('divisi', 'divisi.id_divisi = calon_anggota.divisi')
                ->group_by('divisi.nama_divisi')
                ->get()
                ->result();

            ?>

            <?php
            //Inisialisasi nilai variabel awal
            $nama_divisi = "";
            $jumlah = null;
            foreach ($getCalonAnggotaOnDivisi as $item) {
                $jur = $item->nama_divisi;
                $nama_divisi .= "'$jur'" . ", ";
                $jum = $item->total;
                $jumlah .= "$jum" . ", ";
            }

            ?>



            <div class="row justify-content-center my-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Grafik pilihan divisi Calon Anggota Baru</div>
                        <div class="card-body"><canvas id="myChart" width="200px" height="200px"></canvas></div>
                    </div>
                </div>
            </div>

            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
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



            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover" id="dataPendaftar" width="100%" cellspacing="0" data-display-length='-1'>
                                        <thead>
                                            <tr>
                                                <th width="5">No</th>
                                                <th data-orderable="false">Keputusan</th>
                                                <th data-orderable="false">Aksi</th>
                                                <th data-orderable="false">Nama</th>
                                                <th data-orderable="false">No HP</th>
                                                <th>JK</th>
                                                <th>Link</th>
                                                <th>Waktu Pendaftaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pendaftaran as $p) :
                                            ?>

                                                <?php $check_anggota_sudah_diterima = $this->db->get_where('anggota', array(
                                                    'nim'           => $p->nim,
                                                    'email_anggota' => $p->email
                                                )); ?>

                                                <tr class="<?php echo ($check_anggota_sudah_diterima->num_rows() == 1) ? "text-success font-weight-bold" : null; ?> tr-peserta">
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <div class="form-check" align="center">
                                                            <label class="form-check-label" for="inlineFormCheck">
                                                                <small>Terima?</small>
                                                            </label>
                                                            <input class="form-check-input ml-1" type="checkbox" value="" data-id_peserta="<?= $p->id_peserta ?>" id="action_candidate" <?= ($check_anggota_sudah_diterima->num_rows() == 1) ? "checked" : null; ?>>

                                                        </div><br>
                                                    </td>
                                                    <td width="10">
                                                        <div class="btn-group mb-2 mr-2">
                                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu shadow">
                                                                <a href="<?php echo site_url('admin/pendaftaran/detail/' . urlencode(encrypt_url($p->id_peserta))); ?>" class="dropdown-item" target="_blank"><i class="feather icon-eye mr-2"></i>Lihat</a>

                                                                <?php if ($check_anggota_sudah_diterima->num_rows() == 1) { ?>
                                                                    <a href="<?php echo site_url('admin/pendaftaran/deny/' . urlencode(encrypt_url($p->id_peserta))); ?>" class="dropdown-item"><i class="feather icon-delete mr-2"></i>Batalkan diterima</a>
                                                                <?php } else if ($check_anggota_sudah_diterima->num_rows() < 1) { ?>
                                                                    <a href="<?php echo site_url('admin/pendaftaran/accept/' . urlencode(encrypt_url($p->id_peserta))); ?>" class="dropdown-item"><i class="feather icon-check-circle mr-2"></i>Terima</a>
                                                                <?php } ?>


                                                                <a href="<?php echo site_url('admin/pendaftaran/delete/' . urlencode(encrypt_url($p->id_peserta))); ?>" class="dropdown-item tombol-hapus-calon_anggota"><i class="far fa-trash-alt mr-3"></i>Delete</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>

                                                        <div class="media">
                                                            <img src="<?= ($p->gambar != null) ? 'http://localhost/register/uploads/img_member_candidate/' . $p->gambar : base_url('assets/img/profile_placeholder.png'); ?>" class="rounded-pill mr-3" alt="" width="50px" height="50px">
                                                            <div class="media-body">
                                                                <!-- <h5 class="mt-0">Media heading</h5> -->
                                                                <?php echo $p->nama ?><?= ($check_anggota_sudah_diterima->num_rows() == 1) ? '<i class="feather icon-check-circle ml-1"></i> <small>telah diterima</small>' : null; ?>
                                                                <span class="detail-status-member d-none"><i class="feather icon-check-circle ml-1"></i> <small>telah diterima</small></span>
                                                                <br>
                                                                <small class="text-muted"><?php echo $p->email ?> &mdash; <strong><?php echo $p->judul_jurusan ?></strong></small>
                                                            </div>
                                                        </div>






                                                    </td>
                                                    <td>
                                                        <a href="https://api.whatsapp.com/send?phone=6282283287151&text=Hi saya admin Computer Cyber, " class="" target="_blank"><?php echo $p->no_hp ?></a>
                                                    </td>
                                                    <td><?php echo $p->jenis_kelamin ?></td>
                                                    <td>
                                                        <?php if ($p->link) : ?>
                                                            <a href="<?php echo $p->link ?>" target="_blank" rel="noopener noreferrer">Lihat <i class="feather icon-zoom-in ml-1"></i></a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?php echo date('d M Y H:i:s', strtotime($p->date_created)); ?> WIB</td>
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
</div>

<script>
    $(document).ready(function() {


        $('#dataPendaftar').dataTable({
            aLengthMenu: [
                [10, 25, 50, 100, 200, -1],
                [10, 25, 50, 100, 200, "All"]
            ],
            iDisplayLength: -1
        });

        $('.form-check-input').on('click', function() {
            const IdPeserta = $(this).data('id_peserta');

            // $(this).closest("tr").addClass("text-success");
            if ($(this).prop("checked") == true) {
                $(this).closest("tr").addClass("text-success");

                // $('.detail').closest('span').removeClass('d-none');
            } else if ($(this).prop("checked") == false) {
                $(this).closest("tr").removeClass("text-success");

                // $('.detail').closest('span').addClass('d-none');
            }
            $.ajax({
                url: '<?php echo site_url('admin/pendaftaran/accept_ajax'); ?>',
                data: {
                    id_peserta: IdPeserta
                },
                method: 'POST',
                dataType: 'JSON',
                success: function(data) {
                    if (data.status == 1) {
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
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.peserta + " dimasukkan ke daftar diterima ",
                            type: 'success',
                        });

                        // $(this).closest('tr').find('span.detail-status-member').html('yes');

                    } else {
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
                        });

                        Toast.fire({
                            icon: 'error',
                            title: data.peserta + " dikeluarkan dari daftar diterima ",
                            type: 'error',
                        });

                        // $(this).closest('tr').find('span.detail-status-member').html('');

                        // $('.detail').addClass('d-none');
                    }




                }
            });


        });


    });
</script>