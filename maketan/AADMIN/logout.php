<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();




echo "<script>alert('apakah anda ingin logout?');</script>";
echo "<script>location='login.php'</script>";
?>