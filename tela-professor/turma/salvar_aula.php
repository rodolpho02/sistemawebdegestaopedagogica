<?php 
require_once("../../conexao.php"); 

$id_turma = $_POST['id_turma'];
$titulo_aula = $_POST['titulo_aula'];
$id_disciplina = $_POST['id_disciplina'];
$dataaula = $_POST['dataaula'];


if($titulo_aula == ""){
	echo 'O nome da aula é obrigatório!';
	exit();
}
if($id_disciplina== ""){
	echo 'O nome da disciplina é obrigatório!';
	exit();
}

$data = date('Y-m-d');
if($dataaula < $data){
	echo   'A DATA informada é menor que data ATUAL!';
	exit();
}


$res = $pdo->prepare("INSERT INTO aulas SET id_turma = :id_turma, 
titulo_aula = :titulo_aula, id_disciplina = :id_disciplina, dataaula = :dataaula");	
	
$res->bindValue(":id_turma", $id_turma);
$res->bindValue(":titulo_aula", $titulo_aula);
$res->bindValue(":id_disciplina", $id_disciplina);
$res->bindValue(":dataaula", $dataaula);



$res->execute();


echo 'Envido com sucesso!';

?>