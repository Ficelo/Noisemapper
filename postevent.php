<?php

    include("./config/config.php");
    $servername = $SERVERNAME;
    $username = $USERNAME;
    $password = $PASSWORD;
    $dbname = $DBNAME;


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    //echo "Connected successfully";
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

    $DATE = $anneeValue."-".$moisValue."-".$buttonValue." 00:00:00";

    // echo "<p>Jour : ".$buttonValue."</p>";
    // echo "<p>Mois : ".$moisValue."</p>";
    // echo "<p>Année : ".$anneeValue."</p>";
    // echo "<p>Nom de l'évenement : ".$nomEvenement."</p>";


    $sql = "INSERT INTO Concert (`Durée`, `Nom`, `Date`, `Description`, `Classique`, `Placement`, `Salle_idSalle`, `User_idUser`) 
                    VALUES (120 ,'$nomEvenement', '$DATE', 'descriptionz test', 0, NULL, 1, 5)";
    //echo $sql;


    if ($conn->query($sql) === TRUE) {
        //echo "C'est carré";
    } else {
        //echo "AUUUUUUUGH " . $conn->error;
    }
     
    header('Location: artiste.php');
?>