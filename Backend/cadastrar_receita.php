<?php

require __DIR__ . "/db.php";

$dados = json_decode($_POST["dados"], true);

$titu = $dados['titulo'] ?? "receita";
$desc = $dados['descricao'] ?? "...";
$ingredientesText = $dados['ingredientes'];
$preparo = $dados['preparo'];
$utensiliosText = $dados['utensilios'];
$custo = $dados['custo'];
$dificuldade = $dados['dificuldade'];
$cozinha = $dados['cozinha'];
$categoria = $dados['categoria'];
$idusuario = 1;
$imgTmp = $_FILES["imagem"]["tmp_name"];
$imgData = file_get_contents($imgTmp);

try {
    $pdo->beginTransaction();

    // Seleções com prepared statements
    $sql = $pdo->prepare("SELECT idcusto FROM custo WHERE custo = ?");
    $sql->execute([$custo]);
    $idcusto = $sql->fetchColumn();

    $sql = $pdo->prepare("SELECT iddificuldade FROM dificuldade WHERE dificuldade = ?");
    $sql->execute([$dificuldade]);
    $iddificuldade = $sql->fetchColumn();

    $sql = $pdo->prepare("SELECT idcategoria FROM categoria WHERE categoria = ?");
    $sql->execute([$categoria]);
    $idcategoria = $sql->fetchColumn();

    $sql = $pdo->prepare("SELECT idcozinha FROM cozinha WHERE cozinha = ?");
    $sql->execute([$cozinha]);
    $idcozinha = $sql->fetchColumn();

    // Insert preparo
    $stmtPreparo = $pdo->prepare("
        INSERT INTO preparo (modo_preparo, tempopreparo) VALUES (?, '01:00:00')
    ");
    $stmtPreparo->execute([$preparo]);
    $idpreparo = $pdo->lastInsertId();


    // Insert receita
    $stmt = $pdo->prepare("
        INSERT INTO receita 
        (titulo, descricao, preparo_idpreparo, custo_idcusto, dificuldade_iddificuldade, cadastro_idusuario, imagem)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $titu,
        $desc,
        $idpreparo,
        $idcusto,
        $iddificuldade,
        $idusuario,
        $imgData
    ]);



    $idreceita = $pdo->lastInsertId();


    // categoria da receita
    $stmtCategoria = $pdo->prepare("
        INSERT INTO categoria_receita (receita_idreceita, categoria_idcategoria)
        VALUES (?, ?)
    ");
    $stmtCategoria->execute([$idreceita, $idcategoria]);


    // cozinha da receita
    $stmtCozinha = $pdo->prepare("
        INSERT INTO cozinha_receita (receita_idreceita, cozinha_idcozinha)
        VALUES (?, ?)
    ");
    $stmtCozinha->execute([$idreceita, $idcozinha]);


    // ingredientes
    $ingredientes = array_filter(array_map("trim", explode("\n", $ingredientesText)));

    $stmtIng = $pdo->prepare("INSERT INTO ingrediente (ingrediente) VALUES (?)");
    $stmtIngReceita = $pdo->prepare("
        INSERT INTO ingrediente_receita (ingrediente_idingrediente, receita_idreceita, dosagem_iddosagem)
        VALUES (?, ?, 1)
    ");

    foreach ($ingredientes as $ig) {
        $stmtIng->execute([$ig]);
        $idingrediente = $pdo->lastInsertId();
        $stmtIngReceita->execute([$idingrediente, $idreceita]);
    }


    // utensilios
    $utensilios = array_filter(array_map("trim", explode("\n", $utensiliosText)));

    $stmtUte = $pdo->prepare("INSERT INTO utensilio (utensilio) VALUES (?)");
    $stmtUteReceita = $pdo->prepare("
        INSERT INTO utensilio_receita (utensilio_idutensilio, receita_idreceita)
        VALUES (?, ?)
    ");

    foreach ($utensilios as $ut) {
        $stmtUte->execute([$ut]);
        $idutensilio = $pdo->lastInsertId();
        $stmtUteReceita->execute([$idutensilio, $idreceita]);
    }


    if (!$idcusto || !$iddificuldade || !$idcategoria || !$idcozinha) {
    throw new Exception("Algum ID retornou vazio: "
        . json_encode([
            "idcusto" => $idcusto,
            "iddificuldade" => $iddificuldade,
            "idcategoria" => $idcategoria,
            "idcozinha" => $idcozinha
        ])
    );
    }


    $pdo->commit();

    echo json_encode(["status" => "ok", "idreceita" => $idreceita]);

} catch (Exception $e) {
    $pdo->rollBack();
    file_put_contents("erro_log.txt", $e->getMessage());
    echo json_encode(["erro" => $e->getMessage()]);
}

?>
