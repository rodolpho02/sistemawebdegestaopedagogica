<?php

require_once("../../conexao.php"); 

$turma = $_POST['turma'];
$turno = $_POST['turno'];
$obs = $_POST['obs'];


$antigo = $_POST['antigo'];

$id = $_POST['txtid2'];

if($turma == ""){
	echo 'A turma é Obrigatório!';
	exit();
}

if($turno == ""){
	echo 'O turno é Obrigatório!';
	exit();
}

if($obs == ""){
	echo 'O Horário é Obrigatório!';
	exit();
}

if($antigo != $turma){
	$query = $pdo->query("SELECT * FROM turmas where turma = '$turma'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'A turma já está cadastrado no sistema!';
		exit();
	}
}



if($id == ""){
	$res = $pdo->prepare("INSERT INTO turmas SET turma = :turma, turno = :turno, 
    obs = :obs");	


}else{
    
    $res = $pdo->prepare(" UPDATE turmas SET turma = :turma, 
    turno = :turno, obs = :obs  WHERE id = '$id'");
	
}

$res->bindValue(":turma", $turma);
$res->bindValue(":turno", $turno);
$res->bindValue(":obs", $obs);


$res->execute();


echo 'Envido com sucesso!'

?>
