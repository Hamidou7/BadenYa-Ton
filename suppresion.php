 <?php $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "badenya-ton";
//  $id = "user_id";
 $user_id = $_GET['id'];

 echo $user_id;
 
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }; 

$sql = "DELETE FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
echo "suprimer avec scces"



?>
