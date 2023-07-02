<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM dias WHERE id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$dia = $res[0]['dia'];
$turno = $res[0]['turno'];

$query_id = $pdo->query("SELECT * FROM grades WHERE id_dia = '$id'");
$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);

if (!empty($res_id)) {
    echo  'Existe uma Grade de Horário para o '. $dia .' / '.$turno.'
     selecionado! Remova todas as turmas e disciplinas da grade de horário para prosseguir com a exclusão do dia!'; 

    exit();

} else {
    $pdo->query("DELETE FROM dias WHERE id = '$id'");
    echo 'Deletado!';
}
?>