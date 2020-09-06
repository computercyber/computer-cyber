<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 400,
    theme: 'modern',
    plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    image_advtab: true,
    templates: [{
        title: 'Test template 1',
        content: 'Test 1'
      },
      {
        title: 'Test template 2',
        content: 'Test 2'
      }
    ],
    content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tinymce.com/css/codepen.min.css'
    ]
  });
</script>

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
              <li class="breadcrumb-item"><a href="<?= site_url('admin/divisi') ?>">Divisi</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <section class="section">

      <div class="section-body">
        <div class="card">
          <div class="card-body">
            <?php echo form_open_multipart(base_url('admin/divisi/update/' . $divisi->id_divisi)); ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group form-group-lg">
                  <label>Nama Divisi</label>
                  <input type="text" name="nama_divisi" class="form-control" placeholder="Nama divisi" value="<?php echo $divisi->nama_divisi ?>">
                </div>

                <div class="form-group form-group-sm">
                  <label class="mt-2">Logo Divisi</label>
                  <i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih gambar dengan latar belakang yang bersih">
                  </i>
                  <div class="input-group input-group-lg" style="margin-bottom:-10px;">
                    <input name="gambar_divisi" class="custom-file-input <?php if (isset($error)) {
                                                                            echo "is-invalid";
                                                                          } ?>" type="file" class="mt-3" id="gambar_divisi">
                    <label for="gambar_divisi" class="custom-file-label text-muted"><?php echo $divisi->gambar_divisi; ?></label>
                    <?php if (isset($error)) { ?>
                      <div class="invalid-feedback"><small><?php echo $error ?></small></div>
                    <?php } ?>
                    <small for="gambar_divisi" class="form-text text-muted">
                      Logo harus berukuran 800 x 800 dengan format <strong>.png</strong>
                    </small>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="label-old-logo">Preview logo sebelumnya</label>
                  <br>
                  <img class="align-top m-r-15 lazyload img-divisi-show" src="<?= base_url() ?>assets/img/img_placeholder_cc.svg" data-src="<?= base_url('assets/upload/image/' . $divisi->gambar_divisi); ?>" width="100">
                  <small class="form-text text-muted">
                    <?php echo $divisi->gambar_divisi; ?>
                  </small>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label>Keterangan Divisi</label>
                <div class="form-group form-group-lg">
                  <textarea name="keterangan_divisi" class="form-control" placeholder="Keterangan divisi"><?php echo $divisi->keterangan_divisi ?></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group form-group-lg">
                  <a href="<?= site_url('admin/divisi'); ?>" class="btn btn-default mr-1">Kembali</a>
                  <button class="btn btn-primary event-btn" type="submit">
                    <span class="spinner-border spinner-border-sm" role="status"></span>
                    <span class="load-text">Loading...</span>
                    <span class="btn-text">Edit Data Divisi</span>
                  </button>
                </div>
              </div>
            </div>

            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>


  <script>
    $('.custom-file-input').change(function() {
      const sampul = document.querySelector('.custom-file-input');
      const sampulLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-divisi-show');

      sampulLabel.textContent = sampul.files[0].name;

      const fileSampul = new FileReader();
      fileSampul.readAsDataURL(sampul.files[0]);

      fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
        $('.label-old-logo').html("Logo divisi baru");
      }
    })
  </script>