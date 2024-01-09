<?php
if (!isset($_SESSION['user_email'])) {
    session_start();
    if (!isset($_SESSION['user_email'])) {
        header("Location: login.php");
        exit();
    }
}

require('db.php');

$sth = $conn->query('SELECT * FROM CGU');
$cguRow = $sth->fetch_assoc();

// Gérer la mise à jour des CGU si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cgu_text'])) {
    $newCguText = $_POST['cgu_text'];

    $updateQuery = "UPDATE CGU SET Text = ? WHERE idCGU = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $newCguText, $cguRow['idCGU']);
    $stmt->execute();
    echo '<script>window.location.href = "profil.php";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<body>

<div class="cgu-content">
    <h1>Conditions Générales d'Utilisation</h1>

    <form method="post">
        <textarea name="cgu_text" rows="10" cols="80"><?php echo htmlspecialchars($cguRow['Text']); ?></textarea>
        <br>
        <?php
        // Vérifier si l'utilisateur a les autorisations nécessaires
        if ($_SESSION['user_role'] == 0) {
            echo '<input type="submit" value="Modifier">';
        }
        ?>
    </form>

</div>
</body>
</html>