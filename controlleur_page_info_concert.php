<?php
session_start();
$servername="localhost";
$username="root";
$pass="";
$db_name="id21587557_noisemapper";

// Création de la connexion
$conn = new mysqli($servername, $username, $pass, $db_name);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
$Tempo_sql = $_SESSION["num_concert"]; 
$contenu_champ = $_POST["champ_saisie"];

$requete = $conn->prepare("INSERT INTO instrument (instrument,idConcert) VALUES (?, ?)");
$requete->bind_param("si", $contenu_champ,$Tempo_sql);

// Exécution de la requête
if ($requete->execute()) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données : " . $requete->error;
}

$requete->close();

header("Location: info_concert.php");
exit();
?>
