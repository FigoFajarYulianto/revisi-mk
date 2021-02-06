<?php session_start(); ?>
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
        
        .filter-title{
            background: #FBF1F0;
            border:3px solid #fbf1f0;
            font-weight:bold;
        }
        .filter-position{
            margin-left: 100%:
        }
        .filter-content{
            border: 3px solid #dcdcdc;
        }
        .size-box {
            border: 0.5px solid black;
            padding: 2%;
            margin-left: 3%;
            margin-right: 3%;
            height: 30px;
            width: 30px;
        }
        .result{
            width: 100%;
            margin-bottom: 20px;
            padding-top: 8px;
            border: 3px solid #ffffff;
            overflow: hidden;
        }
        .result:hover {
            border: 3px solid #fbf1f0;
        }
        .result-img{
            padding: 5px;
            text-align: center;
            width: 230px;
            height: 345px;
            margin-right: auto;
            margin-left: auto;
        }
        .judul {
            margin-top: 8px;
            margin-left: 8px;
            margin-right: 8px;
            margin-bottom: 10px;
            font-size: 14px;
            max-height: 4em;
            height: 4em;
        }
        .garis {
            height: 1px;
            background: #dcdcdc;
            border: none;
            margin-top: 8px;
            margin-bottom: 8px;
        }
        .result-cost{
            background: #fbf1f0;
            padding: 15px;
            margin: 0px;
            text-align: right;
            border: 1px solid #fbf1f0;
            font-weight: bold;
        }
        body .container{
            margin-bottom: 70px;
        }
        .anchor-black, .anchor-black:hover{
            color: black;
            text-decoration: none;
        }
        select.custom-select {
            margin-left: 10%;
            margin-right: 10%;
        }
    </style>
  </head>
  <body>
    <?php include "nav.php";  ?>
    <?php require "connection.php"; ?>
    <div class="container">
        <div class="row" style="margin-top: 150px;">
            <!-- Filter -->
            <div class="col-sm-3">
                <div class="text-left filter-title py-2 px-3 mb-2">
                    Filter
                </div>
                <form action="filter-process.php" method="GET">
                    <div class="filter-content py-3 px-3">
                        <div class="category">
                            <label for="">Kategori</label><br>
                            <div class="filter-position">
                                <?php
                                    $sql = "select distinct id_kategori, nama_kategori from kategori order by id_kategori";
                                    $query = mysqli_query($conn, $sql);
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="kategori" value="<?php echo $data['id_kategori'] ?>" id="kategori1">
                                            <label for="kategori" class="form-check-label"><?php echo $data["nama_kategori"]; ?></label>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <hr>
                            <label for="">Warna</label>
                            <?php 
                                $sql = "select distinct warna from produk";
                                $query = mysqli_query($conn, $sql);
                                while($data = mysqli_fetch_array($query)){
                            ?>
                                    <div class="filter-position">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="warna" value="<?php echo $data['warna'] ?>">
                                            <label for="kategori" class="form-check-label"><?php echo $data['warna'] ?></label>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>
                            
                            <hr>
                            <label for="">Harga</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Harga minimum" name="harga_min">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Harga maximum" name="harga_max">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" style="width:100%; background: #C3A892; border: #C3A892;  ">Terapkan</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            

            <!-- Hasil Pencarian -->
            <div class="col-sm-9">
                <?php
                    $filter = ["kategori", "warna", "harga_min", "harga_max"];
                    $condition = [];
                    $filter_count = count($filter);
                    for($i=0;$i<$filter_count; $i++){
                        if($filter[$i] == "kategori"){
                            if(isset($_GET["kategori"])){
                                $kategori = $_GET["kategori"];
                                array_push($condition, " produk.id_kategori='$kategori'");
                            }else{
                                $kategori = "";
                            }
                        }else{
                            if(isset($_GET[$filter[$i]])){
                                $filter_temp = $_GET[$filter[$i]];
                                if($filter[$i] == "harga_min"){
                                    array_push($condition, " harga>=$filter_temp");
                                }elseif($filter[$i] == "harga_max"){
                                    array_push($condition, " harga<=$filter_temp");
                                }else{
                                    $temp = $filter[$i];    
                                    array_push($condition, " $temp='$filter_temp'");
                                }
                            }
                        }
                    }
                    $nama_kategori = "";
                    if($kategori == "best-seller"){
                        $nama_kategori = "Best Seller";
                    }elseif($kategori == ""){
                        $nama_kategori = "Semua Produk";
                    }else{
                        $sql = "select nama_kategori from kategori where id_kategori='$kategori'";
                        $query = mysqli_query($conn, $sql);
                        $data = mysqli_fetch_array($query);
                        $nama_kategori = $data["nama_kategori"];
                        $_SESSION["header"] = "kategori=$kategori";
                    }

                    // Filter sesuai header
                    if(isset($_SESSION["header"]) or $_SESSION["header"] != "" or  $_SESSION["header"] != []){
                        $header = $_SESSION["header"];
                    }else{
                        $header = "";
                        $_SESSION["header"] = "";
                    }
                ?>
                <p class="mt-3 mb-sm-1">Menampilkan hasil pencarian untuk "<?php echo $nama_kategori ?>"</p>
                <br>
                <div class="row">
                    <?php
                        // Pagination
                        $batas = 6;
                        $halaman = isset($_GET["halaman"]) ? $_GET["halaman"]: 1;
                        $halaman_awal = $halaman>1 ? ($halaman * $batas) - $batas : 0;// Untuk tiap nomor
                        // Mengatur Filter + Pagination
                        if(isset($_GET["s"])){
                            $search = $_GET["s"];
                            $sql = "select produk.id_produk, produk.id_kategori, nama_barang, warna, bahan, harga, lokasi_gambar from produk inner join gambar on produk.id_produk = gambar.id_produk where nama_barang like '%$search%'";
                        }else{
                            if($kategori == "best-seller"){
                                $sql = "select produk.id_produk, produk.id_kategori, nama_barang, warna, bahan, harga, lokasi_gambar from produk inner join gambar on produk.id_produk = gambar.id_produk order by best_seller desc";
                            }elseif($kategori == "" and $condition == []){
                                $sql = "select produk.id_produk, produk.id_kategori, nama_barang, warna, bahan, harga, lokasi_gambar from produk inner join gambar on produk.id_produk = gambar.id_produk";
                            }else{
                                $condition_count = count($condition);
                                $sql = "select produk.id_produk, produk.id_kategori, nama_barang, warna, bahan, harga, lokasi_gambar from produk inner join gambar on produk.id_produk = gambar.id_produk where";
                                for($i=0; $i<$condition_count; $i++){
                                    if($i == 0){
                                        $sql = $sql.$condition[$i];
                                    }else{
                                        $sql = $sql." and".$condition[$i];
                                    }
                                }

                            }
                        }
                        // Halaman
                        $next = $halaman + 1;
                        $previous = $halaman - 1;
                        $query = mysqli_query($conn, $sql);
                        $total_data = mysqli_num_rows($query);

                        $total_halaman = ceil($total_data / $batas);
                        $nomor = $halaman_awal + 1;
                        
                        $sql = $sql." limit $halaman_awal, $batas";

                        $query = mysqli_query($conn, $sql);
                        $total_result = mysqli_num_rows($query);
                        if($total_result == 0){
                            echo "<h1>Data Tidak Ditemukan</h1>";
                        }else{   
                            while($data = mysqli_fetch_array($query)){
                    ?>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="result">
                                        <a href="detail.php?id-produk=<?php echo $data['id_produk']; ?>" class="anchor-black">
                                                <?php 
                                                    $pic = "../".$data["lokasi_gambar"];
                                                    $judul = strlen($data["nama_barang"]) > 14 ? substr($data["nama_barang"], 0, 14)."..." : $data["nama_barang"];
                                                    $bahan = strlen($data["bahan"]) > 10 ? substr($data["bahan"], 0, 10)."..." : $data["bahan"];
                                                    $warna = strlen($data["warna"]) > 7 ? substr($data["warna"], 0, 7)."..." : $data["warna"];
                                                    echo "<div class='result-img'><img src='$pic' alt='' class='w-100'></div>"; 
                                                    echo "<div class='judul'><b>".$judul."</b><div class='garis'></div>"; 
                                                    echo $bahan." - ".$warna."</div><br>"; 
                                                    echo "<div class='result-cost'>Rp ".number_format($data["harga"], 0, "", ".")."</div>";
                                            ?>
                                        </a>
                                    </div>
                                </div>
                    <?php   
                            }
                        }
                    ?>
                    
                </div>
                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-end">
                        <?php
                            if($halaman == 1){
                                echo "<li class='page-item disabled'><a class='page-link anchor-black' href='#'>Previous</a></li>";
                            }else{
                                echo "<li class='page-item'><a class='page-link anchor-black' href='search.php?$header&halaman=$previous'>Previous</a></li>";
                            }
                        ?>
                        <?php
                            
                            for($i=1; $i<=$total_halaman; $i++){
                                if($halaman == $i){
                                    echo "<li class='page-item disabled'><a class='page-link anchor-black' href='search.php?halaman=$i'>$i</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link anchor-black' href='search.php?$header&halaman=$i'>$i</a></li>";
                                }
                                
                            }
                        ?>
                        <?php
                            if($halaman == $total_halaman){
                                echo "<li class='page-item disabled'><a class='page-link anchor-black' href='#'>Next</a></li>";
                            }else{
                                echo "<li class='page-item'><a class='page-link anchor-black' href='search.php?$header&halaman=$next'>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- Hasil Pencarian -->
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <?php include "footer.php";  ?>
  </body>
</html>