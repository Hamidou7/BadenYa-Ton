<?php

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if (isset($logout_id)) {
        $statu = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET statu = '{$statu}'");
        if ($sql) {
            session_commit();
            session_destroy();
            header("location: ../login1.php");
        }
    } else {
        header("location: ../users.php");
    }
} else {
    header("location: ..login1.php");
}
