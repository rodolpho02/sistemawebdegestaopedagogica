<?php 

require_once("../conexao.php"); 
@session_start();

$id_professor = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/rel/fichadoprofessor_html.php?id=$id_professor");
echo $html;


?>
