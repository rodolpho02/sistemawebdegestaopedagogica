<?php

require_once("../conexao.php");
@session_start();

$id = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/contratos/contrato_html2.php?id=$id");
echo $html;

?>