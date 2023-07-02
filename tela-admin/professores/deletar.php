<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM professores where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cpf_fun = $res[0]['cpf'];
$id_fun2 = $res[0]['id'];

$query_id = $pdo->query("SELECT * FROM user where cpf = '$cpf_fun' ");
$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);
$id_fun = $res_id[0]['id'];

$query_id_g = $pdo->query("SELECT * FROM disciplinas WHERE id_professor = '$id_fun2'");
$res_id_g = $query_id_g->fetchAll(PDO::FETCH_ASSOC);

if (!empty($res_id_g)) {
    echo "Não é possível excluir o(a) professor(a) pois ele(a) está vinculado(a) a uma Disciplina!";
    exit();

} else {

    $pdo->query("DELETE FROM professores WHERE id = '$id'");
    $pdo->query("DELETE FROM user WHERE id = '$id_fun'");
    echo 'Deletado!';
}
?>


