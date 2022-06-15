<?php  
	session_start();
try {
	$strConnection= 'mysql:host=localhost;dbname=Badenya-ton';
	$pdo = new PDO ($strConnection,'root','');
	echo "<h1>Sauvergarder avec succes</h1><br> votre donnee a ete enregistre avec succes";
	} 
catch (PDOException $e){
	echo'';
	
$msg = 'ERREUR PDO dans' . $e->getMessage();
die ($msg);
}
?>