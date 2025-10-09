<?php
require_once "config.php";

if ($_SESSION['role'] !== 'archiviste') {
    header("Location: room.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archiviste</title>
    <link rel="stylesheet" href="./Vues/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>


    <div class="patientInfo">
        <div>
            <h1>Bienvenue Archiviste</h1>
            <p>Code de la salle : <?= htmlspecialchars($_SESSION['room_code']) ?></p>
            <p>Pseudo : <?= htmlspecialchars($_SESSION['pseudo']) ?></p>
        </div>
        <div class="patientUn">
            <div class="pages pageUne">
                <h1>Dossier médical</h1>
                <div class="BlockUn">
                    <div>
                        <h2> Nom : Lacgarge</h2>
                        <h2>Prénom : Célia</h2>
                        <h3>née le : 15/02/1986</h3>
                        <h3> Age : 39 ans</h3>
                    </div>
                    <div class="portrait">
                        <img src="./Vues/assets/img/patient1.webp">
                    </div>
                </div>
                <h3> sexe : &#9745; femme &#9744; homme</h3>
                <span class="separateur"></span>
                <h4>address : 28 rue du docteur fernand lamaze, Angouleme</h4>
                <div class="InfosDroit">
                    <h4>Profession : Enseignant</h4>
                    <h4>téléphone : 01 23 45 67 89</h4>
                </div>
                <h4>Numéro de dossier : 025678412369</h4>
                <span class="separateur"></span>
                <h2>Historique Médical</h2>
                <div class="BlockDeux">
                    <h4>Antécédents familiaux : </h4>
                    <p></p>
                    <h4>Antécédents Personnel : </h4>
                    <p></p>
                    <h4>Allergies connues : </h4>
                    <p>Arachide</p>
                    <h4>Vaccinations : </h4>
                    <p>Sida</p>

                </div>
            </div>
            <div class="pages pageDeux">
                <h3>Suivi des traitements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Traitement / Médicament</th>
                            <th>Posologie</th>
                            <th>Durée</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>Paracétamol 500 mg</td>
                            <td>1 comprimé toutes les 6h</td>
                            <td>5 jours</td>
                            <td>Amélioration progressive</td>
                        </tr>
                        <tr>
                            <td>05/10/2025</td>
                            <td>Amoxicilline 1g</td>
                            <td>2 fois par jour</td>
                            <td>7 jours</td>
                            <td>Bon suivi du traitement</td>
                        </tr>
                        <tr>
                            <td>10/10/2025</td>
                            <td>Vitamine C</td>
                            <td>1 comprimé / jour</td>
                            <td>10 jours</td>
                            <td>Aucun effet secondaire</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Observations médicales</h3>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <div class="signatures">
                    <h3>Consentements et signatures</h3>
                    <p>&#9745; J’autorise les soins nécessaires à mon état de santé.</p>
                    <p>&#9745; J’autorise la communication de mes données médicales au personnel soignant concerné.</p>
                    <p>&#9745; J’ai été informé(e) de mes droits concernant l’accès à mon dossier médical.</p>
                </div>
            </div>
        </div>
        <div class="patientDeux">
            <div class="pages pageUne">
                <h1>Dossier médical</h1>
                <div class="BlockUn">
                    <div>
                        <h2> Nom : BARRIOL </h2>
                        <h2>Prénom : Clémentine</h2>
                        <h3>née le : 14/03/1992</h3>
                        <h3> Age : 33 ans</h3>
                    </div>
                    <div class="portrait">
                        <img src="./Vues/assets/img/patient1.webp">
                    </div>
                </div>
                <h3> sexe : &#9745; femme &#9744; homme</h3>
                <span class="separateur"></span>
                <h4>Adresse : 18 rue des Lilas, 75012 Paris</h4>
                <div class="InfosDroit">
                    <h4>Profession : Enseignant</h4>
                    <h4>Téléphone : 01 23 45 67 89</h4>
                </div>
                <h4>Numéro de dossier : 025678412369</h4>
                <span class="separateur"></span>
                <h2>Historique Médical</h2>
                <div class="BlockDeux">
                    <h4>Antécédents familiaux : </h4>
                    <p></p>
                    <h4>Antécédents Personnel : </h4>
                    <p></p>
                    <h4>Allergies connues : </h4>
                    <p>Arachide</p>
                    <h4>Vaccinations : </h4>
                    <p>Rougeolle</p>

                </div>
            </div>
            <div class="pages pageDeux">
                <h3>Suivi des traitements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Traitement / Médicament</th>
                            <th>Posologie</th>
                            <th>Durée</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>Paracétamol 500 mg</td>
                            <td>1 comprimé toutes les 6h</td>
                            <td>5 jours</td>
                            <td>Amélioration progressive</td>
                        </tr>
                        <tr>
                            <td>05/10/2025</td>
                            <td>Amoxicilline 1g</td>
                            <td>2 fois par jour</td>
                            <td>7 jours</td>
                            <td>Bon suivi du traitement</td>
                        </tr>
                        <tr>
                            <td>10/10/2025</td>
                            <td>Vitamine C</td>
                            <td>1 comprimé / jour</td>
                            <td>10 jours</td>
                            <td>Aucun effet secondaire</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Observations médicales</h3>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <div class="signatures">
                    <h3>Consentements et signatures</h3>
                    <p>&#9745; J’autorise les soins nécessaires à mon état de santé.</p>
                    <p>&#9745; J’autorise la communication de mes données médicales au personnel soignant concerné.</p>
                    <p>&#9745; J’ai été informé(e) de mes droits concernant l’accès à mon dossier médical.</p>
                </div>
            </div>
        </div>
        <div class="patientTrois">
            <div class="pages pageUne">
                <h1>Dossier médical</h1>
                <div class="BlockUn">
                    <div>
                        <h2> Nom : Renaval</h2>
                        <h2>Prénom : Jules</h2>
                        <h3>née le : 22/07/1985</h3>
                        <h3> Age : 40 ans</h3>
                    </div>
                    <div class="portrait">
                        <img src="./Vues/assets/img/patient1.webp">
                    </div>
                </div>
                <h3> sexe : &#9744; femme &#9745; homme</h3>
                <span class="separateur"></span>
                <h4>Adresse : 42 avenue des Mimosas, 34000 Montpellier</h4>
                <div class="InfosDroit">
                    <h4>Profession : Enseignant</h4>
                    <h4>Téléphone : 01 23 45 67 89</h4>
                </div>
                <h4>Numéro de dossier : 025678412369</h4>
                <span class="separateur"></span>
                <h2>Historique Médical</h2>
                <div class="BlockDeux">
                    <h4>Antécédents familiaux : </h4>
                    <p></p>
                    <h4>Antécédents Personnel : </h4>
                    <p></p>
                    <h4>Allergies connues : </h4>
                    <p>Arachide</p>
                    <h4>Vaccinations : </h4>
                    <p>Sida</p>

                </div>
            </div>
            <div class="pages pageDeux">
                <h3>Suivi des traitements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Traitement / Médicament</th>
                            <th>Posologie</th>
                            <th>Durée</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>Paracétamol 500 mg</td>
                            <td>1 comprimé toutes les 6h</td>
                            <td>5 jours</td>
                            <td>Amélioration progressive</td>
                        </tr>
                        <tr>
                            <td>05/10/2025</td>
                            <td>Amoxicilline 1g</td>
                            <td>2 fois par jour</td>
                            <td>7 jours</td>
                            <td>Bon suivi du traitement</td>
                        </tr>
                        <tr>
                            <td>10/10/2025</td>
                            <td>Vitamine C</td>
                            <td>1 comprimé / jour</td>
                            <td>10 jours</td>
                            <td>Aucun effet secondaire</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Observations médicales</h3>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <div class="signatures">
                    <h3>Consentements et signatures</h3>
                    <p>&#9745; J’autorise les soins nécessaires à mon état de santé.</p>
                    <p>&#9745; J’autorise la communication de mes données médicales au personnel soignant concerné.</p>
                    <p>&#9745; J’ai été informé(e) de mes droits concernant l’accès à mon dossier médical.</p>
                </div>
            </div>
        </div>
        <div class="patientQuatre">
            <div class="pages pageUne">
                <h1>Dossier médical</h1>
                <div class="BlockUn">
                    <div>
                        <h2> Nom : Marchenot</h2>
                        <h2>Prénom : Élodie</h2>
                        <h3>née le : 03/12/1999</h3>
                        <h3> Age : 25 ans</h3>
                    </div>
                    <div class="portrait">
                        <img src="./Vues/assets/img/patient1.webp">
                    </div>
                </div>
                <h3> sexe : &#9745; femme &#9744; homme</h3>
                <span class="separateur"></span>
                <h4>Adresse : 7 impasse du Vieux Puits, 67000 Strasbourg</h4>
                <div class="InfosDroit">
                    <h4>Profession : Enseignant</h4>
                    <h4>Téléphone : 01 23 45 67 89</h4>
                </div>
                <h4>Numéro de dossier : 025678412369</h4>
                <span class="separateur"></span>
                <h2>Historique Médical</h2>
                <div class="BlockDeux">
                    <h4>Antécédents familiaux : </h4>
                    <p></p>
                    <h4>Antécédents Personnel : </h4>
                    <p></p>
                    <h4>Allergies connues : </h4>
                    <p>Arachide</p>
                    <h4>Vaccinations : </h4>
                    <p>Sida</p>

                </div>
            </div>
            <div class="pages pageDeux">
                <h3>Suivi des traitements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Traitement / Médicament</th>
                            <th>Posologie</th>
                            <th>Durée</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>Paracétamol 500 mg</td>
                            <td>1 comprimé toutes les 6h</td>
                            <td>5 jours</td>
                            <td>Amélioration progressive</td>
                        </tr>
                        <tr>
                            <td>05/10/2025</td>
                            <td>Amoxicilline 1g</td>
                            <td>2 fois par jour</td>
                            <td>7 jours</td>
                            <td>Bon suivi du traitement</td>
                        </tr>
                        <tr>
                            <td>10/10/2025</td>
                            <td>Vitamine C</td>
                            <td>1 comprimé / jour</td>
                            <td>10 jours</td>
                            <td>Aucun effet secondaire</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Observations médicales</h3>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <div class="signatures">
                    <h3>Consentements et signatures</h3>
                    <p>&#9745; J’autorise les soins nécessaires à mon état de santé.</p>
                    <p>&#9745; J’autorise la communication de mes données médicales au personnel soignant concerné.</p>
                    <p>&#9745; J’ai été informé(e) de mes droits concernant l’accès à mon dossier médical.</p>
                </div>
            </div>
        </div>
        <div class="patientCinq">
            <div class="pages pageUne">
                <h1>Dossier médical</h1>
                <div class="BlockUn">
                    <div>
                        <h2> Nom : Lavergne</h2>
                        <h2>Prénom : Théo</h2>
                        <h3>née le : 09/05/2004</h3>
                        <h3> Age : 21 ans</h3>
                    </div>
                    <div class="portrait">
                        <img src="./Vues/assets/img/patient1.webp">
                    </div>
                </div>
                <h3> sexe : &#9744; femme &#9745; homme</h3>
                <span class="separateur"></span>
                <h4>Adresse : 11 rue du Portail Rouge, 69007 Lyon</h4>
                <div class="InfosDroit">
                    <h4>Profession : Enseignant</h4>
                    <h4>téléphone : 01 23 45 67 89</h4>
                </div>
                <h4>Numéro de dossier : 025678412369</h4>
                <span class="separateur"></span>
                <h2>Historique Médical</h2>
                <div class="BlockDeux">
                    <h4>Antécédents familiaux : </h4>
                    <p></p>
                    <h4>Antécédents Personnel : </h4>
                    <p></p>
                    <h4>Allergies connues : </h4>
                    <p>Arachide</p>
                    <h4>Vaccinations : </h4>
                    <p>Sida</p>

                </div>
            </div>
            <div class="pages pageDeux">
                <h3>Suivi des traitements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Traitement / Médicament</th>
                            <th>Posologie</th>
                            <th>Durée</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>Paracétamol 500 mg</td>
                            <td>1 comprimé toutes les 6h</td>
                            <td>5 jours</td>
                            <td>Amélioration progressive</td>
                        </tr>
                        <tr>
                            <td>05/10/2025</td>
                            <td>Amoxicilline 1g</td>
                            <td>2 fois par jour</td>
                            <td>7 jours</td>
                            <td>Bon suivi du traitement</td>
                        </tr>
                        <tr>
                            <td>10/10/2025</td>
                            <td>Vitamine C</td>
                            <td>1 comprimé / jour</td>
                            <td>10 jours</td>
                            <td>Aucun effet secondaire</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Observations médicales</h3>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <div class="signatures">
                    <h3>Consentements et signatures</h3>
                    <p>&#9745; J’autorise les soins nécessaires à mon état de santé.</p>
                    <p>&#9745; J’autorise la communication de mes données médicales au personnel soignant concerné.</p>
                    <p>&#9745; J’ai été informé(e) de mes droits concernant l’accès à mon dossier médical.</p>
                </div>
            </div>
        </div>
        <div class="patientSix">
            <div class="pages pageUne">
                <h1>Dossier médical</h1>
                <div class="BlockUn">
                    <div>
                        <h2> Nom : Brivière</h2>
                        <h2>Prénom : Manon</h2>
                        <h3>née le : 27/01/1990</h3>
                        <h3> Age : 35 ans</h3>
                    </div>
                    <div class="portrait">
                        <img src="./Vues/assets/img/patient1.webp">
                    </div>
                </div>
                <h3> sexe : &#9745; femme &#9744; homme</h3>
                <span class="separateur"></span>
                <h4>Adresse : 29 allée des Tilleuls, 44000 Nantes</h4>
                <div class="InfosDroit">
                    <h4>Profession : Enseignant</h4>
                    <h4>Téléphone : 01 23 45 67 89</h4>
                </div>
                <h4>Numéro de dossier : 025678412369</h4>
                <span class="separateur"></span>
                <h2>Historique Médical</h2>
                <div class="BlockDeux">
                    <h4>Antécédents familiaux : </h4>
                    <p></p>
                    <h4>Antécédents Personnel : </h4>
                    <p></p>
                    <h4>Allergies connues : </h4>
                    <p>Arachide</p>
                    <h4>Vaccinations : </h4>
                    <p>Sida</p>

                </div>
            </div>
            <div class="pages pageDeux">
                <h3>Suivi des traitements</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Traitement / Médicament</th>
                            <th>Posologie</th>
                            <th>Durée</th>
                            <th>Observations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01/10/2025</td>
                            <td>Paracétamol 500 mg</td>
                            <td>1 comprimé toutes les 6h</td>
                            <td>5 jours</td>
                            <td>Amélioration progressive</td>
                        </tr>
                        <tr>
                            <td>05/10/2025</td>
                            <td>Amoxicilline 1g</td>
                            <td>2 fois par jour</td>
                            <td>7 jours</td>
                            <td>Bon suivi du traitement</td>
                        </tr>
                        <tr>
                            <td>10/10/2025</td>
                            <td>Vitamine C</td>
                            <td>1 comprimé / jour</td>
                            <td>10 jours</td>
                            <td>Aucun effet secondaire</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Observations médicales</h3>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <p class="ligneVides"></p>
                <div class="signatures">
                    <h3>Consentements et signatures</h3>
                    <p>&#9745; J’autorise les soins nécessaires à mon état de santé.</p>
                    <p>&#9745; J’autorise la communication de mes données médicales au personnel soignant concerné.</p>
                    <p>&#9745; J’ai été informé(e) de mes droits concernant l’accès à mon dossier médical.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="timer-display">Chargement...</div>


    <div class="fondDossier">
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

</div>
</body>


</html>
