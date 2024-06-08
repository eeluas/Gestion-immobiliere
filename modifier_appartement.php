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
if (isset($_POST['modifier_appartement'])) {
    // Récupération des données du formulaire
    $ref = $_POST['ref'];
}

if (isset($_POST['sauvegarder_appartement'])) {
    // Récupération des données du formulaire
    $ref = $_POST['ref'];
    $superficie = $_POST['superficie'];
    $prixvente = $_POST['prixvente'];
    $secteur = $_POST['secteur'];
    $coderep = $_POST['coderep'];
    $codeclt = $_POST['codeclt'];

    // Requête de modification pour l'appartement
    $sql = "UPDATE Appartement SET superficie = '$superficie', prixvente = '$prixvente', secteur = '$secteur', coderep = '$coderep', codeclt = '$codeclt' WHERE ref = '$ref'";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page appartement.php après la modification
        header('Location: appartement.php');
        exit(); // Terminer le script pour éviter l'exécution du reste du code
    } else {
        echo "Erreur lors de la modification de l'appartement: " . $conn->error;
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
    <title>Modifier Appartement</title>
</head>
<body>

    <form action="modifier_appartement.php" method="POST">
        <input type="hidden" name="ref" value="<?php echo $ref; ?>">
        Superficie: <input type="text" name="superficie" value=""><br>
        Prix de vente: <input type="text" name="prixvente" value=""><br>
        Secteur: <input type="text" name="secteur" value=""><br>
        Code représentant: <input type="text" name="coderep" value=""><br>
        Code client: <input type="text" name="codeclt" value=""><br>
        <div class="button-container">
            <input type="submit" name="sauvegarder_appartement" value="Sauvegarder">
            <a href="appartement.php"><button type="button">Annuler</button></a>
        </div>
    </form>

</body>
</html>
