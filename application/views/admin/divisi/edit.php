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
      <h1>Edit Informasi Divisi</h1>
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
          <?php echo form_open_multipart(base_url('admin/divisi/update/' . $divisi->id_divisi)); ?>
          <div class="col-md-8">
            <div class="form-group form-group-lg">
              <label>Nama Divisi</label>
              <input type="text" name="nama_divisi" class="form-control" placeholder="Nama divisi" value="<?php echo $divisi->nama_divisi ?>" />
            </div>
            <div class="form-group form-group-sm">
              <label>Gambar Divisi</label>
              <input type="file" name="gambar_divisi" class="form-control" />
            </div>
          </div>

          <div class="col-md-12">
            <label>Keterangan Divisi</label>
            <div class="form-group form-group-lg">
              <textarea name="keterangan_divisi" class="form-control" placeholder="Keterangan divisi"><?php echo $divisi->keterangan_divisi ?></textarea>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group form-group-lg">
              <input type="submit" name="submit" class="btn btn-success" value="Save" />
              <input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
            </div>
          </div>

          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</div>