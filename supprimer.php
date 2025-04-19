<?php
$host = "localhost";
$dbname = "projet";
$user = "root";
$pass = "";
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM etudiants WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: afficher.php");
    exit;
}
?>