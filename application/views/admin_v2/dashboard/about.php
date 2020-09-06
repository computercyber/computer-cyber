<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    height: 150,
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


<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Tentang Organisasi</h1>
    </div>

    <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>


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
              <?php echo form_open_multipart(base_url('admin/dasbor/about')); ?>
              <input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>">
              <div class="col-md-6">
                <div class="form-group form-group-lg">
                  <label>Sertakan Gambar</label>
                  <input type="file" name="gambar_about" class="form-control" /><br>
                </div>
              </div>

              <div class="col-md-8">
                <label>Lihat Gambar</label>
                <p><img src="<?php echo base_url('assets/upload/image/thumbs/' . $konfigurasi->gambar_about); ?>" alt="" class="img-responsive"></p><br>
              </div>

              <div class="col-md-12">
                <div class="form-group form-group-lg">
                  <label>Tentang Organisasi</label>
                  <textarea name="about" class="form-control" placeholder="Tuliskan sesuatu"><?php echo $konfigurasi->about; ?></textarea>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group form-group-lg">
                  <input type="submit" name="submit" class="btn btn-success" value="Save" />
                  <input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
                </div>
              </div>

              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>