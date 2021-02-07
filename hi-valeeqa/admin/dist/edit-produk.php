    <?php
      include "sidebar.php";
      require_once "connection.php";
      $sql = "select * from kategori";
      $query = mysqli_query($conn, $sql);
      $kat = [];
      $id_kat = [];
      while($data = mysqli_fetch_array($query)){
        array_push($kat, $data["nama_kategori"]);
        array_push($id_kat, $data["id_kategori"]);
      }
      if($_GET["status"] == "edit"){
        // Code here
        $title = "Edit Produk";

        

        $id_kategori = $data["id_kategori"];
        $nama_barang = $data["nama_barang"];
        $warna = $data["warna"];
        $bahan = $data["bahan"];
        $harga = $data["harga"];
        $stok = $data["stok"];
        $keterangan = $data["keterangan"];
        $best_seller = $data["best_seller"];

        $panjang = $data["panjang"];
        $lebar_dada = $data["lebar_dada"];

        $gambar = $data["lokasi_gambar"];
        
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
      
    ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <div class="card my-4">
            <div class="card-header">
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="card-body">
                <?php
            if(isset($_GET["error"])){
              if($_GET["error"] == "kategori"){
          ?>
                <div class="alert alert-danger">Kategori belum dimasukkan!</div>
                <?php
              }elseif($_GET["error"] == "gambar"){
          ?>
                <div class="alert alert-danger">Gambar belum dimasukkan!</div>
                <?php
              }elseif($_GET["error"] == "harga"){
          ?>
                <div class="alert alert-danger">Harga tidak boleh minus!</div>
                <?php
              }
            }
          ?>
                <form
                    action="edit-produk-process.php?status=<?php echo $_GET["status"]; ?>&id_produk=<?php echo $id_produk; ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3 w-50">
                        <span class="input-group-text">Kategori</span>
                        <select name="kategori" id="" class="custom-select" required>
                            <option value="#">-- Masukkan kategori produk --</option>
                            <?php
                  for($i=0; $i<count($id_kat); $i++){
                    $selected = $id_kategori != "" ? ($id_kat[$i] == $id_kategori ? "selected" : "")  : "";
                    echo "<option value='$id_kat[$i]' $selected>$kat[$i]</option>";
                  }
                ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Nama Produk</span>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama produk"
                            maxlength="70" value="<?php echo $nama_barang; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Warna</span>
                        <input type="text" name="warna" class="form-control" placeholder="Masukkan warna" maxlength="30"
                            value="<?php echo $warna; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Bahan</span>
                        <input type="text" name="bahan" class="form-control" placeholder="Masukkan bahan pakaian"
                            maxlength="30" value="<?php echo $bahan; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Harga</span>
                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga/pcs"
                            maxlength="8" value="<?php echo $harga; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Panjang(cm)</span>
                        <input type="number" name="panjang" class="form-control" placeholder="Masukkan panjang pakaian"
                            maxlength="8" value="<?php echo $panjang; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Lebar Dada(cm)</span>
                        <input type="number" name="lebar-dada" class="form-control"
                            placeholder="Masukkan lebar dada pakaian" maxlength="8" value="<?php echo $lebar_dada; ?>"
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Stok</span>
                        <input type="number" name="stok" class="form-control" placeholder="Masukkan stok produk"
                            maxlength="11" value="<?php echo $stok; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Keterangan</span>
                        <textarea name="keterangan" id="" cols="30" rows="10"
                            placeholder="Masukkan keterangan produk (boleh dikosongi)"
                            class="form-control"><?php echo $keterangan; ?></textarea>
                    </div>
                    <div class="input-group mb-3 ml-4">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="best-seller" class="custom-control-input" id="best-seller"
                                <?php if($best_seller == 1) echo "checked"; ?>>
                            <label for="best-seller" class="custom-control-label">Best Seller</label>
                        </div>
                    </div>
                    <div class="mb-3 form-group w-50">
                        <label for="formFileMultiple" class="form-control-label">Masukkan Foto <b>(Rasio Ukuran Foto
                                2:3)</b></label>
                        <input class="form-control-file" type="file" id="formFileMultiple" name="gambar">
                    </div>
                    <?php
              if($_GET["status"] == "edit"){

                echo "<img src='../../$gambar' alt='' style='width: 230px; height: 345px;' class='mb-3'>";
              }
            ?>
                    <button class="btn btn-dark" type="submit" style="width: 100%;">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>