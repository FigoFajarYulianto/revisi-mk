    <?php
      include "sidebar.php";
      require_once "connection.php";
      if($_GET["status"] == "edit"){
        // Code here
        $title = "Edit Kategori";

        $id_kategori = $_GET["id_kategori"];
        $sql = "SELECT * FROM kategori where id_kategori=$id_kategori";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);

        $nama_kategori = $data["nama_kategori"];
      }else{
        // Code here
        $title = "Tambah Kategori";
        $id_kategori = "";
        $nama_kategori = "";
      }
      $status = $_GET["status"];
    ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <div class="card my-4">
            <div class="card-header">
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="card-body">
                <form
                    action="edit-kategori-process.php?status=<?php echo $status; if($id_kategori != "") echo "&id_kategori=".$id_kategori; ?>"
                    method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Nama Kategori</span>
                        <input type="text" name="kategori" class="form-control" placeholder="Masukkan nama kategori"
                            maxlength="40" value="<?php echo $nama_kategori; ?>" required>
                    </div>
                    <button class="btn btn-dark" type="submit" style="width: 100%;">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>