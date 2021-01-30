<h2 style="margin-top:-18px; border-bottom: 3px solid;">DATA TOKO</h2>

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
            <th>NAMA TOKO</th>
            <th>LINK TOKO</th>
            <th>KOTA</th>
            <th>KODE POS</th>
            <th>LINK MAP</th>
            <th>AKSI</th>

        </tr>
    </thead>

    <tbody>
        <?php $nomor=1; ?>
        <?php
        $query = $_POST['query'];
            if($query != ''){
                $ambil = $koneksi->query("SELECT * FROM buka_toko WHERE nama_toko LIKE '%" .$query. "%' OR kota LIKE '%" .$query. "%' ");
            }else{
               $ambil=$koneksi->query("SELECT * FROM buka_toko");
        }
        if(mysqli_num_rows($ambil)){
        while($pecah=$ambil->fetch_assoc()) {
        ?>





        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_toko']; ?></td>
            <td><?php echo $pecah['link_toko']; ?></td>
            <td><?php echo $pecah['kota']; ?></td>
            <td><?php echo $pecah['kode_pos']; ?></td>
            <td><?php echo $pecah['link_map']; ?></td>
            <td>
                <a href="admin.php?halaman=hapustoko&id=<?php echo $pecah['id'];?>" class=" btn btn-danger">hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php }}else{
            echo '<tr><td colspan="7"><Tidak ada produk yang dimaksudkan></td></tr>';
        }

        ?>
    </tbody>
</table>