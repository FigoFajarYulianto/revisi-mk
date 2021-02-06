<h2 style="margin-top:1px; border-bottom: 3px solid;">PRODUK</h2>



<?php



if(!isset($_SESSION['login'])) {

    header("location: login.php");

    exit;

}



?>



<table class="table table-bordered" id="table">

    <thead>

        <tr>

            <th>NO</th>

            <th>NAMA PRODUK</th>

            <th>KATEGORI</th>

            <th>DESKRIPSI</th>

            <th>HARGA</th>

            <th>STOK</th>

            <th>SATUAN</th>

            <th>MAP LINK</th>

            <th>GAMBAR</th>

            <th>AKSI</th>

        </tr>

    </thead>

    <tbody>

        <?php $nomor=1;?>

        <?php $ambil=$koneksi->query("SELECT * FROM tb_produk LEFT JOIN kategori ON tb_produk.id_kategori=kategori.id_kategori JOIN satuan ON tb_produk.id_satuan=satuan.id_satuan"); ?>

        <?php while($pecah=$ambil->fetch_assoc()){?>

        <tr>

            <td><?php echo $nomor;?></td>

            <td><?php echo $pecah['nama_produk']?></td>

            <td><?php echo $pecah['nama_kategori']?></td>

            <td><?php echo $pecah['deskripsi_produk']?></td>

            <td><?php echo ($pecah['harga'])?></td>

            <td><?php echo ($pecah['stok'])?></td>

            <td><?php echo $pecah['nama_satuan']?></td>

            <td><?php echo $pecah['map_link']?></td>

            <td>

                <img src="../produk2/produk2/assets/img/produk/<?php echo $pecah['gbr_produk'];?>" width="100">

            </td>



            <td>

                <a href="admin.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-danger"
                    onclick="return confirm('Yakin Mau di Hapus?')"><i class="lyphicon glyphicon-trash"></i>Hapus</a>

                <a href="admin.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning"><i
                        class="lyphicon glyphicon-edit"></i>Ubah</a>

                <a href="admin.php?halaman=detailproduk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-info"><i
                        class="glyphicon glyphicon-eye">Detail</a>

            </td>

        </tr>

        <?php $nomor++;?>

        <?php }?>

    </tbody>

</table>

<a href="admin.php?halaman=tambahproduk" class="btn btn-primary">Tambah Produk</a>