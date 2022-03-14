<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/remixicon.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
	<title><?php echo $title; ?> - CI Blog</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CI Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link <?php echo $active = $title == 'Home' ? 'active' : '' ?>" href="<?php echo base_url(); ?>home">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active = $title == 'About' ? 'active' : '' ?>" href="<?php echo base_url(); ?>about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active = $title == 'Latest Posts' ? 'active' : '' ?>" href="<?php echo base_url(); ?>posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $active = $title == 'Register' ? 'active' : '' ?>" href="<?php echo base_url(); ?>register">Register</a>
        </li>
      </ul>
      <?php if($this->session->userdata('logged_in')): ?>
      <div class="d-flex">
          <a class="btn btn-primary" href="<?php echo base_url() . 'auth/logout'; ?>">Logout</a>
      </div>
    <?php endif; ?>

    </div>
  </div>
</nav>


<main class="container-fluid pt-3">
