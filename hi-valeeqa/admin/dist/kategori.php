<?php include "sidebar.php"; ?>
    <?php require_once "connection.php"; ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <h1 class="my-4">Data Kategori</h1>
        <!-- Table -->
        <div class="card mb-4">
            <div class="card-body">
                <a href="edit-kategori.php?status=add" class="btn btn-dark mb-2" style="float: right;">Tambah Kategori</a>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <?php
                        // Query
                        $sql = "SELECT * FROM kategori";
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
                        $sql = "SELECT * FROM kategori LIMIT $halaman_awal, $batas";
                        $query = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_array($query)){
                    ?>      
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $data["nama_kategori"]; ?></td>
                                <td>
                                    <a href="edit-kategori.php?status=edit&id_kategori=<?php echo $data['id_kategori']; ?>" class="btn btn-link" title="Edit Kategori">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete-kategori.php?id_kategori=<?php echo $data['id_kategori']; ?>" class="btn btn-link" title="Hapus Kategori" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
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
                                    echo "<li class='page-item'><a class='page-link' href='kategori.php?halaman=$previous'>Previous</a></li>";
                                }
                            ?>
                            <?php
                                
                                for($i=1; $i<=$total_halaman; $i++){
                                    if($halaman == $i){
                                        echo "<li class='page-item active'><a class='page-link' href='kategori.php?halaman=$i'>$i</a></li>";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='kategori.php?halaman=$i'>$i</a></li>";
                                    }
                                }
                            ?>
                            <?php
                                if($halaman == $total_halaman){
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='kategori.php?halaman=$next'>Next</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>
