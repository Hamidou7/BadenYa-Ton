<?php
    $conn= mysqli_connect("localhost", "root" ,"", "badenya-ton");
    if($conn){
        echo" ";
    }else{
        echo"erreur" .mysqli_connect_error();
    }


?>