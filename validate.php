<?php
  // Include database connection file
  include_once "config.php";
  if (isset($_POST['submit'])) {
    
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string(md5($_POST['password']));
    $name     = $con->real_escape_string($_POST['name']);
    $role     = $con->real_escape_string($_POST['role']);
    $query  = "INSERT INTO admins (name,username,password,role) VALUES ('$name','$username','$password','$role')";
    $result = $con->query($query);
    if ($result==true) {
      header("Location:login.php");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   
  }
?>