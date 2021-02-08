<?php  

    include 'sidebar.php'; 
    require_once "connection.php";

    
?>
<!-- Icon Title -->
<link rel="icon" href="../../images/hi_valeeqa.png">
<div class="container-fluid">
    <h1 class="my-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <?php
                            $sql = "select * from transaksi where status='belum bayar' and jenis_pembayaran='cash'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_num_rows($query);
                        ?>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="p-0">Menunggu Pembayaran</div>
                        <div class="p-0"><?php echo $data; ?></div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="menunggu-pembayaran.php">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <?php
                            $sql = "select * from transaksi where status='menunggu kirim'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_num_rows($query);
                        ?>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="p-0">Menunggu Pengiriman</div>
                        <div class="p-0"><?php echo $data; ?></div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="menunggu-pengiriman.php">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <?php
                            $sql = "select * from transaksi where status='proses kirim'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_num_rows($query);
                        ?>
                    <div class="d-flex flex-row justify-content-between">
                        <div class="p-0">Proses Pengiriman</div>
                        <div class="p-0"><?php echo $data; ?></div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="proses-pengiriman.php">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-shopping-cart mr-1"></i>
        Transaksi Terakhir
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Nomor WA</th>
                        <th>Jenis Pembayaran</th>
                        <th>Jenis Pengiriman</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                // Query
                                $nomor = 1;
                                $sql = "SELECT * from transaksi inner join user on transaksi.user_id = user.user_id order by tanggal_transaksi desc limit 3";
                                $query = mysqli_query($koneksi, $sql);
                                while($data = mysqli_fetch_array($query)){
                            ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $data["tanggal_transaksi"]; ?></td>
                        <td><?php echo $data["user_nama"]; ?></td>
                        <td><?php echo $data["alamat"]; ?></td>
                        <td><?php echo $data["user_telepon"]; ?></td>
                        <td><?php echo $data["jenis_pembayaran"]; ?></td>
                        <td><?php echo $data["jenis_pengiriman"]; ?></td>
                        <td><?php echo $data["total"]; ?></td>
                        <td><?php echo $data["status"]; ?></td>
                    </tr>
                    <?php
                                    $nomor++;
                                }
                            ?>
                </tbody>
            </table>
            <ul class="pagination justify-content-end mt-2">
                <li class="page-item"><a href="riwayat-transaksi.php" class="page-link">Selengkapnya</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php' ?>