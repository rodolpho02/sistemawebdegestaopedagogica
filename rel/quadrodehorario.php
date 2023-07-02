<?php 

require_once("../conexao.php"); 
@session_start();

$datadia = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/rel/quadrodehorario_html.php?id=$datadia");
echo $html;


?>
