<?php
session_start();

// Message à toutes les personnes qui vont lire mon code :
// Bonne chance mon reuf même moi je sais plus trop ce que j'ai écrit

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

include('db.php');

// On récupère l'id et le rôle de l'utilisateur connecté
$user_id = $_SESSION['user_id']; 
$sql = "SELECT * FROM User WHERE idUser = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $role = $user_data['Role'];
} else {
    echo "Utilisateur non trouvé.";
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Artiste</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Montserrat&family=Nunito+Sans&family=Nunito:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./RESSOURCES/CSS/bandeaux.css">
    <link rel="stylesheet" href="./RESSOURCES/CSS/artiste.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./RESSOURCES/JAVASCRIPT/formButton.js"></script>

</head>
<body>

<?php

    include("../config/config.php");
    $servername = $SERVERNAME;
    $username = $USERNAME;
    $password = $PASSWORD;
    $dbname = $DBNAME;


    $conn = new mysqli($servername, $username, $password, $dbname);
?>

<?php include('header.php'); ?>


<section class="banderole">
    <div class="Top_evenements">
        <H2>Programmer un évenement</H2>             
    </div>
</section>

<form action="postevent.php" method="post">
    <div class="calendrier-instertion-container">

        <!-- 
            Là y'a le calendrier, en gros c'est un giga form et les jours c'est des boutons,
            quand tu clique un jours, y'a une fonction JS qui change la value d'un des <input type="hidden">
            comme ça quand on submit ça envoie la valeur du jour, du mois et de l'année
            
        -->
        <div class="calendrier">
            <div class="calendrier-mois">
                <p id="moisAnnee">Janvier 2024</p>
                <img onclick="changerMoisGauche()" id="flecheGauche" src="../RESSOURCES/IMAGES/flecheG.svg" alt="">
                <img onclick="changerMoisDroite()" id="flecheDroite" src="../RESSOURCES/IMAGES/flecheD.svg" alt="">
            </div>
            <div class="calendrier-jours">
                <table>
                    <tr>
                        <th>Lun</th>
                        <th>Mar</th>
                        <th>Mer</th>
                        <th>Jeu</th>
                        <th>Ven</th>
                        <th>Sam</th>
                        <th>Dim</th>
                    </tr>
                    <tr class="hover-bleu">
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="1"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="2"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="3"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="4"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="5"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="6"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="7"></th>
                    </tr>
                    <tr class="hover-bleu">
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="8"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="9"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="10"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="11"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="12"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="13"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="14"></th>
                    </tr>
                    <tr class="hover-bleu">
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="15"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="16"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="17"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="18"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="19"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="20"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="21"></th>
                    </tr>
                    <tr class="hover-bleu">
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="22"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="23"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="24"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="25"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="26"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="27"></th>
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="28"></th>
                    </tr>
                    <tr class="hover-bleu">
                        <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="29"></th>
                        <th id="30"><input onclick="showValue(this)" class="button-blue-day" type="button" value="30"></th>
                        <th id="31"><input onclick="showValue(this)" class="button-blue-day" type="button" value="31"></th>
                        
                    </tr>

                    <input type="hidden" id="buttonValue" name="buttonValue" value="1">
                    <input type="hidden" id="moisValue" name="moisValue" value="Janvier">
                    <input type="hidden" id="anneeValue" name="anneeValue" value="2024">
                </table>    
            </div>
        </div>

        <div class="evenement-creation-wrapper">
            <div class="evenement-creation-div">
                
                    <input class="evenement-creation" type="text" name="nom-evenement" id="nom-evenement" placeholder="Nom de l'évenement"><br>
                    <input class="evenement-creation" type="number" name="duree-evenement" id="duree-evenement" placeholder="Durée du concert en minutes"><br>
                    <textarea class="evenement-creation" name="description-evenement" id="description-evenement" cols="30" rows="10" placeholder="Description"></textarea><br>
                    <div class="evenement-creation evenement-check">
                        <label id="classique-label" for="classique">Classique : </label>
                        <input type="checkbox" name="classique" id="classique"><br>
                    </div>
                    <div class="file-upload-container">
                        <p>Insérez l'image de couverture du concert : </p>
                        <input type="file" name="file-upload" id="file-upload">
                    </div>
                    
                    
                    <select class="evenement-creation" name="salle-evenement" id="salle-evenement"><br>
                        <?php
                            $sql = "SELECT Nom, idSalle FROM Salle";
                            $result = $conn->query($sql) or die(mysqli_error($conn));
                            $salles_nom_avis = $result->fetch_all();

                            for($i = 0; $i < sizeof($salles_nom_avis); $i++){
                                echo "<option class='evenement-creation-option' value=".$salles_nom_avis[$i][1]." selected='true'>".$salles_nom_avis[$i][0]."</option>";
                            }
                        ?>
                    </select><br>
                
            </div>

            <div class = "evenement-boutons" id="evenements-boutons">
                <input type="reset" id="bouton-annuler" value="Annuler">
                <input type="submit" id="bouton-creer" value="Créer">
            </div>
        </div>

    </div>
</form>

<?php include('footer.php'); ?>

</body>
</html>