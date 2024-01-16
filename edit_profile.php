<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: signin.php");
    exit();
}

include('db.php');


if (isset($_GET['id']) && $_SESSION['user_role'] == 0 ) {
    $user_ID = $_GET['id'];
} 
else {
    $user_ID = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Traitement de la nouvelle photo de profil
    if (!empty($_FILES['new_profile_picture']['name'])) {
        $targetDir = "data/pp/";  // Dossier de destination des téléchargements
        $targetFile = $targetDir . basename($_FILES['new_profile_picture']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image réelle ou une fausse image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES['new_profile_picture']['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "Erreur : Votre fichier n'est pas une image.";
                $uploadOk = 0;
            }
        }

        // Vérifier si le fichier existe déjà
        if (file_exists($targetFile)) {
            echo "Erreur : Le fichier existe déja.";
            $uploadOk = 0;
        }

        // Vérifier la taille de l'image
        if ($_FILES['new_profile_picture']['size'] > 500000) {
            echo "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }

        // Autoriser certains formats de fichiers
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Erreur : Votre fichier n'a pas été téléchargé.";
            echo '<a href="edit_profile.php"><button>Retour</button></a>';
            exit();
        } else {
            // Si tout est ok, téléchargez le fichier
            if (move_uploaded_file($_FILES['new_profile_picture']['tmp_name'], $targetFile)) {
                // Mettez à jour le chemin de la nouvelle photo de profil dans la base de données
                $newProfilePicturePath = $targetFile;
                $sqlUpdatePicture = "UPDATE User SET PhotoProfil='$newProfilePicturePath' WHERE idUser = $user_ID";
                $conn->query($sqlUpdatePicture);
                echo "La nouvelle photo de profil a été téléchargée avec succès.";
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        }
        
    }
    // Handle form submission to update user information
    $newFirstName = $_POST['new_first_name'];
    $newLastName = $_POST['new_last_name'];
    $newLanguage = $_POST['new_language'];
    $newRole = $_POST['new_role'];
    $theme_preference = $_POST['theme_preference'];


    // You should perform proper validation and sanitization here

    $sqlUpdate = "UPDATE User SET Prenom='$newFirstName', Nom='$newLastName', Langue='$newLanguage', PrefCouleur='$theme_preference', Role='$newRole' WHERE idUser = " . $_POST['user_id'];
    if ($conn->query($sqlUpdate) === TRUE) {
        header("Location: profil.php");
        exit();
    } else {
    echo "Erreur lors de la mise à jour du profil : " . $conn->error;
     exit();
    }
}

// Retrieve the current user data
$sqlSelect = "SELECT * FROM User WHERE idUser = $user_ID";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "Utilisateur non trouvé.";
    exit();
}

$conn->close();
?>

<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil - NoiseMapper</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<div class="container-form">
    <form method="post" action="edit_profile.php" enctype="multipart/form-data">
        <h2>Modifier le profil de <?php echo $user_data['Prenom'] . ' ' . $user_data['Nom']; ?></h2>
        <label for="new_first_name">Prénom:</label>
        <input type="text" id="new_first_name" name="new_first_name" value="<?php echo $user_data['Prenom']; ?>" required>

        <label for="new_last_name">Nom:</label>
        <input type="text" id="new_last_name" name="new_last_name" value="<?php echo $user_data['Nom']; ?>" required>
        
        <label for="new_profile_picture">Photo de profil:</label>
        <input type="file" id="new_profile_picture" name="new_profile_picture">
        
        <label for="new_language">Préférence de langue :</label>
        <select id="new_language" name="new_language" required>
            <option value="fr" <?php echo ($user_data['Langue'] == 'fr') ? 'selected' : ''; ?>>Français</option>
            <option value="en" <?php echo ($user_data['Langue'] == 'en') ? 'selected' : ''; ?>>English</option>
        </select>

        <?php
        if ($_SESSION['user_role'] == 0) {
            echo '<label for="new_role">Rôle :</label>';
            echo '<select id="new_role" name="new_role">';
            echo '<option value="2" ' . (($user_data['Role'] == 2) ? 'selected' : '') . '>Utilisateur</option>';
            echo '<option value="1" ' . (($user_data['Role'] == 1) ? 'selected' : '') . '>Artiste</option>';
            echo '<option value="0" ' . (($user_data['Role'] == 0) ? 'selected' : '') . '>Administrateur</option>';
            echo '</select>';
        }
        ?>
            <label for="checkbox" id="theme-label">Préférence de thème :</label>
            <input type="hidden" id="theme_preference" name="theme_preference" value="0">
    <div class="container-toggle">
            <label class="switch">
    <input type="checkbox" id="theme-switch"/>
    <span></span>
</label>
<span id="message-container" class="message-container">Thème clair</span>
</div>
<input type="hidden" name="user_id" value="<?php echo $user_ID; ?>">
<button type="submit">Enregistrer les modifications</button>
    </form>
</div>
</body>
<?php include('footer.php'); ?>
</html>
