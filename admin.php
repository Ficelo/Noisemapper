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

    <title>NoiseMapper</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap">

    <style>
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            z-index: 1;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="bande_haut_de_page">
        <div class="titre_haut_de_page">
            <!-- Contenu haut de la page-->
            <img src="data/Group_3.svg" alt="">
            <li>NoiseMapper</li>
            <li>Forum</li>
            <li>Tarif</li>
            <li>En savoir plus</li>
            <li>Mon compte</li>
        </div>
    </section>
    <?php
    require('db.php');
    //preparefaire requete secu en pre compilant etc (simulation avant exec)
    $sth = $conn->prepare('SELECT * FROM User ORDER BY Nom ASC'); 
    $sth-> execute();//après simu on lance la requete
    $result = $sth->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $sth->close();
    ?>

<input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Rechercher...">
<style>
    
    #searchInput {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin: 10px auto; 
        display: block;
        width: 300px; 
        box-sizing: border-box;
    }

    
    #userTable tr[style="display: none;"] {
        display: none !important;
    }
</style>


    <div class="liste">
        <table id="userTable">
            <thead>
                <tr class="entete">
                    <th></th>
                    <!-- <th>ID</th> -->
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse mail</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td><img src="' . $row['PhotoProfil'] . '"class="social-icon"></td>';
                    // echo '<td>' . $row['idUser'] . '</td>';
                    //htmlspecialchars eviter faille xss (implémenter du code malveillant) et sert à filter
                    echo '<td>' . htmlspecialchars($row['Nom']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['Prenom']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['Mail']) . '</td>';

                    echo '<td>';
                    /*if ($row['Role'] == 0) {
                        echo 'Administrateur';
                    } elseif ($row['Role'] == 1) {
                        echo 'Artiste';
                    } elseif ($row['Role'] == 2) {
                        echo 'Utilisateur';
                    } else {
                        echo 'Non défini';
                    }*/
                    echo '</td>';
                    echo '<td>';
                    echo '<button onclick="editUser(' . htmlspecialchars($row['idUser']) . ')">Éditer</button>';
                    echo '<button onclick="deleteUser(' . htmlspecialchars($row['idUser']) . ')">Supprimer</button>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php
             
        require('db.php');

        
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $userId = $_GET['id'];
            $deleteQuery = "DELETE FROM User WHERE idUser = ?";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->bind_param('i', $userId);//précise que userId est un entier
        
            if ($stmt->execute()) {
                echo "Success";
            } else {
                echo "Erreur : " . $stmt->error;
            }
        
            $stmt->close();
            exit();
        }
        

        $sth = $conn->prepare('SELECT * FROM User ORDER BY Nom ASC');
        $sth->execute();
        $result = $sth->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $sth->close();

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
                            alert("Utilisateur supprimé avec succès !");

                        }
                        location.reload();

                    }
                };
                xhr.open("GET", "../php/admin.php?action=delete&id=" + idUser, true);
                xhr.send();
            }
        }

            deleteUser(idUser);

                        function searchTable() {
                // pr recup la barre de recherche
                var input = document.getElementById("searchInput");
                var filter = input.value.toUpperCase();

                // pr recup les donne de la table et les lignes
                var table = document.getElementById("userTable");
                var rows = table.getElementsByTagName("tr"); 

                for (var i = 0; i < rows.length; i++) {
                    var cells = rows[i].getElementsByTagName("td");
                    var shouldDisplay = false;

                    for (var j = 0; j < cells.length; j++) {
                        var cellText = cells[j].innerText.toUpperCase();

                        // Vérifier si le texte de la cellule correspond à la recherche
                        if (cellText.indexOf(filter) > -1) {
                            shouldDisplay = true;
                            break;
                        }
                    }

                    // Afficher ou masquer la ligne en fonction du résultat de la recherche
                    rows[i].style.display = shouldDisplay ? "" : "none";
                }
            }


    </script>
    
    <footer class="footer">
        <!-- Logo de l'entreprise à gauche -->
        <div class="flex-footer-item">
            <img class="footer-logo" src="data/logo_white.svg" alt="NoiseMapper">NoiseMapper
        </div>

        <!-- Liens du plan du site à gauche -->
        <div class="flex-footer-item">
            <a id="footer" href="/">Accueil</a>
            <a href="tarifs.php">Tarifs</a>
            <a href="/">A propos</a>
            <a href="/">Mentions Légales</a>
            <br>
            © 2023 NoiseMapper
        </div>

        <!-- Liens des réseaux sociaux à droite -->
        <div class="flex-footer-row">
            <a href="#"><img class="social-icon" src="data/facebook.svg" alt="Facebook"></a>
            <a href="#"><img class="social-icon-small" src="data/twitter.svg" alt="Twitter"></a>
            <a href="#"><img class="social-icon-big" src="data/instagram.svg" alt="Instagram"></a>
        </div>
    </footer>

</body>

</html>
