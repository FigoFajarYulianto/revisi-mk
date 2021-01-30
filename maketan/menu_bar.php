<?php
include 'koneksi.php'; 
$semuadata=array();
// $ambil = $koneksi->query("SELECT * FROM tb_produk  JOIN kategori ON tb_produk.id_kategori=kategori.id_kategori"); 
$ambil1 = $koneksi->query("SELECT * FROM tb_produk WHERE user_id LIKE '$_SESSION[user_id]'");
while($pecah = $ambil1->fetch_assoc())
{
    $semuadata[]=$pecah;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title>Document</title>
</head>
    <div class="isi">
            <div class="wrapper">
            <div class="row" style="margin-right:-325px; margin-left:190px; margin-top: -40px;">
                <?php foreach ($semuadata as $key => $value): ?>
                <div class="card">
                    <img src="produk2/assets/img/produk/<?php echo $value['gbr_produk'] ?>" alt="" class="img-responsive">
                    <div class="content">
                        <div class="row">
                            <div class="details">
                            <span><?php echo $value['nama_produk'] ?></span>
                            <p><?php echo $value['map_link'] ?></p>
                            </div>
                        </div>
                        <div class="price">Rp.<?php echo $value['harga'] ?></div>
                        <hr id="hrdown" style="height:1px;border:none;color:#333;background-color:#333;">
                        <div class="buttons">
                            <button>Chat</button>
                            <button>Detail</button>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            </div>
        </div>

        <div class="row mx-0 mt-5 justify-content-center">
        <button class="btn btn-green"> Tampilkan Lebih banyak</button>
        </div>
        </div>
    </div>
</html>