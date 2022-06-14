<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $statu = "Offline now";
        $sql = mysqli_quer
    }
} else {
    header("location: ../login.php");
}
