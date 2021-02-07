<?php include "sidebar.php" ?>
    <?php require_once "connection.php"; ?>
    <!-- Icon Title -->
    <link rel="icon" href="../../images/hi_valeeqa.png">
    <div class="container-fluid">
        <h1 class="my-4">Rekening Admin</h1>
        <!-- Table -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Pemilik</th>
                                <th>No. Rekening</th>
                                <th>Bank</th>
                                <th>No. Whatsapp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            // Query
                            $sql = "select * from rekening";
                            $query = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_assoc($query)){
                        ?>      
                                <tr>
                                    <td><?php echo $data["nama"] ?></td>
                                    <td><?php echo $data["rekening"]; ?></td>
                                    <td><?php echo $data["bank"]; ?></td>
                                    <td><?php echo $data["nomor_wa"]; ?></td>
                                    <td><a href="edit-rekening.php" class="btn btn-secondary mb-3">Edit</a></td>
                                </tr> 
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>