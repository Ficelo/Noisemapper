<?php
session_start();
session_destroy();
header("Location: index.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection - NoiseMapper</title>
</head>
<body>
    Redirection
</body>
</html>