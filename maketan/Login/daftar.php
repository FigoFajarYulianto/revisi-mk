<?php include 'header.php'; ?>

<!-- Style Phone Number -->
<style>
input:invalid + span:after {
    content: 'Salah';
    color: #f00;
    padding-left: 5px;
}

input:valid + span:after {
    content: 'Benar';
    color: #26b72b;
    padding-left: 5px;
}
</style>
<!-- Penutup Style Phone Number -->

<div class="container">

    <div class="row">

        <div class="col-12 col-lg-4 mx-auto ">
            <div class="border_daftar">
                <center>
                    <a href="index.php"><img src="../gambar/sistem/maketan3.png" style="width:auto; height:150px;"></a>
                </center>


                <center>
                    <h5>Daftar</h5>
                </center>

                <?php 
			if(isset($_GET['alert'])){
				if($_GET['alert'] == "duplikat"){
					?>
                <div class="alert alert-danger text-center">
                    <span class="font-weight-bold">Email sudah pernah digunakan</span>.
                    <br>
                    <span class="font-weight-light">Silahkan gunakan email lain.</span>
                </div>
                <?php
				}
			}
			?>
                <div class="">

                    <form action="daftar_aksi.php" method="post">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required='required' autocomplete="off"
                                placeholder="Masukkan nama lengkap ..">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required='required' autocomplete="off"
                                placeholder="Masukkan email ..">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required='required'
                                autocomplete="off" placeholder="Masukkan password ..">
                        </div>

                        <div class="form-group">
                            <label>Nomer Telepon</label>
                            <input type="tel" name="telepon" pattern="[0-9]{11,12}" class="form-control" required='required'
                            autocomplete="off" placeholder="Masukkan nomer telepon ..">
                            <span class="note">Contoh : 081234567891</span>
                        </div>

                        <input type="submit" class="btn btn-primary btn-block mt-4" value="DAFTAR">
                        <p class="text-center mt-3">
                            Sudah punya akun?
                            <br>
                            <small><a href="login.php">Login</a></small>
                        </p>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
<?php include 'footer.php'; ?>