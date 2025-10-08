// Messages prédéfinis selon les objets
const actions = {
  bistouri: "Bistouri : Faire des incisions précises dans les tissus.",
  moniteur: "Moniteur : Couper les tissus mous, fils de suture ou pansements.",
  pinceprehension:
    "Pince de Préhension : Saisir, maintenir ou tirer des tissus.",
  Pincehemostatique:
    "Pince hémostatique : Pincer un vaisseau pour stopper un saignement.",
  masque: "Masque à oxygène : Aider le patient à respirer sous anesthésie.",
  Clamp: "Clamp : Fermer temporairement un conduit (vaisseau, tube, etc.).",
  seringue: "Seringue : C'est une seringue anti-allergie.",
  catheter: "Cathéter : Introduire un liquide (perfusion) ou prélever du sang.",
  anesthesie:
    "Machine d’anesthésie : Mélanger et délivrer les gaz anesthésiques et l’oxygène.",
  defebrillateur:
    "Défibrillateur : Rétablir le rythme cardiaque en cas d’arrêt.",
};

// Ajoute un message au tableau de logs
function ajouterMessage(texte) {
  const liste = document.querySelector(".messages");
  const dernierMessage = liste.querySelector("li:last-child");

  // Évite de répéter le même message deux fois de suite
  if (!dernierMessage || dernierMessage.textContent !== texte) {
    const li = document.createElement("li");
    li.textContent = texte;
    liste.appendChild(li);
    if (typeof li.scrollIntoView === "function") {
      li.scrollIntoView({ behavior: "smooth", block: "end" });
      return;
    }
  }
}
// Gère les clics sur les objets
document.querySelectorAll(".objet").forEach((objet) => {
  objet.addEventListener("click", () => {
    ajouterMessage(actions[objet.id]);
    if (
      document.querySelector(".select") != null &&
      document.querySelector(".select") != objet
    ) {
      document.querySelector(".select").classList.remove("select");
    }
    objet.classList.toggle("select");
  });
});

const barre = document.querySelector(".timer-bar");
const tempsTotal = 600;
// Timer synchronisé
function mettreAJourTimer() {
  fetch("../Main/timer.php")
    .then((res) => res.json())
    .then((data) => {
      const tempsRestant = data.tempsRestant;
      barre.style.width =
        ((tempsTotal - tempsRestant) / tempsTotal) * 100 + "%";
      if (tempsRestant <= 0) ajouterMessage("⏰ Temps écoulé !");
    });
}

setInterval(mettreAJourTimer, 1000);
mettreAJourTimer();

// Validation
document.querySelector(".valider").addEventListener("click", () => {
  const select = document.querySelector(".select");
  if (!select) {
    ajouterMessage("❗ Sélectionnez un objet avant de valider.");
    return;
  }
  if (select.id.toLowerCase() === "clamp") {
    ajouterMessage("✅ Bon choix !");
  } else {
    ajouterMessage("❌ Mauvais choix ! -60 secondes !");
    fetch("../Main/penalite.php").then((res) => res.json());
  }
});
