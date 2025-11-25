<?php

require __DIR__ . "/db.php";

$sql = "SELECT * FROM dificuldade";

$result = $pdo->query($sql);

$dificuldades = $result->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($dificuldades);
?>