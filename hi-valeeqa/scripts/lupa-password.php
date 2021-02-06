<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon Title -->
    <link rel="icon" href="../images/hi_valeeqa.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .marg {
            margin-top: 10rem !important;
            margin-bottom: 10rem !important;
        }
    </style>
    <title>Lupa Kata Sandi</title>
  </head>
  <body>
    <?php 
        include 'nav.php';
        require_once "connection.php"; 
    ?>

    <div class="container marg">
        <div class="card w-50 mx-auto">
            <div class="card-header">
                <h3>Lupa Kata Sandi</h3>
            </div>
            <div class="card-body">
                <?php
                    if(isset($_GET["status"])){
                        $status = $_GET["status"];
                        if($status == "not-found"){
                ?>
                            <div class="alert alert-danger">Email belum terdaftar!</div>
                <?php
                        }elseif ($status == "success") {
                            $email = $_GET["email"];
                            $nama = $_GET["nama"];
                            $sql_wa = "select nomor_wa from rekening";
                            $query_wa = mysqli_query($conn, $sql_wa);
                            $data_wa = mysqli_fetch_array($query_wa);
                ?>
                            <div class="alert alert-success">
                                Request berhasil! Mohon tunggu admin untuk menghubungi anda. <br>
                                Atau juga bisa menghubungi admin dengan klik <a href="https://wa.me/<?php echo $data_wa["nomor_wa"]; ?>?text=Halo%20Hi%20Valeeqa,%20saya%20<?php  echo $nama ?>%20dengan%20email%20<?php echo $email ?>%20ingin%20menanyakan%20terkait%20lupa%20password%20pada%20akun%20saya.%20Tolong%20segera%20diproses%20ya...">di sini</a>
                            </div>
                <?php
                        }
                    }
                ?>
                <form action="lupa-password-process.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>