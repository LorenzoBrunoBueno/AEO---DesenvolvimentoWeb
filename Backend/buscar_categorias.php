<?php

require __DIR__ . "/db.php";

$sql = "SELECT idcategoria, categoria FROM categoria ORDER BY idcategoria";

$result = $pdo->query($sql);

$categorias = $result->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($categorias);
?>