<?php
require_once "config.php";

if ($_SESSION['role'] !== 'player') {
    header("Location: room.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Joueur</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenue Joueur</h1>
        <p>Code de la salle : <?= htmlspecialchars($_SESSION['room_code']) ?></p>
        <p>Pseudo : <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
        <!-- Afficher des infos ou interactions spécifiques -->
    </div>
</body>
</html>