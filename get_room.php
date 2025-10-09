<?php
require_once "config.php";

if (!isset($_GET['code'])) {
    http_response_code(400);
    echo json_encode(["error" => "Code manquant"]);
    exit;
}

$code = $_GET['code'];

$stmt = $pdo->prepare("SELECT pseudo, role FROM players WHERE room_code = ?");
$stmt->execute([$code]);
$players = $stmt->fetchAll(PDO::FETCH_COLUMN);

header('Content-Type: application/json');
echo json_encode(["players" => $players]);

