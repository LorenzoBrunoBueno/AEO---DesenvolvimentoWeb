<?php

require "db.php";

// Recebendo dados
$titulo = $_POST["titulo"] ?? null;
$descricao = $_POST["descricao"] ?? null;
$usuario = $_POST["idusuario"] ?? null;
$preparo = $_POST["preparo_idpreparo"] ?? null;
$dificuldade = $_POST["dificuldade_iddificuldade"] ?? null;
$custo = $_POST["custo_idcusto"] ?? null;

// Validação
if (!$titulo || !$usuario || !$preparo || !$dificuldade || !$custo) {
    die("Erro: preencha todos os campos obrigatórios.");
}

// Não vamos inciar imagem? Pode ser null?
$imagem = null;

// SQL SEM IMAGEM
$sql = "INSERT INTO receita 
        (titulo, descricao, imagem, cadastro_idusuario, 
         preparo_idpreparo, dificuldade_iddificuldade, custo_idcusto)
        VALUES (?, ?, NULL, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssiiii",
    $titulo,
    $descricao,
    $usuario,
    $preparo,
    $dificuldade,
    $custo
);

if ($stmt->execute()) {
    echo "Receita cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
