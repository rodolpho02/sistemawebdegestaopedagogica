<?php

require_once("../conexao.php"); 


$nomesocial = $_POST['nome_perfil'];
$email = $_POST['email_perfil'];
$senha = $_POST['senha_perfil'];

$antigo = $_POST['antigo_perfil'];
$id = $_POST['id_perf'];

if($nomesocial == ""){
	echo 'O nome é obrigatório!';
	exit();
}

if($email == ""){
	echo 'O email é obrigatório!';
	exit();
}

if($senha == ""){
	echo 'A senha é obrigatório!';
	exit();
}

if($antigo != $email){
	$query = $pdo->query("SELECT * FROM user where email = '$email' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'Este e-mail foi cadastro em outra conta de usuário!';
		exit();
	}}


$res2 = $pdo->prepare("UPDATE user SET nomesocial = :nomesocial, email = :email, senha = :senha WHERE id = :id");
$res2->bindValue(":nomesocial", $nomesocial);
$res2->bindValue(":id", $id);

// Recuperar a senha atual do usuário
$query_senha = $pdo->query("SELECT senha FROM user WHERE id = '$id'");
$res_senha = $query_senha->fetch(PDO::FETCH_ASSOC);
$senha_atual = $res_senha['senha'];

// Verificar a senha apenas se houver alteração
if ($senha !== $senha_atual) {
    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/", $senha)) {
        $valor_criptografado = md5($senha);
        $res2->bindValue(":senha", $valor_criptografado);
    } else {
        echo 'A senha deve ter no mínimo 8 caracteres, uma letra maiúscula e um caractere especial!';
        exit();
    }
} else {
    // Se a senha não foi alterada, mantenha a mesma no banco de dados
    $res2->bindValue(":senha", $senha_atual);
}

$res2->bindValue(":email", $email);
$res2->execute();

echo 'Enviado com sucesso!';

	

?>