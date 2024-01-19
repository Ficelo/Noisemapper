<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectConcert"])) {
    // Récupérer la date sélectionnée depuis la requête
    $selectedDate = $_POST["selectConcert"];

    // Inclure le fichier de configuration de la base de données
    include('db.php');

    // Requête pour récupérer les concerts associés à la date sélectionnée
    $sql = "SELECT * FROM concert WHERE Date = '$selectedDate'";
    $result = $conn->query($sql);

    // Construire le HTML pour le tableau de concerts
    $concertHTML = "<table border='1'>
                    <tr>
                        <th>Nom du concert</th>
                        <th>Description</th>
                        <!-- Ajoutez d'autres colonnes au besoin -->
                    </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $concertHTML .= "<tr>";
            $concertHTML .= "<td><a id='lienConcert' href='view_concert.php?id=" . $row['idConcert'] . "'>" . $row["Nom"] . "</a></td>";
            $concertHTML .= "<td>" . $row["Description"] . "</td>";
            $concertHTML .= "</tr>";
        }
    } else {
        $concertHTML .= "<tr><td colspan='2'>Aucun concert disponible pour la date sélectionnée.</td></tr>";
    }

    
    $concertHTML .= "</table>";

    // Fermer la connexion
    $conn->close();

    // Renvoyer le HTML du tableau de concerts
    echo $concertHTML;
}

?>

