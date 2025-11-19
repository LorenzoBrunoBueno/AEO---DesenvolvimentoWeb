<?php

require "db.php";

$idrefeicao = $_POST["idrefeicao"] ?? null;
$receitas = $_POST["receitas"] ?? [];

if (!$idrefeicao || empty($receitas)) {
    die("Erro: dados inválidos.");
}

foreach ($receitas as $idreceita) {
    $sql = "INSERT INTO refeicao_receita (receita_idreceita, refeicao_idrefeicao)
            VALUES (?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idreceita, $idrefeicao]);
}

echo "Refeição montada com sucesso!";
?>