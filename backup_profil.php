<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

include('db.php');

$user_id = $_SESSION['user_id']; 
$sql = "SELECT * FROM User WHERE idUser = $user_id";
$result = $conn->query($sql);

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
    <title>NoiseMapper - Mon compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Profil de <?php echo $user_data['Prenom'] . ' ' . $user_data['Nom']; ?></h2>
    <p>Photo de profil : <img class="profile-picture" src="<?php echo $user_data['PhotoProfil']; ?>"></p>
    <p>Email: <?php echo $user_data['Mail']; ?></p>
    <p>Préférence de langue : <?php echo $user_data['Langue']; ?></p>
    <p>Préférence de Thème : <?php echo ($user_data['PrefCouleur'] == 0) ? 'Clair' : 'Sombre'; ?></p>
    
<a href="edit_profile.php"><button>Modifier le Profil</button></a>
<a href="disconnect.php"><button>Se Déconnecter</button></a>
<?php include('admin.php')?>
</div>
</body>
<?php include('footer.php'); ?>

</html>


