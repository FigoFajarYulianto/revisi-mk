<?php include "sidebar.php" ?>
    <?php require_once "connection.php"; ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <h1 class="my-4">Data Produk</h1>
        <!-- Table -->
        <div class="card mb-4">
            <div class="card-body">
                <a href="edit-produk.php?status=add" class="btn btn-dark mb-2" style="float: right;">Tambah Produk</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Warna</th>
                                <th>Bahan</th>
                                <th>Lebar Dada</th>
                                <th>Panjang</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th>Stok</th>
                                <th>Gambar</th>
                                <th>Best Seller</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <?php
                            // Query
                            $sql = "SELECT * FROM produk";
                            $query = mysqli_query($conn, $sql);
                            
                            
                            // Pagination
                            $batas = 5;
                            $halaman = isset($_GET["halaman"]) ? $_GET["halaman"]: 1;
                            $halaman_awal = $halaman>1 ? ($halaman * $batas) - $batas : 0;// Untuk tiap nomor
                            
                            $next = $halaman + 1;
                            $previous = $halaman - 1;

                            $total_data = mysqli_num_rows($query);
                            $total_halaman = ceil($total_data / $batas);
                            $nomor = $halaman_awal + 1;
                            // Query data sesuai halaman
                            $sql = "SELECT * FROM produk inner join kategori on produk.id_kategori = kategori.id_kategori inner join gambar on produk.id_produk = gambar.id_produk inner join ukuran on gambar.id_produk = ukuran.id_produk order by produk.id_produk LIMIT $halaman_awal, $batas";
                            $query = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $data["nama_kategori"]; ?></td>
                                    <td><?php echo $data["nama_barang"]; ?></td>
                                    <td><?php echo $data["warna"]; ?></td>
                                    <td><?php echo $data["bahan"]; ?></td>
                                    <td><?php echo $data["lebar_dada"]; ?></td>
                                    <td><?php echo $data["panjang"]; ?></td>
                                    <td><?php echo $data["harga"]; ?></td>
                                    <td><?php echo $data["keterangan"]; ?></td>
                                    <td><?php echo $data["stok"]; ?></td>
                                    <td>
                                        <img src="../../<?php echo $data["lokasi_gambar"]; ?>" alt="" style="width: 60px; height: 90px;">
                                    </td>
                                    <td><?php echo $data["best_seller"] == 1 ? "Ya" : "Tidak"; ?></td>
                                    <td>
                                        <a href="edit-produk.php?status=edit&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-link" title="Edit Produk">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete-produk.php?id_produk=<?php echo $data['id_produk']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" class="btn btn-link" title="Hapus Produk">
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
                                    echo "<li class='page-item'><a class='page-link' href='data-produk.php?halaman=$previous'>Previous</a></li>";
                                }
                            ?>
                            <?php
                                
                                for($i=1; $i<=$total_halaman; $i++){
                                    if($halaman == $i){
                                        echo "<li class='page-item active'><a class='page-link' href='data-produk.php?halaman=$i'>$i</a></li>";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='data-produk.php?halaman=$i'>$i</a></li>";
                                    }
                                }
                            ?>
                            <?php
                                if($halaman == $total_halaman){
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='data-produk.php?halaman=$next'>Next</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>