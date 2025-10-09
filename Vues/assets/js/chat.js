onst username = document.getElementById('username').value || 'Utilisateur';
const ws = new WebSocket('ws://localhost:8080'); 
const messagesDiv = document.getElementById('chat-messages');
const form = document.getElementById('chat-form');
const input = document.getElementById('chat-input');

// Quand la connexion est établie 
ws.onopen = () => {
    appendMessage('Système', 'Connecté au chat !', 'system');
};

//  Quand un message arrive du serveur 
ws.onmessage = (event) => {
    try {
        const data = JSON.parse(event.data);
        const sender = data.username;
        const message = data.message;
        const type = sender === username ? 'user' : 'other';
        appendMessage(sender, message, type);
    } catch (err) {
        console.error('Erreur de parsing du message', err);
    }
};

// Gestion des erreurs 
ws.onerror = (err) => {
    console.error('Erreur WebSocket :', err);
    appendMessage('Système', 'Erreur de connexion.', 'system');
};

// Déconnexion du serveur 
ws.onclose = () => {
    appendMessage('Système', 'Chat déconnecté.', 'system');
};

// Envoi d’un message
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const message = input.value.trim();

    if (message.length && ws.readyState === WebSocket.OPEN) {
        const payload = JSON.stringify({
            username: username,
            message: message,
        });
        ws.send(payload);
        input.value = '';
        input.focus();
    }
});

// Afficher un message dans la box 
function appendMessage(sender, msg, type) {
    const msgDiv = document.createElement('div');
    msgDiv.classList.add('message', type);

    if (type === 'system') {
        msgDiv.textContent = `(${new Date().toLocaleTimeString()}) ${msg}`;
    } else {
        msgDiv.innerHTML = `<strong>${sender}:</strong> ${msg}`;
    }

    messagesDiv.appendChild(msgDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight; 
}
//plier/deplier
document.getElementById('chat-header').addEventListener('click', () => {
    const body = document.getElementById('chat-messages');
    const form = document.getElementById('chat-form');
    const isVisible = body.style.display !== 'none';
    body.style.display = form.style.display = isVisible ? 'none' : 'flex';
});

