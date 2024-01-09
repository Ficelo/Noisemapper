<?php
if (!isset($_SESSION['user_email'])) {
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }
    
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('db.php');
if ($_SESSION['user_role'] == 0 ):{
  
$sth= $conn->query('SELECT * FROM User');
$rows= $sth ->fetch_all(MYSQLI_ASSOC);
?>

    <div class="liste">
        <table id="userTable">
            <thead>
                <tr class="entete">
                    <th></th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse mail</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
            foreach($rows as $row)
            {
                echo '<tr>';
                echo '<td><img src="' . $row['PhotoProfil'] . '"class="social-icon"></td>';
                echo '<td>' . $row['idUser'] . '</td>';
                echo '<td>' . $row['Nom'] . '</td>';
                echo '<td>' . $row['Prenom'] . '</td>';
                echo '<td>' . $row['Mail'] . '</td>';
                echo '<td>';
                if ($row['Role'] == 0) {
                    echo 'Administrateur';
                } elseif ($row['Role'] == 1) {
                    echo 'Artiste';
                } elseif ($row['Role'] == 2) {
                    echo 'Utilisateur';
                } else {
                    echo 'Non défini';
                }
                echo '</td>';
                echo '<td>';
                echo '<button onclick="editUser(' . $row['idUser'] . ')">Éditer</button>';
                echo '<button onclick="deleteUser(' . $row['idUser'] . ')">Supprimer</button>';
                echo '</td>';
                echo '</tr>';
                

            }
        }
endif;
            ?>            
            </tbody>
            </table>
            
    </div>
    
 
    <?php

        require('db.php');

        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $userId = $_GET['id'];

            $deleteQuery = "DELETE FROM User WHERE idUser = $userId";

            if ($conn->query($deleteQuery) === TRUE) {
                echo "Success";
            } else {
                echo "Erreur : " . $conn->error;
            }

            exit();
        }

        $sth = $conn->query('SELECT * FROM User');
        $rows = $sth->fetch_all(MYSQLI_ASSOC);

        ?>
 
 <script>
    function deleteUser(idUser) {
        var confirmDelete = confirm("Voulez-vous supprimer cet utilisateur ? ");
        if (confirmDelete) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response === "Success") {
                        showModal("Utilisateur supprimé avec succès !");
                    }
                    location.reload();
                }
            };
            xhr.open("GET", "admin.php?action=delete&id=" + idUser, true);
            xhr.send();
        }
    }
</script>


</body>


</html>
