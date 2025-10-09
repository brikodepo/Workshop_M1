// Messages prédéfinis selon les objets
const actions = {
  bistouri: "Bistouri : Faire des incisions précises dans les tissus.",
  moniteur: "Moniteur : Couper les tissus mous, fils de suture ou pansements.",
  pinceprehension:
    "Pince de Préhension : Saisir, maintenir ou tirer des tissus.",
  pincehemostatique:
    "Pince hémostatique : Pincer un vaisseau pour stopper un saignement.",
  masque: "Masque à oxygène : Aider le patient à respirer sous anesthésie.",
  clamp: "Clamp : Fermer temporairement un conduit (vaisseau, tube, etc.).",
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
  window.scrollTo({
    top: document.body.scrollHeight,
    behavior: "smooth", // effet de défilement fluide
  });
}
// Gère les clics sur les objets
document.querySelectorAll(".objet").forEach((objet) => {
  objet.addEventListener("click", () => {
    const objetsSelect = document.querySelectorAll(".objet.select");

    // Si l'objet est déjà sélectionné, on le désélectionne
    if (objet.classList.contains("select")) {
      objet.classList.remove("select");
      return;
    }

    // Si déjà 3 objets sélectionnés
    if (objetsSelect.length >= 3) {
      ajouterMessage("Tu ne peux sélectionner que 3 objets maximum !");
      return;
    }

    // Ajoute la classe et le message
    objet.classList.add("select");
    ajouterMessage(actions[objet.id]);

    // 🔽 Fait défiler la page vers le bas
    window.scrollTo({
      top: document.body.scrollHeight,
      behavior: "smooth", // effet de défilement fluide
    });
  });
});

const barre = document.querySelector(".timer-bar");
const tempsTotal = 600;
// Timer synchronisé
if (barre) {
  function mettreAJourTimer() {
    fetch("../Main/timer.php")
      .then((res) => res.json())
      .then((data) => {
        const tempsRestant = data.tempsRestant;
        barre.style.width =
          ((tempsTotal - tempsRestant) / tempsTotal) * 100 + "%";
        if (tempsRestant <= 0) {
          ajouterMessage("⏰ Temps écoulé !");
          document.querySelector(".panneauPERDU").style.display = "flex";
        }
      });
  }

  setInterval(mettreAJourTimer, 1000);

  mettreAJourTimer();
}

const timerDisplay = document.querySelector(".timer-display");
if (timerDisplay) {
  // Fonction pour formater les secondes en hh:mm:ss
  function formaterTemps(secondes) {
    if (isNaN(secondes)) return "00:00:00";
    const h = Math.floor(secondes / 3600);
    const m = Math.floor((secondes % 3600) / 60);
    const s = secondes % 60;
    return (
      String(h).padStart(2, "0") +
      ":" +
      String(m).padStart(2, "0") +
      ":" +
      String(s).padStart(2, "0")
    );
  }

  function mettreAJourHorloge() {
    fetch("./Main/timer.php")
      .then((res) => {
        if (!res.ok) throw new Error("Erreur réseau");
        return res.json();
      })
      .then((data) => {
        const tempsRestant = data.tempsRestant ?? 0;
        timerDisplay.textContent = formaterTemps(tempsRestant);

        if (tempsRestant <= 0) {
          timerDisplay.textContent = "00:00:00";
          document.querySelector(".panneauPERDU").style.display = "flex";
        }
      })
      .catch((err) => {
        console.error("Erreur timer :", err);
        timerDisplay.textContent = "Erreur...";
      });
  }

  setInterval(mettreAJourHorloge, 1000);
  mettreAJourHorloge();
}
// ✅ Liste des objets corrects (à adapter à ton jeu)
const combinaisonCorrecte = ["clamp", "moniteur", "seringue"];

document.querySelector(".valider").addEventListener("click", () => {
  const select = document.querySelectorAll(".select");
  const ids = Array.from(select).map((el) => el.id);
  // DEBUG (affiche ce que l'on compare)
  console.log("selected ids:", ids);
  console.log("target combo:", select);
  let compt = 0;

  select.forEach((obj) => {
    combinaisonCorrecte.forEach((id) => {
      if (obj.id == id) {
        compt = compt + 1;
      }
    });
  });

  if (compt == 3) {
    ajouterMessage("✅ Bon choix !");
  } else {
    ajouterMessage("❌ Mauvais choix ! -60 secondes !");
    fetch("../Main/penalite.php").then((res) => res.json());
  }
});
