<?php

session_start();

//koneksi ke database

$koneksi = mysqli_connect("localhost","root","","maketan");





if(!isset($_SESSION['login'])) {

    header("location: login.php");

    exit;

}



?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>





    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>MAKETAN</title>

    <!-- BOOTSTRAP STYLES-->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLES-->

    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- MORRIS CHART STYLES-->

    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <!-- CUSTOM STYLES-->

    <link href="assets/css/custom.css" rel="stylesheet" />

    <!-- GOOGLE FONTS-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />



    <!--css 2-->

    <link href="img/favicon.png" rel="icon">

    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">



    <!-- Bootstrap core CSS -->

    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--external css-->

    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">

    <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">

    <link href="css/style-responsive.css" rel="stylesheet">

    <script src="lib/chart-master/Chart.js"></script>



    <link rel="stylesheet" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">



    <script src="assets/js/jquery-1.10.2.js"></script>



    <script src="assets/ckeditor/ckeditor.js"></script>







</head>



<body>

    <div id="container">



        <header class="header black-bg">

            <div class="sidebar-toggle-box">

                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>





            </div>

            <a href="admin.php" class="logo"><b>MAKE<span>TAN</span></b></a>

            <div class="top-menu">

                <ul class="nav pull-right top-menu">

                    <li><a class="logout" href="admin.php?halaman=logout">LOGOUT</a></li>

                </ul>

            </div>

    </div>





    </header>





    <!-- /. NAV TOP  -->





    <nav class="navbar-default navbar-side" role="navigation">

        <div class="sidebar-collapse">

            <ul class="nav" id="main-menu">

                <aside>

                    <div id="sidebar" class="nav-collapse ">

                        <?php if(isset($_SESSION['login'])):?>



                        <?php 

                        $id = $_SESSION['login'];

                    $admin = mysqli_query($koneksi,"SELECT * FROM admin WHERE id='$id'");

                    $saya = mysqli_fetch_assoc($admin);

                ?>

                        <ul class="sidebar-menu" id="nav-accordion">

                            <li class="text-center">

                                <img src="../AADMIN/img/<?php echo $saya['foto_admin'] ?>"

                                    class="user-image img-responsive" />

                            </li>

                            <h5 class="centered">

                                <?php echo $saya ['nama_lengkap'] ?></h5>



                            <li class="mt">

                                <a class="active" href="admin.php">

                                    <i class="fa fa-dashboard"></i>

                                    <span>HOME</span>

                                </a>

                            </li>



                            <li class="sub-menu">

                                <a href="javascript:;">

                                    <i class="fa fa-desktop"></i>

                                    <span>MENU</span>

                                </a>

                                <ul class="sub">

                                    <li><a href="admin.php?halaman=produk"> PRODUK</a></li>



                                    <li><a href="admin.php?halaman=pelanggan">PELANGGAN</a></li>







                                </ul>





                            </li>



                    </div>





    </nav>

    <?php endif ?>

    <!-- /. NAV SIDE  -->

    <section id="main-content">

        <section class="wrapper">





            <?php 

               if (isset($_GET['halaman'])) 

               {

                    if ($_GET['halaman']=="produk")

                    {

                       include 'produk.php'; 

                    }

                    elseif ($_GET['halaman']=="pelanggan")

                    {

                        include 'pelanggan.php'; 

                    }

                    elseif ($_GET['halaman']=="detail")

                    {

                        include 'detail.php'; 

                    }

                    elseif ($_GET['halaman']=="tambahproduk")

                    {

                        include 'tambahproduk.php'; 

                    }

                    elseif ($_GET['halaman']=="hapusproduk")

                    {

                        include 'hapusproduk.php'; 

                    }

                    elseif ($_GET['halaman']=="ubahproduk")

                    {

                        include 'ubahproduk.php'; 

                    }

                    elseif ($_GET['halaman']=="logout") 

                    {

                        include 'logout.php';

                    }

                    elseif ($_GET['halaman']=="detailproduk") 

                    {

                        include 'detailproduk.php';

                    }

                    elseif ($_GET['halaman']=="hapusfotoproduk") 

                    {

                        include 'hapusfotoproduk.php';

                    }

                    elseif ($_GET['halaman']=="cetak") 

                    {

                        include 'cetak.php';

                    }

                    elseif ($_GET['halaman']=="tambahkategori") 

                    {

                        include 'tambahkategori.php';

                    }

                     elseif ($_GET['halaman']=="hapuspelanggan") 

                    {

                        include 'hapuspelanggan.php';

                    }

                    elseif ($_GET['halaman']=="profil") 

                    {

                        include 'profil.php';

                    }

                    elseif ($_GET['halaman']=="ubahprofil") 

                    {

                        include 'ubahprofil.php';

                    }

                    

                    

               }

               else

               {

                    include 'home.php';

               } 

               ?>



            </div>

            <!-- /. PAGE INNER  -->

            </div>

            <!-- /. PAGE WRAPPER  -->

            </div>

        </section>

        <!-- /. WRAPPER  -->

        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->

        <!-- JQUERY SCRIPTS -->

        <script src="assets/js/jquery-1.10.2.js"></script>

        <!-- BOOTSTRAP SCRIPTS -->

        <script src="assets/js/bootstrap.min.js"></script>

        <!-- METISMENU SCRIPTS -->

        <script src="assets/js/jquery.metisMenu.js"></script>

        <!-- MORRIS CHART SCRIPTS -->

        <script src="assets/js/morris/raphael-2.1.0.min.js"></script>

        <script src="assets/js/morris/morris.js"></script>

        <!-- CUSTOM SCRIPTS -->

        <script src="assets/js/custom.js"></script>





        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.bundle.min.js"></script>







        <script src="assets/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

        <script src="assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

        <script src="assets/DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>

        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>

        <script src="assets/DataTables/JSZip-2.5.0/jszip.min.js"></script>

        <script src="assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>

        <script src="assets/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>

        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>

        <script src="assets/DataTables/Buttons-1.5.6/js/buttons.colvis.min.js"></script>

        <script>

        $(document).ready(function() {

            var table = $('#table').DataTable({

                buttons: ['csv', 'print', 'excel', 'pdf'],

                dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +

                    "<'row'<'col-md-12'tr>>" +

                    "<'row'<'col-md-5'i><'col-md-7'p>>",

                lengthMenu: [

                    [5, 10, 25, 50, 100, -1],

                    [5, 10, 25, 50, 100, "ALL"]

                ]

            });



            table.buttons().container()

                .appendTo('#table_wrapper .col-md-5:eq(0)');

        });

        </script>



        <script type="application/javascript">

        $(document).ready(function() {

            $("#date-popover").popover({

                html: true,

                trigger: "manual"

            });

            $("#date-popover").hide();

            $("#date-popover").click(function(e) {

                $(this).hide();

            });



            $("#my-calendar").zabuto_calendar({

                action: function() {

                    return myDateFunction(this.id, false);

                },

                action_nav: function() {

                    return myNavFunction(this.id);

                },

                ajax: {

                    url: "show_data.php?action=1",

                    modal: true

                },

                legend: [{

                        type: "text",

                        label: "Special event",

                        badge: "00"

                    },

                    {

                        type: "block",

                        label: "Regular event",

                    }

                ]

            });

        });



        function myNavFunction(id) {

            $("#date-popover").hide();

            var nav = $("#" + id).data("navigation");

            var to = $("#" + id).data("to");

            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);

        }

        </script>



</body>

</h