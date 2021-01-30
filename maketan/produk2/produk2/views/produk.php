<?php
include "models/m_produk.php";
$produk = new Produk($connection);

if(@$_GET['act'] == '') {
?>
<div class="row">
          <div class="col-lg-12">
            <h1 style="padding-top: 10px; font-size: 6rem;"><small>Data Produk</small></h1>
            <!-- <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Produk</a></li>
              </ol> -->
          </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi Produk</th>
                            <th>Harga</th>
                            <th>Map Link</th>
                            <th>Gambar Produk</th>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $tampil = $produk->tampil();
                        while($data = $tampil->fetch_object()) {
                        ?>
                       <tr>
                           <td align="center"><?php echo $no++."."; ?></td>
                           <td><?php echo $data->nama_produk; ?></td>
                           <td><?php echo $data->kategori; ?></td>
                           <td><?php echo $data->deskripsi_produk; ?></td>
                           <td><?php echo $data->harga; ?></td>
                           <td><?php echo $data->map_link; ?></td>
                           <td align="center">
                               <img src="assets/img/produk/<?php echo $data->gbr_produk; ?>" width="100px">
                            </td>
                           <td align="center">
                           <a href="?page=produk&act=del&id=<?php echo $data->id_produk ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini?')">
                               <button class="btn btn-danger btn-xs" style="font-size: 1.2rem;"><i class="fa fa-trash-o"></i> Hapus</button>
                            </a>
                           </td>
                       </tr>
                       <?php
                        } ?>
                    </table>
                </div>

                        <button type="button" class="btn btn-success" style="font-size: 1rem;" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                        
                        <div id="tambah" class="modal" role="dialog">
                            <div class="modal-dialog" fade>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button  type="button" class="close" style="margin-right: -170px; margin-top: -35px; " data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="margin-top: 10px;" >Tambah Data Produk</h4>
                                    </div>
                                    <form  action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                    <div class="form-group">
                                <label class="control-label" for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control" id="kategori" required>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="deskripsi_produk">Deskripsi Produk</label>
                                <input type="text" name="deskripsi_produk" class="form-control" id="deskripsi_produk" required>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" required>
                                <th><select id="status" onchange="total">
                                <option></option>
                                <option>KG</option>
                                <option>ONS</option>
                                <option>GRAM</option>
                                <option>BUAH</option>
                                </select></th>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="nama_produk">Map Link</label>
                                <input type="text" name="map_link" class="form-control" id="map_link" required>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="gbr_produk">Gambar Produk</label>
                                <input type="file" name="gbr_produk" class="form-control" id="gbr_produk" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                        </div>
                    </form>
                    <?php
                    if(@$_POST['tambah']) {
                        $nama_produk = $connection->conn->real_escape_string($_POST['nama_produk']);
                        $kategori = $connection->conn->real_escape_string($_POST['kategori']);
                        $deskripsi_produk = $connection->conn->real_escape_string($_POST['deskripsi_produk']);
                        $harga = $connection->conn->real_escape_string($_POST['harga']);
                        $map_link = $connection->conn->real_escape_string($_POST['map_link']);

                        $extensi = explode(".", $_FILES['gbr_produk']['name']);
                        $gbr_produk = "produk-".round(microtime(true)).".".end($extensi);
                        $sumber = $_FILES['gbr_produk']['tmp_name'];
                        $upload = move_uploaded_file($sumber, "assets/img/produk/".$gbr_produk);
                        if($upload) {
                            $produk->tambah($nama_produk, $kategori, $deskripsi_produk, $harga, $map_link, $gbr_produk);
                            header("location: ?page=produk");
                        } else {
                        echo "<script>alert('Upload Gambar Gagal!')</script>";
                        }
                    }
                    ?>
            </div>
         </div>
    </div>


    
</div>
</div>
<?php
} else if(@$_GET['act'] == 'del') {
    $gbr_awal = $produk->tampil($_GET['id'])->fetch_object()->gbr_produk;
    unlink("assets/img/produk/".$gbr_awal);

    $produk->hapus($_GET['id']);
    header("location: ?page=produk");
}