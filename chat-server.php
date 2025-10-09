<?php
require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Server\IoServer;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        echo "[".date('Y-m-d H:i:s')."] ✅ Serveur de chat démarré (port 8080)\n";
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "[".date('H:i:s')."] 🔗 Nouvelle connexion : {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        $username = htmlspecialchars($data['username'] ?? 'Anonyme');
        $message = htmlspecialchars($data['message'] ?? '');
        $payload = json_encode([
            'username' => $username,
            'message' => $message,
            'timestamp' => date('H:i:s')
        ]);

        foreach ($this->clients as $client) {
            $client->send($payload);
        }
        echo "[".date('H:i:s')."] 💬 {$username} : {$message}\n";
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "[".date('H:i:s')."] ❌ Déconnexion : {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "⚠️ Erreur : {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(new WsServer(new Chat())),
    8080
);

$server->run();
