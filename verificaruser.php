<?php 

session_start();
require_once("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {
	
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = md5($senha);

$query = $pdo->prepare("SELECT * FROM user where email = :email and senha = :senha");
$query->bindValue(":senha", $criptografada);
$query->bindValue(":email", $email);
$query->execute();

$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

	$_SESSION['id_user'] = $res[0]['id'];
	$_SESSION['nome_social'] = $res[0]['nomesocial'];
	$_SESSION['cpf_user'] = $res[0]['cpf'];
	$_SESSION['nivel_user'] = $res[0]['nivel'];

	$nivel = $res[0]['nivel'];

	if($nivel == 'admin'){
		echo "<script language='javascript'> window.location='tela-admin'</script>";
	}

	if($nivel == 'professor'){
		echo "<script language='javascript'> window.location='tela-professor'</script>";
	}

	if($nivel == 'secretaria'){
		echo "<script language='javascript'> window.location='tela-secretaria'</script>";
	}

	if($nivel == ''){
		echo "<script language='javascript'> window.alert('Usuário ou Senha Incorreta!') </script>";
	    echo "<script language='javascript'> window.location='index.php'</script>";	
	}
	
}else{

	echo "<script language='javascript'> window.alert('Usuário ou Senha Incorreta!') </script>";
	echo "<script language='javascript'> window.location='index.php'</script>";	
}
}
?>