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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>

</head>

<body>

  <div class="container">
    <div class="row mt-5">
      <img class="logo" src="<?php echo base_url('assets/upload/image/thumbs/' . $site_config->logo); ?>" alt="">
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
              <div class="input-group-append">
                <span class="input-group-text password-show" id="password-show">
                  <i id="eye-icon" class="fas fa-eye"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="form-group text-left">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="true" name="remember_me" id="remember_me">
              <label class="form-check-label text-white-50" for="remember_me">
                Selalu masuk di perangkat ini
              </label>
            </div>
          </div>


          <button class="btn btn-block btn-lg btn-primary btn-login" type="submit"><small><strong>Login</strong></small></button>
        </form>
      </div>
    </div>
  </div>



  <footer id="sticky-footer" class="py-3 text-white-50">
    <div class="container text-center">
      <small class="text-muted">&copy; <?php echo date("Y"); ?> Copyright <?php echo $site_config->namaweb ?></small>
    </div>
  </footer>

  <script>
    $(document).ready(function() {

      $('#password-show').on('click', function() {
        if ($('#login_password').attr("type") === "password") {
          $('#login_password').attr('type', 'text');
          $('#eye-icon').removeClass('fas fa-eye');
          $('#eye-icon').addClass('fas fa-eye-slash');
        } else {
          $('#login_password').attr('type', 'password');
          $('#eye-icon').removeClass('fas fa-eye-slash');
          $('#eye-icon').addClass('fas fa-eye');
        }
      });

    });
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>