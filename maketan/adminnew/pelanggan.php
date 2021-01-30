<h2 style="margin-top:1px; border-bottom: 3px solid;">PENGGUNA</h2>
<?php

if(!isset($_SESSION['login'])) {
    header("location: login.php");
    exit;
}

?>

<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Nama Pengguna</th>
            <th>Nomor Telepon</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil= $koneksi->query("SELECT * FROM user");?>
        <?php while($pecah=$ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['user_email']?></td>
            <td><?php echo $pecah['user_nama']?></td>
            <td><?php echo $pecah['user_telepon']?></td>
            <td>
                <img src="../gambar/user/<?php echo $pecah['user_foto'];?>" width="100">
            </td>
            <td>
                <a href="admin.php?halaman=hapuspelanggan&id=<?php echo $pecah['user_id'] ?>"
                    class="btn btn-danger">Hapus</a>

            </td>
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>