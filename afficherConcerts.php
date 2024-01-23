<?php
// Tout d'abord, cela vérifie si le formule a bien été envoyé avec la méthode post et si la variable selectConcert est bien définie
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["selectConcert"])) {
    // Ici, nous récupérons la date sélectionnée depuis une requete appelé post
    $selectedDate = $_POST["selectConcert"];

    // On inclue un fichier de configuration appelé db.php qui permet de faire la connexion à la base de données
    include('db.php');

    // Nous sommes dans le cas d'une requete qui permet de récupérer les concerts associés à une date séléctionnée précise
    $sql = "SELECT * FROM Concert WHERE Date = '$selectedDate'";
    $result = $conn->query($sql);

    // On met en place du HTML pour créer le tableau de concerts
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

    // On ferme la connexion à la base de donnée 
    $conn->close();

    //  Cela permet de renvoyer le HTML du tableau de concerts
    echo $concertHTML;
}

?>

