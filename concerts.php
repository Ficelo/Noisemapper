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
    <script>
        function editConcert(id) {
            // Vous pouvez rediriger vers une page d'édition avec l'identifiant du concert
            window.location.href = 'editConcert.php?id=' + id;
        }

        function deleteConcert(id) {
            // Ajoutez la logique de suppression ici
            // Vous pouvez afficher une confirmation ou envoyer une requête AJAX pour supprimer le concert
            console.log('Supprimer Concert avec l\'ID ' + id);
        }
    </script>
</head>

<body>
    <?php
    if ($_SESSION['user_role'] == 0) {
        require('db.php');
        $sth = $conn->query('SHOW COLUMNS FROM Concert');
        $concertColumns = $sth->fetch_all(MYSQLI_ASSOC);
    ?>
        <div class="liste">
            <table id="concertTable">
                <thead>
                    <tr class="entete">
                        <?php
                        foreach ($concertColumns as $column) {
                            echo '<th>' . $column['Field'] . '</th>';
                        }
                        ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sth = $conn->query('SELECT * FROM Concert');
                    $rows = $sth->fetch_all(MYSQLI_ASSOC);

                    foreach ($rows as $row) {
                        echo '<tr>';
                        foreach ($concertColumns as $column) {
                            echo '<td>' . $row[$column['Field']] . '</td>';
                        }
                        echo '<td>';
                        echo '<button onclick="editConcert(' . $row['idConcert'] . ')">Éditer</button>';
                        echo '<button onclick="deleteConcert(' . $row['idConcert'] . ')">Supprimer</button>';
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
