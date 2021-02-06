<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Icon Title -->
    <link rel="icon" href="../images/hi_valeeqa.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .marg {
            margin-top: 10rem !important;
            margin-bottom: 10rem !important;
        }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>

    <?php include 'nav.php' ?>
    <div class="container marg">
        <div class="row">

            <!-- Side Button -->
            <div class="col-lg-3 col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-header"><h3>Akun</h3></div>
                    <div class="card-body px-0 py-0">
                        <ul class="list-group list-group-flush">
                            <a href="akun.php" class="list-group-item list-group-item-action py-3">Akun Saya</a>
                            <a href="transaksi-history.php" class="list-group-item list-group-item-action py-3">History Transaksi</a>
                            <a href="ubah-password.php" class="list-group-item list-group-item-action active py-3">Ubah Kata Sandi</a>
                          </ul>
                    </div>
                </div>
            </div>

            <!-- Ubah Kata Sandi -->
            <div class="col-lg-9 col-md-9 col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h3>Ubah Kata Sandi</h3>
                    </div>
                    <div class="card-body">
                        <?php
                            if(isset($_GET["status"])){
                                $status = $_GET["status"];
                                if($status == "error-pwd-old"){
                                    echo "<div class='alert alert-danger'>Password lama tidak sesuai!</div>";
                                }elseif ($status == "error-pwd-new"){
                                    echo "<div class='alert alert-danger'>Verifikasi password baru tidak cocok!</div>";
                                }elseif($status == "berhasil"){
                                    echo "<div class='alert alert-success'>Password berhasil diubah!</div>";
                                }
                            }
                        ?>
                        <form action="ubah-password-process.php" method="POST">
                            <div class="form-group">
                                <label for="passwordLama">Kata Sandi Lama</label>
                                <input type="password" name="passwordLama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="passwordBaru">Masukkan Kata Sandi Baru</label>
                                <input type="password" name="passwordBaru" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="passwordBaruCek">Masukkan Ulang Kata Sandi Baru</label>
                                <input type="password" name="passwordBaruCek" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-dark">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include 'footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>