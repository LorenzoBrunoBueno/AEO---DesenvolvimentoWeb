<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "quasetudogostoso";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$sql = "SELECT idreceita, titulo FROM receita ORDER BY titulo";
$result = $conn->query($sql);

$receitas = [];

while ($row = $result->fetch_assoc()) {
    $receitas[] = $row;
}

header("Content-Type: application/json");
echo json_encode($receitas);
?>