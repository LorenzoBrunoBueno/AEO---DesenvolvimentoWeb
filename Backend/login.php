<?php
session_start();
require __DIR__ . "/db.php";


$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

$sql = $pdo->prepare("SELECT idusuario, email, senha, uuid FROM usuario WHERE email = :e LIMIT 1");
$sql->execute([':e' => $email]);
$usuario = $sql->fetch(PDO::FETCH_ASSOC);

if ($usuario) {

    if (password_verify($senha, $usuario["senha"])) {

        // cria sessão
        $_SESSION["logado"] = true;
        $_SESSION["id_usuario"] = $usuario["id"];
        $_SESSION["email"]      = $usuario["email"];
        $_SESSION["uuid"]       = $usuario["uuid"];

        header("Location: ../frontend/index.php");
        exit;

    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}
?>
