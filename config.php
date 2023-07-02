

<?php

//variaveis para conexaõ;
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'sgp';


$admemail = "adm.ajn@gmail.com";
$nomeadm = "Jesus de Nazaré";
$senhaadm = "jesus@0627";
$criptografada = md5($senhaadm);
$admnivil = "admin";


$url = "http://" . $_SERVER['HTTP_HOST'];
$url_sistema = explode("//", $url);

// Use === para uma comparação estrita
if($url_sistema[1] === 'localhost/') {
    $url = $url . "/sgp/";
}


/*
//variaveis para conexaõ;
$servidor = 'br918';
$usuario = 'sist7435_sistema';
$senha = 'jesusdenazare';
$banco = 'sist7435_sgp';*/

?>