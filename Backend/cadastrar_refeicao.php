<?php

require "db.php";

$idrefeicao = $_POST["idrefeicao"] ?? null;
$refeicao = $_POST["refeicao"] ?? null;
$ativo = 1; // Sempre ativo ao cadastrar

if (empty($idrefeicao) || empty($refeicao)) {
    die("Erro: Preencha todos os campos.");
}

$sql = "INSERT INTO refeicao (idrefeicao, refeicao, ativo)
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar SQL: " . $conn->error);
}

$stmt->bind_param("isi", $idrefeicao, $refeicao, $ativo);

if ($stmt->execute()) {
    echo "Refeição cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
