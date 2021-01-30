<?php include 'header.php'; ?>

<div class="container">

	<div class="row">
		<div class="col-lg-4 mx-auto">

			<div class="pt-4 pb-3">

			<div class="border">
				<center>
					<a href="reset-password.php"><img src="gambar/sistem/maketan.png" style="width:auto; height:150px; margin-right:auto; margin-left:auto;"></a>
				</center>
				<br>

               <?php 
				if(isset($_GET['alert'])){
					if($_GET['alert'] == "success"){
						?>
						<div class="alert alert-success text-center">
							<span class="font-weight-bold">Anda berhasil mereset password.</span>
							<br>
							<small class="font-weight-light">Selanjutnya silahkan cek email anda.</small>
						</div>
                       
                    <?php
                    } 
                    }
                    ?>
                        
				<center><h5>Reset Password Anda</h5></center>
                <center><p><font size="3">Password akan di kirim ke email anda dengan instruksi cara mereset password anda</font></p></center>
                <form action="reset-request.php" method="post">
                <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required='required' autocomplete="off" name="user" placeholder="Masukkan alamat email anda ..">
                        <input type="submit" class="btn btn-primary btn-block mt-4" name="reset-request-submit" value="Terima password baru anda lewat email">
					</div>

				

			</div>
			   </div>
			</div>

		</div>
     

	</div>

</div>


<?php include 'footer.php'; ?>