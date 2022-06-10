<?php
    $conn= mysqli_connect("localhost", "root" ,"", "chat");
    if($conn){
        echo" ";
    }else{
        echo"erreur" .mysqli_connect_error();
    }


?>