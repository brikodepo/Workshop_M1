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
document.querySelector(".valider").addEventListener("click", () => {
  if (document.querySelector(".select")) {
    idObjet = document.querySelector(".select").id;
    console.log(idObjet);
    if (idObjet == "Clamp") {
      ajouterMessage("✅ Bon choix ! L’action réussit !");
      clearInterval(interval); // facultatif, si tu veux arrêter le timer en cas de réussite
    } else {
      ajouterMessage("❌ Mauvais choix ! Vous perdez 60 secondes...");
      tempsRestant -= 60;
      if (tempsRestant < 0) tempsRestant = 0;

      // Met à jour immédiatement la barre
      const pourcentage = ((tempsTotal - tempsRestant) / tempsTotal) * 100;
      barre.style.width = pourcentage + "%";
    }
  }
});
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

// Timer progressif (par exemple 60 secondes)
let tempsTotal = 600; // secondes
let tempsRestant = tempsTotal;

const barre = document.querySelector(".timer-bar");

const interval = setInterval(() => {
  tempsRestant--;
  const pourcentage = ((tempsTotal - tempsRestant) / tempsTotal) * 100;
  barre.style.width = pourcentage + "%";

  if (tempsRestant <= 0) {
    clearInterval(interval);
    ajouterMessage("Temps écoulé ! Fin de la salle.");
  }
}, 1000);
