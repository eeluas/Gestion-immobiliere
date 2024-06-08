<?php
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['supprimer_representant'])) {
    // Récupération des données du formulaire
    $coderep = $_POST['coderep'];

    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

    // Requête de suppression pour le représentant
    $requete = $connexion->prepare("DELETE FROM Representant WHERE coderep = ?");
    $requete->execute([$coderep]);

    // Redirection vers la page representant.php après la suppression
    header('Location: representant.php');
    exit(); // Terminer le script pour éviter l'exécution du reste du code
}
?>
