<?php
require_once("../../conexao.php");

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM turmas WHERE id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$query_id = $pdo->query("SELECT * FROM matriculas WHERE id_turma = '$id'");
$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);

$query_id_g = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id'");
$res_id_g = $query_id_g->fetchAll(PDO::FETCH_ASSOC);

if (!empty($res_id)) {
    echo 'Não é possível excluir a turma. Existe aluno Matriculado!';
    exit();
 
$query_id_g = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id'");
$res_id_g = $query_id_g->fetchAll(PDO::FETCH_ASSOC);

} elseif (!empty($res_id_g)) {
    echo 'Não é possível excluir a turma. Essa turma está vinculado a uma ou mais "Grade de Horário!"';
    exit();

} else {
    $pdo->query("DELETE FROM turmas WHERE id = '$id'");
    echo 'Deletado!';
}
?>
