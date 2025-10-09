🎯 Objectif

Ce guide explique étape par étape comment déployer le système de chat temps réel basé sur WebSocket + PHP (Ratchet) sur votre environnement local ou réseau (VPN).

Ce chat permet à plusieurs utilisateurs (médecins, joueurs, etc.) connectés sur différentes machines d’échanger en direct pendant le jeu (Escape Game médical).

🧱 1. Technologies utilisées
Composant	Technologie
Backend Chat	PHP + Ratchet WebSocket

Client Web	HTML / CSS / JavaScript (WebSocket API)
Serveur Web	Apache (via XAMPP)
Base de données (du projet global)	MySQL
Service en arrière-plan	NSSM (pour exécuter le chat en continu sur Windows)
⚙️ 2. Pré-requis

Windows 10 / 11

XAMPP installé (C:\xampp)

PHP ≥ 8.0 inclus dans XAMPP

Composer (gestionnaire de dépendances PHP) :
https://getcomposer.org/download/

NSSM (pour lancer le serveur WebSocket en service Windows) :
https://nssm.cc/download



🚀 3. Installation
Étape 1 : Installer les dépendances Ratchet

Ouvre l’invite de commande dans le dossier du projet :

cd C:\xampp\htdocs\Workshop_M1-main
composer require cboden/ratchet


Cela installe Ratchet et ses dépendances dans le dossier vendor/.

Étape 2 : Tester manuellement le serveur WebSocket

Dans le même dossier :

php chat-server.php


Tu devrais voir :

Serveur de chat démarré. En attente de connexions...


➡️ Garde cette fenêtre ouverte pour les tests.

Étape 3 : Lancer XAMPP

Démarre :

Apache

MySQL

Puis ouvre dans ton navigateur :

http://localhost/Workshop_M1-main/test-chat.php


💬 Tape un message → il doit s’afficher immédiatement.
Ouvre la même page sur un autre PC (connecté en VPN) → le message s’affiche aussi en direct.

🧩 4. Créer le service Windows avec NSSM (permanent)
Étape 1 : Installer NSSM

Télécharge depuis : https://nssm.cc/download

Décompresse, copie nssm.exe dans C:\nssm\

Étape 2 : Créer le service

Ouvre l’invite de commandes en administrateur :

cd C:\nssm
nssm install ChatServer


Remplis comme suit :

Champ	Valeur
Path	C:\xampp\php\php.exe
Arguments	C:\xampp\htdocs\Workshop_M1-main\chat-server.php
Startup directory	C:\xampp\htdocs\Workshop_M1-main

Clique sur Install service ✅

Étape 3 : Démarrer le service

Toujours dans le terminal admin :

nssm start ChatServer


Ton serveur WebSocket tourne désormais en arrière-plan.

🧠 5. Gérer le service
Action	Commande
Démarrer	nssm start ChatServer
Arrêter	nssm stop ChatServer
Supprimer	nssm remove ChatServer confirm
Modifier	nssm edit ChatServer
Voir l’état	sc query ChatServer
🌐 6. Connexion multi-PC (OpenVPN)

Si plusieurs postes sont connectés via OpenVPN :


Dans le fichier chat.js, remplace :

const websocketUrl = 'ws://localhost:8080';


par :

const websocketUrl = 'ws://192.168.1.89:8080';


Les autres joueurs mettent ton IP dans leur chat.js.

🎨 7. Interface du Chat

Le chat apparaît en bas à droite

Messages auto-défilants

Style moderne clair (modifiable dans style.css)

Envoi en temps réel sans rechargement

✅ 8. Tests finaux

Vérifie que le chat-server est bien lancé :

sc query ChatServer


→ état : RUNNING

Ouvre la page du projet depuis 2 ou 3 PC :

http://192.168.1.89/Workshop_M1-main/index.php


Tape un message → tout le monde le reçoit instantanément 🎯

🧰 9. Dépannage rapide
Problème	Cause probable	Solution
❌ Chat vide	Serveur WebSocket non lancé	Lance nssm start ChatServer
❌ “Connexion refusée”	Port 8080 bloqué	Ouvre le port dans le pare-feu Windows
❌ Messages non reçus	Mauvaise IP WebSocket	Mets ton IP VPN (pas localhost)
❌ PHP error Ratchet	Composer non installé	Refaire composer require cboden/ratchet
❌ MySQL error	Base non démarrée	Lance MySQL dans XAMPP