<?php 
require_once("../conexao.php"); 

$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$status = $_GET['status'];
$materia = $_GET['materia'];
$turma = $_GET['turma'];
$aluno = $_GET['aluno'];

$status_like = '%'.$status.'%';
$status_materia = '%'.$materia.'%';
$status_turma = '%'.$turma.'%';
$status_aluno = '%'.$aluno.'%';

$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(explode('-', $dataFinal)));

if($status == 'Falta'){
	$status_serv = 'Falta ';
}else if($status == 'Presenca'){
	$status_serv = 'Presenca';

}else{
	$status_serv = '';
}


if($aluno == 'aluno'){
	$aluno_serv = 'aluno ';
}else{
	$aluno_serv = '';
}

if($materia == 'materia'){
	$materia_serv = 'materia ';
}else{
	$materia_serv = '';
}

if($turma == 'turma'){
	$turma_serv = 'turma ';
}else{
	$turma_serv = '';
}



if($dataInicial != $dataFinal){
	$apuracao = $dataInicialF. ' até '. $dataFinalF;
}else{
	$apuracao = $dataInicialF;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Frequência </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>

		@page {
			margin: 0px;

		}

		.footer {
			margin-top:20px;
			width:100%;
			background-color: #ebebeb;
			padding:10px;
			position:relative;
			bottom:0;
		}

		.cabecalho {    
			padding:10px;
			margin-bottom:px;
			width:100%;
			height:100px;
		}

		.titulo{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.subtitulo{
			margin:0;
			font-size:17px;
			font-family:Arial, Helvetica, sans-serif;
		}

		.areaTotais{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			position:absolute;
			right:20;
		}

		.areaTotal{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			background-color: #f9f9f9;
			margin-top:2px;
		}

		.pgto{
			margin:1px;
		}

		.fonte13{
			font-size:13px;
		}

		.esquerda{
			display:inline;
			width:50%;
			float:left;
		}

		.direita{
			display:inline;
			width:50%;
			float:right;
		}

		.table{
			padding:15px;
			font-family:Verdana, sans-serif;
			margin-top:20px;
		}

		.texto-tabela{
			font-size:12px;
		}


		.esquerda_float{

			margin-bottom:10px;
			float:left;
			display:inline;
		}


		.titulos{
			margin-top:10px;
		}

		.image{
			margin-top:-10px;
		}

		.margem-direita{
			margin-right: 80px;
		}

		.margem-direita50{
			margin-right: 50px;
		}

		hr{
			margin:8px;
			padding:1px;
		}


		.titulorel{
			margin:0;
			font-size:28px;
			font-family:Arial, Helvetica, sans-serif;
			color:#6e6d6d;

		}

		.margem-superior{
			margin-top:30px;
		}


	</style>


</head>
<body>


	<div class="cabecalho">
		
		

	</div>

	<div class="container">

		<div class="row">
			<div class="col-sm-8 esquerda">	
				<span class="titulorel">Relatório de Frequência </span>
			</div>
			<div class="col-sm-4 direita" align="right">	
				<big> <small> Data: <?php echo  mb_strtoupper($data_hoje); ?></small> </big>
			</div>
		</div>

 
             <table class='table' id=table width='100%'  cellspacing='0' cellpadding='3'>
			<tr>
				<th>Aluno</th>
				<th>Turma</th>
				<th>Disciplina</th>
				<th>Aula</th>
				<th>Status</th>
				

			</tr>
			<?php 


			$query = $pdo->query("SELECT * FROM chamada c left join aulas a on a.id = c.id_aula 
			where c.datachamada between '$dataInicial' and  '$dataFinal' and a.id_disciplina LIKE '$status_materia' 
		    and  c.presenca LIKE '$status_like' and c.id_turma LIKE '$status_turma' and c.id_aluno LIKE '$status_aluno'");



				if(empty($res)){
					$sem_dados = true;
				}


				$res = $query->fetchAll(PDO::FETCH_ASSOC);
			    for ($i=0; $i < @count($res); $i++) { 
				foreach ($res[$i] as $key => $value) {
				}

				$id_aluno = $res[$i]['id_aluno'];
				$id_turma = $res [$i]['id_turma'];
				$datachamada = $res [$i]['datachamada'];
				$presenca = $res [$i]['presenca'];
				$id_disciplina = $res [$i]['id_disciplina'];


				$datachamada2 = implode('/', array_reverse(explode('-', $datachamada)));

			



				$query_usu = $pdo->query("SELECT * FROM alunos where id = '$id_aluno'");
				$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
				$nome_aluno = $res_usu[0]['nomecompleto'];


				$query_usu = $pdo->query("SELECT * FROM turmas where id = '$id_turma'");
				$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
				$nome_turma = $res_usu[0]['turma'];


				$query_usu = $pdo->query("SELECT * FROM disciplinas where id = '$id_disciplina'");
				$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
				$nome_materia = $res_usu[0]['materia'];
	

				?>





		<tr>

				<tr>
					
					<td><?php echo $nome_aluno ?> </td>
					<td><?php echo $nome_turma   ?> </td>
					<td><?php echo $nome_materia ?> </td>
					<td><?php echo $datachamada2 ?> </td>
					<td><?php echo $presenca ?> </td>
				</tr>
		
			
				<?php }?>



		</table>


	</div>



				</body>
				</html>


