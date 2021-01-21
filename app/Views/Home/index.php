<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<style>
    @media screen and (min-width: 300px) and (max-width: 576px) {
        .home {
            height: 100vn;
            margin-top: 17%;
        }
    }
</style>
<section>
    <div class="container">
        <div class="row text-center home">
            <div class="col-sm-12 col-md-6" data-aos="fadeInUp">
                <img src="<?= base_url(); ?>/images/assets/home.png" alt="home" width="100%">
            </div>
            <div class="col-sm-12 col-md-6 tengah" data-aos="fadeInUp">
                <h5>Welcome To Our Community!</h5>
                <h1>It's Nice To Meet You</h1>
                <a class="btn btn-primary btn-lg text-uppercase js-scroll-trigger btn-welcome mt-3" href="#vision">Tell Me More</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>