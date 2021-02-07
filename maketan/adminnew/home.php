<?php 
$koneksi = mysqli_connect("localhost","root","","u1011496_maketan");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hi Valeeqa - Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Icon Title -->
        <link rel="icon" href="../../images/hi_valeeqa.png">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <!-- <style>
            #dataTable_info {
                display: none;
            }
            #dataTable_paginate {
                display: none;
            }
            #dataTable_filter {
                display: none;
            }
            #dataTable_length {
                display: none;
            }
        </style> -->
    </head>
    <body>
        
    
<h2>admin</h2>
<div class="container-fluid">
        <h1 class="my-4">Dashboard</h1>
        <div class="row" style="display: flex;
            flex-wrap: wrap;
            margin-right: -0.75rem;
            margin-left: -0.75rem;">
            <div class="col-xl-3 col-md-6" style="flex: 0 0 25%;
                max-width: 25%;">
                <div class="card bg-danger text-white mb-4" style="    background-color: #dc3545 !important;">
                    <div class="card-body" style="flex: 1 1 auto;
                        min-height: 1px;
                        padding: 1.25rem;">
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
                <div class="card bg-warning text-white mb-4">
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
                <div class="card bg-info text-white mb-4">
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
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <?php
                            $sql = "select * from transaksi where status='belum bayar' and jenis_pembayaran='tabungan'";
                            $query = mysqli_query($koneksi, $sql);
                            $data = mysqli_num_rows($query);
                        ?>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-0">Tabungan</div>
                            <div class="p-0"><?php echo $data; ?></div>
                        </div>  
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="tabungan.php">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <?php
                            //$sql = "select user_id from user where lupa_password='ya'";
                            //$query = mysqli_query($koneksi, $sql);
                            //$data = mysqli_num_rows($query);
                        ?>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="p-0">Lupa Password</div>
                            <div class="p-0"><?php //echo $data; ?></div>
                        </div>  
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="lupa-password.php">Lihat Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-shopping-cart mr-1"></i>
                Transaksi Terakhir
            </div> -->
            <!-- <div class="card-body">
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
                                <th>Tabungan</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Query
                                $nomor = 1;
                                $sql = "SELECT * from transaksi inner join user on transaksi.id_user = user.id_user order by tanggal_transaksi desc limit 3";
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
                                        <td><?php echo $data["tabungan"]; ?></td>
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
            </div> -->
        </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>