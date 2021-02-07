<?php 
    session_start(); 
    require_once "connection.php";
    $id_user = $_SESSION["id_user"];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .marg {
            margin-top: 10rem !important;
            margin-bottom: 10rem !important;
        }
        .tabContainer {
            width: 100%;
            height: auto;
        }
        .tabContainer .buttonContainer {
            height: 15%;
        }
        .tabContainer .buttonContainer button {
            width: calc(100% / 5);
            height: 100%;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 10px;
            font-size: 16px;
            background-color: #ffffff;
            text-transform: uppercase;
            font-weight: bold;
            color: #dfdfdf;
        }
        .tabContainer .tabPanel {
            height: 85%;
            background-color: #f6f6f6;
            color: #000000;
            text-align: center;
            padding-top: 40px;
            box-sizing: border-box;
            font-size: 16px;
            display: none;
        }

        .item-trans{
            margin-top: 20px;
            background: #ffffff;
            height: 100%;
            border-top: 1px #eee solid;
            border-bottom: 1px #eee solid;
        }
        .item-trans-atas {
            height: 20%;
            padding: 20px;
            vertical-align: center;
        }
        .item-trans-tengah {
            height: 50%;
        }
        .item-trans-barang {
            border-top: 1px #eee solid;
            padding: 20px;
            margin-left:20px;
            margin-right: 20px;
        }
        .item-trans-barang img {
            height: 100px;
        }
        .trans-nama {
            font-size: 24px;
        }
        .trans-warna {
            color: lightgrey;
            font-size: 14px;
        }
        .trans-jumlah {
            font-size: 14px;
        }
        .item-trans-bawah {
            height: 30%;
            background: #fbf1f0;
            border-top: 1px #eee solid;
            padding: 20px;
        }
        .trans-total {
            font-size: 22px;
        }
        .item-trans-kosong {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        .item-trans-kosong img {
            height: 90px;
            margin-bottom: 10px;
        }
    </style>
  </head>
  <body>
    <?php include 'nav.php' ?>
    <div class="container marg">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xl-3">
                <div class="card">
                    <div class="card-header"><h3>Akun</h3></div>
                    <div class="card-body px-0 py-0">
                        <ul class="list-group list-group-flush">
                            <a href="akun.php" class="list-group-item list-group-item-action py-3">Akun Saya</a>
                            <a href="transaksi-history.php" class="list-group-item list-group-item-action active py-3">History Transaksi</a>
                            <a href="ubah-password.php" class="list-group-item list-group-item-action py-3">Ubah Kata Sandi</a>
                          </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xl-9">
                <div class="card">
                    <div class="card-body py-0 px-0">
                        <div class="tabContainer">
                            <div class="buttonContainer">
                                <button onclick="showPanel(0,'#007bff')">Belum Bayar</button>
                                <button onclick="showPanel(1,'#007bff')">Dikemas</button>
                                <button onclick="showPanel(2,'#007bff')">Dikirim</button>
                                <button onclick="showPanel(3,'#007bff')">Selesai</button>
                                <button onclick="showPanel(4,'#007bff')">Gagal</button>
                            </div>

                            
                            <!-- Belum Bayar -->
                            <div class="tabPanel">
                                <?php
                                    $sql_belum_bayar = "select * from transaksi where id_user=$id_user and status='belum bayar'";
                                    $query_belum_bayar = mysqli_query($conn, $sql_belum_bayar);
                                    $data_belum_bayar_count = mysqli_num_rows($query_belum_bayar);
                                    if($data_belum_bayar_count == 0){
                                ?>
                                        <!-- Tidak Ada Transaksi -->
                                        <div class="item-trans-kosong text-center">
                                            <img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_shopping_list.png" alt="Tidak Ada Pesanan"><br>
                                            <span class="trans-kosong">Tidak Ada Pesanan</span>
                                        </div>
                                <?php
                                    }else{
                                        while($data_belum_bayar = mysqli_fetch_array($query_belum_bayar)){
                                            $id_transaksi_bb = $data_belum_bayar['id_transaksi'];
                                    ?>
                                            <!-- Transaksi -->
                                            <div class="item-trans">
                                                <div class="item-trans-atas">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <span class="id-transaksi">ID Transaksi: <?php echo $id_transaksi_bb; ?></span>
                                                        </div>
                                                        <div class="col text-right">
                                                            <span class="status">Menunggu Pembayaran</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Detail transaksi -->
                                                <div class="item-trans-tengah">
                                                        <?php
                                                            $sql_detail_bb = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk inner join gambar on produk.id_produk = gambar.id_produk where id_transaksi=$id_transaksi_bb";
                                                            $query_detail_bb = mysqli_query($conn, $sql_detail_bb);
                                                            $total = 0;
                                                            while($data_detail_bb = mysqli_fetch_array($query_detail_bb)){
                                                                $total += ($data_detail_bb["harga"] * $data_detail_bb["jumlah"]);
                                                        ?>
                                                                <div class="item-trans-barang">  
                                                                    <div class="row">
                                                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">
                                                                            <img src="../<?php echo $data_detail_bb['lokasi_gambar']; ?>">
                                                                        </div>
                                                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 text-left">
                                                                            <span class="trans-nama"><?php echo $data_detail_bb["nama_barang"]; ?></span><br>
                                                                            <span class="trans-warna"><?php echo $data_detail_bb["warna"]; ?></span><br>
                                                                            <span class="trans-jumlah">Jumlah: <?php echo $data_detail_bb["jumlah"]; ?></span>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
                                                                            <span class="trans-harga">Rp <?php echo number_format($data_detail_bb["harga"], 0, "", "."); ?></span><br>
                                                                            <a href="detail.php?id-produk=<?php echo $data_detail_bb['id_produk']; ?>" class="btn btn-outline-dark btn-sm mt-4">Detail Produk</a>
                                                                        </div>
                                                                    </div>
                                                                </div>       
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                                <div class="item-trans-bawah ">
                                                    <div class="text-left" style="float: left;">
                                                        <?php
                                                            if($data_belum_bayar["jenis_pembayaran"] == "tabungan"){
                                                        ?>
                                                                <span style="font-size: 16px">Tabungan: Rp <?php echo number_format($data_belum_bayar["tabungan"], 0, "", "."); ?></span>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="text-right">
                                                        <span class="trans-total">Total: Rp <?php echo number_format($total, 0, "", "."); ?></span><br>
                                                        <a href="checkout-cancel.php?id-transaksi=<?php echo $id_transaksi_bb ?>" class="btn btn-dark mt-3" onclick="return confirm('Apakah anda yakin untuk membatalkan pesanan?')">Batalkan</a>
                                                        <a href="checkout.php?id-transaksi=<?php echo $id_transaksi_bb; ?>" class="btn btn-info mt-3">Rincian Pesanan</a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                            
                                        }
                                    }
                                    ?>
                            </div>

                            <!-- Dikemas -->
                            <div class="tabPanel">
                                <?php
                                    $sql_dikemas = "select id_transaksi from transaksi where id_user=$id_user and status='menunggu kirim'";
                                    $query_dikemas = mysqli_query($conn, $sql_dikemas);
                                    $data_dikemas_count = mysqli_num_rows($query_dikemas);
                                    if($data_dikemas_count == 0){
                                ?>
                                        <!-- Tidak Ada Transaksi -->
                                        <div class="item-trans-kosong text-center">
                                            <img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_shopping_list.png" alt="Tidak Ada Pesanan"><br>
                                            <span class="trans-kosong">Tidak Ada Pesanan</span>
                                        </div>
                                <?php
                                    }else{
                                        while($data_dikemas = mysqli_fetch_array($query_dikemas)){
                                            $id_transaksi_dikemas = $data_dikemas['id_transaksi'];
                                    ?>
                                            <!-- Transaksi -->
                                            <div class="item-trans">
                                                <div class="item-trans-atas">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <span class="id-transaksi">ID Transaksi: <?php echo $id_transaksi_dikemas; ?></span>
                                                        </div>
                                                        <div class="col text-right">
                                                            <span class="status">Sedang Diproses</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Detail transaksi -->
                                                <div class="item-trans-tengah">
                                                        <?php
                                                            $sql_detail_dikemas = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk inner join gambar on produk.id_produk = gambar.id_produk where id_transaksi=$id_transaksi_dikemas";
                                                            $query_detail_dikemas = mysqli_query($conn, $sql_detail_dikemas);
                                                            $total = 0;
                                                            while($data_detail_dikemas = mysqli_fetch_array($query_detail_dikemas)){
                                                                $total += ($data_detail_dikemas["harga"] * $data_detail_dikemas["jumlah"]);
                                                        ?>
                                                                <div class="item-trans-barang">  
                                                                    <div class="row">
                                                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">
                                                                            <img src="../<?php echo $data_detail_dikemas['lokasi_gambar']; ?>">
                                                                        </div>
                                                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 text-left">
                                                                            <span class="trans-nama"><?php echo $data_detail_dikemas["nama_barang"]; ?></span><br>
                                                                            <span class="trans-warna"><?php echo $data_detail_dikemas["warna"]; ?></span><br>
                                                                            <span class="trans-jumlah">Jumlah: <?php echo $data_detail_dikemas["jumlah"]; ?></span>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
                                                                            <span class="trans-harga">Rp <?php echo number_format($data_detail_dikemas["harga"], 0, "", "."); ?></span><br>
                                                                            <a href="detail.php?id-produk=<?php echo $data_detail_dikemas['id_produk']; ?>" class="btn btn-outline-dark btn-sm mt-4">Detail Produk</a>
                                                                        </div>
                                                                    </div>
                                                                </div>       
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                                <div class="item-trans-bawah text-right">
                                                    <span class="trans-total">Total: Rp <?php echo number_format($total, 0, "", "."); ?></span><br>
                                                    <a href="checkout.php?id-transaksi=<?php echo $id_transaksi_dikemas; ?>" class="btn btn-info mt-3">Rincian Pesanan</a>
                                                </div>
                                            </div>
                                    <?php
                                            
                                        }
                                    }
                                    ?>
                            </div>

                            <!-- Dikirim -->
                            <div class="tabPanel">
                                <?php
                                    $sql_dikirim = "select id_transaksi, resi from transaksi where id_user=$id_user and status='proses kirim'";
                                    $query_dikirim = mysqli_query($conn, $sql_dikirim);
                                    $data_dikirim_count = mysqli_num_rows($query_dikirim);
                                    if($data_dikirim_count == 0){
                                ?>
                                        <!-- Tidak Ada Transaksi -->
                                        <div class="item-trans-kosong text-center">
                                            <img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_shopping_list.png" alt="Tidak Ada Pesanan"><br>
                                            <span class="trans-kosong">Tidak Ada Pesanan</span>
                                        </div>
                                <?php
                                    }else{
                                        while($data_dikirim = mysqli_fetch_array($query_dikirim)){
                                            $id_transaksi_dikirim = $data_dikirim['id_transaksi'];
                                    ?>
                                            <!-- Transaksi -->
                                            <div class="item-trans">
                                                <div class="item-trans-atas">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <span class="id-transaksi">ID Transaksi: <?php echo $id_transaksi_dikirim; ?></span>
                                                        </div>
                                                        <div class="col text-right">
                                                            <span class="status">Sedang Dikirim</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Detail transaksi -->
                                                <div class="item-trans-tengah">
                                                        <?php
                                                            $sql_detail_dikirim = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk inner join gambar on produk.id_produk = gambar.id_produk where id_transaksi=$id_transaksi_dikirim";
                                                            $query_detail_dikirim = mysqli_query($conn, $sql_detail_dikirim);
                                                            $total = 0;
                                                            while($data_detail_dikirim = mysqli_fetch_array($query_detail_dikirim)){
                                                                $total += ($data_detail_dikirim["harga"] * $data_detail_dikirim["jumlah"]);
                                                        ?>
                                                                <div class="item-trans-barang">  
                                                                    <div class="row">
                                                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">
                                                                            <img src="../<?php echo $data_detail_dikirim['lokasi_gambar']; ?>">
                                                                        </div>
                                                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 text-left">
                                                                            <span class="trans-nama"><?php echo $data_detail_dikirim["nama_barang"]; ?></span><br>
                                                                            <span class="trans-warna"><?php echo $data_detail_dikirim["warna"]; ?></span><br>
                                                                            <span class="trans-jumlah">Jumlah: <?php echo $data_detail_dikirim["jumlah"]; ?></span>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
                                                                            <span class="trans-harga">Rp <?php echo number_format($data_detail_dikirim["harga"], 0, "", "."); ?></span><br>
                                                                            <a href="detail.php?id-produk=<?php echo $data_detail_dikirim['id_produk']; ?>" class="btn btn-outline-dark btn-sm mt-4">Detail Produk</a>
                                                                        </div>
                                                                    </div>
                                                                </div>       
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                                <div class="item-trans-bawah text-right">
                                                    <span class="trans-total">Total: Rp <?php echo number_format($total, 0, "", "."); ?></span><br>
                                                    <a href="#" class="btn btn-dark mt-3" disabled><?php echo $data_dikirim["resi"]; ?></a>
                                                    <a href="checkout.php?id-transaksi=<?php echo $id_transaksi_dikirim; ?>" class="btn btn-info mt-3">Rincian Pesanan</a>
                                                </div>
                                            </div>
                                    <?php
                                            
                                        }
                                    }
                                    ?>
                            </div>

                            <!-- Selesai -->
                            <div class="tabPanel">
                                <?php
                                    $sql_selesai = "select id_transaksi from transaksi where id_user=$id_user and status='selesai'";
                                    $query_selesai = mysqli_query($conn, $sql_selesai);
                                    $data_selesai_count = mysqli_num_rows($query_selesai);
                                    if($data_selesai_count == 0){
                                ?>
                                        <!-- Tidak Ada Transaksi -->
                                        <div class="item-trans-kosong text-center">
                                            <img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_shopping_list.png" alt="Tidak Ada Pesanan"><br>
                                            <span class="trans-kosong">Tidak Ada Pesanan</span>
                                        </div>
                                <?php
                                    }else{
                                        while($data_selesai = mysqli_fetch_array($query_selesai)){
                                            $id_transaksi_selesai = $data_selesai['id_transaksi'];
                                    ?>
                                            <!-- Transaksi -->
                                            <div class="item-trans">
                                                <div class="item-trans-atas">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <span class="id-transaksi">ID Transaksi: <?php echo $id_transaksi_selesai; ?></span>
                                                        </div>
                                                        <div class="col text-right">
                                                            <span class="status">Selesai</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Detail transaksi -->
                                                <div class="item-trans-tengah">
                                                        <?php
                                                            $sql_detail_selesai = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk inner join gambar on produk.id_produk = gambar.id_produk where id_transaksi=$id_transaksi_selesai";
                                                            $query_detail_selesai = mysqli_query($conn, $sql_detail_selesai);
                                                            $total = 0;
                                                            while($data_detail_selesai = mysqli_fetch_array($query_detail_selesai)){
                                                                $total += ($data_detail_selesai["harga"] * $data_detail_selesai["jumlah"]);
                                                        ?>
                                                                <div class="item-trans-barang">  
                                                                    <div class="row">
                                                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">
                                                                            <img src="../<?php echo $data_detail_selesai['lokasi_gambar']; ?>">
                                                                        </div>
                                                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 text-left">
                                                                            <span class="trans-nama"><?php echo $data_detail_selesai["nama_barang"]; ?></span><br>
                                                                            <span class="trans-warna"><?php echo $data_detail_selesai["warna"]; ?></span><br>
                                                                            <span class="trans-jumlah">Jumlah: <?php echo $data_detail_selesai["jumlah"]; ?></span>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
                                                                            <span class="trans-harga">Rp <?php echo number_format($data_detail_selesai["harga"], 0, "", "."); ?></span><br>
                                                                            <a href="detail.php?id-produk=<?php echo $data_detail_selesai['id_produk']; ?>" class="btn btn-outline-dark btn-sm mt-4">Detail Produk</a>
                                                                        </div>
                                                                    </div>
                                                                </div>       
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                                <div class="item-trans-bawah text-right">
                                                    <span class="trans-total">Total: Rp <?php echo number_format($total, 0, "", "."); ?></span><br>
                                                    <a href="checkout.php?id-transaksi=<?php echo $id_transaksi_selesai; ?>" class="btn btn-info mt-3">Rincian Pesanan</a>
                                                </div>
                                            </div>
                                    <?php
                                            
                                        }
                                    }
                                    ?>
                            </div>

                            <!-- Gagal -->
                            <div class="tabPanel">
                                <?php
                                    $sql_gagal = "select id_transaksi from transaksi where id_user=$id_user and status='gagal'";
                                    $query_gagal = mysqli_query($conn, $sql_gagal);
                                    $data_gagal_count = mysqli_num_rows($query_gagal);
                                    if($data_gagal_count == 0){
                                ?>
                                        <!-- Tidak Ada Transaksi -->
                                        <div class="item-trans-kosong text-center">
                                            <img src="https://raw.githubusercontent.com/monokuro49/Kelompok3_TIF19_C_WSI/master/web-project/images/hivaleeqa_shopping_list.png" alt="Tidak Ada Pesanan"><br>
                                            <span class="trans-kosong">Tidak Ada Pesanan</span>
                                        </div>
                                <?php
                                    }else{
                                        while($data_gagal = mysqli_fetch_array($query_gagal)){
                                            $id_transaksi_gagal = $data_gagal['id_transaksi'];
                                    ?>
                                            <!-- Transaksi -->
                                            <div class="item-trans">
                                                <div class="item-trans-atas">
                                                    <div class="row">
                                                        <div class="col text-left">
                                                            <span class="id-transaksi">ID Transaksi: <?php echo $id_transaksi_gagal; ?></span>
                                                        </div>
                                                        <div class="col text-right">
                                                            <span class="status">Menunggu Pembayaran</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Detail transaksi -->
                                                <div class="item-trans-tengah">
                                                        <?php
                                                            $sql_detail_gagal = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk inner join gambar on produk.id_produk = gambar.id_produk where id_transaksi=$id_transaksi_gagal";
                                                            $query_detail_gagal = mysqli_query($conn, $sql_detail_gagal);
                                                            $total = 0;
                                                            while($data_detail_gagal = mysqli_fetch_array($query_detail_gagal)){
                                                                $total += ($data_detail_gagal["harga"] * $data_detail_gagal["jumlah"]);
                                                        ?>
                                                                <div class="item-trans-barang">  
                                                                    <div class="row">
                                                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">
                                                                            <img src="../<?php echo $data_detail_gagal['lokasi_gambar']; ?>">
                                                                        </div>
                                                                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 text-left">
                                                                            <span class="trans-nama"><?php echo $data_detail_gagal["nama_barang"]; ?></span><br>
                                                                            <span class="trans-warna"><?php echo $data_detail_gagal["warna"]; ?></span><br>
                                                                            <span class="trans-jumlah">Jumlah: <?php echo $data_detail_gagal["jumlah"]; ?></span>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
                                                                            <span class="trans-harga">Rp <?php echo number_format($data_detail_gagal["harga"], 0, "", "."); ?></span><br>
                                                                            <a href="detail.php?id-produk=<?php echo $data_detail_gagal['id_produk']; ?>" class="btn btn-outline-dark btn-sm mt-4">Detail Produk</a>
                                                                        </div>
                                                                    </div>
                                                                </div>       
                                                        <?php
                                                            }
                                                        ?>
                                                </div>
                                                <div class="item-trans-bawah text-right">
                                                    <span class="trans-total">Total: Rp <?php echo number_format($total, 0, "", "."); ?></span><br>
                                                    <a href="checkout.php?id-transaksi=<?php echo $id_transaksi_gagal; ?>" class="btn btn-info mt-3">Rincian Pesanan</a>
                                                </div>
                                            </div>
                                    <?php
                                            
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script>
        var tabButttons = document.querySelectorAll(".tabContainer .buttonContainer button");
        var tabPanels = document.querySelectorAll(".tabContainer .tabPanel");

        function showPanel(panelIndex,colorCode) {
            tabButttons.forEach(function(node) {
                node.style.backgroundColor="";
                node.style.color="";
                node.style.borderBottom="";
                node.style.borderColor="";
            });
            tabButttons[panelIndex].style.backgroundColor="white";
            tabButttons[panelIndex].style.color=colorCode;
            tabButttons[panelIndex].style.borderBottom="medium solid";
            tabButttons[panelIndex].style.borderColor=colorCode;
            tabPanels.forEach(function(node) {
                node.style.display="none";
            });
            tabPanels[panelIndex].style.display="block";
        }

        showPanel(0,'#007bff');
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>