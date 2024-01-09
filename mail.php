<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $firstName = $_POST["firstName"];
    $choix = $_POST["choix"];
    $commentaire = $_POST["commentaire"];

    $to = "groupeapp039@gmail.com"; 

    $subject = "Nouveau message de contact";

    $message = "Nom: $name\n";
    $message .= "Prénom: $firstName\n";
    $message .= "Email: $email\n";
    $message .= "Choix: $choix\n";
    $message .= "Commentaire:\n$commentaire";

    $headers = "From: $email";

    $smtp_host = "smtp.gmail.com";
    $smtp_port = 465;
    $smtp_user = "groupeapp039@gmail.com";
    $smtp_pass = "Apptuconnais";

    ini_set("SMTP", $smtp_host);
    ini_set("smtp_port", $smtp_port);
    ini_set("sendmail_from", $smtp_user);

    mail($to, $subject, $message, $headers);

    header("Location: index.php"); 
    exit();
}
?>