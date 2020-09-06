<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 400,
    theme: 'modern',
    plugins: 'autolink directionality visualblocks visualchars image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
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
              <h5 class="m-b-10"><?php echo $title; ?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url('admin/divisi') ?>">Divisi</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <section class="section">

      <div class="section-body">
        <div class="card">
          <div class="card-body">
            <form action="<?php echo site_url('admin/divisi/add') ?>" method="post" enctype="multipart/form-data">
              <div class="col-md-6">
                <div class="form-group form-group-lg">
                  <label>Nama Divisi</label>
                  <input type="text" name="nama_divisi" class="form-control <?php if ($this->form_validation->run() == FALSE && form_error('nama_divisi') != null) {
                                                                              echo "is-invalid";
                                                                            } ?>" placeholder="Nama divisi" required="required" autofocus autocomplete="off" value="<?php echo set_value('nama_divisi') ?>">
                  <?php echo form_error('nama_divisi', '<div class="invalid-feedback">', '</div>'); ?>
                </div>

                <div class="form-group form-group-sm">
                  <label>Logo Divisi</label>

                  <i class="ml-1 fas fa-info-circle text-primary" data-toggle="tooltip" data-placement="right" title="Usahakan memilih logo dengan design yang simple dan menarik">
                  </i>
                  <br>
                  <br>
                  <img class="img-radius align-top m-r-15 shadow img-divisi_show" src="<?= base_url() ?>assets/img/divisi_placeholder.png" width="130px">
                  <div class="input-group input-group-lg mt-3" style="margin-bottom:-10px;">
                    <input name="gambar_divisi" class="custom-file-input <?php if (isset($error)) {
                                                                            echo "is-invalid";
                                                                          } ?>" type="file" class="mt-3" id="gambar_divisi">
                    <label for="gambar_divisi" class="custom-file-label text-muted">Pilih atau seret logo ...</label>
                    <?php if (isset($error)) { ?>
                      <div class="invalid-feedback"><small><?php echo $error ?></small></div>
                    <?php } ?>
                    <small for="gambar_divisi" class="form-text text-muted">
                      Logo harus berukuran 800 x 800 dengan format <strong>.png</strong>
                    </small>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group form-group-lg">
                  <label class="mt-2">Keterangan Divisi</label>
                  <textarea name="keterangan_divisi" class="form-control" placeholder="Keterangan divisi"><?php echo set_value('keterangan_divisi') ?></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group form-group-lg">
                  <a href="<?php echo site_url('admin/divisi'); ?>" class="btn btn-default">Kembali</a>
                  <button class="btn btn-primary event-btn" type="submit">
                    <span class="spinner-border spinner-border-sm" role="status"></span>
                    <span class="load-text">Loading...</span>
                    <span class="btn-text">Tambah Divisi Baru</span>
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#gambar_divisi').change(function() {
      const sampul = document.querySelector('#gambar_divisi');
      const sampulLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-divisi_show');

      sampulLabel.textContent = sampul.files[0].name;

      const fileSampul = new FileReader();
      fileSampul.readAsDataURL(sampul.files[0]);

      fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    })
  })
</script>