<?php 

require_once("../conexao.php"); 
@session_start();

$id_aluno = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/rel/fichadoaluno_html.php?id=$id_aluno");
echo $html;


?>
