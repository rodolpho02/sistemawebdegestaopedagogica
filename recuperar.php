<?php 
require_once("conexao.php");

$email = $_POST['email'];

if($email == ""){
    echo 'Preencha o Campo E-mail!';
    exit();
}

$res = $pdo->query("SELECT * FROM user where email = '$email' "); 
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
if(@count($dados) > 0){
    $senha = $dados[0]['senha'];

   //ENVIAR O EMAIL COM A SENHA
    $destinatario = $email;
    $assunto = utf8_decode(' E-mail automatico de recuperação de senha');;
    $mensagem = utf8_decode('Sua senha é ' .$senha);
    $cabecalhos = "From: ";
    @mail($destinatario, $assunto, $mensagem, $cabecalhos);

    echo 'Senha encaminha para o e-mail informado!';

  }else{
    
	echo 'E-mail invalido!';
}

 ?>