<?php

session_start();
if (isset($_SESSION['user_email'])) {
    header("Location: profil.php");
    exit();
}
include('db.php');

$registrationError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT idUser, MotDePasse, Prenom, PhotoProfil, Role FROM User WHERE Mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['MotDePasse'];

        // Vérifier le mot de passe
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $row['idUser'];
            $_SESSION['user_name'] = $row['Prenom'];
            $_SESSION['user_photo'] = $row['PhotoProfil'];
            $_SESSION['user_role'] = $row['Role'];
            header("Location: index.php");
            exit();
        } else {
            $registrationError = "Email ou mot de passe incorrect";
        }
    } else {
        $registrationError = "Email ou mot de passe incorrect";
    }
}
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
