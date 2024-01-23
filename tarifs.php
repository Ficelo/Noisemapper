<?php 
session_start();
include('./header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tarifs - NoiseMapper</title>
    <link rel="stylesheet" href="./RESSOURCES/CSS/bandeaux.css">
    <link rel="stylesheet" href="./RESSOURCES/CSS/tarif.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="container-price">
    <div class="container-price-item">
        <h1>Nos Tarifs</h1>
        Contactez-nous via le formulaire suivant pour une demande d'informations ou de devis.
        Nos équipes mettront tout en oeuvre pour y répondre au plus vite.
        <img src="./RESSOURCES/IMAGES/notes.png" alt="Bloc-Notes">
    </div>
    <div class="container-form">
    <form action="mail.php" method="post">
            <h1>Contact</h1>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="text">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="text">Prénom:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="choix">Votre demande concerne</label>
            <select id="choix" name="choix">
                <option value="metro">Un devis</option>
                <option value="RER">Des informations</option>
                <option value="Bus">Autre</option>
            </select>
        
            <label for="commentaire">Commentaire :</label>
            <textarea id="commentaire" name="commentaire" rows="4" cols="50" required></textarea>
            <input type="submit" value="Envoyer">
            
        </form>
    </div>
</div>


    <?php include('./footer.php'); ?>

</body>
</html>
<?php 
session_start();
include('./header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tarifs - NoiseMapper</title>
    <link rel="stylesheet" href="./RESSOURCES/CSS/bandeaux.css">
    <link rel="stylesheet" href="./RESSOURCES/CSS/tarif.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="container-price">
    <div class="container-price-item">
        <h1>Nos Tarifs</h1>
        Contactez-nous via le formulaire suivant pour une demande d'informations ou de devis.
        Nos équipes mettront tout en oeuvre pour y répondre au plus vite.
        <img src="./RESSOURCES/IMAGES/notes.png" alt="Bloc-Notes">
    </div>
    <div class="container-form">
    <form action="mail.php" method="post">
            <h1>Contact</h1>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            <label for="text">Nom :</label>
            <input type="text" id="name" name="name" required>
            <label for="text">Prénom:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="choix">Votre demande concerne</label>
            <select id="choix" name="choix">
                <option value="metro">Un devis</option>
                <option value="RER">Des informations</option>
                <option value="Bus">Autre</option>
            </select>
        
            <label for="commentaire">Commentaire :</label>
            <textarea id="commentaire" name="commentaire" rows="4" cols="50" required></textarea>
            <input type="submit" value="Envoyer">
            
        </form>
    </div>
</div>


    <?php include('./footer.php'); ?>

</body>
</html>
