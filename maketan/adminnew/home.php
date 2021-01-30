<h2>Selamat Datang Administrator</h2>
<?php
if(!isset($_SESSION['login'])) {
    header("location: login.php");
    exit;
}
?>

<div class="l">

    <img src="Maketan.png" class="user-image img-responsive" />


</div>
<!--<button><a href="../adminnew/home.php" style="text-decoration:none; color:black;">Chat</a></button>-->