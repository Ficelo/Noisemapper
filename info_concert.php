<?php
if (!isset($_SESSION['user_email'])) {
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NoiseMapper</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">
    <?php

        // Connexion à la base de données

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

        $query = 'SELECT * FROM concert' ;
        $result = $conn->query($query);
        //$rows = array($result); semble inutile
        
        // Pour initier la page au 1er concert de la bdd (si y a pas de id dans l'url)
        if (isset($_GET["id"])) {
        }else {
            $NumConcert = NULL;
            $Tempo = 0;
            while ($NumConcert == NULL) {
                foreach ($result as $row) {
                    if ($row['idConcert'] == $Tempo){
                        $NumConcert = $Tempo;
                    }
                }
            $Tempo++;
            }
        header("Location: Page_info_concert.php?id=" . urlencode($NumConcert));
        }

    session_start();
    $_SESSION["num_concert"] = intval(htmlspecialchars($_GET["id"]));
    

    //Détermine le prochain idConcert
    $Changer = 0;
    $PageSuivant = -1;
    foreach ($result as $row) {
        if ($row['idConcert'] > htmlspecialchars($_GET["id"])) {
            if ($Changer == 0){
                $PageSuivant = $row['idConcert'] ;
                $Changer = 1;
                //header("Location: test_url.php?id=" . urlencode($row['idConcert']));
            }
        }
    }
    if ($Changer == 0) {
        $Tempo = 0;
        while ($PageSuivant == -1) {
            foreach ($result as $row) {
                if ($row['idConcert'] == $Tempo){
                    $PageSuivant = $Tempo;
                }
            }
        $Tempo++;
        }
    }


        //Détermine le précédent idConcert
        $Changer = 0;
        $PagePrecedent = -1;
        foreach ($result as $row) {
            if ($row['idConcert'] < htmlspecialchars($_GET["id"])) {
                $PagePrecedent = $row['idConcert'] ;
                }
            }
        if ($PagePrecedent == -1) {
            foreach ($result as $row) {
                if ($row['idConcert'] > $PagePrecedent){
                    $PagePrecedent = $row['idConcert'];
                }
            }
            }
    ?>
</head>

<body>
    <section class="bande_haut_de_page">
        <div class="titre_haut_de_page">
            <!-- Contenu haut de la page-->
            <img src="data/Group_3.svg" alt="">
            <li>NoiseMapper</li>
            <li>Forum</li>
            <li>Tarif</li>
            <li>En savoir plus</li>
            <li>Mon compte</li>
        </div>
    </section >

    <?php


    ?>

    <div class="bandeau_noir">
        <p class="depla">
            <?php
            $selectEvent1;            
            foreach ($result as $row) {
                if($row['idConcert'] == intval(htmlspecialchars($_GET["id"]))) {
                    $selectEvent1 = $row;
                }
            }
            echo $selectEvent1['Nom'];
            ?>
        </p>
            
    </div>

    <div>
        <p class="txt_fleche"> 
            <?php echo $selectEvent1['Nom']; ?>
        </p>
    </div>
    <div class="flecheG">
        <?php 
        $urlfinalsuivant = "Page_info_concert.php?id=$PageSuivant";
        $urlfinalprecedent = "Page_info_concert.php?id=$PagePrecedent";
        //Flèche de Gauche
        echo '<a href="';
        echo $urlfinalprecedent;
        echo '"><img class="flecheG" src="data/flecheG.png"></a>';
        ?>
    </div>
        <?php
        //Flèche de droite
        echo '<a href="';
        echo $urlfinalsuivant;
        echo '"><img class="flecheD" src="data/flecheD.png"></a>';
        ?>


   

    <div>
        <fieldset class="field">
            <legend class="leg">Instruments</legend>
            <table >
                <tbody>
                    <tr>
                    <td><?php 
                        // Afficher les noms des instruments sur le site web
                        $query2 = 'SELECT * FROM instrument' ;
                        $result2 = $conn->query($query2);
                    
                        $selectEvent3;
                        foreach ($result2 as $row) {
                             if($row['idConcert'] == intval(htmlspecialchars($_GET["id"]))) {
                                $selectEvent3 = $row;
                                echo  "<span class='texte_instrument' >" . $row['instrument'] . "</span> <br>";
                    
                             }
                        }
                    ?></td>
                </tr>
                </tbody>
            </table>
        </fieldset>
        <a ><img class="im_concert" src="data/image_instruments.png "> </a>
    </div>
    
   
    <div class="manque">
        <a>Il manque un instrument?</a>
    </div>

    <?php
        if ($_SESSION['user_role'] <= 1) {
            ?>
            <form method="post" action="controlleur_page_info_concert.php">
                <label for="champ_saisie"></label>
                <input type="text" name="champ_saisie" id="champ_saisie" required style="margin-left: 7%;">
                <input type="submit" value="Ajouter">
            </form>
            <?php 
            exit();
            } ?>

    <br></br>
    <br></br>
    <br></br>
    <br></br>

    <div class="bandeau_noir_2">
        <p class="depla"> Où se placer</p>
    </div>
    
    <div class="txt_titre_bas">
        <a>Estrade</a>
    </div>

    <div class="bloc">
        <label for="pref"></label>
        <select name="Preference" id="pref" class="entree">
            <option class="txt" value="" disabled selected>Préférence</option>
            <option class="txt" value="jsp">jsp</option>
            <option class="txt" value="tjr">txt</option>
        </select>
    </div>

    <div class="img_placement">
        <a><img class="" src="data/placement,screen.png"></a>
    </div>

    <div class="txt_nom_bas">
        <?php
            // Afficher les noms des instruments sur le site web
            $query3 = 'SELECT * FROM salle' ;
            $result3 = $conn->query($query3);
        
            $selectEvent4;
            foreach ($result as $row) {
                if($row['idConcert'] == intval(htmlspecialchars($_GET["id"]))){
                    foreach ($result3 as $row2){
                        if($row['Salle_idSalle'] == $row2['idSalle']) {
                            $selectEvent4 = $row2['Nom'];
                        }
                    }
                }
            }
            echo  $selectEvent4;
                        
        ?>
    </div>

    <br></br>
</body>

<footer class="footer">
    <!-- Logo de l'entreprise à gauche -->
    <div class="flex-footer-item">
        <img class="footer-logo" src="data/logo_white.svg" alt="NoiseMapper">NoiseMapper
    </div>

    <!-- Liens du plan du site à gauche -->
    <div class="flex-footer-item">
        <a id="footer" href="/">Accueil</a>
        <a href="tarifs.php">Tarifs</a>
        <a href="/">A propos</a>
        <a href="/">Mentions Légales</a>
        <br>
        © 2023 NoiseMapper
    </div>


    <!-- Liens des réseaux sociaux à droite -->
    <div class="flex-footer-row">
        <a href="#"><img class="social-icon" src="data/facebook.svg" alt="Facebook"></a>
        <a href="#"><img class="social-icon-small" src="data/twitter.svg" alt="Twitter"></a>
        <a href="#"><img class="social-icon-big" src="data/instagram.svg" alt="Instagram"></a>
    </div>
</footer>

</html>
