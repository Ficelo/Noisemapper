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

<section class="banderole" id="mesNotes">
    <div class="Top_evenements">
        <H2>Mes notes</H2>             
    </div>
</section>

<div class="avis-container" id="avis-container">
    <div class="avis-resume">
        
        <?php
            $notesTotale = 26;

            function pourcentage($num, $total) {
                return ($num/$total)*100;
            }

        ?>

        <div class="titre-concert-wrapper">
            
                <?php 
                    
                    if(!isset($_POST["nouvelIndex"])){
                        $index = 0;
                    } else {
                        $index = intval($_POST["nouvelIndex"]);
                    }

                    // On récupère tous les concerts de l'artiste
                    $id = $_SESSION["user_id"];
                    $sql = "SELECT Nom, idConcert FROM concert WHERE User_idUser = $id";
                    $result = $conn->query($sql) or die(mysqli_error($conn));

                    $concert_nom_avis = $result->fetch_all();
                    print("<h2 class='titre-avis'>".$concert_nom_avis[$index][0]."</h2>");
                    
                ?>
    

            <?php
                function changeIndex($direction, $taille, $in){
                    if ($direction == 0) {
                        if ($in <= 0) {
                            $in = $taille - 1;
                        } else {
                            $in = $in - 1;
                        }
                    } else {
                        if ($in >= $taille - 1) {
                            $in = 0;
                        } else {
                            $in = $in + 1;
                        }
                    }
                    return($in);
                }
            ?>
            
            <!-- Boutons pour changer les avis affichés -->
            <div class="calendrier-mois boutons-avis">
                <form action="artiste.php#evenements-boutons" method="post" >
                    <button class="" type="submit" name="nouvelIndex" id="flecheGaucheAvis" value="<?php echo changeIndex(0, sizeof($concert_nom_avis), $index); ?>" alt=""></button>
                    <button class="" type="submit" name="nouvelIndex" id="flecheDroiteAvis" value="<?php echo changeIndex(1, sizeof($concert_nom_avis), $index); ?>" alt=""></button>
                </form>
            </div>
        </div>

        <?php
            // On récupère les avis à afficher
            $idConcert = $concert_nom_avis[$index][1];
            $sql = "SELECT COUNT(idAvis) as totalAvis FROM Avis WHERE Concert_idConcert = $idConcert";
            $result = $conn->query($sql) or die(mysqli_error($conn));

            $row = $result->fetch_assoc();
            $TOTALAVIS = $row["totalAvis"];

            function trouverNombreNote($note, $conn, $idConcert) {
                $sql = "SELECT COUNT(idAvis) as totalAvis FROM Avis WHERE Note = $note AND Concert_idConcert = $idConcert";
                $result = $conn->query($sql) or die(mysqli_error($conn));

                $row = $result->fetch_assoc();
                return $row["totalAvis"];
            }

            $NOTES_1 = trouverNombreNote(1, $conn, $idConcert);
            $NOTES_2 = trouverNombreNote(2, $conn, $idConcert);
            $NOTES_3 = trouverNombreNote(3, $conn, $idConcert);
            $NOTES_4 = trouverNombreNote(4, $conn, $idConcert);
            $NOTES_5 = trouverNombreNote(5, $conn, $idConcert);
        ?>

        <p id="res-avis">Résumé des Avis :</p>

        <div class="resume-temp">
            <div class="notes-barres">
                <div class="note-container">
                    <p style="width: 10%;">5</p>
                    <div class="barre-container" style="width: 100%;">
                        <div class="barre" style="width:  <?php echo pourcentage($NOTES_5, $TOTALAVIS);?>%;"></div>
                    </div>
                </div>
                <div class="note-container">
                    <p style="width: 10%;">4</p>
                    <div class="barre-container" style="width: 100%;">
                        <div class="barre" style="width: <?php echo  pourcentage($NOTES_4, $TOTALAVIS);?>%;"></div>
                    </div>
                </div>
                <div class="note-container">
                    <p style="width: 10%;">3</p>
                    <div class="barre-container" style="width: 100%;">
                        <div class="barre" style="width: <?php echo  pourcentage($NOTES_3, $TOTALAVIS);?>%;"></div>
                    </div>
                </div>
                <div class="note-container">
                    <p style="width: 10%;">2</p>
                    <div class="barre-container" style="width: 100%;">
                        <div class="barre" style="width: <?php echo  pourcentage($NOTES_2, $TOTALAVIS);?>%;"></div>
                    </div>
                </div>
                <div class="note-container">
                    <p style="width: 10%;">1</p>
                    <div class="barre-container" style="width: 100%;">
                        <div class="barre" style="width: <?php echo  pourcentage($NOTES_1, $TOTALAVIS);?>%;"></div>
                    </div>
                </div>
            </div>

            <?php

                $moyenne = ($NOTES_1 + $NOTES_2*2 + $NOTES_3*3 + $NOTES_4*4 + $NOTES_5*5)/$TOTALAVIS;
                $moyenne = round($moyenne, 2);

            ?>

            <div class="note-gros-chiffre">
                <p class="grosse-note"><?php echo $moyenne;?></p>
                <div class="grosse-note-etoiles">
                    <?php
                        for($i = 0; $i < 5; $i++){
                            if($i < $moyenne -1){
                                echo "<span class=\"fa fa-star checked\"></span>";
                            }
                            else{
                                echo "<span class=\"fa fa-star\"></span>";
                            }
                        }
                    ?>
                </div>
                
                <p class="nombre-avis">
                    <?php echo $TOTALAVIS;?> avis
                </p>
            </div>
            
        </div>

    </div>

    <div class="avis-mesavis">
        <h3 id="avis-titre">Mes Avis</h3>
        <?php 
            
        $id = $concert_nom_avis[$index][1];
        $sql = "SELECT User_idUser, Note, Commentaire FROM Avis WHERE Concert_idConcert = $id";
        $result = $conn->query($sql) or die(mysqli_error($conn));
            
        $imageProfilDefaut = "../RESSOURCES/IMAGES/Ellipse 5.png";

        $testAvis = array(array("./ressources/images/Ellipse 5.png", 5, "sah c'était trop bien"), 
                        array("./ressources/images/Ellipse 6.png", 4, "bien mais y avait pas de chips"),
                        array("./ressources/images/Ellipse 7.png", 4, "du blalala sah j'ai le flemme d'inventer"),
                        array("./ressources/images/Ellipse 9.png", 3, "encore de la merde faut bien meubler toi même tu sais"),
                        array("./ressources/images/Ellipse 11.png", 5, "En train de poser un classique"));           

        // Ça affiche les commentaires du concert
        while($row = $result->fetch_assoc()) {
            
            echo "<div class=\"avis\">";
            echo "<img src=\"$imageProfilDefaut\"></img>";
            echo "<div class=\"avis-texte\">";
            echo "<p>".$row["Commentaire"]."</p>";
            for($i = 0; $i < 5; $i++){
                if($i<$row["Note"]){
                    echo "<span class=\"fa fa-star checked\"></span>";
                }
                else{
                    echo "<span class=\"fa fa-star\"></span>";
                }
            }
            echo "</div>";
            echo "</div>";
        
        }
        
        ?>

    </div>
</div>

<section class="banderole">
    <div class="Top_evenements">
        <H2>Temps forts du concert</H2>             
    </div>
</section>

<?php
 
$dataPoints = array(
	array("y" => 97, "label" => "20h00"),
	array("y" => 78, "label" => "20h02"),
	array("y" => 87, "label" => "20h04"),
	array("y" => 84, "label" => "20h06"),
	array("y" => 91, "label" => "20h08"),
	array("y" => 75, "label" => "20h10"),
	array("y" => 90, "label" => "20h12")
);
 
// Ça là faudra changer quand on aura des vraies mesures avec le capteur.

?>

<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "",
        },
        axisY: {
            title: ""
        },
        data: [{
            type: "line",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    }
</script>

<h2>Décibels</h2>
<div id="chartContainer"></div>
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
<br>
<br>

<?php include('footer.php'); ?>

</body>
</html>