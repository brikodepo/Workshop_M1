<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>
    <h2>Bienvenue, <?= htmlspecialchars(Session::get('user')) ?> !</h2>
    <p>Vous êtes connecté.</p>
    <a href="index.php?action=logout">Se déconnecter</a>
</body>
</html>