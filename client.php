<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="style_table.css">
</head>
<body>
    
    <?php
    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

    // Requête pour récupérer les données des clients
    $requete_clients = $connexion->query('SELECT * FROM Client');

    // Affichage des données dans un tableau HTML
    echo '<table border="1">
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>';

    while ($client = $requete_clients->fetch()) {
        echo '<tr>';
        echo '<td>' . $client['codeclt'] . '</td>';
        echo '<td>' . $client['nomclt'] . '</td>';
        echo '<td>' . $client['adresseclt'] . '</td>';
        echo '<td class="actions">
                <form action="modifier_client.php" method="POST" style="display:inline;">
                    <input type="hidden" name="codeclt" value="' . $client['codeclt'] . '">
                    <input type="submit" class="btn" name="modifier_client" value="Modifier">
                </form>
                <form action="supprimer_client.php" method="POST" style="display:inline;">
                    <input type="hidden" name="codeclt" value="' . $client['codeclt'] . '">
                    <input type="submit" class="btn" name="supprimer_client" value="Supprimer">
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</table>';

    // Fermeture de la connexion à la base de données
    $connexion = null;
    ?>

    <br>
    <a href="ajouter_client.php"><button class="btn">Ajouter</button></a>
    <a href="homepage.php"><button class="btn">Retour</button></a>
</body>
</html>
