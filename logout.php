<?php
require_once "config.php";

// On peut éventuellement supprimer le joueur de la table players si on veut
if (isset($_SESSION['pseudo']) && isset($_SESSION['room_code'])) {
    $stmt = $pdo->prepare("DELETE FROM players WHERE pseudo = ? AND room_code = ?");
    $stmt->execute([$_SESSION['pseudo'], $_SESSION['room_code']]);
}

// Détruire la session
session_unset();
session_destroy();

header("Location: index.php");
exit;