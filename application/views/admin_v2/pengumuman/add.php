<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 350,
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
                            <p class="m-b-10 lead header-title"><?php echo $title; ?></p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>"><i class="feather icon-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">Pengumuman</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">



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
                        <?php echo form_open_multipart(site_url('admin/pengumuman/addNews')); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php foreach ($news as $news) : ?><?php endforeach; ?>
                                    <input type="hidden" class="form-control" id="judul" name="judul" placeholder="Judul Pengumuman" value="<?php echo $news->id_berita; ?>"><br>

                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Pengumuman" value="<?php echo $news->judul; ?>"><br>

                                    <label for=" pra_konten">Pra Konten</label>
                                    <textarea name="pra_konten" id="pra_konten" cols="30" rows="10"><?php echo $news->pra_konten; ?></textarea><br>

                                    <label for="post_konten">Post Konten</label>
                                    <textarea name="post_konten" id="post_konten" cols="30" rows="10"><?php echo $news->post_konten; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah Konten</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>