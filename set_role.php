<?php
require_once "config.php";

if (!isset($_SESSION['pseudo'], $_SESSION['room_code'], $_POST['role'])) {
    header("Location: index.php");
    exit;
}

$role = $_POST['role'];
if (!in_array($role, ['chirurgien', 'archiviste'])) {
    die("Rôle invalide.");
}

$_SESSION['role'] = $role;

$stmt = $pdo->prepare("UPDATE players SET role = ? WHERE pseudo = ? AND room_code = ?");
$stmt->execute([$role, $_SESSION['pseudo'], $_SESSION['room_code']]);

header("Location: room.php");
exit;