<?php include "sidebar.php" ?>
    <?php require_once "connection.php"; ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <h1 class="my-4">Tabungan</h1>
        <!-- Table -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Pembeli</th>
                                <th>Alamat</th>
                                <th>Nomor WA</th>
                                <th>Jenis Pembayaran</th>
                                <th>Jenis Pengiriman</th>
                                <th>Tabungan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <?php
                            // Query
                            $sql = "SELECT * from transaksi inner join user on transaksi.id_user = user.id_user where jenis_pembayaran='tabungan' and status='belum bayar' order by tanggal_transaksi desc";
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
                            while($data = mysqli_fetch_array($query)){
                        ?>      
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $data["tanggal_transaksi"]; ?></td>
                                    <td><?php echo $data["nama"]; ?></td>
                                    <td><?php echo $data["alamat"]; ?></td>
                                    <td><?php echo $data["nomor_wa"]; ?></td>
                                    <td><?php echo $data["jenis_pembayaran"]; ?></td>
                                    <td><?php echo $data["jenis_pengiriman"]; ?></td>
                                    <td><?php echo $data["tabungan"]; ?></td>
                                    <td><?php echo $data["total"]; ?></td>
                                    <td><?php echo $data["status"]; ?></td>
                                    <td>
                                        <a href="tambah-tabungan.php?id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-dark mb-1">
                                            Tambah
                                        </a>
                                        <a href="detail-transaksi.php?id-transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-secondary mb-2">
                                            Detail
                                        </a>
                                        <a href="konfirmasi-tabungan.php?status=batal&id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin membatalkan transaksi?')">
                                            Batalkan
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
                                    echo "<li class='page-item'><a class='page-link' href='tabungan.php?halaman=$previous'>Previous</a></li>";
                                }
                            ?>
                            <?php
                                
                                for($i=1; $i<=$total_halaman; $i++){
                                    if($halaman == $i){
                                        echo "<li class='page-item active'><a class='page-link' href='tabungan.php?halaman=$i'>$i</a></li>";
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='tabungan.php?halaman=$i'>$i</a></li>";
                                    }
                                }
                            ?>
                            <?php
                                if($halaman == $total_halaman){
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='tabungan.php?halaman=$next'>Next</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>