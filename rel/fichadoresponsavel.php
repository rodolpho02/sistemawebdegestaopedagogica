<?php 

require_once("../conexao.php"); 
@session_start();

$id_responsavel = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/rel/fichadoresponsavel_html.php?id=$id_responsavel");
echo $html;


?>
