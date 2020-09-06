<style>
    .jumbotron-about {
        height: 500px;
        background-size: cover;
    }

    .heading-menu {
        font-family: 'Quicksand', sans-serif;
        color: white;
        opacity: .8;
        font-weight: 400;
        margin-top: 120px !important;
    }

    .subheading-menu {
        color: white;
        opacity: .8;
        transition: .4s;
    }

    .subheading-menu a:hover {
        color: #3ABAF4;
    }
</style>

<div class="jumbotron jumbotron-fluid jumbotron-head">
    <div class="container text-center">
        <h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
        <p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
    </div>
</div>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Semua tag</h1>

            <?php foreach ($list_tag as $tag) : ?>

                <?php foreach ($count_same_tag as $same_tag) : ?>
                    <a href="<?php echo site_url('tag/' . $tag['nama_tag']) ?>" class="btn btn-secondary">
                        <?php echo $tag['nama_tag']; ?> <span class="badge badge-light"><?php echo $same_tag['nama_tag']; ?></span>
                    </a>
                <?php endforeach; ?>

            <?php endforeach; ?>
        </div>
    </div>
</div>