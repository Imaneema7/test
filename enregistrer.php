<?php
// إعداد الاتصال بقاعدة البيانات
$host = "localhost";
$dbname = "projet";
$user = "root";
$pass = "";
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 1. تسجيل طالب (enregistrement)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $stmt = $pdo->prepare("INSERT INTO etudiants (nometud, prenometud, emailetud, age, tele, adressetud) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['nometud'],
            $_POST['prenometud'],
            $_POST['emailetud'],
            $_POST['age'],
            $_POST['tele'],
            $_POST['adressetud']
        ]);

        // بعد إضافة الطالب بنجاح، سيتم عرض تنبيه
        echo "<script>alert('Étudiant ajouté avec succès !'); window.location.href='index.html';</script>";
        exit;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>