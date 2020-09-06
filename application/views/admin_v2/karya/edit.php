<style>
  .ui-autocomplete {
    z-index: 2147483647;
  }

  .tombol-hapus-anggota_karya {
    color: black;
    transition: .3s;
  }

  .tombol-hapus-anggota_karya:hover {
    color: #DC3545;
  }
</style>

<div class="pcoded-main-container">
  <div class="pcoded-content">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>

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
                <li class="breadcrumb-item"><a href="<?php echo site_url('admin/karya') ?>">Karya</a></li>
                <li class="breadcrumb-item active">Tambah karya</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="section-body">
        <div class="card">
          <div class="card-body">
            <form action="<?php echo site_url('admin/karya/edit/' . urlencode(encrypt_url($karya->id_karya))); ?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="judul_karya">Judul Karya</label>
                    <input type="text" id="judul_karya" name="judul_karya" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('judul_karya') != null) {
                                                                                                  echo "is-invalid";
                                                                                                } ?>" autofocus autocomplete="off" placeholder="Cth. E-voting" value="<?= $karya->judul_karya ?>">
                    <?php echo form_error('judul_karya', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <label for="user_karya">Dibuat oleh / Kepala tim</label>
                      <input type="text" id="user_karya" name="user_karya" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('user_karya') != null) {
                                                                                                  echo "is-invalid";
                                                                                                } ?>" placeholder="Cth. Dadang Suratang" value="<?= $karya->nama_anggota ?>">
                      <?php echo form_error('user_karya', '<div class="invalid-feedback">', '</div>'); ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jenis_karya">Jenis Karya</label>
                    <select name="jenis_karya" id="jenis_karya" class="form-control">
                      <option id="perorangan" value="Perorangan" <?= ($karya->jenis_karya == "Perorangan") ? "selected" : null ?>>Perorangan</option>
                      <option id="tim" value="Tim" <?= ($karya->jenis_karya == "Tim") ? "selected" : null ?>>Tim</option>
                    </select>
                    <?php echo form_error('jenis_karya', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gambar_karya">Gambar</label>
                    <i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
                    </i>
                    <br>
                    <figure class="figure">
                      <img src="<?= base_url('assets/upload/image/' . $karya->gambar_karya) ?>" class="figure-img img-fluid rounded img-preview" alt="..." width="130px">
                      <!-- <figcaption class="figure-caption">A caption for the above image.</figcaption> -->
                    </figure>
                    <br>
                    <div class="input-group input-group-lg" style="margin-bottom:-10px;">
                      <input name="gambar_karya" class="custom-file-input <?php if (isset($error)) {
                                                                            echo "is-invalid";
                                                                          } ?>" type="file" class="mt-3" id="gambar">
                      <label for="gambar_karya" class="custom-file-label text-muted"><?= $karya->gambar_karya ?></label>
                      <?php if (isset($error)) { ?>
                        <div class="invalid-feedback"><small><?php echo $error ?></small></div>
                      <?php } ?>
                      <small for="gambar_karya" class="form-text text-muted">
                        Gambar harus berukuran 700 x 400
                      </small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <select class="form-control" name="karya_divisi" required>
                      <option value="" selected disabled>Pilih divisi</option> <?= $karya->link_playstore ?>
                      <?php foreach ($divisi as $d) : ?>
                        <option value="<?= $d->id_divisi ?>" <?php if ($karya->karya_divisi == $d->id_divisi) {
                                                                echo "selected";
                                                              } ?>>
                          <?= $d->nama_divisi ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="card border border-primary">
                <div class="card-body">

                  <a href="" class="btn btn-primary mt-3 mb-4" data-toggle="modal" data-target="#modalAddAnggotaKarya">Tambah</a>

                  <?php if (!empty($anggota_karya)) : ?>
                    <?php foreach ($anggota_karya as $ak) : ?>
                      <div class="card bg-light col-md-4 mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-10"><?= $ak->nama_anggota ?></div>
                            <div class="col-md-2"><a href="<?= site_url('admin/karya/delete_anggota_karya/' . urlencode(encrypt_url($karya->id_karya)) . '/' . urlencode(encrypt_url($ak->id_anggota_karya)))  ?>" class=" tombol-hapus-anggota_karya"><i class="fas fa-minus-circle" style="font-size: 20px;"></i></a>
                            </div>

                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php else : ?>

                  <?php endif ?>

                </div>
              </div>

              <!-- <div class="row row-tim mt-3">
                <div class="col-md-12">
                  <div class="card border border-primary">
                    <div class="card-body">
                      <label class="form-group">
                        <label>Anggota tim</label>
                      </label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya" class="form-control" placeholder="Anggota karya ke-1">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya2" class="form-control" placeholder="Anggota karya ke-2">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya3" class="form-control" placeholder="Anggota karya ke-3">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya4" class="form-control" placeholder="Anggota karya ke-4">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya5" class="form-control" placeholder="Anggota karya ke-5">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya6" class="form-control" placeholder="Anggota karya ke-6">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya7" class="form-control" placeholder="Anggota karya ke-7">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya8" class="form-control" placeholder="Anggota karya ke-8">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya9" class="form-control" placeholder="Anggota karya ke-9">
                          </div>
                          <div class="form-group">
                            <input type="text" name="anggota_karya[]" id="anggota_karya10" class="form-control" placeholder="Anggota karya ke-10">
                          </div>
                        </div>

                        <p class="ml-3 mt-2 font-italic"><sup>*</sup> Harap memasukkan nama anggoa karya dengan menggunakan fitur autocomplete agar id anggota dapat dikenali</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="card border border-primary">
                    <div class="card-body">
                      <label class="form-group">
                        <label>Daftar link</label>
                      </label>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Playstore</span>
                              </div>
                              <input type="text" name="link_playstore" class="form-control" placeholder="link" value="<?= $karya->link_playstore ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Appstore</span>
                              </div>
                              <input type="text" name="link_appstore" class="form-control" placeholder="link" value="<?= $karya->link_appstore ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Dribbble</span>
                              </div>
                              <input type="text" name="link_dribbble" class="form-control" placeholder="link" value="<?= $karya->link_dribbble ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Adobe XD</span>
                              </div>
                              <input type="text" name="link_adobexd" class="form-control" placeholder="link" value="<?= $karya->link_adobexd ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">

                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">GitHub</span>
                              </div>
                              <input type="text" name="link_github" class="form-control" placeholder="link" value="<?= $karya->link_github ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Youtube</span>
                              </div>
                              <input type="text" name="link_youtube" class="form-control" placeholder="link" value="<?= $karya->link_youtube ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Link lain</span>
                              </div>
                              <input type="text" name="link_lain" class="form-control" placeholder="link" value="<?= $karya->link_lain ?>">
                            </div>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="detail_karya">Detail Karya</label>
                    <textarea name="detail_karya" id="detail_karya" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('detail_karya') != null) {
                                                                                          echo "is-invalid";
                                                                                        } ?>" placeholder="Tuliskan detail karya disini..." rows="8"><?= $karya->detail_karya ?></textarea>
                    <?php echo form_error('detail_karya', '<div class="invalid-feedback">', '</div>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="status_karya">Status Karya</label>
                    <select class="form-control" name="status_karya" required>
                      <option value="Publish" <?php if ($karya->status_karya == "Publish") {
                                                echo "selected";
                                              } ?>>Publish</option>
                      <option value="Draft" <?php if ($karya->status_karya == "Draft") {
                                              echo "selected";
                                            } ?>>Draft</option>
                    </select>
                  </div>
                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary event-btn" type="submit">
                  <span class="spinner-border spinner-border-sm" role="status"></span>
                  <span class="load-text">Loading...</span>
                  <span class="btn-text">Update data</span>
                </button>
              </div>
            </form>


            <!-- Modal -->
            <div class="modal fade" id="modalAddAnggotaKarya" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalAddAnggotaKaryaLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="<?= site_url('admin/karya/add_anggota_karya/' . urlencode(encrypt_url($karya->id_karya))) ?>" method="post">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalAddAnggotaKaryaLabel">Tambah Anggota Karya</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="">Nama Anggota</label>
                        <input type="text" name="anggota_karya" id="anggota_karya" class="form-control" placeholder="Masukkan nama lengkap">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
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
    $('.row-tim').hide();

    $('#tim').on('click', function() {
      $('.row-tim').show(500);
    })

    $('#perorangan').on('click', function() {
      $('.row-tim').hide(500);
    })

    $('#user_karya').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });


    $('#anggota_karya').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya2').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya2').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya3').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya4').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya5').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya6').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya7').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya8').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya9').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#anggota_karya10').autocomplete({
      source: "<?= site_url('admin/karya/get_name_user_karya_autocomplete') ?>"
    });

    $('#gambar').on('change', function() {
      const gambar = document.querySelector('#gambar');
      const gambarLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      gambarLabel.textContent = gambar.files[0].name;

      const fileGambar = new FileReader();

      fileGambar.readAsDataURL(gambar.files[0]);

      fileGambar.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    })
  })
</script>