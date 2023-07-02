
<?php 

@session_start();
$cpf_user = @$_SESSION['cpf_user'];
if(@$_SESSION['nivel_user'] == null || @$_SESSION['nivel_user'] != 'professor'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
	exit();

    require_once("../conexao.php"); 
}

?>

<html DOCTYPE>

<div class="row">

	<?php 

	$query = $pdo->query("SELECT * FROM professores where cpf = '$cpf_user' ");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$id_prof = $res[0]['id'];
	$nome_prof = $res[0]['nomesocial'];


	$query = $pdo->query("SELECT * FROM grades g left join turmas t on t.id = g.id_turma where g.pri_professor = '$id_prof' 
	or g.seg_professor = '$id_prof' or g.ter_professor = '$id_prof' or
    g.quar_professor = '$id_prof' GROUP BY id_turma order by t.turma asc ");
	

	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	for ($i=0; $i < count($res); $i++) { 
		foreach ($res[$i] as $key => $value) {
		}

      
        
		$disciplina = $res[$i]['disciplina'];
		$id_turma = $res[$i]['id_turma'];

		

		$query_resp = $pdo->query("SELECT * FROM disciplinas where id_professor = '$id_prof' ");
		$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
		

		$nome_disc = $res_resp[0]['materia'];


		$query_resp = $pdo->query("SELECT * FROM turmas where id = '$id_turma'");
		$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);

		$nome_turma = $res_resp[0]['turma'];

	
		
	
		?>	

		<div class="col-xl-3 col-md-6 mb-4">
			<a class="text-dark" href="index.php?pag=turma&id=<?php echo $id_turma ?>" title="Abrir Turma">
				<div class="card <?php echo $classe_card ?> shadow h-100 py-2">
					<div class="card-body">
						<div class="col-auto" align="center">
								<div class="font-weight-bold <?php echo $classe_card ?> text-uppercase fx-6"><?php echo $nome_turma ?></div>
						</div>
					</div>
				</div>
			</a>
		</div>

	<?php 
		}
	?>

</html>
