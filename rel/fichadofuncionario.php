<?php 

require_once("../conexao.php"); 
@session_start();

$id_funcionario = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/rel/fichadofuncionario_html.php?id=$id_funcionario");
echo $html;


?>
