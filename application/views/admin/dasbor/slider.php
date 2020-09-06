<div class="owl-carousel owl-theme">
  <?php foreach ($gallery as $gallery) : ?>
    <div class="item">
      <img src="<?php echo base_url() ?>assets/upload/image/thumbs/<?php echo $gallery->gambar ?>" height="150" alt="<?php echo $gallery->judul_gallery ?>">
    </div>
  <?php endforeach ?>
</div>

<a href="<?php echo base_url() ?>admin/gallery" class="btn btn-info btn-gallery-detail">Lihat semua Gallery</a>

<script src="<?php echo base_url(); ?>assets/owl-carousel/dist/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/owl-carousel/dist/owl.carousel.js"></script>
<script>
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 4,
    responsiveClass: true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:5,
            loop:false
        }
    },
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 1500,
    autoplayHoverPause: true
  });
  $('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
  })
  $('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
  })
</script>