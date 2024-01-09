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
    <link rel="stylesheet" href="./RESSOURCES/CSS/salles.css">
</head>

<body>
    <?php
    if ($_SESSION['user_role'] == 0) {
        require('db.php');
        $sth = $conn->query('SELECT * FROM Salle');
        $rows = $sth->fetch_all(MYSQLI_ASSOC);
    ?>

        <div class="liste">
            <table id="salleTable">
                <thead>
                    <tr class="entete">
                        <th>ID Salle</th>
                        <th>Nom</th>
                        <th>Lieu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['idSalle'] . '</td>';
                        echo '<td>' . $row['Nom'] . '</td>';
                        echo '<td>' . $row['Lieu'] . '</td>';
                        echo '<td>';
                        echo '<button onclick="editSalle(' . $row['idSalle'] . ')">Éditer</button>';
                        echo '<button onclick="deleteSalle(' . $row['idSalle'] . ')">Supprimer</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

    <?php
    }
    ?>

</body>

</html>
