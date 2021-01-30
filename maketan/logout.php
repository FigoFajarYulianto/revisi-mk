<?php
session_start();
session_destroy();
session_unset();

setcookie('email', '',time() - 3600);
setcookie('key', '',time() - 3600);

echo "<script>alert('anda telah logout');</script>";
echo "<script>location='index.php';</script>";
?>
