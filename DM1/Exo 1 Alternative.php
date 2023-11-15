<?php

// Fonction pour calculer le nombre de jours ouvrés entre deux dates
function calculerJoursOuvres($dateDebut, $dateFin)
{
    $joursOuvres = 0;
    $dateCourante = $dateDebut;

    while ($dateCourante <= $dateFin) {
        // Vérifie si le jour courant est un jour ouvré (lundi à vendredi)
        if (date('N', strtotime($dateCourante)) >= 1 && date('N', strtotime($dateCourante)) <= 5) {
            // Vérifie si le jour courant n'est pas un jour férié
            if (!estFerie(strtotime($dateCourante))) {
                $joursOuvres++;
            }
        }
        $dateCourante = date('Y-m-d', strtotime($dateCourante . ' +1 day'));
    }

    return $joursOuvres;
}

// Dates à renseigner
$date1Debut = '2023-03-20';
$date1Fin = '2023-03-24';
$date2Debut = '2023-04-01';
$date2Fin = '2023-04-11';
$date3Debut = '2023-07-12';
$date3Fin = '2023-07-19';

// Solde de congés disponible
$soldeConges = 5;

// Calculs
$joursConges1 = calculerJoursOuvres($date1Debut, $date1Fin);
$joursConges2 = calculerJoursOuvres($date2Debut, $date2Fin);
$joursConges3 = calculerJoursOuvres($date3Debut, $date3Fin);

// Vérification du solde de congés
function verifierSoldeConges($solde, $joursConges)
{
    if ($solde >= $joursConges) {
        return "L'employé à $joursConges jours de congés.";
    } else {
        $joursManquants = $joursConges - $solde;
        return "L'employé n'a pas assez de jours de congés. Il lui manque $joursManquants jours.";
    }
}

// Affichage des résultats
echo "Date n°1 : " . verifierSoldeConges($soldeConges, $joursConges1) . "<br>";
echo "Date n°2 : " . verifierSoldeConges($soldeConges, $joursConges2) . "<br>";
echo "Date n°3 : " . verifierSoldeConges($soldeConges, $joursConges3) . "<br>";

function estFerie($timestamp)
{
    $jour = date("d", $timestamp);
    $mois = date("m", $timestamp);
    $annee = date("Y", $timestamp);
    $EstFerie = 0;
    // dates fériées fixes
    if ($jour == 1 && $mois == 1) $EstFerie = 1; // 1er janvier
    if ($jour == 1 && $mois == 5) $EstFerie = 1; // 1er mai
    if ($jour == 8 && $mois == 5) $EstFerie = 1; // 8 mai
    if ($jour == 14 && $mois == 7) $EstFerie = 1; // 14 juillet
    if ($jour == 15 && $mois == 8) $EstFerie = 1; // 15 aout
    if ($jour == 1 && $mois == 11) $EstFerie = 1; // 1 novembre
    if ($jour == 11 && $mois == 11) $EstFerie = 1; // 11 novembre
    if ($jour == 25 && $mois == 12) $EstFerie = 1; // 25 décembre
    return $EstFerie;
}
