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
            border: 1px ;
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
                    <div class="row text-center no-gutters">
                        <div class="col">
                            <a href="login.php" style="color: #343a40;"class="btn" onclick=" return false;">
                                <h3>Login</h3>
                            </a>
                        </div>
                        <div class="col">
                            <a href="register.php" class="btn btn-switcher">
                                <h3>Register</h3>
                            </a>
                        </div>
                    </div>
                </div>
                
                <form action="login-process.php" method="POST">
                    <?php
                        if(isset($_GET["status"])){
                            $status = $_GET["status"];
                            if($status == "error"){
                    ?>
                                <div class="alert alert-danger">
                                    Email atau Password salah!
                                </div>
                    <?php
                            }elseif($status == "success"){
                    ?>
                                <div class="alert alert-success">
                                    Register berhasil! Silakan login untuk masuk ke akun anda.
                                </div>
                    <?php
                            }
                        }
                    ?>
                    <div class="form-group text-left">
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" class="form-control" maxlength="50">
                    </div>
                    <div class="form-group text-left">
                        <label for="pwd">Password: </label>
                        <input type="password" name="pwd" id="password" class="form-control" maxlength="50">
                    </div>
                    <a href="lupa-password.php">Lupa kata sandi?</a><br>
                    <a href="../index.php">Kembali ke beranda</a>
                    <button type="submit" class="btn btn-primary" style="width: 100%; height: 50px; margin-top: 20px; margin-bottom: 30px; background:#C3A892; border: 1px solid #C3A892;">Login</button>
                </form>
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