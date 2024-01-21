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
    $role = $user_data['Role'];
} else {
    echo "Utilisateur non trouvé.";
    exit();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoiseMapper - Mon compte</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="data/favicon.ico" type="image/x-icon">

</head>
<body>
<?php include('header.php'); ?>

<div class="container-tab">
<div class="tabs-container">
    
    <ul class="tabs">
        <li class="profile-tab"><a href="#profile" onclick="showTab('profile')">Profil</a></li>
        <li class="questions-tab"><a href="#questions" onclick="showTab('questions')">Mes questions</a></li>
        <?php if ($role == 0): ?>
            <h4>Administration</h4>
            <li class="admin-tab"><a href="#admin" onclick="showTab('admin')">Listes des utilisateurs</a></li>
            <li class="salles-tab"><a href="#salles" onclick="showTab('salles')">Gérer les salles</a></li>
            <li class="cgu-tab"><a href="#cgu" onclick="showTab('cgu')">Editer les CGU</a></li>
            <li class="cgu-mentions"><a href="#mentions" onclick="showTab('mentions')">Editer les Mentions Légales</a></li>
            <li class="forum-tab"><a href="#forum" onclick="showTab('forum')">Gérer le forum</a></li>
 


        <?php endif; ?>
        <?php if ($role <= 1 ): ?>
            <h4>Espace concert</h4>
            <li class="concert-tab"><a href="#concerts" onclick="showTab('concerts')">Gérer les concerts</a></li>
            <li class="avis-tab"><a href="#avis" onclick="showTab('avis')">Consulter les avis</a></li>
            <li class="concert-tab"><a href="./ajoutConcert.php">Créer un nouveau concert</a></li>
            <li class="avis-tab"><a href="./avisConcerts.php">Avis de mes concerts</a></li>
        <?php endif; ?>
        
    </ul>
</div>

<div class=container-form>
    <div id="profile" class="tab-content">
        <h2>Profil de <?php echo $user_data['Prenom'] . ' ' . $user_data['Nom']; ?></h2>
        <p>Photo de profil : <img class="profile-picture" src="<?php echo $user_data['PhotoProfil']; ?>"></p>
        <p>Email: <?php echo $user_data['Mail']; ?></p>
        <p>Préférence de langue : <?php echo $user_data['Langue']; ?></p>
        <p>Préférence de Thème : <?php echo ($user_data['PrefCouleur'] == 0) ? 'Clair' : 'Sombre'; ?></p>
        <a href="edit_profile.php"><button>Modifier le Profil</button></a>
        <a href="disconnect.php"><button>Se Déconnecter</button></a>
    </div>

    <div id="questions" class="tab-content">
        <div class="container">
        <?php include('questions.php')?>
        </div>
    </div>

    <div id="salles" class="tab-content">
        <div class="container">
        <?php include('salles.php')?>
        </div>
    </div>

    <div id="admin" class="tab-content admin-content">
        <?php include('admin.php')?>
    </div>

    <div id="concerts" class="tab-content">
        <div class="container">
        <?php include('concerts.php')?>
        </div>
    </div>

    <div id="cgu" class="tab-content">
        <div class="container">
        <?php include('edit_cgu.php')?>
        </div>
    </div>
    
    <div id="mentions" class="tab-content">
        <div class="container">
        <?php include('edit_mentions.php')?>
        </div>
    </div>

    <div id="forum" class="tab-content">
        <div class="container">
        <?php include('admin_forum.php')?>
        </div>
    </div>

</div>
</div>
<script>
    function showTab(tabName) {
        const tabs = document.querySelectorAll('.tabs li');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        tabContents.forEach(content => {
            content.style.display = 'none';
        });

        const activeTab = document.querySelector('.tabs a[href="#' + tabName + '"]').parentNode;
        const activeContent = document.getElementById(tabName);

        activeTab.classList.add('active');
        activeContent.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function() {
        showTab('profile');
    });
</script>
</body>
<?php include('footer.php'); ?>
</html>
