<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['pseudo']) || empty($_POST['code'])) {
    header("Location: index.php");
    exit;
}

$pseudo = trim($_POST['pseudo']);
$code = trim($_POST['code']);

// Vérifier que la salle existe
$stmt = $pdo->prepare("SELECT * FROM rooms WHERE code = ?");
$stmt->execute([$code]);
$room = $stmt->fetch();

if (!$room) {
    die("Salle introuvable. <a href='index.php'>Retour</a>");
}

// Ajouter le joueur s’il n’est pas déjà dedans
$stmt = $pdo->prepare("SELECT COUNT(*) FROM players WHERE pseudo = ? AND room_code = ?");
$stmt->execute([$pseudo, $code]);
if ($stmt->fetchColumn() == 0) {
    $stmt = $pdo->prepare("INSERT INTO players(pseudo, room_code) VALUES (?, ?)");
    $stmt->execute([$pseudo, $code]);
}

// Enregistrer en session
$_SESSION['pseudo'] = $pseudo;
$_SESSION['room_code'] = $code;

header("Location: room.php");
exit;