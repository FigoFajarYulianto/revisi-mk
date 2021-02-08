    <?php
      include "sidebar.php";
      require_once "connection.php";

      if($_GET["status"] == "edit"){
        // Code here
        $title = "Edit Produk";

        $id_produk = $_GET["id_produk"];
        $sql = "select * from tb_produk where id_produk='$id_produk'";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);

        $nama_produk= $data["nama_produk"];
        $id_kategori = $data["id_kategori"];
        $harga = $data["harga"];
        $stok = $data["stok"];
        $id_satuan = $data["id_satuan"];
        $map_link = $data["map_link"];
        $gbr = $data["gbr_produk"];
        $deskripsi = $data["deskripsi_produk"];
        
      }else{
        // Code here
        $title = "Tambah Produk";

        $id_produk = "";
        $id_kategori = "";
        $nama_barang = "";
        $warna = "";
        $bahan = "";
        $harga = "";
        $stok = "";
        $keterangan = "";
        $best_seller = "";

        $panjang = "";
        $lebar_dada = "";

        $gambar = "";
      }
      $status = $_GET["status"];
      
    ?>
    <!-- Icon Title -->

    <div class="container-fluid">
        <div class="card my-4">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h2>Ubah Produk</h2>

                <?php





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



                <form
                    action="edit-produk-process.php?status=<?php echo $status; if($id_produk !='')echo '&id_produk=' .$id_produk; ?>"
                    method="POST" enctype="multipart/form-data">

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

                        <img src="../produk2/produk2/assets/img/produk/<?php echo $data['gbr_produk']; ?>" width="100">

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


?>