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
        <div class="infosDroitCours">
            <h2>numéro de dossier :<h4>123584566658</h4>
            </h2>
        </div>
        <!-- Timer -->
        <div class="timer-container">
            <div class="timer-bar"></div>
        </div>

        <!-- Zone interactive -->
        <h1>Solution</h1>
        <div class="salle">
            <div class="DivImg"><img src="./assets/img/bistouri.webp" id="bistouri" class="objet" alt="bistouri"></div>
            <div class="DivImg"><img src="./assets/img/moniteur.webp" id="moniteur" class="objet" alt="moniteur"></div>
            <div class="DivImg"><img src="./assets/img/seringue.webp" id="seringue" class="objet" alt="seringue"></div>
            <div class="DivImg"><img src="./assets/img/anesthesie.webp" id="anesthesie" class="objet" alt="anesthesie">
            </div>
            <div class="DivImg"><img src="./assets/img/catheter.webp" id="catheter" class="objet" alt="catheter"></div>
            <div class="DivImg"><img src="./assets/img/clamp.webp" id="clamp" class="objet" alt="clamp"></div>
            <div class="DivImg"><img src="./assets/img/masque.webp" id="masque" class="objet" alt="masque"></div>
            <div class="DivImg"><img src="./assets/img/pincehemostatique.webp" id="pincehemostatique" class="objet"
                    alt="pincehemostatique"></div>
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
    <div class="panneauPERDU">
        <h1> VOUS AVEZ PERDU </h1>
        <a>revenir à la page principale</a>
    </div>
    <script src="./assets/js/salle.js"></script>
</body>

</html>
