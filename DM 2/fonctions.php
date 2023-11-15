<?php
function sauvegarderCommande($data)
{
    // Chemin du dossier de sauvegarde
    $backupFolder = "Commandes/";

    // Vérifie si le dossier de sauvegarde existe, sinon le crée
    if (!file_exists($backupFolder) && !is_dir($backupFolder)) {
        mkdir($backupFolder);
    }

    // Chemin du fichier de sauvegarde
    $backupFilename = "backup_commandes_" . date("Ymd_His") . ".txt";
    $backupPath = $backupFolder . $backupFilename;

    // Enregistre les données dans le fichier principal
    $mainFilename = "commandes.txt";
    $mainPath = $backupFolder . $mainFilename;

    // Sauvegarde dans le fichier principal
    $mainFile = fopen($mainPath, 'a');
    fwrite($mainFile, $data);
    fclose($mainFile);

    // Crée une copie de sauvegarde
    $backupFile = fopen($backupPath, 'w');
    fwrite($backupFile, $data);
    fclose($backupFile);
}
