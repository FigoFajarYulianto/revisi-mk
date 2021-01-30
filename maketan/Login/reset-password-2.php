<?php

if (isset($_POST["reset-password-submit"])) {
    
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header ("Location: ../create-new-password.php?newpwd=empty");
      exit();
    } else if ($password != $passwordRepeat) {
        header ("Location: ../create-new-password.php?newpwd=pwdnotsame");
      exit();
    }

    $currentDate = date("U");

    require 'koneksi.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
    }else {
    mysqli_stmt_bind_param($stmt, "s", $selector);
    mysqli_stmt_execute($stmt);
    }

} else {
    header("Location: ../Dasboard.php");
}