<?php include 'header.php'; ?>

<div class="container">

	<div class="row">
		<div class="col-lg-4 mx-auto">

			<div class="pt-4 pb-3">

			<div class="border" style="padding-bottom:650px;">
				<center>
					<a href="login.php"><img src="../gambar/sistem/maketan3.png" style="width:auto; height:150px; margin-right:auto; margin-left:auto;"></a>
				</center>
				<br>


				<center><h5>Login</h5></center>

				<?php 
				include 'koneksi.php';
				if(isset($_GET['register'])){
					if($_GET['register'] == "success"){
						?>
						<div class="alert alert-success text-center">
							<span class="font-weight-bold">Anda berhasil mendaftar.</span>
							<br>
							<small class="font-weight-light">Selanjutnya silahkan login.</small>
						</div>
						<?php
					}elseif($_GET['register'] == "logout"){
						?>
						<div class="alert alert-success text-center">
							<span class="font-weight-bold">Anda telah logout.</span>
						</div>
						<?php
					}elseif($_GET['register'] == "login-dulu"){
						?>
						<div class="alert alert-warning text-center font-weight-bold">Silahkan login untuk melanjutkan.</div>
						<?php
					}elseif($_GET['register'] == "gagal"){
						?>
						<div class="alert alert-danger text-center">
							<span class="font-weight-bold">Login gagal !</span>
							<br>
							<small class="font-weight-light">Email & password tidak sesuai.</small>
						</div>
						<?php
					}
				}
				?>

				<form action="login_aksi.php" method="post">
					
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required='required' autocomplete="off" name="email" placeholder="Masukkan email ..">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required='required' name="password" placeholder="Masukkan password ..">
					</div>

					<input type="submit" class="btn btn-primary btn-block mt-4" name="login" value="LOGIN">

					<p class="text-center mt-3">
						Belum punya akun? 
						<br>
						<small><a href="daftar.php">Daftar Sekarang</a></small>
					</p>

					<p class="text-center mt-3">
						<a href="requestReset.php">Lupa Kata Sandi?</a>
					</p>

				</form>

			</div>
			   </div>
			</div>

		</div>

	</div>

</div>

<?php include 'footer.php'; ?>