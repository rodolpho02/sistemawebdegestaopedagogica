<?php

require_once("../conexao.php");
@session_start();

$id = $_GET['id'];

$html = file_get_contents($url="http://localhost/sgp/contratos/contratoimg2_html.php?id=$id");
echo $html;

?>