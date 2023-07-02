<?php 

require_once("../conexao.php"); 
@session_start();

$status = $_POST['status'];
$turma = $_POST['turma'];





$html = file_get_contents($url="http://localhost/sgp/rel/rel_aniversario_html.php?status=$status&turma=$turma");
echo $html;


?>

