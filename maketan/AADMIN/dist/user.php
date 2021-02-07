<?php include "sidebar.php"; ?>
<?php require_once "connection.php"; ?>
<!-- Icon Title -->
<link rel="icon" href="../../images/hi_valeeqa.png">
<div class="container-fluid">
    <h1 class="my-4">PELANGGAN</h1>
    <!-- Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Foto</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                            // Query
                            $sql = "SELECT * FROM user ";
                            $query = mysqli_query($koneksi, $sql);
                            
                            
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
                            $sql = "SELECT * FROM user  LIMIT $halaman_awal, $batas";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data["user_email"]; ?></td>
                        <td><?php echo $data["user_nama"]; ?></td>
                        <td><?php echo $data["alamat"]; ?></td>
                        <td><?php echo $data["user_telepon"]; ?></td>
                        <td>

                            <img src="../../gambar/user/<?php echo $data['user_foto'];?>" width="100">

                        </td>
                        <td>
                            <a href="edit-user.php?status=edit&user_id=<?php echo $data['user_id']; ?>
                                class=" btn btn-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete-user.php?user_id=<?php echo $data['user_id']; ?>
                                class=" btn btn-link"
                                onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
                                <i class="fas fa-trash-alt"></i>
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