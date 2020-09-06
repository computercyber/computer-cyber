<?php
$site_config = $this->konfigurasi_model->listing();
$check_user = $this->db->get_where('users', array(
  'username' => $this->session->userdata('username')
))->row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Computer Cyber &mdash; Admin</title>
  <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Computer Cyber" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/logo/' . $site_config->logo); ?>">

  <!-- DataTables -->
  <!-- <link href="<?php echo base_url('assets'); ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owl-carousel/dist/assets/owl.carousel.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owl-carousel/dist/assets/owl.theme.default.css"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/admin_v2/assets/css/plugins/select2.min.css">

  <!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/admin_v2/assets/css/plugins/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="<?= base_url('assets') ?>/admin_v2/assets/css/plugins/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/jquery-ui/jquery-ui.min.css">

  <!-- css vendor -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/admin_v2/assets/css/style.css">

  <!-- animate.css -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/animate css/animate.css">

  <script type="text/javascript" src="<?php echo base_url() . 'assets/jquery/jquery-3.4.0.min.js'; ?>"></script>

  <!-- lazyload image -->
  <script type="text/javascript" async src="<?php echo base_url('assets'); ?>/lazysizes/lazysizes.min.js"></script>

  <!-- summernote -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/summernote/summernote-bs4.css'; ?>">

  <!-- chart js -->
  <script src="<?php echo base_url(); ?>assets/chart/Chart.min.js"></script>

  <style>
    * {
      font-family: 'Ubuntu', sans-serif;
    }

    .page-header {
      box-shadow: none;
    }

    .pcoded-main-container,
    .pcoded-content {
      background-color: white;
    }

    .card {
      box-shadow: none;
      border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .card:hover {
      box-shadow: none;
    }

    .header-title {
      font-size: 28px;
    }

    .swal2-container {
      z-index: 1000000 !important;
    }
  </style>

</head>

<body class="">