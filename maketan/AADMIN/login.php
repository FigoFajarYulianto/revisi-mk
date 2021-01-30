<?php
session_start();
//koneksi ke database



if(isset($_SESSION["login"])) {
    header("location: admin.php");
    exit;
}

$koneksi = new mysqli("localhost", "root", "", "project_chat");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Login Admin</title>

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <div id="login-page">
        <div class="container">
            <form class="form-login" method="POST">
                <h2 class="form-login-heading">SILAHKAN LOGIN</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" placeholder="User ID" name="user" autofocus>
                    <br>
                    <input type="password" class="form-control" placeholder="Password" name="pass">
                    <br>

                    <button class="btn btn-theme btn-block" type="submit" name="login"><i class="fa fa-lock"></i>
                        MASUK</button>
                    <hr>


                </div>
                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
                    class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off"
                                    class="form-control placeholder-no-fix">
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-theme" type="button">Masuk</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->
            </form>

            <?php
                        if (isset($_POST['login']))
                        {
                            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]'
                            AND password_admin = '$_POST[pass]'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1)
                        { $_SESSION['admin']=$ambil->fetch_assoc();
                            // set session
                            $_SESSION['login'] = true;

                            //cek remember me
                            if( isset($_POST['remember']) ) {
                                //buat cookie
                                setcookie('key', hash('sha256', $yangcocok['username']), time() + 60);
                            }

                            echo "<div class='alert alert-info'>LOGIN SUKSES</div>";
                            echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
                        }
                        else
                        {
                            echo "<div class='alert alert-danger'>LOGIN GAGAL</div>";
                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                        }
                    }
                        ?>

        </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("img/4.jpg", {
        speed: 500
    });
    </script>
    <script src="package/dist/sweetalert2.all.min.js"></script>

</body>

</html>