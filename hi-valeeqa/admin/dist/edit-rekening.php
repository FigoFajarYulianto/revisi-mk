<?php
    include "sidebar.php";
    require_once "connection.php";

    $sql = "SELECT * FROM rekening";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
      <div class="card my-4">
        <div class="card-header">
          <h1>Edit Rekening Admin</h1>
        </div>
        <div class="card-body">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "wa"){
                        echo "<div class='alert alert-danger'>Pastikan nomor WA diawali dengan angka <strong>62</strong>!</div>";
                    }
                }
            ?>
          <form action="edit-rekening-process.php" method="POST">
            <div class="input-group mb-3">
              <span class="input-group-text">Nama Pemilik</span>
              <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pemilik rekening" maxlength="70" value="<?php echo $data["nama"]; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">No. Rekening</span>
              <input type="text" name="rekening" class="form-control" placeholder="Masukkan nomor rekening" maxlength="30" value="<?php echo $data["rekening"]; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Bank</span>
              <input type="text" name="bank" class="form-control" placeholder="Masukkan nama bank asal" maxlength="30" value="<?php echo $data["bank"]; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">No. Whatssapp</span>
              <input type="text" name="wa" class="form-control" placeholder="Nomor ini digunakan untuk konfirmasi transaksi pelanggan, nomor harus memakai awalan 62" maxlength="15" value="<?php echo $data["nomor_wa"]; ?>" required>
            </div>
            <button class="btn btn-dark" type="submit" style="width: 100%;">Submit</button>
          </form>
        </div>
      </div>
    </div>
<?php include 'footer.php' ?>