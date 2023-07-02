<?php

require_once("../../conexao.php"); 

$nomeresponsavel = $_POST['nomeresponsavel'];
$nomesocial = $_POST['nomesocial'];
$escolaridade = $_POST['escolaridade'];
$profissao = $_POST['profissao'];
$aniversario = $_POST['aniversario'];
$genero = $_POST['genero'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$nomerecado = $_POST['nomerecado'];
$parentesco = $_POST['parentesco'];
$celular2 = $_POST['celular2'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$whatsapp= $_POST['whatsapp'];


$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];



if($nomesocial == ""){
	echo 'O nome de perfil é obrigatório!';
	exit();
}

if($aniversario == ""){
	echo 'O Aniversário é obrigatório!';
	exit();
}

$anos = 18;
$menoridade = date("Y-m-d", strtotime(date("Y-m-d")."-$anos year"));
if ( $aniversario > $menoridade){
echo 'O responsável precisa ser maior de idade!';
exit();
}


if($genero == ""){
	echo 'O Gerero é Obrigatório!';
	exit();
}

if($nomeresponsavel == ""){
	echo 'O nome é Obrigatório!';
	exit();
}

if($rg == ""){
	echo 'O  RG é Obrigatório!';
	exit();
}

if($rg != ""){
	$rg = preg_replace('/[^0-9]/','',$rg);
	if (strlen($rg) != 9) {
			echo 'O RG está incompleto!';
			exit();
	}
	
	if (preg_match('/(\d)\1{8}/', $rg)) {
		echo 'O RG possui todos digitos iguais!';
		exit();
	}
	
	}


if($cpf == ""){
	echo 'O CPF é Obrigatório!';
	exit();
}


if ($cpf != "") {

	$cpf = preg_replace('/[^0-9]/','',$cpf);

	if (strlen($cpf) != 11) {
		echo 'CPF está incompleto!';
		exit();
	}

	$digitaA = 0;
	$digitaB = 0;


   for($i = 0, $x = 10; $i <= 8; $i++, $x--){
	   $digitaA += $cpf[$i] * $x;

	}

	for($i = 0, $x = 11; $i <= 9; $i++, $x--){
		if(str_repeat($i, 11) == $cpf) {
			echo 'CPF do Reponsável é invalido, números repetidos!';
			exit();
		}

		$digitaB += $cpf[$i] * $x;
	}

	$somaA = (($digitaA%11) < 2 ) ? 0 : 11-($digitaA%11);
	$somaB = (($digitaB%11) < 2 ) ? 0 : 11-($digitaB%11);

	if($somaA != $cpf[9] || $somaB != $cpf[10]){
		echo 'CPF do Responsável é invalido!';
		exit();
	}

}

	if($antigo != $cpf){
		$query = $pdo->query("SELECT * FROM responsaveis where cpf = '$cpf' ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'O CPF já está cadastrado no sistema!';
			exit();
		}
	}


	if($telefone != ""){
		$telefone = preg_replace("/[^0-9]/", "", $telefone);
		// Verifica se o número de telefone tem 10 dígitos (sem contar o DDD)
		if (strlen($telefone) !== 10) {
			echo 'Número de telefone inválido. O número deve conter exatamente 10 dígitos.';
			exit();
		}
		
		// Verifica se o número de telefone possui dígitos repetidos (exemplo: 3333-3333)
		if (preg_match('/(\d)\1{7}/', $telefone)) {
			echo 'Número de telefone inválido. O número não pode possuir todos os dígitos repetidos!';
			exit();
		}
		}
		
		if (empty($celular)) {
			echo 'O celular é Obrigatório';
			exit();
		}
		
	
		$celular = preg_replace("/[^0-9]/", "", $celular);
		if (strlen(substr($celular, 2)) !== 9) {
			echo 'Número de celular inválido. O número deve conter exatamente 11 Dígitos.';
			exit();
		}
	
		if (substr($celular, 2, 1) !== '9') {
			echo 'Número de celular inválido. O número deve começar com o Dígito 9!';
			exit();
		}
	
		if (preg_match('/(\d)\1{7}/', $celular)) {
			echo 'Número de celular inválido. Os dígitos não podem se repedir apertir do número 9!';
			exit();
		}


	if($email == ""){
		echo 'O email é Obrigatório!';
		exit();
	}

	if($antigo2 != $email){
		$query = $pdo->query("SELECT * FROM responsaveis where email = '$email' ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			echo 'O Email já está Cadastrado!';
			exit();
		}
	}

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	}else{
		echo'O e-mail é invalido';
		exit();
	}
	
	if($whatsapp != ""){
		$whatsapp = preg_replace("/[^0-9]/", "", $whatsapp);
	
	if (strlen(substr($whatsapp, 2)) !== 9) {
		echo 'Número de Whatsapp inválido. O número deve conter exatamente 11 Dígitos.';
		exit();
	}

	
	if (substr($whatsapp, 2, 1) !== '9') {
		echo 'Número de Whatsapp inválido. O número deve começar com o Dígito 9!';
		exit();
	}

	
	if (preg_match('/(\d)\1{7}/', $whatsapp)) {
		echo 'Número de Whatapp inválido. Os dígitos não podem se repedir apertir do número 9!';
		exit();
	}
	}

	if ($celular2 != "") {
		$celular2 = preg_replace("/[^0-9]/", "", $celular2);
	
		if (strlen(substr($celular2, 2)) !== 9 && strlen(substr($celular2, 2)) !== 8) {
			echo 'Número do contato é inválido. O número deve conter exatamente 11 ou 10 dígitos.';
			exit();
		}
	
		if (strlen($celular2) == 11) {

	
			if (substr($celular2, 2, 1) !== '9') {
				echo 'O celular do contato é inválido. O número deve começar com o Dígito 9!';
				exit();
			}

			if (preg_match('/(\d)\1{7}/', $celular2)) {
				echo 'Número do contato é inválido. Os dígitos não podem se repedir apertir do número 9!';
				exit();
			}


		} elseif (strlen($celular2) == 10) {

			if (preg_match('/(\d)\1{7}/', $celular2)) {
				echo 'O telefone do contato é inválido. O número não pode possuir todos os dígitos repetidos!';
				exit();
			}
		}
	}


	if ($cep != "") {
		if (!preg_match('/^(?!.*(\d)\1{3})\d{5}-\d{3}$/', $cep)) {
			echo 'CEP inválido. O CEP deve estar no formato 99999-999 e não pode possuir números repetidos.';
			exit();
		}
	}
	
	if($rua == ""){
		echo 'A rua é Obrigatório!';
		exit();
	}
	
	if($numero == ""){
		echo 'O número é Obrigatório';
		exit();
	}
	
	if($bairro == ""){
		echo 'O Bairro é Obrigatório';
		exit();
	}
	
	if($cidade == ""){
		echo 'O cidade é Obrigatório';
		exit();
	}
	
	if($estado == ""){
		echo 'O estado é Obrigatório';
		exit();
	}
	

$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem_2']['name']);
$caminho = '../../img/responsaveis/' .$nome_img;
if (@$_FILES['imagem_2']['name'] == ""){
  $imagem_r = "semfoto.jpg";
}else{
    $imagem_r = $nome_img;
}

$imagem_temp = @$_FILES['imagem_2']['tmp_name']; 
$ext = pathinfo($imagem_r, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}


if($id == ""){
	$res = $pdo->prepare("INSERT INTO responsaveis SET imagem = '$imagem_r', nomesocial = :nomesocial, 
	nomeresponsavel = :nomeresponsavel, escolaridade = :escolaridade, profissao = :profissao, 
	aniversario = :aniversario, genero = :genero, rg = :rg, cpf = :cpf, telefone = :telefone, celular = :celular, email = :email, 
	nomerecado = :nomerecado, parentesco = :parentesco, celular2 = :celular2, cep = :cep, rua = :rua, 
	numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, estado = :estado, whatsapp = :whatsapp");	
     
}else{
		if($imagem_r == "semfoto.jpg"){
		$res = $pdo->prepare(" UPDATE responsaveis SET nomesocial = :nomesocial, 
		nomeresponsavel = :nomeresponsavel, escolaridade = :escolaridade, profissao = :profissao, 
		aniversario = :aniversario, genero = :genero, rg = :rg, cpf = :cpf, telefone = :telefone, celular = :celular, email = :email, 
		nomerecado = :nomerecado, parentesco = :parentesco, celular2 = :celular2, cep = :cep, rua = :rua, 
		numero = :numero, complemento = :complemento, bairro = :bairro, 
		cidade = :cidade, estado = :estado, whatsapp = :whatsapp WHERE id = '$id'");
		}
		 else{
		$res = $pdo->prepare(" UPDATE responsaveis SET imagem = '$imagem_r', nomesocial = :nomesocial, 
		nomeresponsavel = :nomeresponsavel, escolaridade = :escolaridade, profissao = :profissao, 
		aniversario = :aniversario, genero = :genero, rg = :rg, cpf = :cpf, telefone = :telefone, celular = :celular, email = :email, 
		nomerecado = :nomerecado, parentesco = :parentesco, celular2 = :celular2, cep = :cep, rua = :rua, 
		numero = :numero, complemento = :complemento, bairro = :bairro, 
		cidade = :cidade, estado = :estado, whatsapp = :whatsapp WHERE id = '$id'");
		}
}

$res->bindValue(":nomesocial", $nomesocial);
$res->bindValue(":aniversario", $aniversario);
$res->bindValue(":genero", $genero);
$res->bindValue(":nomeresponsavel", $nomeresponsavel);
$res->bindValue(":escolaridade", $escolaridade);
$res->bindValue(":profissao", $profissao);
$res->bindValue(":rg", $rg);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":celular", $celular);
$res->bindValue(":email", $email);
$res->bindValue(":whatsapp", $whatsapp);
$res->bindValue(":nomerecado", $nomerecado);
$res->bindValue(":parentesco", $parentesco);
$res->bindValue(":celular2", $celular2);
$res->bindValue(":cep", $cep);
$res->bindValue(":rua", $rua);
$res->bindValue(":numero", $numero);
$res->bindValue(":complemento", $complemento);
$res->bindValue(":bairro", $bairro);
$res->bindValue(":cidade", $cidade);
$res->bindValue(":estado", $estado);



$res->execute();

echo 'Envido com sucesso!'

?>
