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
			<h1>Tambah Berita</h1>
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
					<?php echo form_open_multipart(base_url('admin/berita/add')); ?>
					<div class="col-md-8">
						<div class="form-group form-group-lg">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" placeholder="Judul Berita" value="<?php echo set_value('judul') ?>" /><br>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group form-group-lg">
							<label>Gambar Berita</label>
							<input type="file" name="gambar" required="required" class="form-control" /><br>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label">Jenis Berita</label>
							<div class="selectgroup w-100">
								<label class="selectgroup-item">
									<input type="radio" name="jenis_berita" value="Portofolio" class="selectgroup-input" checked="">
									<span class="selectgroup-button">News</span>
								</label>
								<label class="selectgroup-item">
									<input type="radio" name="jenis_berita" value="Informasi" class="selectgroup-input">
									<span class="selectgroup-button">Informasi</span>
								</label>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group form-group-lg">
							<label>Isi Berita</label>
							<textarea name="isi" class="form-control" placeholder="Isi berita"><?php echo set_value('isi') ?></textarea>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label class="d-block">Status Berita</label>
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio1" name="status_berita" class="custom-control-input" value="Publish">
								<label class="custom-control-label" for="customRadio1">Publikasikan</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio2" name="status_berita" class="custom-control-input" value="Draft">
								<label class="custom-control-label" for="customRadio2">Masuk Draft</label>
							</div>
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
	</section>
</div>