<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NoiseMapper</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">

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
    </section>

    <section class="banner">
        <div class="mask">
            <h1>NoiseMapper</h1>
        </div>
    </section>
    
</head>

<body>
    
    <main>
    

    <section id="mission" class="content-section">
    <div class="section-content">
        <h1>Qui sommes nous</h1>
        <p>Nous sommes bla blablablablablablablablablablablabla</p>
    </div>
    <div class="section-image">
        <img class="taille" src="../grp.jpg" alt="Mission Image">
    </div>
</section>

    <section id="histoire" class="content-section">
        
    <img class="taille" src="../grp_2.jpg" alt=" histoire image">
    <div class="section-content">
        <h1>Notre histoire</h1>
        <p>Blablablablablablablablabla
            Blablablablablablablablabla
        </p>
</div>
    </section>
    <!-- SLIDER -->
    
    <div class="slider-container slider-1">
    <h1>NoiseMapper en quelque images</h1>
        <div class="slider">
        <img class="taille1" src="../grp.jpg" alt="Mission Image">
        <img class="taille1" src="../grp_2.jpg" alt="Mission Image">
        <img class="taille1" src="../grp_2.jpg" alt="Mission Image">
        <img class="taille1" src="../grp.jpg" alt="Mission Image">
            
        </div>
    </div>


</main>

    </script>
    
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
    
</body>

</html>

<style>
 body {
        margin: 0;
        padding: 0;
        overflow: hidden;

        background: rgb(195,125,34);
        background: linear-gradient(271deg, rgba(195,125,34,1) 0%, rgba(237,45,253,1) 100%);  
        color: white;
 }
      
      .banner {
        background-image: url('../ban.jpg'); /* Ajoutez le chemin vers votre image */
        background-size: cover; /* Assurez-vous que l'image couvre toute la bannière */
        background-position: center; /* Centre l'image dans la bannière */
        color: #fff;
        text-align: center;
        padding: 50px;
        width: 100%; /* Largeur de la bannière à 100% */
        height: 200px; /* Hauteur fixe de la bannière */
        position: relative;
        clip-path: polygon(80% 0, 80% 78%, 59% 96%, 29% 75%,0 88%,0 0 round 20%);
        display: flex;
        justify-content: center;
        align-items: center;
      }
      
      .mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        clip-path: polygon(80% 0, 80% 78%, 59% 96%, 29% 75%,0 88%,0 0 round 20%);
        background-color: rgba(0, 0, 0, 0.5); /* Couleur du masque */
        
      }
      .content-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px;
    }
    
    #mission .section-content {
        flex: 1;
    }
    
    #mission .section-image {
        flex-shrink: 0;
        margin-left: 20px; 
    }
    
    #histoire .section-content {
        flex: 1;
    }
    
    #histoire .section-image {
        flex-shrink: 0;
        margin-left: 20px; 
    }
    .section-content
    {
        margin-left: 10%;
    }

    .taille
    {
        max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
    border-radius: 20px; /* Bordure arrondie */
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.2); /* Ombre légère */
    transition: transform 0.3s ease-in-out; /* Transition pour l'effet au survol */
    width: 450px;
    height: 300px;


    }
    .taille1
    {
        max-width: 150%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
    border-radius: 20px; /* Bordure arrondie */
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.2); /* Ombre légère */
    transition: transform 0.3s ease-in-out; /* Transition pour l'effet au survol */
    width: 450px;
    height: 400px;
    }
    
    .taille:hover
    {
        transform: scale(1.1); /* Agrandir l'image au survol */
    }
    .taille1:hover
    {
        transform: scale(1.1);   
    }
  
    .slider-1
    {
        max-width: 600px;
        margin: 100px auto;
        overflow: hidden;
        
    }
    .slider-1 .slider
    {
        display: flex;
        animation: slider-1 12s infinite ease-in-out;
    }
    .slider-1 img
    {
        flex-shrink: 0;
        width: 100%;
    }
    @keyframes slider-1 {
        0%, 100% {
            transform: translate(0);
        }
        25%, 50% {
            transform: translate(-100%);
        }
        75% {
            transform: translate(-200%);
        }
    }
   
    h1
    {
        font-size: 32px;
    }
    p
    {
        font-size: 20px;
    }




</style>
