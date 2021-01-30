<?php
ob_start();
require_once('config/koneksi.php');
require_once('models/database.php');

$connection = new Database($host, $user, $pass, $database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- CSS Tambahan -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- My Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- My Css -->
    <link rel="stylesheet" href="style_dasboard.css">
    <!-- Akhir Dari CSS Tambahan -->

    <!-- Add custom CSS here -->
  </head>

  <body>
  <style>
  .posisi {
    margin: 0px auto; 
    height: 100%; 
  }
   </style>
   
   <div class="posisi">
    <!-- Navbar -->
    <header>
      <class class="item-header-1 d-flex flex-column" style="padding-right: 3px; padding-left:3px; position:relative;">
        <div class="d-flex justify-content-between">
          <a class="navbar-brand" href="Dasboard.php">MAKETAN</a>
          <div class="wrap-search">
            <input type="text" class="form-control" placeholder="cari barang" data-toggle="modal" data-target="#exampleModal">
            <div class="wrap-icon-search">
              <img class="img-search" src="assets/logo/search.png" alt="">
            </div>
          </div>
          <div class="login-navbar">
            <?php if (isset($_SESSION['user_status'])):?>
              <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="logout.php"><span class="fas fa-home">Action</span></a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
            <?php else: ?>
            <div class="d-md-flex justify-content-md-end">
              <a href="Login/login.php" class="btn btn-primary" role="button" data-bs-toggle="button">Masuk</a>
              <a href="?page=produk" class="btn btn-primary" role="button" data-bs-toggle="button">Daftar</a>
            </div>
            <?php endif ?>
          </div>
        </div>

        <div class="d-flex justify-content-around mt-2" style="max-width: 100%;">
          <span class"mr-3">
            <h6>Pertanian</h6>
          </span>
          <span class"mr-3">
            <h6>Bibit</h6>
          </span>
          <span class"mr-3">
            <h6>Obat</h6>
          </span>
          <span class"mr-3">
            <h6>Alat</h6>
          </span>
          <span class"mr-3">
            <h6>Perkebunan</h6>
          </span>
        </div>
      </class>
  </header>
    <!-- Akhir Navbar -->

    <!-- Dropdown Produk -->

        <?php
        if (@$_GET['page'] == 'produk') {
          include "views/produk.php";
        }
        ?>
      <!-- Akhir Dropdown Produk -->

      <!-- Footer -->
      <div class="footer-ku" >
    <div class="card-footer text-center">
      <div class="card-header" style="font-size: 42px;font-family: Roboto; font-weight: bold; padding: 4px 4px;">
        Follow us
      </div>
      <div class="card-body">
        <a href=" #" class="btn d-flex justify-content-center">
          <img src="assets/logo/twitter.png" alt="">
          <img src="assets/logo/instagram.png" alt="">
          <img src="assets/logo/facebook.png" alt="">
        </a>
      </div>
    </div>
  </div>
      </div>
      <style type="text/css">
      .footer-ku .card-footer {
          margin-top: 50px;
          margin-bottom: auto;
      }

      .footer-ku .card-body {
          margin-left: auto;
          margin-right: auto;
      }

      .footer-ku .card-footer .card-body {
          max-height: 200px;
      }

      .footer-ku .card-footer .card-body img {
          width: 5%;
          height: 5%;
      }

      .footer-ku .card-footer .card-body a img {
          padding: 10px;
      }
      </style>
  <!-- penutup footer -->

      

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </body>
</html>