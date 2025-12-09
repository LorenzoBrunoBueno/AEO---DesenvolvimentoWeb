<?php
require __DIR__ . "/db.php";

$id = intval($_GET["id"]);

$stmt = $pdo->prepare("SELECT imagem FROM receita WHERE idreceita = ?");
$stmt->execute([$id]);

$imagem = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$imagem || !$imagem["imagem"]) {
    header("Content-Type: image/jpeg");
    readfile("../Frontend/IMG/Frango-assado-com-ervas.jpg");
    exit;
}

header("Content-Type: image/jpeg");
echo $imagem["imagem"];
?>
