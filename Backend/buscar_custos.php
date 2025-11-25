<?php

require __DIR__ . "/db.php";

$sql = "SELECT * FROM custo";

$result = $pdo->query($sql);

$custos = $result->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($custos);
?>