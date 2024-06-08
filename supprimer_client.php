<?php
// Connexion à la base de données
$connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

// Traitement de suppression pour les clients
if(isset($_POST['supprimer_client'])) {
    // Récupération du code client à supprimer
    $codeclt = $_POST['codeclt'];

    // Requête de suppression pour les clients
    $requete_suppression = $connexion->prepare("DELETE FROM Client WHERE codeclt = ?");
    $requete_suppression->execute([$codeclt]);

    // Redirection vers la page client.php après la suppression
    header('Location: client.php');
    exit();
}
?>
