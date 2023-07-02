<?php 

require_once("../conexao.php"); 
@session_start();

$dataInicial = $_POST['dataInicial'];
$dataFinal = $_POST['dataFinal'];
$status = $_POST['status'];
$materia = $_POST['materia'];
$turma = $_POST['turma'];
$aluno = $_POST['aluno'];



$html = file_get_contents($url="http://localhost/sgp/rel/rel_freq_disc_html.php?dataInicial=$dataInicial&dataFinal=$dataFinal&status=$status&materia=$materia&turma=$turma&aluno=$aluno");
echo $html;


?>