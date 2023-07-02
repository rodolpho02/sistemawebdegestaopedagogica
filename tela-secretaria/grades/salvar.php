<?php
require_once("../../conexao.php"); 


$id_turma = $_POST['id_turma'];
$primeiro_tempo = $_POST['primeiro_tempo'];
$segundo_tempo = $_POST['segundo_tempo'];
$terceiro_tempo = $_POST['terceiro_tempo'];
$quarto_tempo = $_POST['quarto_tempo'];



$id_dia = $_POST['txtid3']; //ide dia
$id = $_POST['txtid4'];  // id grade
$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];


if($antigo == $id ){
	$query = $pdo->query("SELECT * FROM grades where id_dia = '$id_dia' and  id_turma = '$id_turma' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'A turma já existe no Quadro de Horário!';
		exit();
	}
}


if($antigo2 != $id_turma){
	$query = $pdo->query("SELECT * FROM grades where id_dia = '$id_dia' and  id_turma = '$id_turma' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);
	if($total_reg > 0){
		echo 'Essa turma já existe no Quadro de Horário!';
		exit();
	}
}


$query_f = $pdo->query("SELECT * FROM disciplinas where id = '$primeiro_tempo' ");
$res_f = $query_f->fetchAll(PDO::FETCH_ASSOC);
$pri_professor = $res_f[0]['id_professor'];
$quar_professor = $res_f[0]['id_professor'];

$query_f = $pdo->query("SELECT * FROM disciplinas where id = '$segundo_tempo' ");
$res_f = $query_f->fetchAll(PDO::FETCH_ASSOC);

$seg_professor = $res_f[0]['id_professor'];

$query_f = $pdo->query("SELECT * FROM disciplinas where id = '$terceiro_tempo' ");
$res_f = $query_f->fetchAll(PDO::FETCH_ASSOC);

$ter_professor = $res_f[0]['id_professor'];

$query_f = $pdo->query("SELECT * FROM disciplinas where id = '$quarto_tempo' ");
$res_f = $query_f->fetchAll(PDO::FETCH_ASSOC);

$quar_professor = $res_f[0]['id_professor'];


if($id == ""){

	$res = $pdo->prepare("INSERT INTO grades SET id_turma = :id_turma, primeiro_tempo = :primeiro_tempo, segundo_tempo = :segundo_tempo, 
    terceiro_tempo = :terceiro_tempo, quarto_tempo = :quarto_tempo, id_dia = :id_dia, pri_professor = :pri_professor,
    seg_professor = :seg_professor, ter_professor = :ter_professor, quar_professor = :quar_professor ");

            $res->bindValue(":id_turma", $id_turma);
            $res->bindValue(":primeiro_tempo", $primeiro_tempo);
            $res->bindValue(":segundo_tempo", $segundo_tempo);
            $res->bindValue(":terceiro_tempo", $terceiro_tempo);
            $res->bindValue(":quarto_tempo", $quarto_tempo);
            $res->bindValue(":id_dia", $id_dia);
            $res->bindValue("pri_professor", $pri_professor);
            $res->bindValue("seg_professor", $seg_professor);
            $res->bindValue("ter_professor", $ter_professor);
            $res->bindValue("quar_professor", $quar_professor);
        
            
}else{ 

    $res = $pdo->prepare(" UPDATE grades SET id_turma = :id_turma, primeiro_tempo = :primeiro_tempo, segundo_tempo = :segundo_tempo, 
    terceiro_tempo = :terceiro_tempo, quarto_tempo = :quarto_tempo, pri_professor = :pri_professor,
    seg_professor = :seg_professor, ter_professor = :ter_professor, quar_professor = :quar_professor WHERE id = '$id'");

            $res->bindValue(":id_turma", $id_turma);
            $res->bindValue(":primeiro_tempo", $primeiro_tempo);
            $res->bindValue(":segundo_tempo", $segundo_tempo);
            $res->bindValue(":terceiro_tempo", $terceiro_tempo);
            $res->bindValue(":quarto_tempo", $quarto_tempo);
            $res->bindValue("pri_professor", $pri_professor);
            $res->bindValue("seg_professor", $seg_professor);
            $res->bindValue("ter_professor", $ter_professor);
            $res->bindValue("quar_professor", $quar_professor);
        

}




$res->execute();

echo 'Envido com sucesso!';
?>



