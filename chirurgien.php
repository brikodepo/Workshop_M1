<?php
require_once "config.php";

if ($_SESSION['role'] !== 'chirurgien') {
    header("Location: room.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Chirurgien</title>
    <link rel="stylesheet" href="./Vues/assets/css/style.css">
</head>

<body class="bodyOpération">
    <div class="container">
        <div>
            <h1>Bienvenue Chirurgien</h1>
            <p>Code de la salle : <?= htmlspecialchars($_SESSION['room_code']) ?></p>
            <p>Pseudo : <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
            <!-- Ajoute ici des fonctionnalités spécifiques -->
        </div>
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
            <div class="DivImg"><img src="./Vues/assets/img/bistouri.webp" id="bistouri" class="objet" alt="bistouri">
            </div>
            <div class="DivImg"><img src="./Vues/assets/img/moniteur.webp" id="moniteur" class="objet" alt="moniteur">
            </div>
            <div class="DivImg"><img src="./Vues/assets/img/seringue.webp" id="seringue" class="objet" alt="seringue">
            </div>
            <div class="DivImg"><img src="./Vues/assets/img/anesthesie.webp" id="anesthesie" class="objet"
                    alt="anesthesie">
            </div>
            <div class="DivImg"><img src="./Vues/assets/img/catheter.webp" id="catheter" class="objet" alt="catheter">
            </div>
            <div class="DivImg"><img src="./Vues/assets/img/clamp.webp" id="clamp" class="objet" alt="clamp"></div>
            <div class="DivImg"><img src="./Vues/assets/img/masque.webp" id="masque" class="objet" alt="masque"></div>
            <div class="DivImg"><img src="./Vues/assets/img/pincehemostatique.webp" id="pincehemostatique" class="objet"
                    alt="pincehemostatique"></div>
            <div class="DivImg"><img src="./Vues/assets/img/pinceprehension.webp" id="pinceprehension" class="objet"
                    alt="pinceprehension"></div>
            <div class="DivImg"><img src="./Vues/assets/img/defebrillateur.webp" id="defebrillateur" class="objet"
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
    <!-- ✅ CHAT COMMUN -->
<div id="chat-container">
    <div id="chat-header">💬 Chat Commun</div>

    <div id="chat-messages"></div>

    <form id="chat-form">
        <input type="hidden" id="username" value="<?= htmlspecialchars($_SESSION['pseudo']) ?>">
        <input type="text" id="chat-input" placeholder="Écrire un message..." autocomplete="off">
        <button type="submit">Envoyer</button>
    </form>
</div>


    <script src="./Vues/assets/js/chat.js"></script>
    <script src="./Vues/assets/js/salle.js"></script>
</body>


</html>
