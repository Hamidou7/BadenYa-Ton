<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "badenya-ton");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Attempt create table query execution
$sql = "CREATE TABLE user(
    `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(122) NOT NULL,
  `lname` varchar(222) NOT NULL,
  `adess` varchar(222) NOT NULL,
  `conta` int(222) NOT NULL,
  `stat` varchar(222) NOT NULL,
  `pass` int(111) NOT NULL,
  `confi_pass` int(111) NOT NULL,
  PRIMARY KEY (`id`)
)
)";
if ($mysqli->query($sql) === true) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();
