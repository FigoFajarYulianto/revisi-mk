<?php include "sidebar.php" ?>
<?php require_once "connection.php"; ?>
<!-- Icon Title -->
<link rel="icon" href="../../images/hi_valeeqa.png">
<div class="container-fluid">
    <h1 class="my-4">Data Produk</h1>
    <!-- Table -->
    <div class="card mb-4">
        <div class="card-body">
            <a href="tambahproduk.php?status=add" class="btn btn-primary mb-2" style="float: right;">Tambah Produk</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>NAMA PRODUK</th>
                            <th>KATEGORI</th>
                            <th>DESKRIPSI</th>
                            <th>HARGA</th>
                            <th>STOK</th>
                            <th>SATUAN</th>
                            <th>MAP LINK</th>
                            <th>GAMBAR</th>
                            <th>AKSI</th>

                        </tr>
                    </thead>
                    <?php
                            // Query
                            $sql = "SELECT * FROM tb_produk";
                            $query = mysqli_query($koneksi, $sql);
                            
                            
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
                            $sql = "SELECT * FROM tb_produk LEFT JOIN kategori ON tb_produk.id_kategori=kategori.id_kategori JOIN satuan ON tb_produk.id_satuan=satuan.id_satuan LIMIT $halaman_awal, $batas";
                            $query = mysqli_query($koneksi, $sql);
                            while($data = mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data["nama_produk"]; ?></td>
                        <td><?php echo $data["nama_kategori"]; ?></td>
                        <td><?php echo $data["deskripsi_produk"]; ?></td>
                        <td><?php echo $data["harga"]; ?></td>
                        <td><?php echo $data["stok"]; ?></td>
                        <td><?php echo $data["nama_satuan"]; ?></td>
                        <td><?php echo $data["map_link"]; ?></td>
                        <td>
                            <img src="../../produk2/produk2/assets/img/produk/<?php echo $data['gbr_produk'];?>" alt=""
                                style="width: 60px; height: 90px;">
                        </td>

                        <td>
                            <a href="edit-produk.php?status=edit&id_produk=<?php echo $data['id_produk']; ?>"
                                class="btn btn-link" title="Edit Produk">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete-produk.php?id_produk=<?php echo $data['id_produk']; ?>"
                                onclick="return confirm('Apakah anda yakin ingin menghapusnya?')" class="btn btn-link"
                                title="Hapus Produk">
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