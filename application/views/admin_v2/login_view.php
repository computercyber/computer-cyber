<?php
$site_config = $this->konfigurasi_model->listing(); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Admin</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/' . $site_config->logo); ?>">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,600,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style_remake.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <img class="logo" src="<?php echo base_url('assets/upload/image/thumbs/logo/' . $site_config->logo); ?>" alt="">
    </div>
    <div class="row mt-5">
      <div class="col-md-6 offset-md-3">

        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'); ?>

        <?php
        //di atas list.php
        if ($this->session->flashdata('sukses')) {
          echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
          echo $this->session->flashdata('sukses');
          echo '!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        }
        ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 offset-md-4 text-center mt-4">
        <form action="<?php echo site_url() ?>login" method="POST">

          <div class="form-group">
            <label class="sr-only" for="login__username"><small>Username</small></label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-user"></i>
                </div>
              </div>
              <input type="text" name="username" class="form-control form-control-lg" id="login__username" placeholder="Username">
            </div>
            <!-- <label for="login__username"> -->
            <!-- <svg class="icon">
                <use xmlns:xlink="" xlink:href="#user"></use>
              </svg> -->
            <!-- <span class="hidden">Username</span></label> -->

          </div>

          <div class="form-group">
            <label class="sr-only" for="password"><small>Password</small></label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-lock"></i>
                </div>
              </div>
              <input type="password" name="password" class="form-control form-control-lg" id="login_password" placeholder="Password">
            </div>

            <!-- <label for="login__password"> -->
            <!-- <svg class="icon">
                <use xmlns:xlink="" xlink:href="#lock"></use>
              </svg> -->
            <!-- <span class="hidden">Password</span></label>
            <input id="login__password" type="password" name="password" class="form__input" placeholder="Password"> -->
          </div>

          <button class="btn btn-block btn-lg btn-primary btn-login" type="submit"><small><strong>Login</strong></small></button>
          <!-- <a href="#" class="btn btn-block btn-lg btn-primary text-uppercase">Pesan Sekarang</a> -->

        </form>
      </div>
    </div>
  </div>



  <footer id="sticky-footer" class="py-3 text-white-50">
    <div class="container text-center">
      <small class="text-muted">&copy; <?php echo date("Y"); ?> Copyright <?php echo $site_config->namaweb ?></small>
    </div>
  </footer>



  <!-- 
  <svg xmlns="#" class="icons">
    <symbol id="arrow-right" viewBox="0 0 1792 1792">
      <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="lock" viewBox="0 0 1792 1792">
      <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="user" viewBox="0 0 1792 1792">
      <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg> -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>