<?php
ob_start();
session_start();
require_once('config/koneksi.php');
require_once('models/database.php');

if (!isset($_SESSION["user_status"]))
{
    echo "<script>alert('silahkan login')</script>";
    echo "<script>location='../Login/login.php';</script>";
}

$connection = new database($host, $user, $pass, $database);
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
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style_produk.css">
    <!-- Akhir Dari CSS Tambahan -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Add custom CSS here -->
  </head>

  <body style="font-size: 1.5rem;">
  <header>
          <div class="container">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                <a href="../Dasboard.php" type="button" style="text-decoration:none"><h3 class="logo">MAKE<span>TAN</span></h3></a>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                  <form action="../pencarian.php" method="get">
                    <div class="wrapper">
                      <div class="search-input">
                        <a href="" target="_blank" hidden></a>
                        <input type="text" class="form-control" name="keyword" placeholder="Cari Produk..">
                        <div class="autocom-box">
                          <!-- here list are inserted from javascript -->
                        </div>
                        <div class="icon"><i class="fas fa-search"></i></div>
                      </div>
                    </div>
                  </form>
                    <ul style="padding-bottom: -20px; font-size: 1.5rem;" >
                        <li class="nav-link" style="--i: .6s">
                            <a href="#">Pertanian</a>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="#">Alat</a>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="#">Pupuk</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="#">Bibit</a>
                        </li>
                        <li class="nav-link" style="--i: 1.8s">
                            <a href="#">Obat</a>
                        </li>
                    </ul>
                </div>
                <div class="login-navbar">
                  <?php if (isset($_SESSION['user_status'])):?>
                    <div class="nav_right">
                      <ul>
                        <li class=" d-flex nr_li dd_main">
                          <img src="../gambar/user/profile_pic.png" alt="profile_img">
                          <div class="dd_menu">
                            <div class="dd_left">
                              <ul>
                                <li><i class="fas fa-user"></i></li>
                                <li><i class="fas fa-store"></i></li>
                                <li><i class="fas fa-comment-dots"></i></li>
                                <li><i class="fas fa-sign-out-alt"></i></li>
                              </ul>
                            </div>
                            <div class="dd_right">
                              <ul>
                                <li><a href="">data diri</a></li>
                                <li><a href="produk2/views/produk.php">buka toko</a></li>
                                <li><a href="">umpan balik</a></li>
                                <li><a href="../logout.php">keluar</a></li>
                              </ul>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <script>
                    var dd_main = document.querySelector(".dd_main");

                    dd_main.addEventListener("click", function(){
                      this.classList.toggle("active");
                    })
                  </script>

                    <?php else: ?>

                  <div class="log-sign" style="--i: 1.8s">
                          <a href="Login/login.php" class="btn transparent">Masuk</a>
                          <a href="Login/daftar.php" class="btn solid">Daftar</a>
                      </div>
                  </div>
                </div>
            <?php endif ?>
            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
        
    </header>
    <style type="text/css">
    header .img-search {
    width: 18px;
    }

    header .wrap-search {
        position: relative;
        background-color: #ffffff;
        width: 100%;
        height: 40px;
        margin-top: 20px;
        margin-bottom: auto;
        border-radius: 20px;
    }

    header .container .nav-btn .nav-links .wrap-search .form-control {
        background-color: transparent;
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        border: 1px solid #cdcdcd;
        z-index: 1;
        padding: 9px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-left: 20px;
    }

    header .wrap-search .form-control ::placeholder {
        color: #cdcdcd;
        font-size: 14px;
        padding-left: 10px;
    }

    header .wrap-search .form-control:focus {
        box-shadow: none;
        border: 1px solid #0673f0;
    }

    header .wrap-search .wrap-icon-search {
        background-color: #f3f4f5;
        position: absolute;
        right: 0;
        height: 100%;
        width: 4%;
    }

    header .wrap-search img {
        float: right;
        margin-right:15px ;
        margin-top: 10px;

    }
    </style>
    <main>
        <section>
            <div class="overlay"></div>
        </section>
    </main>
    <!-- Akhir Navbar -->

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
          include 'views/produk.php';
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