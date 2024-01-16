<?php
session_start();

if (isset($_SESSION['user_email'])) {
    header("Location: profil.php");
    exit();
}

include('db.php');

$registrationError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $recaptchaSecretKey = '6LdPkUspAAAAAFY5sygKq-7Uj0tcm78ULqM1o2OJ';
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptchaData = [
            'secret' => $recaptchaSecretKey,
            'response' => $recaptchaResponse,
        ];
    
        $recaptchaOptions = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($recaptchaData),
            ],
        ];
    
        $recaptchaContext = stream_context_create($recaptchaOptions);
        $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
        $recaptchaResultData = json_decode($recaptchaResult, true);
    
        if (!$recaptchaResultData['success']) {
            $registrationError = "Le reCAPTCHA n'a pas été validé. Veuillez réessayer.";
        }
    } else {
        $registrationError = "Veuillez remplir le reCAPTCHA.";
    }


    $checkEmailQuery = "SELECT * FROM User WHERE Mail = ?";
    $stmtCheckEmail = $conn->prepare($checkEmailQuery);

    // Liaison des paramètres
    $stmtCheckEmail->bind_param("s", $email);

    // Exécution de la requête
    $stmtCheckEmail->execute();

    // Récupération du résultat
    $result = $stmtCheckEmail->get_result();

    if ($result->num_rows > 0) {
        $registrationError = "L'adresse e-mail existe déjà. Choisissez une autre adresse e-mail.";
    } elseif ($password !== $confirmPassword) {
        $registrationError = "Les mots de passe ne correspondent pas.";
    } else {
        // Ajoutez ici la validation et la sécurisation appropriées
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertion dans la base de données
        // Préparation de la requête
        $stmt = $conn->prepare("INSERT INTO User (Mail, MotDePasse, Prenom, Nom) VALUES (?, ?, ?, ?)");

        // Liaison des paramètres
        $stmt->bind_param("ssss", $email, $hashedPassword, $firstName, $lastName);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Récupération des informations de l'utilisateur après création du compte
            $userId = $stmt->insert_id;
            $getUserInfoQuery = "SELECT idUser, Prenom, Nom, PhotoProfil, Role FROM User WHERE idUser = ?";
            $userInfoStmt = $conn->prepare($getUserInfoQuery);
            $userInfoStmt->bind_param("i", $userId);
            $userInfoStmt->execute();
            $userInfoResult = $userInfoStmt->get_result();

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
            $registrationError = "Erreur lors de la création du compte : " . $stmt->error;
        }

        // Fermeture des déclarations
        $stmt->close();
        $userInfoStmt->close();
        $stmtCheckEmail->close();

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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <h1>Créer un compte</h1>
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
        <div class="g-recaptcha" data-sitekey="6LdPkUspAAAAAMKoewL-46v5i_Fj99QPhYyn4DZT"></div>
        </br>

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
