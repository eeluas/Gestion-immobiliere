<?php
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire de suppression a été soumis
if (isset($_POST['supprimer_appartement'])) {
    // Récupération des données du formulaire
    $ref = $_POST['ref'];

    // Requête de suppression pour l'appartement
    $sql = "DELETE FROM Appartement WHERE ref = '$ref'";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page appartement.php après la suppression
        header('Location: appartement.php');
        exit(); // Terminer le script pour éviter l'exécution du reste du code
    } else {
        echo "Erreur lors de la suppression de l'appartement: " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
