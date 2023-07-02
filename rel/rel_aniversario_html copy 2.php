<?php 


require_once("../conexao.php"); 

$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$turma = $_GET['turma'];
$status = $_GET['status'];

$status_mes = '%'.$status.'%';
$status_turma = '%'.$turma.'%';

if($status == '01'){
	$status_serv = '01';

}else if($status == '02'){
	$status_serv = '02';

}else if($status == '03'){
	$status_serv = '03';

}else if($status == '04'){
	$status_serv = '04';

}else if($status == '05'){
	$status_serv = '05';

}else if($status == '06'){
	$status_serv = '06';

}else if($status == '07'){
	$status_serv = '07';

}else if($status == '08'){
	$status_serv = '08';

}else if($status == '09'){
	$status_serv = '09';

}else if($status == '10'){
	$status_serv = '10';

}else if($status == '11'){
	$status_serv = '11';

}else if($status == '12'){
	$status_serv = '12';

}else{
	$status_serv = '';
}

if($turma == 'turma'){
	$turma_serv = 'turma ';
}else{
	$turma_serv = '';
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


 
             <table class='table' width='100%'  cellspacing='0' cellpadding='3'>
			<tr>
				<th>Aluno</th>
				<th>Turma</th>
				<th>Aniversário</th>
				<th>idade</th>
				
				

			</tr>
			<?php 
        

		$query = $pdo->query("SELECT * FROM alunos a left join matriculas m on m.id_aluno = a.id 
		where a.aniversario LIKE '_____%$status_mes%___'  and  m.id_turma LIKE '$status_turma' ");

				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				if(empty($res)){
				?>
				
					<tr>
				      <td colspan="4">	
				          <h3>Não a dados pra essa consulta!</h3>
					  </td>
					<tr>
					
				<?php	   
				} else {


			    for ($i=0; $i < @count($res); $i++) { 
				foreach ($res[$i] as $key => $value) {
				}

				$id_aluno = $res[$i]['id_aluno'];
				$id_turma= $res [$i]['id_turma'];
				$nome_aluno = $res[$i]['nomecompleto'];
				$aniversario2 = $res[$i]['aniversario'];

					$data_nasc = $aniversario2;
					$data = new DateTime($data_nasc);
					$resultado = $data->diff(new Datetime( date('Y-m-d')));
					$idade = $resultado->format('%Y anos');

					$aniversario2 = implode('/', array_reverse(explode('-', $aniversario2)));
				
				$query_usu = $pdo->query("SELECT * FROM turmas where id = '$id_turma'");
				$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
				$nome_turma = $res_usu[0]['turma'];

				?>

				<tr>
					
					<td><?php echo  $nome_aluno ?> </td>
					<td><?php echo $nome_turma ?> </td>
					<td><?php echo $aniversario2?> </td>
					<td><?php echo $idade?> </td>
				</tr>
			
			
			
				<?php } }
				?>



		</table>

	</div>



				</body>
				</html>
