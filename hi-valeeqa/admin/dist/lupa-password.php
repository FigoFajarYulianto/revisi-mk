<?php include "sidebar.php"; ?>
    <?php require_once "connection.php"; ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <h1 class="my-4">Lupa Password</h1>
        <!-- Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No. WA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            // Query
                            $sql = "select * from user where lupa_password='ya'";
                            $query = mysqli_query($conn, $sql);
                            
                            
                            // Pagination
                            $batas = 10;
                            $halaman = isset($_GET["halaman"]) ? $_GET["halaman"]: 1;
                            $halaman_awal = $halaman>1 ? ($halaman * $batas) - $batas : 0;// Untuk tiap nomor
                            
                            $next = $halaman + 1;
                            $previous = $halaman - 1;

                            $total_data = mysqli_num_rows($query);
                            $total_halaman = ceil($total_data / $batas);
                            $nomor = $halaman_awal + 1;
                            // Query data sesuai halaman
                            $sql = "select * from user where lupa_password='ya' LIMIT $halaman_awal, $batas";
                            $query = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $data["email"]; ?></td>
                                    <td><?php echo $data["pass"]; ?></td>
                                    <td><?php echo $data["nama"]; ?></td>
                                    <td><?php echo $data["jenis_kelamin"]; ?></td>
                                    <td><?php echo $data["alamat"]; ?></td>
                                    <td><?php echo $data["nomor_wa"]; ?></td>
                                    <td>
                                        <a href="lupa-password-process.php?id_user=<?php echo $data['id_user']; ?>" class="btn btn-dark" onclick="return confirm('Apakah anda yakin? Ingat, sebelum menekan tombol ini, anda terlebih dahulu harus menghubungi customer!')">
                                            Konfirmasi
                                        </a>
                                        <?php
                                            // Angka WA
                                            $wa_asal = $data["nomor_wa"];
                                            if(substr($wa_asal, 0, 1) == "0"){
                                                $wa_edit = "62".substr($wa_asal, 1);
                                            }elseif(substr($wa_asal, 0, 3) == "+62"){
                                                $wa_edit = substr($wa_asal, 1);
                                            }else{
                                                $wa_edit = $wa_asal;
                                            }
                                        ?>
                                        <a href="https://wa.me/<?php echo $wa_edit; ?>?text=Halo%20<?php echo $data['nama']; ?>,%20Admin%20Hi%20Valeeqa%20di%20sini%20^^" class="btn btn-info">
                                            Hubungi
                                        </a>
                                    </td>
                                </tr>
                        <?php
                                $nomor++;
                            }
                        ?>
                    </table>
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-end">
                            <?php
                                if($halaman == 1){
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Previous</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='user.php?halaman=$previous'>Previous</a></li>";
                                }
                            ?>
                            <?php
                                
                                for($i=1; $i<=$total_halaman; $i++){
                                    if($halaman == $i){
                                        echo "<li class='page-item active'><a class='page-link' href='user.php?halaman=$i'>$i</a></li>";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='user.php?halaman=$i'>$i</a></li>";
                                    }
                                }
                            ?>
                            <?php
                                if($halaman == $total_halaman){
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='user.php?halaman=$next'>Next</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
    </div>
<?php include 'footer.php' ?>