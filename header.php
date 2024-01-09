<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="./RESSOURCES/CSS/bandeaux.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">
    <script src="./RESSOURCES/JAVASCRIPT/script.js"></script>
</head>


<section class="bande_haut_de_page">
        <div class="titre_haut_de_page">
            <a href="./index.php"><img src="./RESSOURCES/IMAGES/logo_white.svg" alt="NoiseMapper Logo"></a>
            <a href="./index.php">NoiseMapper</a>
            <a href="./forum.php"><li>Forum</li></a>
            <a href="./tarifs.php"><li>Tarifs</li></a>
            <a href="#footer"><li>En savoir plus</li></a>
            <div class="dropdown">
            <?php
            if (isset($_SESSION['user_email'])) {
                echo '<li><img class="profile-picture" src="' . $_SESSION['user_photo'] .'" alt="Photo de profil">'. $_SESSION['user_name'];
                echo '</li>';
                echo '<div class="dropdown-content">';
                echo '<a href="profil.php#profil">Mon profil</a>';
                echo '<a href="disconnect.php">Se déconnecter</a>';
                echo '</div>';
            } else {
                echo '<li>Mon compte</li>';
                echo '<div class="dropdown-content">';
                echo '<a href="login.php">Se connecter</a>';
                echo '<a href="signin.php">Créer un compte</a>';
                echo '</div>';
            }
            ?>
        </div>
        </div>
</section>
<body>
      
</body>
</html>