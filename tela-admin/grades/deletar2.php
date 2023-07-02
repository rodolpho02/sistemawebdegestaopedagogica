<?php 


require_once("../../conexao.php"); 

$id = $_POST['id2'];

$query = $pdo->query("SELECT * FROM grades where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$id = $res[0]['id'];

$pdo->query("DELETE FROM grades WHERE id = '$id'");


echo 'Deletado!';
