<?php
class produk2 {

    private $mysqli;

    function __construct($conn) {
        $this->mysqli = $conn;
    }

    public function tampil($id = null) {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_produk";
        if($id != null) {
            $sql .= " WHERE id_produk = $id";
        }
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($nama_produk, $kategori, $deskripsi_produk, $harga, $map_link, $gbr_produk) {
        $db = $this->mysqli->conn;
        $db->query("INSERT INTO tb_produk VALUES ('', '$nama_produk', '$kategori', '$deskripsi_produk', '$harga', '$map_link', '$gbr_produk')") or die ($db->error);

    }

    public function hapus($id) {
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM tb_produk WHERE id_produk = '$id'") or die ($db->error);
    }

    function __desctruct() {
        $db = $this->mysqli->conn;
        $db->close();
    }
}
?>