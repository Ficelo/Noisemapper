<?php
// il y a un démarrage de la session php 
session_start();
// On vérifie si l'utlisateur est connecté, si c'est le cas redirection vers la page de profil
if (isset($_SESSION['user_email'])) {
    header("Location: profil.php");
    exit();
}
// On décide d'inclure un fichier appelé dp.php pour qu'il y est une connexion avec la base de donnée
include('db.php');
// Il y a création d'une variable pour détecter des erreurs de création de compte
$registrationError = '';
// On vérifie si le formulaire a bien été soumis avec la méthode post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Le code récupère et va valider les données présentes dans le formulaire
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    // On vérifie si le reCAPTCHA a été validé
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

    // On fait une liaison de paramètres
    $stmtCheckEmail->bind_param("s", $email);

    // Il y a éxécution de la requete
    $stmtCheckEmail->execute();

    // Il y a ici une récupération du résultat
    $result = $stmtCheckEmail->get_result();

    if ($result->num_rows > 0) {
        $registrationError = "L'adresse e-mail existe déjà. Choisissez une autre adresse e-mail.";
    } elseif ($password !== $confirmPassword) {
        $registrationError = "Les mots de passe ne correspondent pas.";
    } else {
        //  on a Ajouté ici la validation et la sécurisation appropriées
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // On décide ici de faire une insertion dans la base de données
        // On prépare la requête
        $stmt = $conn->prepare("INSERT INTO User (Mail, MotDePasse, Prenom, Nom) VALUES (?, ?, ?, ?)");

        // On fait une liaison de paramètres 
        $stmt->bind_param("ssss", $email, $hashedPassword, $firstName, $lastName);

        //  Il y a exécution de la requête
        if ($stmt->execute()) {
            //  on obtient une récupération des informations de l'utilisateur après création du compte
            $userId = $stmt->insert_id;
            $getUserInfoQuery = "SELECT idUser, Prenom, Nom, PhotoProfil, Role FROM User WHERE idUser = ?";
            $userInfoStmt = $conn->prepare($getUserInfoQuery);
            $userInfoStmt->bind_param("i", $userId);
            $userInfoStmt->execute();
            $userInfoResult = $userInfoStmt->get_result();

            if ($userInfoResult->num_rows > 0) {
                $row = $userInfoResult->fetch_assoc();

                
                $_SESSION['user_email'] = $email;
                $_SESSION['user_id'] = $row['idUser'];
                $_SESSION['user_name'] = $row['Prenom'];
                $_SESSION['user_username'] = $row['Nom'];
                $_SESSION['user_photo'] = $row['PhotoProfil'];
                $_SESSION['user_role'] = $row['Role'];

                //  Il y a ici, une redirection vers la page profil.php
                header("Location: profil.php");
                exit();
            } else {
                $registrationError = "Erreur lors de la récupération des informations de l'utilisateur.";
            }
        } else {
            $registrationError = "Erreur lors de la création du compte : " . $stmt->error;
        }

        // On fait une fermeture des déclarations
        $stmt->close();
        $userInfoStmt->close();
        $stmtCheckEmail->close();

    }
}
// On ferme la connexion à la base de donnée
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
