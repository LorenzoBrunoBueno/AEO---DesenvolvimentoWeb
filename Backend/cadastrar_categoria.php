<?php

require "db.php";

// Recebe dados do formulário
$categoria = $_POST["categoria"] ?? null;
$ativo = $_POST["ativo"] ?? 1;  // padrão 1

// Validação básica
if (empty($categoria)) {
    die("Erro: O nome da categoria é obrigatório.");
}

// SQL para inserir
$sql = "INSERT INTO categoria (categoria, ativo) VALUES (?, ?)";

$stmt = $pdo->prepare($sql);

if ($stmt->execute([$categoria, $ativo])) {
    echo "Categoria cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar categoria: " . $stmt->error;
}

?>