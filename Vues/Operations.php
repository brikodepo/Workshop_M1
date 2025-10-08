<?php
// Escape Game - Salle d'opération
// Tu peux dupliquer ce fichier pour créer d'autres salles (ex : salle2.php)
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Escape Game - Salle d'opération</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="bodyOpération">

    <div class="container">
        <h1>Salle d'opération</h1>

        <!-- Timer -->
        <div class="timer-container">
            <div class="timer-bar"></div>
        </div>

        <!-- Zone interactive -->
        <div class="salle">
            <div class="DivImg"><img src="./assets/img/bistouri.webp" id="bistouri" class="objet" alt="Bistouri"></div>
            <div class="DivImg"><img src="./assets/img/moniteur.webp" id="moniteur" class="objet" alt="Moniteur"></div>
            <div class="DivImg"><img src="./assets/img/seringue.webp" id="seringue" class="objet" alt="Seringue"></div>
            <div class="DivImg"><img src="./assets/img/anesthesie.webp" id="anesthesie" class="objet" alt="anesthesie">
            </div>
            <div class="DivImg"><img src="./assets/img/catheter.webp" id="catheter" class="objet" alt="catheter"></div>
            <div class="DivImg"><img src="./assets/img/Clamp.webp" id="Clamp" class="objet" alt="Clamp"></div>
            <div class="DivImg"><img src="./assets/img/masque.webp" id="masque" class="objet" alt="masque"></div>
            <div class="DivImg"><img src="./assets/img/Pincehemostatique.webp" id="Pincehemostatique" class="objet"
                    alt="Pincehemostatique"></div>
            <div class="DivImg"><img src="./assets/img/pinceprehension.webp" id="pinceprehension" class="objet"
                    alt="pinceprehension"></div>
            <div class="DivImg"><img src="./assets/img/defebrillateur.webp" id="defebrillateur" class="objet"
                    alt="defebrillateur"></div>
        </div>

        <!-- Tableau d'affichage -->
        <div class="log">
            <p><strong>Journal de la salle :</strong></p>
            <ul class="messages"></ul>
        </div>
        <div class="btnValidation">
            <button class="valider">Valider</button>
        </div>
    </div>

    <script src="./assets/js/salle.js"></script>
</body>

</html>