<?php
// Connexion à la base de données
$connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

// Traitement d'ajout pour les clients
if(isset($_POST['ajouter_client'])) {
    // Récupération des données du formulaire
    $codeclt = $_POST['codeclt'];
    $nomclt = $_POST['nomclt'];
    $adresseclt = $_POST['adresseclt'];

    // Requête d'insertion pour les clients
    $requete_client = $connexion->prepare("INSERT INTO Client (codeclt, nomclt, adresseclt) VALUES (?, ?, ?)");
    $requete_client->execute([$codeclt, $nomclt, $adresseclt]);

    // Redirection vers la page client.php après l'ajout
    header('Location: client.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_form.css">

    <title>Ajouter Client</title>
</head>
<body>

    <form action="ajouter_client.php" method="POST">
        Code: <input type="text" name="codeclt"><br>
        Nom: <input type="text" name="nomclt"><br>
        Adresse: <input type="text" name="adresseclt"><br>
        <div class="button-container">
            <input type="submit" name="ajouter_client" value="Ajouter">
            <a href="client.php"><button type="button">Annuler</button></a>
        </div>
    </form>

</body>
</html>
