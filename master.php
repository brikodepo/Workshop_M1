<?php
require_once "config.php";

if ($_SESSION['role'] !== 'master') {
    header("Location: room.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chirurgien</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Vous êtes chirurgien</h1>
        <p>Code de la salle : <?= htmlspecialchars($_SESSION['room_code']) ?></p>
        <p>Pseudo : <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
        <!-- Ajouter les contrôles spécifiques au MJ ici -->
    </div>
</body>
</html>