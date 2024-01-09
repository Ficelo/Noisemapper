<?php

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

include('db.php');

$user_id = $_SESSION['user_id']; 
$sql = "SELECT * FROM Question WHERE idUser = $user_id";
$result = $conn->query($sql);

echo $result;
$conn->close();
?>
