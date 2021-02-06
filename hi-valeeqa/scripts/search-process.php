<?php

    require_once "connection.php";
    $search = $_GET["search"];
    header("Location: search.php?s=$search");

?>