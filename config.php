<?php
// config.php

session_start();

$host = "192.168.1.89";
$dbname = "workshop_m1";
$user = "admin";
$pass = "Epsi2025";
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}