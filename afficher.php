<?php
// إعداد الاتصال بقاعدة البيانات
$host = "localhost";
$dbname = "projet";
$user = "root";
$pass = "";
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// استعلام لعرض الطلاب
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
    </tr>
    <?php foreach ($rows as $etud): ?>
    <tr>
        <td><?= htmlspecialchars($etud['nometud']) ?></td>
        <td><?= htmlspecialchars($etud['prenometud']) ?></td>
        <td><?= htmlspecialchars($etud['emailetud']) ?></td>
        <td><?= htmlspecialchars($etud['age']) ?></td>
        <td><?= htmlspecialchars($etud['tele']) ?></td>
        <td><?= htmlspecialchars($etud['adressetud']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>