<?php 
require_once("../conexao.php"); 

$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$turma = $_GET['turma'];

$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(explode('-', $dataFinal)));

$status_turma = '%'.$turma.'%';

if($dataInicial != $dataFinal){
	$apuracao = $dataInicialF. ' até '. $dataFinalF;
}else{
	$apuracao = $dataInicialF;
}

if($turma == 'turma'){
	$turma_serv = 'turma ';
}else{
	$turma_serv = '';
}

$sem_dados = false;
$where = !empty($turma) ? 'and t.id = '.$turma : ' and 1=1'; 	
$sql = '
	select
		a.nomecompleto
		,a.aniversario
		,m.id_turma
		,t.turma
	from alunos a 
	left join matriculas m on m.id_aluno = a.id
	left join turmas t on t.id = m.id_turma
	where a.aniversario between :dataini and :datafim 
	'.$where.'
';
$query = $pdo->prepare($sql);
$query->bindValue(':dataini',$dataInicial);
$query->bindValue(':datafim',$dataFinal);
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);

if(empty($res)){
	$sem_dados = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Relatório de Aniversariantes</title>
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
				<span class="titulorel">Relatório de Aniversáriantes </span>
			</div>
			<div class="col-sm-4 direita" align="right">	
				<big> <small> Data: <?php echo $data_hoje; ?></small> </big>
			</div>
		</div>


		<hr>


		<div class="row margem-superior">
			<div class="col-md-12">
				<div class="esquerda_float margem-direita50">	
					<span class=""> <b> Período </b> </span>
				</div>
				<div class="esquerda_float margem-direita50">	
					<span class=""> <?php echo $apuracao ?> </span>
				</div>
				
			</div>
		</div>

		<hr>
                <table class='table' width='100%'  cellspacing='0' cellpadding='3'>
				<tr>
					<th>Aluno</th>
					<th>Turma</th>
					<th>Aniversario</th>
				</tr>

				<?php if(!$sem_dados): ?>
					<?php foreach($res as $r): ?>
					<tr>
						<td><?=$r['nomecompleto']?></td>
						<td><?=$r['turma']?></td>
						<td><?=$r['aniversario']?></td>
					</tr>	
					<?php endforeach; ?>	
				<?php else:?>
					<tr>
				      <td colspan="2">	
				          <h3>Não a dados pra essa consulta!</h3>
					  </td>
					<tr> 
				<?php endif; ?>
		</table>
		<hr>
	</div>
</body>
</html>
