<?php
    $conn= mysqli_connect("localost", "root" ,"", "badenya-ton");
    if($conn){
        echo"Connection reussi a la base de donnees";
    }else{
        echo"erreur";
    }


?>