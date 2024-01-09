<?php
include('./config/config.php');

$servername = $SERVERNAME;
$username = $USERNAME;
$password = $PASSWORD;
$dbname = $DBNAME;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
?>
