<?php 
$koneksi = new mysqli("localhost", "root", "", "project_chat"); ?>

<?php
$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'"); 
while($pecah = $ambil->fetch_assoc())
{
    $semuadata[] = $pecah;
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <h3>Hasil Pencarian : <?php echo $keyword ?></h3>

        <?php if(empty($semuadata)): ?>
        <div class="alert alert-danger"><?php echo $keyword ?> Pencarian Tidak Ditemukan</div>
        <?php endif ?>

        <div class="row">

            <?php foreach ($semuadata as $key => $value) : ?>

            <tbody>
                <?php $nomor=1; ?>
                <?php 
        $ambil=$koneksi->query("SELECT * FROM tb_produk"); ?>
                <?php while ($pecah = $ambil->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $value['nama_produk'];?></td>
                    <td><?php echo $value['kategori'];?></td>
                    <td><?php echo $value['deskripsi_produk'];?></td>
                    <td><?php echo $value['harga'];?></td>
                    <td><?php echo $value['map_link'];?></td>
                    <td>
                        <img src="../produk2/assets/img/produk/<?php echo $value['gbr_produk'];?>" width="100">
                    </td>
                    <td>

                        <a href="admin.php?halaman=hapusproduk&id=<?php echo $value['id_produk'];?>"
                            class="btn-danger btn" style="font-size: 1.5rem;">Hapus</a>
                        <a href="admin.php?halaman=ubahproduk&id=<?php echo $value['id_produk'];?>"
                            class=" btn btn-warning"
                            style="font-size: 1.5rem; margin-top:15px; padding-right:20px;">Ubah</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
            <?php endforeach ?>
        </div>
    </div>

</body>

</html>