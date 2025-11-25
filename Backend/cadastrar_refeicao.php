<?php

require "db.php";

$idrefeicao = $_POST["idrefeicao"] ?? null;
$refeicao = $_POST["refeicao"] ?? null;
$ativo = 1;

if (empty($refeicao)) {
    die("Erro: Preencha o nome da refeicao");
}

$sql = "INSERT INTO refeicao (refeicao, ativo)
        VALUES (?, ?, ?)";

$stmt = $pdo->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar SQL: " . $pdo->error);
}


if ($stmt->execute([$refeicao, $ativo])) {
    echo "Refeição cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

?>
