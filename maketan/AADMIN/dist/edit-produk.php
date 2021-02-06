    <?php
      include "sidebar.php";
      require_once "connection.php";
      
    ?>
    <!-- Icon Title -->

    <div class="container-fluid">
        <div class="card my-4">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h2>Ubah Produk</h2>

                <?php

$id_produk = $_GET["id_produk"];
        $sql = "SELECT * FROM tb_produk inner join kategori on tb_produk.id_kategori = kategori.id_kategori inner join satuan on tb_produk.id_satuan = satuan.id_satuan where tb_produk.id_produk='$id_produk'";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);



$datakategori=array();

$ambil=$koneksi->query("SELECT * FROM kategori");

while($tiap=$ambil->fetch_assoc())

{

    $datakategori[]=$tiap;

}

?>

                <?php 

$datasatuan=array();

$satuan= $koneksi->query("SELECT * FROM satuan");

while($satuanbarang=$satuan->fetch_assoc())

{

	$datasatuan[]=$satuanbarang;

}

?>



                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nama Produk</label>

                        <input type="text" name="nama" class="form-control" required
                            oninvalid="this.setCustomValidity('silahkan masukkan nama produk.')"
                            oninput="setCustomValidity('')" value="<?php echo $data['nama_produk']; ?>">

                    </div>

                    <div class="form-group">

                        <label>Kategori</label>

                        <select class="form-control" name="id_kategori" required
                            oninvalid="this.setCustomValidity('silahkan isi kategori.')"
                            oninput="setCustomValidity('')">

                            <option value="">Pilih Kategori</option>

                            <?php foreach ($datakategori as $key => $value): ?>



                            <option value="<?php echo $value["id_kategori"] ?>"
                                <?php if($data["id_kategori"]==$value["id_kategori"]) {echo "selected";}?>>

                                <?php echo $value["nama_kategori"] ?></option>



                            <?php endforeach ?>

                        </select>

                    </div>



                    <div class="form-group">

                        <label>Harga Rp</label>

                        <input type="number" name="harga_produk" class="form-control" min="1" max="99999999999" required
                            value="<?php echo $data['harga']; ?>">

                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input maxlength="5" required type="number" min="1" name="stok" id="stok" class="form-control"
                            required value="<?php echo $data['stok']; ?>">
                    </div>

                    <div class="form-group">

                        <label>Satuan</label>

                        <select class="form-control" name="id_satuan" required
                            oninvalid="this.setCustomValidity('silahkan isi satuan.')" oninput="setCustomValidity('')">

                            <option value="">Pilih Satuan</option>

                            <?php foreach ($datasatuan as $key => $value): ?>



                            <option value="<?php echo $value["id_satuan"] ?>"
                                <?php if($data["id_satuan"]==$value["id_satuan"]) {echo "selected";}?>>

                                <?php echo $value["nama_satuan"] ?></option>



                            <?php endforeach ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>Map Lokasi Toko</label>

                        <input type="text" name="map" class="form-control" required
                            oninvalid="this.setCustomValidity('silahkan masukkan alamat produk.')"
                            oninput="setCustomValidity('')" value="<?php echo $data['map_link']; ?>">

                    </div>

                    <div class="form-group">

                        <img src="../produk2/produk2/assets/img/produk/<?php echo $data['gbr_produk'] ?>" width="100">

                    </div>

                    <div class="form-group">

                        <label>Ganti Foto</label>

                        <input type="file" name="foto" class="form-control">

                    </div>

                    <div class="form-group">

                        <label>Deskripsi</label>

                        <textarea class="form-control" name="deskripsi" id="deskripsi"
                            rows="10"> <?php echo $data['deskripsi_produk'];?></textarea>

                        <script>
                        CKEDITOR.replace('deskripsi');
                        </script>

                    </div>

                    <button class="btn btn-primary" name="ubah">Ubah</button>

                </form>



                <?php

if (isset($_POST['ubah']))

{

    $namafoto=$_FILES['foto'] ['name']; 

    $lokasifoto = $_FILES['foto'] ['tmp_name'];

    //jika foto dirubah

    if (!empty($lokasifoto))

    {

        move_uploaded_file($lokasifoto, "../produk2/produk2/assets/img/produk/$namafoto");



        $koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]',

        id_kategori='$_POST[id_kategori]',harga='$_POST[harga_produk]',stok='$_POST[stok]', id_satuan='$_POST[id_satuan]',map_link='$_POST[map]',

        gbr_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]'

        WHERE id_produk='$_GET[id]'");

    }

    else

    {

      $koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]',

      id_kategori='$_POST[id_kategori]',harga='$_POST[harga_produk]',stok='$_POST[stok]',id_satuan='$_POST[id_satuan]',map_link='$_POST[map]',

      deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");


    }

    echo "<script>alert('data produk telah diubah' );</script>";

    echo "<script>location='data-produk.php';</script>";



}

?>