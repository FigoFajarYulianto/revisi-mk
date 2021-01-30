<h2 style="margin-top:-18px; border-bottom: 3px solid;">DATA PRODUK</h2>
<?php
$koneksi = new mysqli("localhost", "root", "", "project_chat");

error_reporting(0);

if(!isset($_SESSION['login'])) {
    header("location: login.php");
    exit;
}
?>

<div style="margin-bottom: 15px;" align="right">
    <form action="" method="POST" class="navbar-form navbar-right">
        <input type="text" class="form-control" name="query" placeholder="Cari produk..."
            style="width: 200px; padding:5px;" />
        <input type="submit" name="cari" value="search" style="padding: 3px;" />
    </form>
</div>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA PRODUK</th>
            <th>KATEGORI</th>
            <th>DESKRIPSI</th>
            <th>HARGA</th>
            <th>MAP LINK</th>
            <th>GAMBAR</th>
            <th>AKSI</th>

        </tr>
    </thead>
    <tbody>
        <!-- pagenation -->





        <!-- pencarian -->
        <?php $nomor=1; ?>
        <?php
        $perpage = 2;

        $ambil=$koneksi->query("SELECT * FROM tb_produk");
        while($baris = mysqli_fetch_array($ambil)){

        $query = $_POST['query'];
            if($query != ''){
                $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE nama_produk LIKE '%" .$query. "%' OR kategori LIKE '%" .$query. "%' ");
            }else{
               $ambil=$koneksi->query("SELECT * FROM tb_produk");
        }
        if(mysqli_num_rows($ambil)){
        while($pecah=$ambil->fetch_assoc()) {
        ?>




        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk'];?></td>
            <td><?php echo $pecah['kategori'];?></td>
            <td><?php echo $pecah['deskripsi_produk'];?></td>
            <td><?php echo $pecah['harga'];?></td>
            <td><?php echo $pecah['map_link'];?></td>
            <td>
                <img src="../produk2/assets/img/produk/<?php echo $pecah['gbr_produk'];?>" width="100">
            </td>
            <td>

                <a href="admin.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn"
                    style="font-size: 1.5rem;">Hapus</a>
                <a href="admin.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'];?>" class=" btn btn-warning"
                    style="font-size: 1.5rem; margin-top:15px; padding-right:20px;">Ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?>

        <?php }} else{
            echo '<tr>
                <td colspan="8"><Tidak ada produk yang dimaksudkan></td>
        </tr>';
     


        }
    
        ?>
        <?php } ?>


    </tbody>

</table>
<?php 
   $ambil=$koneksi->query("SELECT * FROM tb_produk");
   $jmlBaris = mysqli_num_rows($ambil);
   $halaman = ceil($jmlBaris/$perpage);
for($i= 1; $i<=$halaman; $i++){
    echo "<a href='?page=$i'>$i</a>";
}

?>