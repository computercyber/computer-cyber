<?php
$site_config = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Computer Cyber &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/upload/image/thumbs/' . $site_config->logo); ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- DataTables -->
  <link href="<?php echo base_url('assets'); ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owl-carousel/dist/assets/owl.carousel.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owl-carousel/dist/assets/owl.theme.default.css"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap" rel="stylesheet">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla-admin/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla-admin/assets/css/components.css">

  <!-- CSS Pribadi -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stisla-admin/assets/css/admin.css">
</head>

<body>