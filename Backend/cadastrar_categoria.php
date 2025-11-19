<?php
// Conexão
$host = "localhost";
$user = "root";
$pass = "";
$db = "quasetudogostoso";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

// Recebe dados do formulário
$categoria = $_POST["categoria"] ?? null;
$ativo = $_POST["ativo"] ?? 1;  // padrão 1

// Validação básica
if (empty($categoria)) {
    die("Erro: O nome da categoria é obrigatório.");
}

// SQL para inserir
$sql = "INSERT INTO categoria (categoria, ativo) VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $categoria, $ativo);

if ($stmt->execute()) {
    echo "Categoria cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar categoria: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>