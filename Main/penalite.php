<?php
header('Content-Type: application/json');
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=login_mvc;charset=utf8", "root", "");
$groupeId = $_SESSION['groupeId'] ?? '1';

$stmt = $pdo->prepare("UPDATE timers SET temps_total = temps_total - 60 WHERE groupeId = ?");
$stmt->execute([$groupeId]);

echo json_encode(['success' => true]);
