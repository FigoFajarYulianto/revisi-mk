<?php 

session_start();





if(isset($_SESSION["login"])) {

    header("location: admin.php");

    exit;

}



$koneksi = new mysqli("localhost", "root", "", "maketan");





?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>MAKETAN : Login</title>

    <!-- BOOTSTRAP STYLES-->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- CUSTOM STYLES-->

    <link href="assets/css/custom.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />



</head>



<body>

    <div class="container">

        <div class="row text-center ">

            <div class="col-md-12">

                <br /><br />

                <h2> SILAHKAN LOGIN</h2>



                <h5>( WELCOME )</h5>

                <br />

            </div>

        </div>

        <div class="row ">



            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <center>

                            <strong> MASUK </strong>

                        </center>

                    </div>

                    <div class="panel-body">

                        <form role="form" method="post">

                            <br />

                            <div class="form-group input-group">

                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>

                                <input type="text" class="form-control" name="user" placeholder="Masukkan Username" />

                            </div>

                            <div class="form-group input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control" name="pass" placeholder="Password" />

                            </div>

                            <div class="form-group">

                                <label class="checkbox-inline">



                                </label>

                                <span class="pull-right">



                                </span>

                            </div>



                            <button class="btn btn-primary" name="login">Login</button>

                            <hr />



                        </form>

                        <?php

                        if (isset($_POST['login']))

                        {

                            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]'

                            AND password_admin = '$_POST[pass]'");

                            $yangcocok = mysqli_num_rows($ambil);

                            if ($yangcocok == 1){ 

                                // $_SESSION['admin']=$ambil->fetch_assoc();

                                $data = mysqli_fetch_assoc($ambil);

                            // set session

                            $_SESSION['login'] = $data['id'];

                            $_SESSION['user_status'] = 'login';



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

            </div>





        </div>

    </div>





    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

    <!-- JQUERY SCRIPTS -->

    <script src="assets/js/jquery-1.10.2.js"></script>

    <!-- BOOTSTRAP SCRIPTS -->

    <script src="assets/js/bootstrap.min.js"></script>

    <!-- METISMENU SCRIPTS -->

    <script src="assets/js/jquery.metisMenu.js"></script>

    <!-- CUSTOM SCRIPTS -->

    <script src="assets/js/custom.js"></script>



</body>



</html>