<?php
    session_start();
    require_once "koneksi.php";
    
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
            margin-top: 7rem !important;
            margin-bottom: 10rem !important;
        }
        .thanks {
            font-size: 30px;
        }
        .table > tbody > tr > td {
            vertical-align: middle;
        }
        .total {
            font-size: 24px;
            font-weight: bold;
        }
    </style>

    <title>Checkout</title>
  </head>
  <body>
   
    <div class="container marg">
        <div class="card mb-4">
            <div class="card-body thanks">
                Terimakasih Telah Berbelanja di Hi Valeeqa!
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <!-- Alamat Pengiriman -->
                <div class="card">
                    <div class="card-header">
                        <h3>Alamat Pengiriman</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <?php
                                    $id_user = $_SESSION["user_id"];
                                    $sql = "SELECT * FROM user where user_id=$id_user";
                                    $query = mysqli_query($koneksi, $sql);
                                    $data = mysqli_fetch_array($query);
                                
                                ?>
                                <tr>
                                    <td width="20%">Nama</td>
                                    <td><?php echo $data["user_nama"];  ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $data["user_email"];  ?></td>
                                </tr>
                                <tr>
                                    <td>No. Hp</td>
                                    <td><?php echo $data["user_telepon"];  ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $data["user_alamat"];  ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Rincian Pesanan -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Rincian Pesanan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <?php
                                if(isset($_GET["id-transaksi"])){
                                    $id_transaksi = $_GET["id-transaksi"];
                                    $rincian_query = mysqli_query($koneksi, "select jenis_pengiriman, jenis_pembayaran, tabungan from transaksi where id_transaksi=$id_transaksi");
                                    $data_rincian = mysqli_fetch_array($rincian_query);

                                    $jenis_pembayaran = $data_rincian["jenis_pembayaran"];
                                    $jenis_pengiriman = $data_rincian["jenis_pengiriman"];
                                }else{
                                    if(isset($_POST["jenis-pembayaran"])){
                                        $jenis_pembayaran = $_POST["jenis-pembayaran"];
                                    }else{
                                        echo "<script>location.href = 'cart.php?status=pembayaran'</script>";
                                    }

                                    if(isset($_POST["jenis-pengiriman"])){
                                        $jenis_pengiriman = $_POST["jenis-pengiriman"];
                                    }else{
                                        echo "<script>location.href = 'cart.php?status=pengiriman'</script>";
                                    }
                                }
                                
                            
                            ?>
                            <!-- Pengiriman -->
                            <table class="table table-bordered">
                                <thead class="thead-dark"><th colspan="2">Pembayaran</th></thead>
                                <tr>
                                    <td width="30%">Jenis Pembayaran:</td>
                                    <td class="text-right"><?php echo $jenis_pembayaran; ?></td>
                                </tr>
                                <?php
                                    if($jenis_pembayaran == "tabungan" and isset($_GET["id-transaksi"])){
                                ?>
                                        <tr>
                                            <td width="30%">Tabungan Saat Ini:</td>
                                            <td class="text-right">Rp <?php echo number_format($data_rincian["tabungan"], 0, "", "."); ?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </table>
                            <!-- Pengiriman -->
                            <table class="table table-bordered">
                                <thead class="thead-dark"><th colspan="2">Pengiriman</th></thead>
                                <tr>
                                    <td width="30%">Jenis Pengiriman:</td>
                                    <td class="text-right"><?php echo $jenis_pengiriman; ?></td>
                                </tr>
                                <tr>
                                    <td width="30%">Biaya Pengiriman:</td>
                                    <?php $ongkir = $jenis_pengiriman == "cod" ? 0 : 20000; ?>
                                    <td class="text-right">Rp <?php echo number_format($ongkir, 0, "", "."); ?></td>
                                </tr>
                            </table>

                            <!-- Pesanan -->
                            <?php
                                if(isset($_GET["id-transaksi"])){
                                    $id_transaksi = $_GET["id-transaksi"];
                                    $sql = "SELECT * FROM detail_transaksi inner join tb_produk on detail_transaksi.id_produk = tb_produk.id_produk where id_transaksi=$id_transaksi";

                                }else{
                                    $sql = "SELECT * FROM cart inner join tb_produk on cart.id_produk = tb_produk.id_produk  where user_id=$id_user";
                                }
                                $query2 = mysqli_query($koneksi, $sql);
                                $count = mysqli_num_rows($query2);
                                $total = 0;
                                if($count < 1){
                                    echo "<h1>Checkout Kosong</h1>";
                                }else{
                                    $nomor = 1;
                                    $total = 0;
                                    while($data2 = mysqli_fetch_array($query2)){
                            
                                    
                            ?>
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th colspan="3">Pesanan <?php echo $nomor; ?></th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td rowspan="4" width="20%"><img src="produk2/produk2/assets/img/produk/<?php echo $data2["gbr_produk"]; ?>" class="w-100"></td>
                                            <td width="20%">Nama Barang</td>
                                            <td><?php echo $data2["nama_produk"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Warna</td>
                                            <td><?php echo $data2["warna"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td><?php echo $data2["jumlah"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>Rp <?php echo number_format($data2["harga"], 0, "", "."); ?></td>
                                        </tr>
                                    </table>
                            <?php
                                        $hitung = $data2["harga"] * $data2["jumlah"];
                                        $total += $hitung;
                                        $nomor++;
                                    }
                                        $grand_total = $total + $ongkir;
                                }
                                        
                            ?>
                            <!-- Total -->
                            <table class="table mt-2">
                                <tr>
                                    <td class="total text-left">Total:</td>
                                    <td class="total text-right">Rp <?php echo isset($grand_total) ? number_format($grand_total, 0, "", ".") : 0; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <?php
                    if(!isset($_GET["id-transaksi"])){
                ?>
                        <!-- Lanjutkan -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>Lanjutkan</h3>
                            </div>
                            <div class="card-body">
                                <form action="checkout-process.php" method="POST">
                                    Jika telah yakin dengan pesanan silahkan lanjutkan pembayaran.
                                    <input type="hidden" name="jenis-pembayaran" value="<?php echo $jenis_pembayaran; ?>">
                                    <input type="hidden" name="jenis-pengiriman" value="<?php echo $jenis_pengiriman; ?>">
                                    <input type="hidden" name="total" value="<?php echo $grand_total; ?>">
                                    <center><button type="submit" class="btn btn-success mt-sm-3">Lanjutkan Pembayaran ></button></center>
                                </form>
                            </div>
                        </div>
                <?php
                    }else{
                ?>
                        <!-- Transfer -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>Transfer</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                    $sql_wa = "select * from rekening";
                                    $query_wa = mysqli_query($koneksi, $sql_wa);
                                    $data_wa = mysqli_fetch_array($query_wa);
                                ?>
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <tr>
                                            <td>Bank Tujuan</td>
                                            <td><?php echo $data_wa["bank"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Atas Nama</td>
                                            <td><?php echo $data_wa["nama"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Rekening</td>
                                            <td><?php echo $data_wa["rekening"]; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Konfirmasi -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3>Konfirmasi</h3>
                            </div>
                            <div class="card-body">
                                Konfirmasi pembayaran dengan mengirim foto struk transfer. <br>
                                <!-- <a href="https://wa.me/<?php //echo $data_wa['user_telepon'];?>text=Halo%20Hi%20Valeeqa,%20saya%20<?php// echo $data['user_nama']; ?>%20mengonfirmasi%20pembayaran%20untuk%20Kode%20Transaksi%20<?php //echo $id_transaksi; ?>.%20Terima%20kasih%20^^" class="btn btn-success w-100 mt-4">Konfirmasi Bukti Transfer</a> -->
                                <form method="post" enctype="multipart/form-data">
                                <input type="file" class="form-control" name="foto" required="required" oninvalid="this.setCustomValidity('silahkan masukkan foto Produk.')" oninput="setCustomValidity('')">
                                <button class="btn btn-primary" name="save">simpan</button>
                                </form>
                            </div>
                        </div>
                        <?php

		if (isset ($_POST['save']))

		{
            $id_user = $_SESSION["user_id"];
			$namanamafoto = $_FILES['foto']['name'];

			$lokasilokasifoto =$_FILES['foto']['tmp_name'];

			move_uploaded_file($lokasilokasifoto, "gambar_transaksi/".$namanamafoto);

			$koneksi->query("INSERT INTO bukti_transaksi

				(user_id,gambar_transaksi)

				VALUES('$id_user','$namanamafoto')");

			

		

		

	echo "<div class='alert alert-info'>DATA TERSIMPAN</div>";

    echo "<meta http-equiv='refresh' content='1;url=checkout.php?id-transaksi'>";



	

	}



		?>
                <?php
                    }
                ?>       
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>