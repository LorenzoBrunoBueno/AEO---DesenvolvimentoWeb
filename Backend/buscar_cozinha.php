<?php

require __DIR__ . "/db.php";

$sql = "SELECT * FROM cozinha";

$result = $pdo->query($sql);

$cozinhas = $result->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($cozinhas);
?>