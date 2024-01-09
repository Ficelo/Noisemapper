<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NoiseMapper</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">
</head>
<body>
    <section class="bande_haut_de_page">
        <div class="titre_haut_de_page">
            <img src="data/Group_3.svg" alt="">
            <li>NoiseMapper</li>
            <li>Forum</li>
            <li>Tarif</li>
            <li>En savoir plus</li>
            <li>Mon compte</li>
        </div>
    </section >
    <?php
    require('db.php');
    $sth= $conn->query('SELECT * FROM instruments');
    $rows= $sth ->fetch_all(MYSQLI_ASSOC);
    ?>

    <div class="bandeau_noir">
        <p class="depla"> Nom du concert</p>
            
    </div>

    <div>
        <p class="txt_fleche"> Eminem Concert Rapture New Zealand </p>
        <img class="fleche" src="data/flecheG.svg"><img class="fleche" src="data/flecheD.svg">
    </div>

   

    <div>
        <fieldset class="field">
            <legend class="leg">Instruments</legend>
            <table>
                <tbody>
                    <tr>
                    <?php foreach ($rows as $row): ?>
         
                        <td><?php echo $row['instruments']; ?></td>
                 
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </fieldset>
        <a ><img class="im_concert" src="data/image_instruments.png "> </a>
    </div>
    
   
    <div class="manque">
        <a>Il manque un instrument?</a>
    </div>

    <div>
    <label for="instr"></label>
        <select name="" id="instr" class="entree">
            <option class="txt" value="violon">Violon</option>
            <option class="txt" value="guitare">Guitare</option>
        </select>
        <input type="submit" id="" value="Ajouter" class="bouton">
    </div>
        
    
    
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
        <a>Accor Arena, Bercy</a>
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