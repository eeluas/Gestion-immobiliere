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

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST['modifier_representant'])) {
    // Récupération des données du formulaire
    $coderep = $_POST['coderep'];
}

if (isset($_POST['sauvegarder_representant'])) {
    // Récupération des données du formulaire
    $coderep = $_POST['coderep'];
    $nouveau_nomrep = $_POST['nouveau_nomrep'];
    $nouveau_prenomrep = $_POST['nouveau_prenomrep'];

    // Requête de modification pour le représentant
    $sql = "UPDATE Representant SET nomrep = '$nouveau_nomrep', prenomrep = '$nouveau_prenomrep' WHERE coderep = '$coderep'";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page representant.php après la modification
        header('Location: representant.php');
        exit(); // Terminer le script pour éviter l'exécution du reste du code
    } else {
        echo "Erreur lors de la modification du représentant: " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_form.css">
    <title>Modifier Représentant</title>
</head>
<body>

    <form action="modifier_representant.php" method="POST">
        <input type="hidden" name="coderep" value="<?php echo $coderep; ?>">
        Nouveau nom: <input type="text" name="nouveau_nomrep" value=""><br>
        Nouveau prénom: <input type="text" name="nouveau_prenomrep" value=""><br>
        <div class="button-container">
            <input type="submit" name="sauvegarder_representant" value="Sauvegarder">
            <a href="representant.php"><button type="button">Annuler</button></a>
        </div>
    </form>

</body>
</html>
