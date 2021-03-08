<!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
</head>

<body>
<header>
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo site_url('...') ?>">...</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo site_url('...') ?>">...</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo site_url('...') ?>">...</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="<?php echo site_url('...') ?>">....</a>
    </li>
  </ul>

  <?php $attributes = array('class' => 'form-inline my-2 my-lg-0', 'id' => 'myform');

  echo form_open('...',$attributes) ?>
      <input class="form-control mr-sm-2" type="search" placeholder="Search for patient" name="firstname" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

</nav>
</header>