<?php
require_once "config.php";

if (!isset($_GET['pseudo']) || trim($_GET['pseudo']) === '') {
    header("Location: index.php");
    exit;
}

$pseudo = trim($_GET['pseudo']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Rejoindre une salle</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Rejoindre une salle</h1>
    <form method="POST" action="do_join.php">
      <input type="hidden" name="pseudo" value="<?= htmlspecialchars($pseudo) ?>">
      <input type="text" name="code" placeholder="Code à 6 chiffres" required>
      <button type="submit">Rejoindre</button>
    </form>
  </div>
</body>
</html>
