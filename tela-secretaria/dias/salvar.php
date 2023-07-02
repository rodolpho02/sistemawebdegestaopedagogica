<?php

require_once("../../conexao.php"); 



$dia = $_POST['dia'];
$turno = $_POST['turno'];


$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];
$id = $_POST['txtid2'];

if($dia == ""){
	echo 'Dia é obrigatorio';
	exit();}

if($turno == ""){
	echo ' Turno é obrigatorio';
	exit();
}


	if($antigo != $dia && $antigo2 != $turno){
		$query = $pdo->query("SELECT * FROM  dias  where  dia = '$dia' AND turno = '$turno' ");
		$res2 = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		
		if($total_reg2 > 0){
			echo 'Já existe um dia cadastro para esse Turno!';
			exit();
		}}

	if($antigo == $dia && $antigo2 != $turno){
		$query = $pdo->query("SELECT * FROM  dias  where  dia = '$dia' AND turno = '$turno' ");
		$res2 = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		
		if($total_reg2 > 0){
			echo 'Já existe um dia cadastro para esse Turno!';
			exit();
		}}



if($id == ""){
	$res = $pdo->prepare("INSERT INTO dias SET dia = :dia, turno = :turno");	

}else{
    
    $res = $pdo->prepare("UPDATE dias SET dia = :dia, turno = :turno WHERE id = '$id'");

}




$res->bindValue(":dia", $dia);
$res->bindValue(":turno", $turno);

$res->execute();

echo 'Envido com sucesso!';

?>
