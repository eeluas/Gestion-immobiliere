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
if (isset($_POST['modifier_client'])) {
    // Récupération des données du formulaire
    $codeclt = $_POST['codeclt'];
}

if (isset($_POST['sauvegarder_client'])) {
    // Récupération des données du formulaire
    $codeclt = $_POST['codeclt'];
    $nouveau_nomclt = $_POST['nouveau_nomclt'];
    $nouvelle_adresseclt = $_POST['nouvelle_adresseclt'];

    // Requête de modification pour le client
    $sql = "UPDATE Client SET nomclt = '$nouveau_nomclt', adresseclt = '$nouvelle_adresseclt' WHERE codeclt = '$codeclt'";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page client.php après la modification
        header('Location: client.php');
        exit(); // Terminer le script pour éviter l'exécution du reste du code
    } else {
        echo "Erreur lors de la modification du client: " . $conn->error;
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
    <title>Modifier Client</title>
</head>
<body>

    <form action="modifier_client.php" method="POST">
        <input type="hidden" name="codeclt" value="<?php echo $codeclt; ?>">
        Nouveau nom: <input type="text" name="nouveau_nomclt" value=""><br>
        Nouvelle adresse: <input type="text" name="nouvelle_adresseclt" value=""><br>
        <div class="button-container">
            <input type="submit" name="sauvegarder_client" value="Sauvegarder">
            <a href="client.php"><button type="button">Annuler</button></a>
        </div>
    </form>

</body>
</html>
