<?php
      include "sidebar.php";
      require_once "connection.php";
      $id_transaksi = $_GET["id_transaksi"];
    ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container">
      <div class="card my-4 mt-4">
        <div class="card-header">
          <h1>Masukkan Nomor Resi</h1>
        </div>
        <div class="card-body">
          <form action="konfirmasi-pengiriman.php?status=konfirmasi&id_transaksi=<?php echo $id_transaksi; ?>" method="POST">
            <div class="input-group mb-3">
              <span class="input-group-text">No. Resi</span>
              <input type="text" name="resi" class="form-control" placeholder="Kosongi apabila pengiriman produk melalui COD" maxlength="15">
            </div>
            <button class="btn btn-dark" type="submit" style="width: 100%;">Submit</button>
          </form>
        </div>
      </div>
    </div>
<?php include 'footer.php' ?>