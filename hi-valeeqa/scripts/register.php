<?php
    session_start();
    if(isset($_SESSION["login"]) and $_SESSION["login"] == "yes"){
        header("Location: ../index.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon Title -->
    <link rel="icon" href="../images/hi_valeeqa.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hi Valeeqa</title>
    <style>
        .login-border{
            border: 0px;
            width: 50%;
            margin-top: 150px;
            margin-bottom: 70px;
            background: #f6f7f9;
        }
        .login-register-switch{
            width: 100%;
            height: 60px;
            overflow: hidden;
        }
        .login-register-form{
            border: 1px 
        }
        form{
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: 5%;
            margin-top: 5%;
        }
        .btn-switcher{
            background: #C3A892;
            color: white;
        }
        .btn-switcher:hover{
            background: #343a40;
            color: white;
        }
        .btn{
            width: 100%;
            height: 60px;
            border-radius: 0px;
        }
        a.btn h3{
            height: 100%;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
  </head>
  <body style="background:#343a40;">
    <?php //include "nav.php"; ?>
    <div class="container">
        <center>
            <div class="login-border">
                <div class="login-register-switch">
                    <div class="row no-gutters">
                        <div class="col">
                            <a href="login.php" class="btn btn-switcher">
                                <h3>Login</h3>
                            </a>
                        </div>
                        <div class="col">
                            <a href="register.php" class="btn" onclick="return false;">
                                <h3>Register</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-left">
                    <form action="register-process.php" method="POST">
                        <?php
                            if(isset($_GET["status"])){
                                $status = $_GET["status"];
                                if($status == "error"){
                        ?>
                                    <div class="alert alert-danger">
                                        Semua form harus diisi!
                                    </div>
                        <?php
                                }elseif($status == "pwd-error"){
                        ?>
                                    <div class="alert alert-danger">
                                        Password tidak cocok! Ulangi lagi.
                                    </div>
                        <?php
                                }elseif($status == "gender-error"){
                        ?>
                                    <div class="alert alert-danger">
                                        Jenis kelamin belum dipilih!
                                    </div>
                        <?php
                                }elseif($status == "email-exist"){
                        ?>
                                    <div class="alert alert-danger">
                                        Email sudah terdaftar!
                                    </div>
                        <?php
                                }
                            }
                        ?>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" id="" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="pass2"> Ulangi Password</label>
                            <input type="password" name="pass2" id="" class="form-control" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="" class="form-control">
                                <option value="#">-- Pilih Salah Satu --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="wa">No Whatsapp</label>
                            <input type="number" name="wa" id="" class="form-control" maxlength="12">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px; margin-top: 20px; margin-bottom: 30px; background:#C3A892; border: 1px solid #C3A892;">Register</button>
                    </form>
                </div>
            </center>

        </div>
    </div>
    <?php //include "footer.php"; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>