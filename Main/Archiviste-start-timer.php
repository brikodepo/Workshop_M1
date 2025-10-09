<?php
require_once "../config.php";

if (!isset($_SESSION['pseudo'], $_SESSION['room_code'])) {
    header("Location: index.php");
    exit;
}

$duration = isset($_POST['duration']) ? intval($_POST['duration']) : 60;
$pseudo = $_SESSION['pseudo'];
$room_code = $_SESSION['room_code'];

// Vérifie s'il y a déjà un timer actif pour cette salle
$stmt = $pdo->prepare("SELECT * FROM rooms WHERE code = ?");
$stmt->execute([$room_code]);
$last = $stmt->fetch();

$now = new DateTime();
$nowStr = $now->format('Y-m-d H:i:s');

// Crée un nouveau timer (tu peux aussi choisir de remplacer le dernier)
$stmt = $pdo->prepare("UPDATE rooms SET timer_start = ? WHERE code = ?");
$stmt->execute([$nowStr, $room_code]);

header("Location: ../archiviste.php"); // ou archiviste.php
exit;