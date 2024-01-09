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
</head>
<body>
    <section class="banderole">
        <div class="Top_evenements">
            <H2>Top Évènements</H2>
    
        </div>
    </section>


    <section class="slider">
        <img src="./RESSOURCES/IMAGES/1.jpg" alt="img1" class="img__slider active" />
        <img src="./RESSOURCES/IMAGES/3.jpg" alt="img3" class="img__slider" />
        <img src="./RESSOURCES/IMAGES/2.jpg" alt="img2" class="img__slider" />
        <img src="./RESSOURCES/IMAGES/4.jpg" alt="img4" class="img__slider" />
        <img src="./RESSOURCES/IMAGES/5.jpg" alt="img5" class="img__slider" />
        <img src="./RESSOURCES/IMAGES/6.jpg" alt="img6" class="img__slider" />

        <div class="suivant">
            <i class="fas fa-chevron-circle-right"></i>
        </div>
        <div class="precedent">
            <i class="fas fa-chevron-circle-left"></i>
        </div>
    </section>
    <script src="app.js"></script>

    <section class="banderole">
        <div class="Top_evenements">
            <H2>Calendrier des Évènements</H2>
        </div>
    </section>

    <section class="calendrier-total">
            <div class="calendrier">
                <div class="calendrier-mois">
                    <p id="moisAnnee">Janvier 2024</p>
                    <img onclick="changerMoisGauche()" id="flecheGauche" src="./ressources/images/flecheG.svg" alt="">
                    <img onclick="changerMoisDroite()" id="flecheDroite" src="./ressources/images/flecheD.svg" alt="">
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
                            <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="30"></th>
                            <th><input onclick="showValue(this)" class="button-blue-day" type="button" value="31"></th>
                        </tr>
        
                        <input type="hidden" id="buttonValue" name="buttonValue" value="">
                        <input type="hidden" id="moisValue" name="moisValue" value="">
                    </table>    
                </div>
            </div>
              
        </div>
        
    </section>

    <section class="banderole">
        <div class="Top_evenements">
            <H2>Note des Concerts</H2>
        </div>
    </section>

    <?php
            $notesTotale = 26;

            function pourcentage($num, $total) {
                return ($num/$total)*100;
            }


    ?>

    <div class="avis-container">
        <div class="avis-resume">
            
            <div class="resume-temp">
                <div class="notes-barres">
                    <div class="note-container">
                        <p style="width: 10%;">5</p>
                        <div class="barre-container" style="width: 100%;">
                            <div class="barre" style="width:  <?php echo pourcentage(18,28);?>%;"></div>
                        </div>
                    </div>
                    <div class="note-container">
                        <p style="width: 10%;">4</p>
                        <div class="barre-container" style="width: 100%;">
                            <div class="barre" style="width: <?php echo pourcentage(4,28);?>%;"></div>
                        </div>
                    </div>
                    <div class="note-container">
                        <p style="width: 10%;">3</p>
                        <div class="barre-container" style="width: 100%;">
                            <div class="barre" style="width: <?php echo pourcentage(3,28);?>%;"></div>
                        </div>
                    </div>
                    <div class="note-container">
                        <p style="width: 10%;">2</p>
                        <div class="barre-container" style="width: 100%;">
                            <div class="barre" style="width: <?php echo pourcentage(1,28);?>%;"></div>
                        </div>
                    </div>
                    <div class="note-container">
                        <p style="width: 10%;">1</p>
                        <div class="barre-container" style="width: 100%;">
                            <div class="barre" style="width: <?php echo pourcentage(2,28);?>%;"></div>
                        </div>
                    </div>
                </div>
    
                <div class="note-gros-chiffre">
                    <p class="grosse-note">4,7</p>
                    <div class="grosse-note-etoiles">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    
                    <p class="nombre-avis"> <?php echo $notesTotale?> avis</p>
                </div>
                
            </div>
    
        </div>
        <div class="avis-mesavis">
            <h3 id="avis-titre">Mes Avis</h3>
        </div>
    </div>

        <section class="banderole">
            <div class="Top_evenements">
                <H2>Bande du bas</H2>
            </div>
        </section>
        <section>
    <?php include('./footer.php'); ?>
</section>
    
</body>



</html>