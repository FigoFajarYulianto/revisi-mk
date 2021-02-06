    <?php
      include "sidebar.php";
      require_once "connection.php";
      if($_GET["status"] == "edit"){
        // Code here
        $title = "Edit User";
        $id_user = $_GET["id_user"];
        $sql = "select * from user where id_user=$id_user";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);

        $email = $data["email"];
        $pass = $data["pass"];
        $nama = $data["nama"];
        $gender = $data["jenis_kelamin"];
        $wa = $data["nomor_wa"];
        $alamat = $data["alamat"];
        $level = $data["level"];

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
          <h1><?php echo $title; ?></h1>
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
          <form action="edit-user-process.php?status=<?php echo $status; if($id_user != '') echo '&id_user='.$id_user; ?>" method="POST">
            <div class="input-group mb-3">
              <span class="input-group-text">Email</span>
              <input type="email" name="email" class="form-control" placeholder="Masukkan email" maxlength="50" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Password</span>
              <input type="password" name="pass" class="form-control" placeholder="Masukkan password" maxlength="30" value="<?php echo $pass; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Ulangi Password</span>
              <input type="password" name="pass2" class="form-control" placeholder="Masukkan password" maxlength="30" value="<?php echo $pass; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Nama Lengkap</span>
              <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" maxlength="50" value="<?php echo $nama; ?>" required>
            </div>
            <div class="input-group mb-3 w-25">
              <span class="input-group-text">Jenis Kelamin</span>
              <select name="gender" id="" class="custom-select">
                  <option value="#" <?php if($gender == "") echo "selected"; ?>>-- Pilih salah satu --</option>
                  <option value="L" <?php if($gender == "L") echo "selected"; ?>>Laki-Laki</option>
                  <option value="P" <?php if($gender == "P") echo "selected"; ?>>Perempuan</option>
              </select>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Nomor WA</span>
              <input type="number" name="wa" class="form-control" placeholder="Masukkan nomor WhatsApp" maxlength="11" value="<?php echo $wa; ?>" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Alamat</span>
              <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat" class="form-control" required><?php echo $alamat; ?></textarea>
            </div>
            <div class="input-group mb-3 w-25">
              <span class="input-group-text">Level Akses</span>
              <select name="level" id="" class="custom-select">
                <option value="#" <?php if($level == "") echo "selected"; ?>>-- Pilih salah satu --</option>
                <option value="1" <?php if($level == "1") echo "selected"; ?>>Admin</option>
                <option value="0" <?php if($level == "0") echo "selected"; ?>>User</option>
              </select>
            </div>
            <button class="btn btn-dark" type="submit" style="width: 100%;">Submit</button>
          </form>
        </div>
      </div>
    </div>
<?php include 'footer.php' ?>