const websocketUrl = 'ws://192.168.1.89:8080'; 
const conn = new WebSocket(websocketUrl);

const messagesDiv = document.getElementById('chat-messages');
const form = document.getElementById('chat-form');
const input = document.getElementById('chat-input');
const username = document.getElementById('username').value;

// Connexion
conn.onopen = () => appendMessage('Système', '✅ Connecté au chat', 'system');

// Réception d’un message
conn.onmessage = (e) => {
  const data = JSON.parse(e.data);
  const self = data.username === username;
  appendMessage(data.username, data.message, self ? 'self' : 'user');
};

// Fermeture / erreur
conn.onclose = () => appendMessage('Système', '🔴 Déconnecté du chat', 'system');
conn.onerror = (err) => console.error('Erreur WebSocket :', err);

// Envoi d’un message
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const msg = input.value.trim();
  if (!msg || conn.readyState !== WebSocket.OPEN) return;

  const payload = JSON.stringify({ username, message: msg });
  conn.send(payload);
  input.value = '';
  appendMessage(username, msg, 'self');
});

// Afficher un message dans la room
function appendMessage(sender, msg, type) {
  const div = document.createElement('div');
  div.classList.add('message');

  if (type === 'system') div.classList.add('system');
  else if (type === 'self') div.classList.add('self');

  if (type === 'system') {
    div.textContent = msg;
  } else {
    div.innerHTML = `<strong>${sender}</strong> : ${msg}`;
  }

  messagesDiv.appendChild(div);
  messagesDiv.scrollTop = messagesDiv.scrollHeight;
}
