<?php
// config.php

$host = '192.168.1.89';   // IP ou nom d'hôte du serveur MySQL
$dbname = 'workshop_m1';  // Nom de ta base de données
$user = 'admin';           // Utilisateur MySQL
$pass = 'Epsi2025';        // Mot de passe MySQL
$port = 3306;              // Port MySQL (3306 par défaut)

try {
    // Création de la connexion PDO
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}