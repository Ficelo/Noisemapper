<?php

session_start(); // On démarre la session
// il y a une vérification au niveau du code pour voir si un utilisateur est déja connecté, dans ce cas il y a redirection vers la page de profil
if (isset($_SESSION['user_email'])) {
    header("Location: profil.php");
    exit();
}
// On a inclu un fichier appelé db.php qui permet d'établir une connexion avec notre base de données
include('db.php');
// Création d'une variable pour détecter les messages d'erreur s'il y en a 
$registrationError = '';
// On vérifie dès le début si le formulaire a bien été soumis avec la méthode appelée post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Le code va récupérer le champ de l'adresse ainsi que du mot de passe
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    // Nous utilisons une requete SQL pour avoir les différentes informations sur un utilisateur
    $stmt = $conn->prepare("SELECT idUser, MotDePasse, Prenom, PhotoProfil, Role FROM User WHERE Mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['MotDePasse'];

        // On vérifie si le mot de passe qui est soumis est le meme que le mot de passe haché stocké
        if (password_verify($password, $hashedPassword)) {
            // Si le mot de passe est correct, nous enregistrons les informations des utilisateurs dans la session
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $row['idUser'];
            $_SESSION['user_name'] = $row['Prenom'];
            $_SESSION['user_photo'] = $row['PhotoProfil'];
            $_SESSION['user_role'] = $row['Role'];
            header("Location: index.php");
            exit();
        } else {
            // Si le mot de passe n'est pas le bon, il y a un message d'erreur 
            $registrationError = "Email ou mot de passe incorrect";
        }
    } else {
        // Si l'utilisateur n'est pas trouvé dans la base de données, il y a un message d'erreur
        $registrationError = "Email ou mot de passe incorrect";
    }
}
// Il y a une fermeture de la connexion à la base de donnée 
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">
    <title>Connexion - NoiseMapper</title>
</head>
<body>
<section class="bande_haut_de_page">
        <div class="titre_haut_de_page">
            <a href="/"><img src="data/logo_white.svg" alt="NoiseMapper Logo"></a>
            <a href="/">NoiseMapper</a>
        </div>
</section>  
    <div>
    <form method="post" action="">
        <h1>Connexion</h1>
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>
        
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required><br>
        <?php
        // Afficher les erreurs de création de compte
        if ($registrationError) {
            echo '<p class="error-message">' . $registrationError . '</p>';
        }
        ?>
        <input type="submit" value="Se connecter">
        <p>Pas encore de compte? <a href="signin.php">Créez un compte ici</a></p>
    </form>
    </div>
</body>
</html>
