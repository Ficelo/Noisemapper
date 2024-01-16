<?php 
session_start();
include('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGU Page</title>
    
</head>
<body>

<div class="container">
    <h1>Conditions Générales d'Utilisation (CGU)</h1>
    <?php
    include('db.php');
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }
    $query = "SELECT * FROM CGU LIMIT 1";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $formattedContent = preg_replace('/(\d+\.\s)/', '<span class="section-title">$1</span>', nl2br(htmlspecialchars($row['Text'])));

        echo '<div class="cgu-content">' . $formattedContent . '</div>';
    } 
        else {
        echo '<p>Aucune donnée trouvée dans la table CGU.</p>';
    }
    $conn->close();
    ?>

</div>
<?php include('footer.php'); ?>
</body>
</html>
