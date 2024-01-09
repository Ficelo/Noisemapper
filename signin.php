<?php
session_start();

if (isset($_SESSION['user_email'])) {
    header("Location: profil.php");
    exit();
}

include('db.php');

$registrationError = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $confirmPassword = $_POST['confirm_password'];

    // Vérification si l'e-mail existe déjà
    $checkEmailQuery = "SELECT * FROM User WHERE Mail = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        $registrationError = "L'adresse e-mail existe déjà. Choisissez une autre adresse e-mail.";
    } elseif ($password !== $confirmPassword) {
        $registrationError = "Les mots de passe ne correspondent pas.";
    } else {
        // Ajoutez ici la validation et la sécurisation appropriées

        // Insertion dans la base de données
        $sql = "INSERT INTO User (Mail, MotDePasse, Prenom, Nom) VALUES ('$email', '$password', '$firstName', '$lastName')";

        if ($conn->query($sql) === TRUE) {
            // Récupération des informations de l'utilisateur après création du compte
            $userId = $conn->insert_id;
            $getUserInfoQuery = "SELECT idUser, Prenom, Nom, PhotoProfil, Role FROM User WHERE idUser = $userId";
            $userInfoResult = $conn->query($getUserInfoQuery);

            if ($userInfoResult->num_rows > 0) {
                $row = $userInfoResult->fetch_assoc();

                // Ajout des informations nécessaires dans la session
                $_SESSION['user_email'] = $email;
                $_SESSION['user_id'] = $row['idUser'];
                $_SESSION['user_name'] = $row['Prenom'];
                $_SESSION['user_username'] = $row['Nom'];
                $_SESSION['user_photo'] = $row['PhotoProfil'];
                $_SESSION['user_role'] = $row['Role'];

                // Redirection vers la page profil.php
                header("Location: profil.php");
                exit();
            } else {
                $registrationError = "Erreur lors de la récupération des informations de l'utilisateur.";
            }
        } else {
            $registrationError = "Erreur lors de la création du compte : " . $conn->error;
        }
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
<div class="container-form">
    

    <form method="post" action="signin.php">
    <h2>Créer un compte</h2>
        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirmer le mot de passe:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <label for="first_name">Prénom:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Nom:</label>
        <input type="text" id="last_name" name="last_name" required>
        <?php
        if ($registrationError) {
            echo '<p class="error-message">' . $registrationError . '</p>';
        }
        ?>

        <button type="submit">Créer le compte</button>
        <p>Déjà un compte? <a href="login.php">Connectez-vous ici</a></p>
    </form>

    
</div>

</body>
</html>
