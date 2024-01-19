<?php
if (!isset($_SESSION['user_email'])) {
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }
}

require('db.php');

if ($_SESSION['user_role'] == 0 ) {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $questionId = $_GET['id'];

        $deleteQuery = "DELETE FROM Question WHERE idQuestion = $questionId";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "Success";
        } else {
            echo "Erreur : " . $conn->error;
        }
        header("Location: profil.php");

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
    if ($_SESSION['user_role'] == 0) {
        $userId = $_SESSION['user_id'];

        $sth = $conn->prepare('SELECT Question.*, User.Prenom FROM Question JOIN User ON Question.User_idUser = User.idUser');
        $sth->execute();
        $result = $sth->get_result();
        $questions = $result->fetch_all(MYSQLI_ASSOC);

    ?>
        <div class='banner'><img class='profile-picture' src='data/info.png'>Attention ! Supprimer une question supprime aussi toutes les réponses associées à cette question !</div>
        <div class="liste">
            <table id="salleTable">
                <thead>
                    <tr class="entete">
                        <th>Utilisateur</th>
                        <th>Date</th>
                        <th class="large-column">Question</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($questions as $question) {
                        echo '<tr>';
                        echo '<td>' . $question['Prenom'] . '</td>';
                        echo '<td>' . $question['Date'] . '</td>';
                        echo '<td>' . $question['Texte'] . '</td>';
                        echo '<td>';
                        echo '<button onclick="deleteQuestion(' . $question['idQuestion'] . ')">Supprimer</button>';
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
<script>
    function deleteQuestion(idQuestion) {
        var confirmDelete = confirm("Voulez-vous supprimer cette question ? ");
        if (confirmDelete) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response === "Success") {
                        showModal("Question supprimée avec succès !");
                    }
                    location.reload();
                }
            };
            xhr.open("GET", "questions.php?action=delete&id=" + idQuestion, true);
            xhr.send();
        }
    }

</script>
</body>


</html>
