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
    <link rel="stylesheet" href="./RESSOURCES/CSS/artiste.css">
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
            <div class="evenement-creation">
                
                    <input class="evenement-creation" type="text" name="nom-evenement" id="nom-evenement" placeholder="Nom de l'évenement"><br>
                    <input class="evenement-creation" type="number" name="duree-evenement" id="duree-evenement" placeholder="Durée du concert en minutes"><br>
                    <textarea class="evenement-creation" name="description-evenement" id="description-evenement" cols="30" rows="10" placeholder="Description"></textarea><br>
                    <div class="evenement-creation">
                        <label for="classique">Classique : </label>
                        <input type="checkbox" name="classique" id=""><br>
                    </div>
                    
                    <select class="evenement-creation" name="salle-evenement" id="salle-evenement"><br>
                        <option value="1" selected="true">Bercy</option>
                        <!-- <option value=""></option>
                        <option value=""></option> -->
                    </select><br>
                
            </div>
            <!-- <div class = "evenement-insertion">
                <img src="./RESSOURCES/IMAGES/image-insertion.png" alt="" id="image-insertion">
            </div> -->
            <div class = "evenement-boutons">
                <input type="reset" id="bouton-annuler" value="Annuler">
                <input type="submit" id="bouton-creer" value="Créer">
            </div>
        </div>

        
        <!-- Ici y'a des trucs à changer pour que ça rende mieux visuellement -->
        <!-- Aussi faut que je vois comment faire l'upload de fichiers. -->

    </div>
</form>


    <section class="banderole">
        <div class="Top_evenements">
            <H2>Note des Concerts</H2>
        </div>
    </section>

    <div class="avis-container">
    <div class="avis-resume">
        
        <?php
            $notesTotale = 26;

            function pourcentage($num, $total) {
                return ($num/$total)*100;
            }


        ?>

        <h4 class="titre-concert">
            <?php 

                $sql = "SELECT Nom, Description FROM concert WHERE idConcert = 17";
                $result = $conn->query($sql) or die(mysqli_error($conn));

                $row = $result->fetch_assoc();
                echo $row["Nom"]." : ".$row["Description"];
            ?>
        </h4>

        <?php
            $sql = "SELECT COUNT(idAvis) as totalAvis FROM Avis WHERE Concert_idConcert = 17";
            $result = $conn->query($sql) or die(mysqli_error($conn));

            $row = $result->fetch_assoc();
            $TOTALAVIS = $row["totalAvis"];

            function trouverNombreNote($note, $conn) {
                $sql = "SELECT COUNT(idAvis) as totalAvis FROM Avis WHERE Note = $note";
                $result = $conn->query($sql) or die(mysqli_error($conn));

                $row = $result->fetch_assoc();
                return $row["totalAvis"];
            }

            $NOTES_1 = trouverNombreNote(1, $conn);
            $NOTES_2 = trouverNombreNote(2, $conn);
            $NOTES_3 = trouverNombreNote(3, $conn);
            $NOTES_4 = trouverNombreNote(4, $conn);
            $NOTES_5 = trouverNombreNote(5, $conn);
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
            $sql = "SELECT User_idUser, Note, Commentaire FROM Avis WHERE Concert_idConcert = 17";
            $result = $conn->query($sql) or die(mysqli_error($conn));

            //$row = $result->fetch_assoc();
            //echo $row["User_idUser"]." ".$row["Note"]." ".$row["Commentaire"];
            
        $imageProfilDefaut = "../RESSOURCES/IMAGES/Ellipse 5.png";

        $testAvis = array(array("./ressources/images/Ellipse 5.png", 5, "sah c'était trop bien"), 
                        array("./ressources/images/Ellipse 6.png", 4, "bien mais y avait pas de chips"),
                        array("./ressources/images/Ellipse 7.png", 4, "du blalala sah j'ai le flemme d'inventer"),
                        array("./ressources/images/Ellipse 9.png", 3, "encore de la merde faut bien meubler toi même tu sais"),
                        array("./ressources/images/Ellipse 11.png", 5, "En train de poser un classique"));
        
        while($row = $result->fetch_assoc()) {
        
            //$row = $result->fetch_assoc();
            //echo $row["User_idUser"]." ".$row["Note"]." ".$row["Commentaire"];
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
    
</section>
    
</body>



</html>
