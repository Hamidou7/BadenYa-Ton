<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "badenya-ton";
try{
    $connect= new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password) ;
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
    echo " la connection a été bien etabli au database badenyaton!";
} 
catch (PDOException $e) {
   echo "Erreur : " .$e->getmessage();
}
?>       