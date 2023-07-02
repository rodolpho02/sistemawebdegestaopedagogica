<?php

require_once("../../conexao.php");

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM responsaveis WHERE id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cpf_resp = $res[0]['cpf'];

$query_id = $pdo->query("SELECT * FROM alunos WHERE cpfresponsavel = '$cpf_resp'");
$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);

if (!empty($res_id)) {
    echo 'Não é possível excluir. Esse responsável está vinculado a um ou mais alunos!';
    exit();

} else {
    $pdo->query("DELETE * FROM responsaveis WHERE id = '$id'");
    echo 'Deletado!';
}
?>