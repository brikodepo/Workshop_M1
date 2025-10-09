<?php
header('Content-Type: application/json');
session_start();


$host = '192.168.1.89';   // IP ou nom d'hôte du serveur MySQL
$dbname = 'workshop_m1';  // Nom de ta base de données
$user = 'admin';           // Utilisateur MySQL
$pass = 'Epsi2025';        // Mot de passe MySQL
$port = 3306;              // Port MySQL (3306 par défaut)


// Création de la connexion PDO
$pdo = new PDO(
    "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
    $user,
    $pass
);
$code = $_SESSION['room_code'] ?? '1';


$stmt = $pdo->prepare("SELECT * FROM rooms WHERE code = ?");
$stmt->execute([$code]);
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
