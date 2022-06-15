<?PHP
require_once('accueil.php');


$solde=$_POST['solde'];
$etat=$_POST['etat'];

$q=$pdo->prepare('INSERT INTO accueil ( solde,etat)VALUES(?,?)');
$params=array($solde ,$etat);
$q->execute($params);  


?>
