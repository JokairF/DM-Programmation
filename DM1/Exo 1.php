<?php

function estFerie($timestamp)
{
    $jour = date("d", $timestamp);
    $mois = date("m", $timestamp);
    $estFerie = 0;

    // Dates fériées fixes
    if ($jour == 1 && $mois == 1) $estFerie = 1; // 1er janvier
    if ($jour == 1 && $mois == 5) $estFerie = 1; // 1er mai
    if ($jour == 8 && $mois == 5) $estFerie = 1; // 8 mai
    if ($jour == 14 && $mois == 7) $estFerie = 1; // 14 juillet
    if ($jour == 15 && $mois == 8) $estFerie = 1; // 15 août
    if ($jour == 1 && $mois == 11) $estFerie = 1; // 1 novembre
    if ($jour == 11 && $mois == 11) $estFerie = 1; // 11 novembre
    if ($jour == 25 && $mois == 12) $estFerie = 1; // 25 décembre

    return $estFerie;
}

function calculerJours($dateDebut, $dateFin, $soldeConge)
{
    $dateDebutObj = date_create($dateDebut);
    $dateFinObj = date_create($dateFin);

    $interval = date_diff($dateDebutObj, $dateFinObj);
    $joursTotal = $interval->days;

    $joursOuvrables = 0;

    $currentDate = clone $dateDebutObj;

    for ($i = 0; $i <= $joursTotal; $i++) {
        $jourActuel = date('N', strtotime($currentDate->format('Y-m-d')));

        // Vérification si le jour est un jour ouvrable (du lundi au vendredi) et non un jour férié
        if ($jourActuel >= 1 && $jourActuel <= 5 && !estFerie(strtotime($currentDate->format('Y-m-d')))) {
            $joursOuvrables++;
        }

        $currentDate->modify('+1 day');
    }

    $joursManquants = max(0, $joursOuvrables - $soldeConge);
    $droitConges = ($joursManquants <= 0);

    return [
        'joursOuvrables' => $joursOuvrables,
        'joursManquants' => $joursManquants,
        'droitConges' => $droitConges,
    ];
}

// Test des exemples
$solde = 5;

$date1 = calculerJours('2023-03-20', '2023-03-24', $solde);
$date2 = calculerJours('2023-04-01', '2023-04-11', $solde);
$date3 = calculerJours('2023-07-12', '2023-07-19', $solde);

echo "Date 1 :  L'employé à " . $date1['joursOuvrables'] . " jours de congés, Manque : " . $date1['joursManquants'] . " jours, Peux prendre des congés : " . ($date1['droitConges'] ? 'Oui' : 'Non') . "<br>";
echo "Date 2 :  L'employé à " . $date2['joursOuvrables'] . " jours de congés, Manque : " . $date2['joursManquants'] . " jours, Peux prendre des congés : " . ($date2['droitConges'] ? 'Oui' : 'Non') . "<br>";
echo "Date 3 :  L'employé à " . $date3['joursOuvrables'] . " jours de congés, Manque : " . $date3['joursManquants'] . " jours, Peux prendre des congés : " . ($date3['droitConges'] ? 'Oui' : 'Non') . "<br>";
