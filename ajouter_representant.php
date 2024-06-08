<?php
// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si le formulaire d'ajout a été soumis
if (isset($_POST['ajouter_representant'])) {
    // Récupération des données du formulaire
    $coderep = $_POST['coderep'];
    $nomrep = $_POST['nomrep'];
    $prenomrep = $_POST['prenomrep'];

    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

    // Requête d'insertion pour le représentant
    $requete = $connexion->prepare("INSERT INTO Representant (coderep, nomrep, prenomrep) VALUES (?, ?, ?)");
    $requete->execute([$coderep, $nomrep, $prenomrep]);

    // Redirection vers la page representant.php après l'ajout
    header('Location: representant.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_form.css">
    <title>Ajouter Représentant</title>
</head>
<body>

    <form action="ajouter_representant.php" method="POST">
        Code : <input type="text" name="coderep"><br>
        Nom : <input type="text" name="nomrep"><br>
        Prénom : <input type="text" name="prenomrep"><br>
        <div class="button-container">
            <input type="submit" name="ajouter_representant" value="Ajouter">
            <a href="representant.php"><button type="button">Annuler</button></a>
        </div>
    </form>

</body>
</html>
