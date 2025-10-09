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
$groupeId = $_SESSION['groupeId'] ?? '1';

$stmt = $pdo->prepare("UPDATE timers SET temps_total = temps_total - 60 WHERE groupeId = ?");
$stmt->execute([$groupeId]);

echo json_encode(['success' => true]);
