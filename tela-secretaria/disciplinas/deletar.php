<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM disciplinas where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$materia_fun = $res[0]['materia'];
$id_dis = $res[0]['id'];

$query_id_g = $pdo->query("SELECT * FROM grades WHERE primeiro_tempo = '$id_dis' OR segundo_tempo = 
'$id_dis' OR terceiro_tempo = '$id_dis' OR quarto_tempo = '$id_dis'");


$res_id_g = $query_id_g->fetchAll(PDO::FETCH_ASSOC);

if(!empty($res_id_g)) {
    echo 'Não é possível excluir a disciplina. Essa disciplina está vinculado a uma ou mais "Grade de Horário!"';
    exit();

} else {
    $pdo->query("DELETE FROM disciplinas WHERE id = '$id'");
    echo 'Deletado!';
}



?>