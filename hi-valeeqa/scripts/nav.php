<?php
    session_start();
?>
<!doctype html>
<html lang="en">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Icon Title -->
    <link rel="icon" href="../images/hi_valeeqa.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .ml-5 {
            margin-left: 8rem !important;
        }
        .mr-5 {
            margin-right: 13rem !important;
        }
        .navbar-brand {
            font-size: 30px !important;
        }
        .nav-item {
            margin-left: 10px;
        }
        .brand-icon{
            height: 30px;
            float:left;
            margin-right:10px;
        }
        .bg-navbar {
            background: #FBF1F0;
        }
        .navbar-2 {
            background: #FBF1F0;
        }
        .a {
            margin-top: 71px;
        }
        .btn-outline-success {
            background: #fbf1f0 !important;
            border-color: #fbf1f0 !important;
        }
        .btn-outline-success:hover {
            background: #ffffff !important;
            border-color: #fbf1f0 !important;
        }
        .form-control {
            border-color: #fbf1f0 !important;
        }
        .navbar + .navbar {
            z-index: 1029;
        }
        .search-icon {
            height: 14px;
            width: auto;
            margin-bottom: 3px;
        }
        .menu-icon {
            height: 24px;
            width: auto;
        }
        .contain {
            width:100%;
            padding-right:var(--bs-gutter-x,.75rem);
            padding-left:var(--bs-gutter-x,.75rem);
            margin-right:auto;
            margin-left:auto;
        }
        @media (min-width:576px) {
            .contain{max-width:540px}
        }
        @media (min-width:768px) {
            .contain{max-width:720px}
        }
        @media (min-width:992px) {
            .contain{max-width:960px}
        }
        @media (min-width:1200px) {
            .contain{max-width:1140px}
        }
        @media (min-width:1400px) {
            .contain{max-width:1320px}
        }
        .navbar>.contain,.navbar>.container-fluid,.navbar>.container-lg,.navbar>.container-md,.navbar>.container-sm,.navbar>.container-xl,.navbar>.container-xxl {
            display:flex;
            flex-wrap:inherit;
            align-items:center;
            justify-content:space-between
        }
    </style>
        <nav class="navbar navbar-expand-xl navbar-light bg-light py-2 fixed-top" style="background: white !important">
            <div class="contain">
                <a class="navbar-brand h2 mb-0" href="http://hi-valeeqa.wsjti.com/index.php"><img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hi_valeeqa.png" width="auto" height="30" class="d-inline-block align-top mt-2" alt="Logo Hi Valeeqa">Hi Valeeqa</a>
                
                

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAccount" aria-controls="navAccount" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navAccount">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" method="GET" action="http://hi-valeeqa.wsjti.com/scripts/search-process.php">
                                <div class="row">
                                    <div class=" col-md-7 col-xs-7">
                                        <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search" name="search"> 
                                    </div>
                                    <div class="col-md-3 col-xs-3 ">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_search.png" alt="search" class="search-icon"></button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="nav-item">
                            <?php
                                if(isset($_SESSION["login"]) and $_SESSION["login"] == "yes"){
                                    
                                        echo "<a class='nav-link' href='http://hi-valeeqa.wsjti.com/scripts/cart.php'><img src='https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_bagshop.png' alt='Cart' class='menu-icon'></a>";
                                    
                                }
                            ?>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_person.png" alt="Account" class="menu-icon" >    
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php
                                            // Cek Session login
                                            if(isset($_SESSION["login"]) and $_SESSION["login"] == "yes"){
                                                echo "<li><span class='dropdown-item disabled'>Hai, ".$_SESSION['nama']."</span><div class='dropdown-divider'></div></li>";
                                                // Cek level user
                                                    if($_SESSION["level"] == "admin") echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/admin/'>Admin</a></li>";
                                                    echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/scripts/akun.php'>Akun Saya</a></li>";
                                                    echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/scripts/transaksi-history.php'>History Transaksi</a></li>";
                                                    echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/scripts/ubah-password.php'>Ubah Kata Sandi</a></li>";
                                                echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/scripts/logout.php'>Logout</a></li>";
                                            }else{
                                                echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/scripts/register.php'>Registrasi</a></li>";
                                                echo "<li><a class='dropdown-item' href='http://hi-valeeqa.wsjti.com/scripts/login.php'>Login</a></li>";
                                            }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-navbar fixed-top a">
            <div class="container-fluid">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="http://hi-valeeqa.wsjti.com/scripts/filter-process.php?kategori=best-seller" class="nav-link">Best Seller</a>
                    </li>
                    <?php
                        require "connection.php";
                        $sql = "select id_kategori, nama_kategori from kategori";
                        $query = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_array($query)){
                    ?>
                            <li class="nav-item">
                                <a href="http://hi-valeeqa.wsjti.com/scripts/filter-process.php?kategori=<?php echo $data['id_kategori']; ?>" class="nav-link"><?php echo $data["nama_kategori"]; ?></a>
                            </li>
                    <?php
                        }
                    ?>

                </ul>
            </div>
        </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</html>