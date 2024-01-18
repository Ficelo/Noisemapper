<?php session_start();?>
<?php include('./header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoiseMapper</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./RESSOURCES/CSS/bandeaux.css" />
    <link rel="stylesheet" href="./RESSOURCES/CSS/index.css" />
    
    <script src="./RESSOURCES/JAVASCRIPT/formButton.js"></script>

</head>
<body>
    <section class="banderole">
        <div class="Top_evenements">
            <H2>Top Évènements</H2>
        </div>
    </section>

    
    <section class="slider">
        <img src="RESSOURCES/IMAGES/1.jpg" alt="img1" class="img__slider active" />
        <img src="RESSOURCES/IMAGES/2.jpg" alt="img2" class="img__slider" />
        <img src="RESSOURCES/IMAGES/3.jpg" alt="img3" class="img__slider" />
        <img src="RESSOURCES/IMAGES/4.jpg" alt="img3" class="img__slider" />
        <img src="RESSOURCES/IMAGES/5.jpg" alt="img3" class="img__slider" />
        <img src="RESSOURCES/IMAGES/6.jpg" alt="img3" class="img__slider" />

        <div class="suivant">
            <i class="fas fa-chevron-circle-right"></i>
        </div>
        <div class="precedent">
            <i class="fas fa-chevron-circle-left"></i>
        </div>
    </section>
    <script src="RESSOURCES/JAVASCRIPT/app.js"></script>

    <section class="banderole">
        <div class="Top_evenements">
            <H2>Calendrier des Évènements</H2>
        </div>
    </section>

    <form action="postevent.php" method="post">
    <div class="calendrier-instertion-container">


        <div class="calendrier">
            <div class="calendrier-mois">
                <p id="moisAnnee">Janvier 2024</p>
                <img onclick="changerMoisGauche()" id="flecheGauche" src="/RESSOURCES/IMAGES/flecheG.svg" alt="">
                <img onclick="changerMoisDroite()" id="flecheDroite" src="/RESSOURCES/IMAGES/flecheD.svg" alt="">
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
                        <th><input id="date-2024-01-02" onclick="showValue(this)" class="button-blue-day" type="button" value="2"></th>
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


    </div>
    


</form>

    <section class="banderole">
        <div class="Top_evenements">
            <H2>Note des Concerts</H2>
        </div>

        <form id="ratingForm">

    </section>

    <?php
include('db.php');



// Sélectionne les données nécessaires de la table Concert
$sql = "SELECT idConcert, Nom FROM Concert";

// Exécute la requête SQL
$result = $conn->query($sql);

// Vérifie si des données ont été récupérées avec succès
if ($result->num_rows > 0) {
    // Initialise le tableau pour stocker les données
    $concerts = array();

    // Parcourt les données et les stocke dans le tableau
    while($row = $result->fetch_assoc()) {
        $concerts[] = $row;
    }
} else {
    // Si aucune donnée n'est disponible, renvoie un tableau vide
    echo json_encode(array());
}

// Ferme la connexion à la base de données
$conn->close();
?>


</form>
<div class="notetot">
        <div class="rating-container">
            <div class="rating-stars" id="ratingStars">
                <span class="star" onclick="setRating(1)">&#9733;</span>
                <span class="star" onclick="setRating(2)">&#9733;</span>
                <span class="star" onclick="setRating(3)">&#9733;</span>
                <span class="star" onclick="setRating(4)">&#9733;</span>
                <span class="star" onclick="setRating(5)">&#9733;</span>
            </div>

 

    <form action="votreScriptDeTraitement.php" method="post">
        <label for="selectConcert">Choisissez un concert :</label>
        <select id="selectConcert" name="selectConcert">
            <?php
            // Inclure le fichier de configuration de la base de données
            include('./db.php');

            // Requête pour récupérer les noms des concerts
            $sql = "SELECT Nom FROM concert";
            $result = $conn->query($sql);

            // Vérifier s'il y a des résultats
            if ($result->num_rows > 0) {
                // Parcourir les résultats et ajouter des options à la liste déroulante
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["Nom"] . "'>" . $row["Nom"] . "</option>";
                }
            } else {
                echo "<option value=''>Aucun concert disponible</option>";
            }

            // Fermer la connexion
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Attribuer une note">
    </form>
</div>
</div>
    

</body>



    
<?php include('./footer.php'); ?>

</html>
