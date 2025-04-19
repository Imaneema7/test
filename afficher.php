<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .btn-action {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            margin: 2px;
        }

        .btn-edit {
            background-color:rgb(15, 126, 252);
            color: white;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }

        .btn-edit:hover {
            background-color:rgb(109, 145, 245);
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Liste des étudiants</h2>

        <?php
        $host = "localhost";
        $dbname = "projet";
        $user = "root";
        $pass = "";
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $rows = $pdo->query("SELECT * FROM etudiants")->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Âge</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($rows as $etud): ?>
            <tr>
                <td><?= htmlspecialchars($etud['nometud']) ?></td>
                <td><?= htmlspecialchars($etud['prenometud']) ?></td>
                <td><?= htmlspecialchars($etud['emailetud']) ?></td>
                <td><?= htmlspecialchars($etud['age']) ?></td>
                <td><?= htmlspecialchars($etud['tele']) ?></td>
                <td><?= htmlspecialchars($etud['adressetud']) ?></td>
                <td>
                    <a href="modifier.php?id=<?= $etud['id'] ?>">
                        <button class="btn-action btn-edit">Modifier</button>
                    </a>
                    <a href="supprimer.php?id=<?= $etud['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                        <button class="btn-action btn-delete">Supprimer</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>