<?php
require_once "config.php";
try {
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo "<pre>📋 Tables trouvées dans la base :\n";
    print_r($tables);
    echo "</pre>";

    echo "<p>Base actuelle : " . $pdo->query("SELECT DATABASE()")->fetchColumn() . "</p>";
    exit; // ← arrête ici temporairement pour tester
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['pseudo'])) {
    header("Location: index.php");
    exit;
}

$pseudo = trim($_POST['pseudo']);

// Générer un code unique à 6 chiffres
do {
    $stmt = $pdo->prepare("SHOW TABLES IN workshop_m1");
    var_dump("========");
    var_dump($stmt->execute());
    $code = strval(rand(100000, 999999));
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM rooms WHERE code = ?");
    $stmt->execute([$code]);
    $count = $stmt->fetchColumn();
} while ($count > 0);

$timer_start = '0000-00-00 00:00:00';
// Créer la salle
$stmt = $pdo->prepare("INSERT INTO rooms(code, timer_start, temps_total) VALUES (?, ?, ?)");
$stmt->execute([$code, $timer_start, 600]);


// Ajouter le joueur
$stmt = $pdo->prepare("INSERT INTO players(pseudo, room_code) VALUES (?, ?)");
$stmt->execute([$pseudo, $code]);

// Stocker en session
$_SESSION['pseudo'] = $pseudo;
$_SESSION['room_code'] = $code;

header("Location: room.php");
exit;
