<?php 
require_once("../../conexao.php"); 

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM funcionarios where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cpf_fun = $res[0]['cpf'];

$query_id = $pdo->query("SELECT * FROM user where cpf = '$cpf_fun' ");
$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);
$id_fun = $res_id[0]['id'];


$pdo->query("DELETE FROM funcionarios WHERE id = '$id'");
$pdo->query("DELETE FROM user WHERE id = '$id_fun'");


echo 'Deletado!';

?>