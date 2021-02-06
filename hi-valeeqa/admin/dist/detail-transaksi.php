<?php include "sidebar.php" ?>
<?php require_once "connection.php"; ?>
<!-- Icon Title -->
<link rel="icon" href="../../images/hi_valeeqa.png">
<div class="container-fluid">
    <h1 class="my-4">Detail Transaksi</h1>
    <!-- Table -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Panjang (cm)</th>
                            <th>Lebar Dada (cm)</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <?php
                            $id_transaksi = $_GET["id-transaksi"];
                            // Query

                            
                            $sql = "select * from detail_transaksi inner join produk on detail_transaksi.id_produk = produk.id_produk inner join gambar on produk.id_produk = gambar.id_produk inner join ukuran on gambar.id_produk = ukuran.id_produk where id_transaksi=$id_transaksi";
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
                            $sql = $sql." LIMIT $halaman_awal, $batas";
                            $query = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_assoc($query)){
                        ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><a
                                href="../../scripts/detail.php?id-produk=<?php echo $data['id_produk']; ?>"><?php echo $data["nama_barang"]; ?></a>
                        </td>
                        <td><?php echo $data["panjang"]; ?></td>
                        <td><?php echo $data["lebar_dada"]; ?></td>
                        <td><?php echo $data["jumlah"]; ?></td>
                        <td><?php echo $data["harga"]; ?></td>
                        <td><img src="../../<?php echo $data["lokasi_gambar"]; ?>" alt="Gambar Produk"
                                style="width: 60px; height: 90px;"></td>
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
                                    echo "<li class='page-item'><a class='page-link' href='menunggu-pembayaran.php?halaman=$previous'>Previous</a></li>";
                                }
                            ?>
                        <?php
                                
                                for($i=1; $i<=$total_halaman; $i++){
                                    if($halaman == $i){
                                        echo "<li class='page-item active'><a class='page-link' href='menunggu-pembayaran.php?halaman=$i'>$i</a></li>";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='menunggu-pembayaran.php?halaman=$i'>$i</a></li>";
                                    }
                                }
                            ?>
                        <?php
                                if($halaman == $total_halaman){
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='menunggu-pembayaran.php?halaman=$next'>Next</a></li>";
                                }
                            ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>