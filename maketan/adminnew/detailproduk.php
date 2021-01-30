<?php  
$id_produk=$_GET["id"];

$ambil=$koneksi->query("SELECT*FROM tb_produk LEFT JOIN kategori ON tb_produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk=$ambil->fetch_assoc();

$fotoproduk=array();
$ambilfoto=$koneksi->query("SELECT*FROM tb_produk WHERE id_produk='$id_produk'");
WHILE($tiap=$ambilfoto->fetch_assoc())
{
	$fotoproduk[]=$tiap;
}

?>

<table class="table table bordered">
    <tbody>
        <tr>
            <th>Kategori</th>
            <th>: <?php echo $detailproduk["nama_kategori"] ?></th>
        </tr>
        <tr>
            <th>Produk</th>
            <th>: <?php echo $detailproduk["nama_produk"] ?></th>
        </tr>
        <tr>
            <th>Harga</th>
            <th>: Rp. <?php echo number_format($detailproduk["harga"] );?></th>
        </tr>
        <tr>
            <th>Lokasi</th>
            <th>: <?php echo $detailproduk["map_link"]; ?></th>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <th>: <?php echo $detailproduk["deskripsi_produk"] ?></th>
        </tr>
        <th>Gambar</th>
        <th>:
            <img src="../produk2/produk2/assets/img/produk/<?php echo $detailproduk['gbr_produk'];?>" width="350">
        </th>

    </tbody>
</table>