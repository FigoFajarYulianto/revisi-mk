<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAFTAR</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Style.Css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
    if(isset($_GET['alert'])){
        if($_GET['alert'] == "registered"){
            ?>
            <div class="alert alert-success text-center">
                <span class="font-weight-bold">Toko Anda Sudah Dibuka.</span>
            </div>
<?php
    }
    }
?>
    
<body>
    <div class="main">
    <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form action="input_aksi.php" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Buat Toko Anda</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="nama" id="nama" placeholder="Nama Toko" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="link" id="link" placeholder="Link Toko" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="kota" id="kota" placeholder="Kota" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="kode" id="kode" placeholder="kode" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="map" id="map" placeholder="Map" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" id="simpan" class="form-submit" value="Simpan" required=""/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>