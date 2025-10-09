<?php
require_once "config.php";

// Si pas de session valable, rediriger à l’accueil
if (!isset($_SESSION['pseudo']) || !isset($_SESSION['room_code'])) {
  header("Location: index.php");
  exit;
}

$pseudo = $_SESSION['pseudo'];
$code = $_SESSION['room_code'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Salle <?= htmlspecialchars($code) ?></title>
  <link rel="stylesheet" href="./Vues/assets/css/style.css">
</head>

<body class="bodyOpération">
  <div class="container">
    <h1>Salle</h1>
    <p>Code de la salle : <strong><?= htmlspecialchars($code) ?></strong></p>
    <p>Vous êtes : <em><?= htmlspecialchars($pseudo) ?></em></p>

    <h2>Joueurs dans la salle :</h2>
    <ul id="playerList"></ul>
    <h2>Choisissez votre rôle :</h2>

    <?php if (!isset($_SESSION['role'])): ?>
      <form method="POST" action="set_role.php">
        <input type="hidden" name="role" value="chirurgien">
        <button type="submit">Je suis Chirurgien</button>
      </form>

      <form method="POST" action="set_role.php">
        <input type="hidden" name="role" value="archiviste">
        <button type="submit">Je suis Archiviste</button>
      </form>
    <?php else: ?>
      <p>Vous avez choisi le rôle : <strong><?= htmlspecialchars($_SESSION['role']) ?></strong></p>
      <?php if ($_SESSION['role'] === 'chirurgien'): ?>
        <a class="goBtn" href="./Main/Chirurgien-start-timer.php">Aller à la page Chirurgien</a>
      <?php elseif ($_SESSION['role'] === 'archiviste'): ?>
        <a class="goBtn" href="./Main/Archiviste-start-timer.php">Aller à la page Archiviste</a>
      <?php endif; ?>
    <?php endif; ?>

    <form method="POST" action="logout.php" style="margin-top:1em;">
      <button type="submit">Quitter la salle</button>
    </form>
  </div>

  <script>
    function updatePlayers() {
      fetch('get_room.php?code=<?= $code ?>')
        .then(r => r.json())
        .then(data => {
          const ul = document.getElementById('playerList');
          ul.innerHTML = "";
          data.players.forEach(p => {
            const li = document.createElement('li');
            li.textContent = p;
            ul.appendChild(li);
          });
        })
        .catch(err => console.error(err));
    }

    setInterval(updatePlayers, 1000);
    updatePlayers();
  </script>
</body>

</html>
