<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="togunatech.css">
    <title>INFO SUR LES MEMBRES</title>
</head>
<body>
    <form method="POST" action="infomembre.php">
      <fieldset class="infocadre">
         <nav  class="info">
            Information sur les membres
         </nav>
         <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "badenya-ton";
$id = "user_id";
$user_id = ($_GET['id']);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fname, lname,  adess, conta,stat FROM users where user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '
             
         <labebel class="tire" for=>Prenom : <samp>'.$row['fname'].'</samp><br><br>
         <label  class="tire" for=>Nom : <samp>'.$row['lname'].'</samp></label><br><br>
         <label class="tire" for=>Adresse : <samp>'.$row['adess'].'</samp> </label><br><br>
         <label class="tire" for=>Contact : <samp>'.$row['conta'].'</samp> </label><br><br>
         <label class="tire" for=>Statut : <samp>'.$row['stat'].' </samp> </label><br><br>
         <a href="accueil.php"><button class="sayam"> Retour</button></a>
      </fieldset>
      ';
   }
}
?>

 </form>
</body>
</html>