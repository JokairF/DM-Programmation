<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclut le fichier de fonctions
    include 'fonctions.php';

    // Récupère les données du formulaire
    $nom = htmlspecialchars($_POST["nom"]);
    $adresse = htmlspecialchars($_POST["adresse"]);
    $produit = htmlspecialchars($_POST["produit"]);
    $prix = htmlspecialchars($_POST["prix"]);

    // Crée une chaîne de données à enregistrer dans le fichier
    $data = "Nom: $nom\nAdresse: $adresse\nProduit: $produit\nPrix: $prix\n";

    // Enregistre les données dans le fichier principal
    sauvegarderCommande($data);

    echo "Commande enregistrée avec succès.";

} else {
    echo "Erreur : Le formulaire n'a pas été soumis correctement.";
}
?>
