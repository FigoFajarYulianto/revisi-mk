<h2 style="margin-top:-18px; border-bottom: 3px solid;">DATA PENGGUNA</h2>
<?php
$koneksi = new mysqli("localhost", "root", "", "project_chat");

error_reporting(0);


if(!isset($_SESSION['login'])) {
    header("location: login.php");
    exit;
}


//konfigurasi paage


/*$jumlahData = count (query("SELECT * FROM user"));

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;

$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;*/


//$batas = 6;
//$ambil= mysqli_query($koneksi, "SELECT * FROM user");
//$jum = mysqli_num_rows($ambil);

//$halaman = ceil($jum / $batas);

//$page =  (isset($_GET["page"]))  ? $_GET["page"] : 1;


//$posisi = ( $page - 1 ) * $batas;



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
            <th>No</th>
            <th>Email</th>
            <th>Nama Pengguna</th>
            <th>Foto Pengguna</th>
            <th>Aksi</th>

        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php
        $query = $_POST['query'];
            if($query != ''){
                $ambil = $koneksi->query("SELECT * FROM user WHERE user_nama LIKE '%" .$query. "%' OR user_email LIKE '%" .$query. "%' ");
            }else{
               $ambil=$koneksi->query("SELECT * FROM user");
        }
        if(mysqli_num_rows($ambil)){
        while($pecah=$ambil->fetch_assoc()) {
        ?>

        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['user_email']; ?></td>
            <td><?php echo $pecah['user_nama']; ?></td>
            <td>
                <img src="../gambar/user/<?php echo $pecah['user_foto'];?>" width="100">
            </td>
            <td>
                <a href="admin.php?halaman=hapuspengguna&id=<?php echo $pecah['user_id'];?>" class="btn btn-danger"
                    style="left:20px">HAPUS</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php }}else{
            echo '<tr>
                <td colspan="4"><Tidak ada produk yang dimaksudkan></td>
        </tr>';
        }

        ?>
    </tbody>
</table>
<!-- navigasi -->

<div class="paging">
    <?php
//for($x=1; $x<=$halaman; $x++){
    ?>
    <!--    <a <?php // if($x==$page){echo"class='active'";} ?> href="?pengguna.php= <?php// echo $x; ?>">
        <?php //echo $x; ?>
    </a>
    <?php
  //  }
?>


</div>