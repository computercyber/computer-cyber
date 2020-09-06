<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Informasi Jabatan</h1>
    </div>

    <?php
    echo validation_errors('<div class="alert alert-warning">', '</div>');

    ?>

    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <div class="col-md-6">
            <?php echo form_open(base_url('admin/jabatan/update/' . $jabatan->id_jabatan)); ?>
            <div class="form-group form-group-lg">
              <label>Jabatan</label>
              <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama jabatan" required="required" value="<?php echo $jabatan->nama_jabatan ?>" />
            </div>
            <div class="form-group form-group-lg">
              <label>Tahun Jabatan</label>
              <input type="number" name="tahun_jabatan" class="form-control" placeholder="Tahun jabatan" value="<?php echo $jabatan->tahun_jabatan ?>" />
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group form-group-lg">
              <input type="submit" name="submit" class="btn btn-success" value="Save" />
              <input type="reset" name="reset" class="btn btn-secondary ml-2" value="Reset" />
            </div>
          </div>

          <?php
          echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</div>