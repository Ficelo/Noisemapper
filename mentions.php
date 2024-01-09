<?php
if (!isset($_SESSION['user_email'])) {
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }
}

require('db.php');

$sth = $conn->query('SELECT * FROM Mentions_legales');
$mentionsRow = $sth->fetch_assoc();

// Gérer la mise à jour des mentions légales si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mentions_text'])) {
    $newMentionsText = $_POST['mentions_text'];

    $updateQuery = "UPDATE Mentions_legales SET Text = ? WHERE idMentions = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $newMentionsText, $mentionsRow['idMentions']);
    $stmt->execute();
    echo '<script>window.location.href = "profil.php";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<body>
<div class="cgu-content">
    <h1>Mentions Légales</h1>
    <form method="post">
    <textarea name="mentions_text" rows="10" cols="80"><?php echo htmlspecialchars($mentionsRow['Text']); ?></textarea>
    <br>
    <?php
    if ($_SESSION['user_role'] == 0) {
        echo '<input type="submit" value="Modifier">';
    } else {
        echo '<p>' . nl2br(htmlspecialchars($mentionsRow['Text'])) . '</p>';
    }
    ?>
    </form>
</div>
</body>
</html>
