<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Représentant</title>
    <link rel="stylesheet" href="style_table.css">
</head>
<body>

    <?php
    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

    // Requête pour récupérer les données des représentants
    $requete_representants = $connexion->query('SELECT * FROM Representant');

    // Affichage des données dans un tableau HTML
    echo '<table>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>';

    while ($representant = $requete_representants->fetch()) {
        echo '<tr>';
        echo '<td>' . $representant['coderep'] . '</td>';
        echo '<td>' . $representant['nomrep'] . '</td>';
        echo '<td>' . $representant['prenomrep'] . '</td>';
        echo '<td class="actions">
                <form action="modifier_representant.php" method="POST">
                    <input type="hidden" name="coderep" value="' . $representant['coderep'] . '">
                    <input type="submit" class="btn" name="modifier_representant" value="Modifier">
                </form>
                <form action="supprimer_representant.php" method="POST">
                    <input type="hidden" name="coderep" value="' . $representant['coderep'] . '">
                    <input type="submit" class="btn" name="supprimer_representant" value="Supprimer">
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</table>';

    // Fermeture de la connexion à la base de données
    $connexion = null;
    ?>

    <br>
    <a href="ajouter_representant.php"><button class="btn">Ajouter</button></a>
    <a href="homepage.php"><button class="btn">Retour</button></a>
</body>
</html>
