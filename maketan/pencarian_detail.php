<?php
//skrip koneksi
session_start();
include 'koneksi.php';
?>
<?PHP  
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'"); 

while($pecah = $ambil->fetch_assoc())
{
    $semuadata[]=$pecah;
}

// if (!isset($_SESSION["user_status"]))
// {
//     echo "<script>alert('silahkan login')</script>";
//     echo "<script>location='Login/login.php';</script>";
// }
// echo"<pre>";
// print_r($semuadata);
// echo"</pre>";

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- My Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <!-- My Css -->
  <!-- <link rel="stylesheet" href="style_dasboard.css"> -->

    <!-- My Css Card -->
    <link rel="stylesheet" href="style_Card_pencarian.css">
    <link rel="stylesheet" href="style_dasboard.css">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>MAKETAN</title>
</head>

<body>
     <!-- Navbar -->
  <header style="position: fixed;">
          <div class="container" style="margin-top: -20px;">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                <a href="Dasboard.php" type="button" style="text-decoration:none"><h3 class="logo">MAKE<span>TAN</span></h3></a>
            </div>
            <div class="nav-btn">
                <div class="nav-links">
                  <form action="pencarian.php" method="get">
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
                    <ul style="padding-bottom: -20px;">
                        <li class="nav-link" style="--i: .6s">
                            <a href="kategori_pertanian.php" method="get">Pertanian</a>
                        </li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="kategori_alat.php" method="get" name="alat">Alat</a>
                        </li>
                        <li class="nav-link" style="--i: 1.1s">
                            <a href="kategori_pupuk.php" method="get" name="pupuk">Pupuk</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="kategori_bibit.php" method="get" name="bibit">Bibit</a>
                        </li>
                        <li class="nav-link" style="--i: 1.8s">
                            <a href="kategori_obat.php" method="get" name="obat">Obat</a>
                        </li>
                    </ul>
                </div>
                <div class="login-navbar">
                  <?php if (isset($_SESSION['user_status'])):?>
                    <?php $id_user = $_SESSION['user_id'];
                    $s = mysqli_query($koneksi,"select * from user where user_id='$id_user'");
                    $saya = mysqli_fetch_assoc($s); ?>
                    <div class="nav_right">
                      <ul>
                      <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"s
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="small" style="margin-right: -80px; font-size:1rem; font-weight: bold;"><?php echo $saya['user_nama']; ?></span>
                                <img class="rounded-circle"  src="gambar/user/<?php echo $saya['user_foto']; ?>">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil.php" data-toggle="modal" data-target="#profilModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> 
                                <?php //$sql = mysqli_query($koneksi, "SELECT * FROM buka_toko WHERE user_id ='$_SESSION[user_id]'");?>                      
                                <?php //$cek = mysqli_num_rows($sql); ?>
                                <?php //if(isset($_SESSION['user_id'])) { ?>           
                                  <?php //if ($cek > 0) { ?>
                                  <!-- <a class="dropdown-item" href="profil_toko.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    profil toko
                                  </a> -->
                                <?php //}else{ ?>
                                <!-- <a class="dropdown-item" href="buka_toko2/buka_toko.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    buat toko
                                </a> -->
                                <?php //} ?>
                                <?php //} ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                      </ul>
                    </div>
                  </div>
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
  <!-- Akhir navbar -->


    <!-- Hasil Pencarian -->
    <div class="isi">
        <div class="wrapper">
          <div class="row" style="margin-top: -40px;">
            <?php foreach ($semuadata as $key => $value): ?>
              <?php include 'produk2/views/produk.php' ?>
              <?php endforeach ?>
          </div>
        </div>
    </div>

    <div class="row mx-0 mt-5 justify-content-center">
      <button class="btn btn-green"> Tampilkan Lebih banyak</button>
    </div>
    </div>
  </div>

    <!-- Akhir Pencarian -->









  <!-- footer -->
  <div class="footer-ku">
    <div class="card-footer text-center">
      <div class="card-header" style="font-size: 42px;font-family: Roboto; font-weight: bold; padding: 4px 4px;">
        Follow us
      </div>
      <div class="card-body">
        <a href=" #" class="btn d-flex justify-content-center">
          <img src=" logo/twitter.png" alt="">
          <img src="logo/instagram.png" alt="">
          <img src="logo/facebook.png" alt="">
        </a>
      </div>
    </div>
  </div>
  <!-- penutup footer -->

  <!-- Modal Pencarian -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:30px;">
    <div class="modal-dialog">
      <div class="modal-content m-c-head">
        <div class="d-flex justify-content-between">
          <span class="font-weight-bold title"> Pencarian Terakhir</span>
          <span class="font-weight-bold " style="color: #d50000;"> Hapus Semua</span>
        </div>
        <span class="ml-2 mt-2" style="font-size: 14px;">Pupuk</span>
        <span class="ml-2 mt-2" style="font-size: 14px;">Alat Pertanian</span>
      </div>
    </div>
  </div>
  <!-- Penutup Modal Pencarian -->

  <!-- Css Chat -->
  <style>
  .button_message .btn-secondary {
  background-color: rgb(85, 85, 85);
  color: white;
  padding: 5px 0px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
  border-radius: 12px;
  font-size: 30px;
  font-variant: small-caps;
  }
  </style>

  <!-- Chat -->
  <div class="button_message">
    <a class="btn btn-secondary" href="user/index.php" role="button">Chat</a>
  </div>






    <!-- My JS -->
    <!-- <script src="script_Card.js"></script> -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    < src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></>
    < src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></>
    < src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></>
    -->
</body>

</html>