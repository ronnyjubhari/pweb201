<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Indonesia Touricket</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?= base_url() ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="black lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="color:white;">Indonesia Touricket</a>
      <ul class="right hide-on-med-and-down">
        <li><a style="color:white;font-weight:bold;" href="<?= base_url() ?>kota">Kota</a></li>
        <li><a style="color:white;font-weight:bold;" href="<?= base_url() ?>wisata">Wisata</a></li>
        <li><a style="color:white;font-weight:bold;" href="<?= base_url() ?>index.php/tentangwebsite">About Website</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="<?= base_url() ?>kota">Kota</a></li>
        <li><a href="<?= base_url() ?>wisata">Wisata</a></li>
        <li><a href="<?= base_url() ?>index.php/tentangwebsite">About Website</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
