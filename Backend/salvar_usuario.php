<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    exit("Método inválido.");
}

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$data = $_POST['data_nascimento'] ?? null;
$cep = $_POST['cep'] ?? null;
$gen = $_POST['genero'] ?? null;
$senha = $_POST['senha'] ?? '';

if ($nome == '' || $email == '' || $senha == '') {
    exit("Campos obrigatórios faltando.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Email inválido.");
}

$hashed = password_hash($senha, PASSWORD_DEFAULT);
$salt   = bin2hex(random_bytes(16));
$uuid   = bin2hex(random_bytes(16));

try{
    $stmt = $pdo->prepare("
        INSERT INTO usuario 
        (nome, email, data_nascimento, cep, genero, senha, salt, inscrito, uuid)
        VALUES
        (:n, :e, :d, :c, :g, :s, :sa, NOW(), :u)
    ");

    $stmt->execute([
        ':n'=>$nome,
        ':e'=>$email,
        ':d'=>$data ?: null,
        ':c'=>$cep ?: null,
        ':g'=>$gen ?: null,
        ':s'=>$hashed,
        ':sa'=>$salt,
        ':u'=>$uuid
    ]);

    echo "Usuário cadastrado com sucesso!";

} catch(Exception $e){

    if (strpos($e->getMessage(), 'Duplicate') !== false) {
        echo "Erro: email já cadastrado.";
    } else {
        echo "Erro: " . $e->getMessage();
    }
}
?>