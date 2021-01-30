<?php
ob_start();
require_once('config/koneksi.php');
require_once('models/database.php');



$connection = new database($host, $user, $pass, $database);
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style_produk.css">
    <link rel="stylesheet" href="../menu_bar.css">
    <!-- Akhir Dari CSS Tambahan -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Add custom CSS here -->
  </head>

  <body style="font-size: 1.5rem;">
      <nav>
          <a href="index.php" style="text-decoration: none;">Produk</a>
          <a href="index.php?halaman=produk"  style="text-decoration: none;">Detail</a>
          <div class="animation start-home"></div>
      </nav>    
    <!-- Dropdown Produk -->

        <?php
        if (isset($_GET['halaman'])) 
        {
          if($_GET['halaman']=="produk")
          {
            include 'views/produk.php';
          }
        }
        else
        {
          echo 'asdasdads';
        }
        ?>
      <!-- Akhir Dropdown Produk -->

      

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </body>
</html>