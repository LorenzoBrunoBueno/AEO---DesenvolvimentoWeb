<?php

require "db.php";

$nome = $_POST['nome'] ?? 'Minha refeição';
$itensJSON = $_POST['itens'] ?? '[]';

$itens = json_decode($itensJSON, true);

if (!$itens || count($itens) === 0) {
    http_response_code(400);
    echo "Nenhuma receita recebida.";
    exit;
}

$sql = "INSERT INTO refeicao (refeicao, ativo) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nome, 1]);

$idRefeicao = $pdo->lastInsertId();

$sql2 = "INSERT INTO refeicao_receita (refeicao_idrefeicao, receita_idreceita) VALUES (?, ?)";
$stmt2 = $pdo->prepare($sql2);

foreach ($itens as $item) {
    $stmt2->execute([$idRefeicao, $item['id']]);
}

echo "Cadastro da Refeicao e receitas da refeicao concluido!";

?>