<style>
  .jumbotron-gallery {
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

  .subheading-menu a {
    color: white;
    opacity: .8;
    transition: .4s;
  }

  .subheading-menu a:hover {
    color: #3ABAF4;
  }

  .section-gallery {
    margin-top: -30px;
    background-color: #F9F9FF;
  }

  .text-gallery-title {
    font-weight: 400;
  }

  @media (min-width: 992px) {

    .portfolio-link>.portfolio-caption {
      transition: .4s;
    }

    .portfolio-link:hover>.portfolio-caption {
      background-image: linear-gradient(to right, #6771E6, #5E31C2);
      color: white;
      box-shadow: 0px 20px 20px 0px rgba(0, 0, 0, .3);
    }
  }
</style>

<div class="jumbotron jumbotron-gallery jumbotron-fluid jumbotron-head" style="background-image:url(<?php echo base_url('assets'); ?>/img/header/gallery/gallery.png)">
  <div class="container">
    <h1 class="display-4 text-center heading-menu"><?php echo $title_sub ?></h1>
    <p class="lead text-center subheading-menu"><a href="<?php echo base_url(); ?>" target="_blank"><?php echo $title ?> Study Club</a></p>
  </div>
</div>


<!-- Portfolio Grid -->
<section class="page-section section-gallery" id="portfolio">
  <div class="container">
    <div class="row row-our-gallery">
      <div class="col-md-12">
        <div class="title-gallery text-center text-dark">
          <h2 class="mb-10">OUR STORY</h2>
          <p>Beberapa kilasan kegiatan kami</p>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <?php if (!$this->db->get('gallery')->num_rows() > 0) {
        echo '<div class="alert alert-warning" role="alert">
                A simple warning alert—check it out!
              </div>';
      } ?>
      <?php foreach ($gallery_all as $gallery_home) { ?>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link text-decoration-none modal-gallery" data-toggle="modal" data-target="#showModal" href="#" data-id="<?php echo $gallery_home->id_gallery; ?>">
            <img class=" img-fluid" src="<?php echo base_url(); ?>assets/upload/image/<?php echo $gallery_home->gambar; ?>" alt="gallery">
            <div class="portfolio-caption">
              <h6 class="text-gallery-title"><?php echo $gallery_home->judul_gallery; ?></h6>
            </div>
          </a>

        </div>
      <?php } ?>
    </div>
    <div class="row row-btn-all-gallery">
      <div class="col-lg-12 text-center">
        <a class="btn btn-view-all-gallery btn-outline-light text-uppercase" href="<?php echo base_url('gallery'); ?>">View All</a>
      </div>
    </div>
  </div>
</section>


<div class="portfolio-modal modal fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="close-modal" data-dismiss="modal">
        <div class="lr">
          <div class="rl"></div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="modal-body">
              <!-- Project Details Go Here -->
              <h2 class="text-uppercase" id="data_title"></h2>
              <img class="img-fluid d-block mx-auto" id="img_gallery" src="" alt="">
              <p id="data_desc"></p>
              <ul class="list-inline">
                <li id="date_gallery"></li>
              </ul>
              <button class="btn btn-primary" data-dismiss="modal" type="button">
                <i class="fas fa-times mr-2"></i>
                Close Project
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.modal-gallery').on('click', function() {

      const id = $(this).data('id');

      function convert(date_event) {

        // Months array
        var months_arr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Convert timestamp to milliseconds
        var date = new Date(date_event * 1000);

        // Year
        var year = date.getFullYear();

        // Month
        var month = months_arr[date.getMonth()];

        // Day
        var day = date.getDate();

        // Display date time in MM-dd-yyyy 
        var convdataTime = day + ' ' + month + ' ' + year;

        $('#date_gallery').text(convdataTime);

      }


      $.ajax({
        url: '<?php echo site_url('gallery/get_data_gallery'); ?>',
        data: {
          id: id
        },
        method: 'POST',
        dataType: 'JSON',
        success: function(data) {
          $("#img_gallery").attr("src", '<?php echo base_url(); ?>assets/upload/image/' + data.gambar);
          $('#data_title').text(data.judul_gallery);
          $('#data_desc').html(data.keterangan_gallery);
          $('#date_gallery').text(convert(data.tanggal_acara));
        }
      });

    });
  });
</script>