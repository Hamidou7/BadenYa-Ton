<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="togunatech.css">
    <title>Admin liste de membres</title>
</head>
<body>
    <nav class="paie">
    
            <img src="imgbadenyaton.jpeg" alt="logobadenyaton">
            <div class="tete">
               
                   <div class="slogan">LA LISTE DES MEMBRE DE BADENYA TON</div>
    </nav>
    <div class="mybleau">
    <table class="styletab">
        <thead>
            <tr>
               <th>NOM</th>
                <th>PRENOM</th>
                <th>ADRESSE</th>
                <th>CONTACT</th>
                <th>STATUT</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "badenya-ton";
$id = "user_id";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id, fname, lname, statu, adess, conta,stat FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo'
        
            <tr>
                <td>
                    
                <a href="infosurmembre.php?id='.$row['user_id'].'">'.$row['fname'].'</a>
                </td>
                
                <td>
                    <a href="infosurmembre.php?id='.$row['user_id'].'"> '.$row['lname'].'</a>
                </td>
                
                <td>
                    <a href="infosurmembre.php?id='.$row['user_id'].'"> '.$row['adess'].'</a>
                </td>
                
                <td>
                    <a href="infosurmembre.php?id='.$row['user_id'].'"> '.$row['conta'].'</a>
                </td>
             
                <td>
                    <a href="infosurmembre.php?'.$row['user_id'].'"> '.$row['stat'].'</a>
                </td>
                <td><a href="ajoutmembre.php"><button class="salam"> Modifier</button></a> <a href="suppresion.php?id='.$row['user_id'].' "><button class="salam"> Supprimer</button></a></td>
            </tr>   
            ';
        }
    }
    ?>
        </tbody>
        
 </table>
    
</div>
<a  href="accueil.php"><button class="rem">Retour</button> </a>
</body>
</html>