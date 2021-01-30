<?php 
session_start();
session_destroy();

header("location:../Dasboard.php?alert=logout");
?>