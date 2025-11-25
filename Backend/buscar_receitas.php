<?php

require __DIR__ . "/db.php";

$sqlRece = "SELECT idreceita, titulo, descricao FROM receita ORDER BY titulo";

$resultRece = $pdo->query($sqlRece);

$receitas = $resultRece->fetchAll(PDO::FETCH_ASSOC);

$sqlCate = "SELECT categoria.idcategoria, categoria.categoria, categoria_receita.receita_idreceita FROM categoria INNER JOIN categoria_receita ON categoria.idcategoria = categoria_receita.categoria_idcategoria;";

$resultCate = $pdo->query($sqlCate);

$CategoriasReceitas = $resultCate->fetchAll(PDO::FETCH_ASSOC); 

header("Content-Type: application/json");
echo json_encode([ "receitas" => $receitas, "CategoriasReceitas" => $CategoriasReceitas]);
?>