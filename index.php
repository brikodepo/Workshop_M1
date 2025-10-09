<?php
require_once "config.php";

// Si déjà connecté à une salle, rediriger vers la salle
if (isset($_SESSION['pseudo']) && isset($_SESSION['room_code'])) {
    header("Location: room.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Bienvenue</h1>

    <form method="POST" action="create.php">
      <input type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
      <button type="submit">Créer une salle</button>
    </form>

    <form method="GET" action="join.php">
      <input type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
      <button type="submit">Rejoindre une salle</button>
    </form>
  </div>
</body>
</html>