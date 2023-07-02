<?php

require_once("../../conexao.php");

$materia = $_POST['materia'];
$id_professor = $_POST['id_professor'];

$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];

if ($materia == "") {
    echo 'A disciplina é obrigatória!';
    exit();
}

if ($id_professor == "") {
    echo 'O professor é obrigatório!';
    exit();
}

if ($antigo != $materia && $antigo2 != $id_professor) {
    $query = $pdo->query("SELECT * FROM disciplinas WHERE materia = '$materia' AND id_professor = '$id_professor'");
    $res2 = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg2 = count($res2);

    if ($total_reg2 > 0) {
        echo 'Já existe uma disciplina cadastrada com esse professor!';
        exit();
    }
}

if ($id == "") {
    $res = $pdo->prepare("INSERT INTO disciplinas SET materia = :materia, id_professor = :id_professor");
} else {
    $res = $pdo->prepare("UPDATE disciplinas SET materia = :materia, id_professor = :id_professor WHERE id = '$id'");
}

$res->bindValue(":materia", $materia);
$res->bindValue(":id_professor", $id_professor);
$res->execute();


if ($id_professor != $antigo2) {
    $res3 = $pdo->prepare("UPDATE grades SET 
        pri_professor = CASE WHEN primeiro_tempo = :id THEN :id_professor ELSE pri_professor END,
        seg_professor = CASE WHEN segundo_tempo = :id THEN :id_professor ELSE seg_professor END,
        ter_professor = CASE WHEN terceiro_tempo = :id THEN :id_professor ELSE ter_professor END,
        quar_professor = CASE WHEN quarto_tempo = :id THEN :id_professor ELSE quar_professor END
        WHERE
            (primeiro_tempo = :id OR segundo_tempo = :id OR terceiro_tempo = :id OR quarto_tempo = :id) AND
            (pri_professor = :antigo2 OR seg_professor = :antigo2 OR ter_professor = :antigo2 OR quar_professor = :antigo2)");

    $res3->bindValue(":id_professor", $id_professor);
    $res3->bindValue(":id", $id);
    $res3->bindValue(":antigo2", $antigo2);
    $res3->execute();
}

echo 'Envido com sucesso!';




