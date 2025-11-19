<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "quasetudogostoso";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$idrefeicao = $_POST["idrefeicao"] ?? null;
$receitas = $_POST["receitas"] ?? [];

if (!$idrefeicao || empty($receitas)) {
    die("Erro: dados inválidos.");
}

foreach ($receitas as $idreceita) {
    $sql = "INSERT INTO refeicao_receita (receita_idreceita, refeicao_idrefeicao)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $idreceita, $idrefeicao);
    $stmt->execute();
}

echo "Refeição montada com sucesso!";
$conn->close();
?>