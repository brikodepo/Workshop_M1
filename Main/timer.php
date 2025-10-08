<?php
header('Content-Type: application/json');
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=login_mvc;charset=utf8", "root", "");
$groupeId = $_SESSION['groupeId'] ?? '1';

$stmt = $pdo->prepare("SELECT * FROM timers WHERE groupeId = ?");
$stmt->execute([$groupeId]);
$timer = $stmt->fetch(PDO::FETCH_ASSOC);

if ($timer) {
    $timer_start = strtotime($timer['timer_start']);
    $temps_total = (int) $timer['temps_total'];
    $temps_ecoule = time() - $timer_start;
    $temps_restant = $temps_total - $temps_ecoule;
    if ($temps_restant < 0)
        $temps_restant = 0;

    echo json_encode(['tempsRestant' => $temps_restant]);
} else {
    echo json_encode(['tempsRestant' => 0]);
}
