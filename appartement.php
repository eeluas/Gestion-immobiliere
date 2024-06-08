<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appartement</title>
    <link rel="stylesheet" href="style_table.css">
</head>
<body>

    <?php
    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=gestion', 'root', '');

    // Requête pour récupérer les données des appartements
    $requete_appartements = $connexion->query('SELECT * FROM Appartement');

    // Affichage des données dans un tableau HTML
    echo '<table border="1">
            <tr>
                <th>Référence</th>
                <th>Superficie</th>
                <th>Prix de vente</th>
                <th>Secteur</th>
                <th>Code représentant</th>
                <th>Code client</th>
                <th>Actions</th>
            </tr>';

    while ($appartement = $requete_appartements->fetch()) {
        echo '<tr>';
        echo '<td>' . $appartement['ref'] . '</td>';
        echo '<td>' . $appartement['superficie'] . '</td>';
        echo '<td>' . $appartement['prixvente'] . '</td>';
        echo '<td>' . $appartement['secteur'] . '</td>';
        echo '<td>' . $appartement['coderep'] . '</td>';
        echo '<td>' . $appartement['codeclt'] . '</td>';
        echo '<td>
                <form action="modifier_appartement.php" method="POST" style="display:inline;">
                    <input type="hidden" name="ref" value="' . $appartement['ref'] . '">
                    <input type="submit" class="btn" name="modifier_appartement" value="Modifier">
                </form>
                <form action="supprimer_appartement.php" method="POST" style="display:inline;">
                    <input type="hidden" name="ref" value="' . $appartement['ref'] . '">
                    <input type="submit" class="btn" name="supprimer_appartement" value="Supprimer">
                </form>
            </td>';
        echo '</tr>';
    }

    echo '</table>';

    // Fermeture de la connexion à la base de données
    $connexion = null;
    ?>

    <br>
    <a href="ajouter_appartement.php"><button class="btn">Ajouter</button></a>
    <a href="homepage.php"><button class="btn">Retour</button></a>
</body>
</html>
