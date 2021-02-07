<?php
      include "sidebar.php";
      require_once "connection.php";
      $id_transaksi = $_GET["id_transaksi"];
      $sql = "select * from transaksi where id_transaksi=$id_transaksi";
      $query = mysqli_query($conn, $sql);
      $data = mysqli_fetch_array($query);
    ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container">
      <div class="card my-4 mt-4">
        <div class="card-header">
          <h1>Tambah Tabungan</h1>
        </div>
        <div class="card-body">
            <span>Tabungan sebelumnya: Rp <?php echo number_format($data["tabungan"], 0 , "", "."); ?></span><br>
            <span>Tabungan yang harus dibayar: Rp <?php echo number_format($data["total"], 0 , "", "."); ?></span>
            <div class="input-group mb-3 mt-2">
              <span class="input-group-text">Tambah</span>
              <input type="number" id="tabungan" name="tabungan" class="form-control" placeholder="Tambahkan nominal tabungan" maxlength="11">
            </div>
            <button class="btn btn-dark" type="button" onclick="tambah_tabungan()" style="width: 100%;">Submit</button>
        </div>
      </div>
    </div>
    <script>
        function tambah_tabungan(){
            var tabungan = parseInt(<?php echo $data["tabungan"]; ?>);
            var total = parseInt(<?php echo $data["total"]; ?>);
            var tabungan_baru = parseInt(document.getElementById("tabungan").value);
            var hasil = tabungan + tabungan_baru;
            var status_transaksi = (hasil >= total) ? "menunggu kirim" : "belum bayar"
            location.href = "konfirmasi-tabungan.php?status=konfirmasi&id_transaksi=<?php echo $id_transaksi; ?>&hasil="+hasil+"&dbstatus="+status_transaksi;
        }
    </script>
<?php include 'footer.php' ?>