<?php

    session_start();

    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }

    include("./config/config.php");
    $servername = $SERVERNAME;
    $username = $USERNAME;
    $password = $PASSWORD;
    $dbname = $DBNAME;


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

?>

<?php 

    $MOIS = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"];

    function findIndexInArray($array, $mot) {

        for($i = 0; $i< count($array); $i++) {
            if($array[ $i ] == $mot) {
                return $i + 1;
            }

        }

    }

    

    $buttonValue = $_POST["buttonValue"];
    $moisValue = findIndexInArray($MOIS, $_POST["moisValue"]);
    $anneeValue = $_POST["anneeValue"];
    $nomEvenement = $_POST["nom-evenement"];
    $dureeEvenement = $_POST["duree-evenement"];
    $descriptionEvenement = $_POST["description-evenement"];
    $classique = $_POST["classique"];
    $salleEvenement = $_POST["salle-evenement"];
    $idUser = $_SESSION['user_id'];

    if ($classique == "on") {
        $classique = 1;
    } else {
        $classique = 0;
    }

    $DATE = $anneeValue."-".$moisValue."-".$buttonValue." 00:00:00";

    $stmt = $conn->prepare("INSERT INTO Concert (`Durée`, `Nom`, `Date`, `Description`, `Classique`, `Placement`, `Salle_idSalle`, `User_idUser`)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssisii", $duree, $nom, $date, $desc, $class, $place, $salle, $id);

    $duree = $dureeEvenement;
    $nom = $nomEvenement;
    $date = $DATE;
    $desc = $descriptionEvenement;
    $class = $classique;
    $place = NULL;
    $salle = $salleEvenement;
    $id = $idUser;
    $stmt->execute();

    $stmt->close();
    $conn->close();
    header('Location: artiste.php');
?>