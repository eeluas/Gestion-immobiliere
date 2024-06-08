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

// Vérifier si le formulaire d'ajout a été soumis
if (isset($_POST['ajouter_appartement'])) {
    // Récupération des données du formulaire
    $ref = $_POST['ref'];
    $superficie = $_POST['superficie'];
    $prixvente = $_POST['prixvente'];
    $secteur = $_POST['secteur'];
    $coderep = $_POST['coderep'];
    $codeclt = $_POST['codeclt'];

    // Requête d'insertion pour l'appartement
    $sql = "INSERT INTO Appartement (ref, superficie, prixvente, secteur, coderep, codeclt) VALUES ('$ref', '$superficie', '$prixvente', '$secteur', '$coderep', '$codeclt')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page appartement.php après l'ajout
        header('Location: appartement.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'appartement: " . $conn->error;
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
    <title>Ajouter Appartement</title>
</head>
<body>

    <form action="ajouter_appartement.php" method="POST">
        Référence: <input type="text" name="ref"><br>
        Superficie: <input type="text" name="superficie"><br>
        Prix de vente: <input type="text" name="prixvente"><br>
        Secteur: <input type="text" name="secteur"><br>
        Code représentant: <input type="text" name="coderep"><br>
        Code client: <input type="text" name="codeclt"><br>
        <div class="button-container">
            <input type="submit" name="ajouter_appartement" value="Ajouter">
            <a href="appartement.php"><button type="button">Annuler</button></a>
        </div>
    </form>
    
</body>
</html>
