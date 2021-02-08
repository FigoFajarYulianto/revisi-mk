    <?php
      include "sidebar.php";
      require_once "connection.php";
      if($_GET["status"] == "edit"){
        // Code here
        $title = "Edit User";
        $id_user = $_GET["user_id"];
        $sql = "select * from user where user_id='$id_user'";
        $query = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_array($query);

        $email = $data["user_email"];
        $nama = $data["user_nama"];
        $wa = $data["user_telepon"];
        $foto = $data["user_foto"];
        $alamat = $data["alamat"];
        

      }else{
        // Code here
        $title = "Tambah User";

        $id_user = "";
        $email = "";
        $pass = "";
        $nama = "";
        $gender = "";
        $wa = "";
        $alamat = "";
        $level = "";

      }
      $status = $_GET["status"];
    ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <div class="card my-4">
            <div class="card-header">

            </div>
            <div class="card-body">
                <?php
            if(isset($_GET["error"])){
              $status = $_GET["error"];
              if($status == "error-password"){
          ?>
                <div class="alert alert-warning" role="alert">
                    Password tidak sesuai! Ulangi lagi.
                </div>
                <?php
              }elseif($status == "error-gender") {
          ?>
                <div class="alert alert-danger" role="alert">
                    Jenis kelamin belum dimasukkan!
                </div>
                <?php
              }elseif($status == "error-level") {
          ?>
                <div class="alert alert-danger" role="alert">
                    Jenis level akses belum dimasukkan!
                </div>
                <?php
              }
               
            }
          ?>
                <form
                    action="edit-user-process.php?status=<?php echo $status; if($id_user != '') echo '&user_id='.$id_user; ?>"
                    method="POST">
                    <div class="form-group">
                        <span>Email</span>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                            maxlength="50" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <span>Nama Lengkap</span>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap"
                            maxlength="50" value="<?php echo $nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <span>Nomor WA</span>
                        <input type="number" name="wa" class="form-control" placeholder="Masukkan nomor Telepon"
                            maxlength="11" value="<?php echo $wa; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <span> Alamat </span>
                        <textarea name=" alamat" id="alamat" cols="30" rows="10" placeholder="Alamat"
                            class="form-control" required><?php echo $alamat; ?></textarea>
                    </div>

                    <div class="form-group">

                        <img src="../../gambar/user/<?php echo $foto; ?>" width="100">

                    </div>

                    <div class="form-group">

                        <label>Ganti Foto</label>

                        <input type="file" name="foto" class="form-control">

                    </div>

                    <button class="btn btn-primary" name="ubah">Ubah</button>
                </form>
            </div>
        </div>
    </div>