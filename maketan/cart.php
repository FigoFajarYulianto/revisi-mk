<?php
session_start();
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
    <script src="cart.js" async></script>
    <style>
        .marg {
            margin-top: 10rem !important;
        }
        .item-produk {
            padding-bottom: 20px;
            margin-bottom: 30px;
            border-bottom: 1px solid #eeeeee;
        }
        .item-harga {
            font-size: 16px;
            font-weight: bold;
        }
        .item-judul {
            font-size: 25px;
            font-weight: bold;
        }
    </style>
  </head>
  <body>


    <div class="container mb-5 marg">
        <div class="row">
            <!-- Grid Item -->
            <div class="col-lg-8">
                
                <div class="card">
                    <div class="card-header"><h3>Keranjang</h3></div>
                    <div class="card-body px-4 item-body">
                        <?php
                            // Status ketika barang ditambahkan
                            if(isset($_GET["status"])){
                                $status = $_GET["status"];
                                if($status == "exist"){
                        ?>
                                    <div class="alert alert-danger">Tambah barang gagal! Barang sudah ditambahkan sebelumnya.</div>
                        <?php
                                }elseif ($status == "success") {
                        ?>
                        
                                    <div class="alert alert-success">Barang berhasil ditambahkan!</div>
                        <?php
                                }elseif ($status == "minus") {
                        ?>
                                    <div class="alert alert-danger">Jumlah tidak boleh minus!</div>
                        <?php
                                }elseif ($status == "unavailable") {
                        ?>
                                    <div class="alert alert-danger">Jumlah melebihi stok!</div>
                        <?php
                                }elseif ($status == "pembayaran"){
                        ?>
                                    <div class="alert alert-danger">Harap masukkan jenis pembayaran!</div>
                        <?php
                                }elseif ($status == "pengiriman"){
                        ?>
                                    <div class="alert alert-danger">Harap masukkan jenis pengiriman!</div>
                        <?php
                                }elseif($status == "stok"){
                                    $brg = $_GET["barang"];
                        ?>
                                    <div class="alert alert-danger">Jumlah pesanan untuk <strong><?php echo $brg; ?></strong> melebihi stok yang tersedia, harap melakukan pemesanan ulang!</div>
                        <?php
                                }
                            }
                        ?>
                        <?php
                            require_once "koneksi.php";
                            $id_user = $_SESSION["user_id"];
                            $sql = "SELECT * FROM cart inner join tb_produk on cart.id_produk = tb_produk.id_produk where user_id=$id_user";
                            $query = mysqli_query($koneksi, $sql);
                            $count = mysqli_num_rows($query);
                            $total = 0;
                            if($count < 1){
                                echo "<h1>Keranjang Belanja Kosong</h1>";
                            }else{
                                while($data = mysqli_fetch_array($query)){  
                        ?>
                                        <div class="row item-produk">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <img src="produk2/produk2/assets/img/produk/<?php echo $data['gbr_produk'];?>" alt="Gambar" class="w-100">
                                                </div>
                                                <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                                    <span class="item-judul"><?php echo $data["nama_produk"]; ?></span><br>
                                                    <!-- <span class="item-warna"><?php //echo $data["warna"]; ?></span><br> -->
                                                    <span class="item-warna">Jumlah: <?php echo $data["jumlah"]; ?></span><br><br>
                                                    <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $data["id_produk"]; ?>" class="form-control w-25 mt-auto text-center item-input">
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-right">
                                                    <a href="hapus-cart.php?id-produk=<?php echo $data['id_produk']; ?>" class="btn btn-danger mb-2" style="color: white">Hapus</a>
                                                    <div class="mt-sm-5">
                                                        <span class="item-harga">Rp <?php echo number_format($data["harga"], 0, "", "."); ?></span>
                                                    </div>
                                                </div>

                                            
                                        </div>
                        <?php       
                                    $hitung = $data["harga"] * $data["jumlah"];
                                    $total += $hitung;
                                }
                            }
                        ?>
                       
                    </div>
                </div>
            </div>

            <!-- Grid Pembayaran -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header text-center"><h3>Pembayaran</h3></div>
                    <div class="card-body">
                        <form action="checkout.php" method="POST">
                            <div class="table-responsive-sm">
                                <!-- Total -->
                                <table class="table">
                                    <tr>
                                        <td>Total Produk:</td>
                                        <td class="text-right"><span class="item-total">Rp <?php echo number_format($total, 0, "", "."); ?></span></td>
                                    </tr>
                                </table>
                                <!-- Pengiriman -->
                                <table class="table mt-4">
                                    <thead class="thead-dark"><th>Jenis Pengiriman</th></thead>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="kirimKurir" name="jenis-pengiriman" value="kurir" class="custom-control-input">
                                                <label class="custom-control-label" for="kirimKurir">Kurir</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="kirimCOD" name="jenis-pengiriman" value="cod" class="custom-control-input">
                                                <label class="custom-control-label" for="kirimCOD">COD</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <!-- Jenis Pembayaran -->
                                <table class="table mt-4">
                                    <thead class="thead-dark">
                                        <th>Jenis Pembayaran</th>
                                    </thead>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="bayarCash" name="jenis-pembayaran" value="cash" class="custom-control-input">
                                                <label class="custom-control-label" for="bayarCash">Cash</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="bayarNabung" name="jenis-pembayaran" value="tabungan" class="custom-control-input">
                                                <label class="custom-control-label" for="bayarNabung">Tabungan</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <!-- <h4>Jenis Pembayaran</h4>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="bayarCash" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="bayarCash">Cash</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="bayarNabung" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="bayarNabung">Tabungan</label>
                        </div> -->
                            <center><button type="submit" class="btn btn-dark btn-lg">Checkout</button></center>
                        </form>
                    </div>
                </div>
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