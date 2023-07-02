
<?php 
$pag = "home";
require_once("../conexao.php"); 
@session_start();
$cpf_user = @$_SESSION['cpf_user'];
if(@$_SESSION['id_user'] == null || @$_SESSION['nivel_user'] != 'secretaria'){
	echo "<script language='javascript'> window.location='../index.php' </script>";
	exit();

    require_once("../conexao.php"); 
}


?>

<html DOCTYPE>


<div class="row">

		<div class="col-xl-3 col-md-6 mb-4">
				<a class="text-dark"  href="index.php?pag=turmas" title="Abrir chamada">
					<div class="card <?php echo $classe_card ?> shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-3">
									<div class="text font-weight-bold  <?php echo $classe_card ?> text-uppercase">Verificar Matrículas</div>
								</div>
								<div class="col-auto" align="center">
								<i class="fa-solid fa-people-group fa-2x"
									<?php echo $classe_card ?>"  style="color: #005eff;"> </i><br>
									<span class="text-xs"></span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

		<div class="col-xl-3 col-md-6 mb-4">
				<a class="text-dark"  href="index.php?pag=dias" title="Abrir chamada">
					<div class="card <?php echo $classe_card ?> shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-3">
									<div class="text font-weight-bold  <?php echo $classe_card ?> text-uppercase">Quadro de Horário</div>
								</div>
								<div class="col-auto" align="center">
								<i class="fa-solid fa-calendar-days fa-2x"
									<?php echo $classe_card ?>"  style="color: #005eff;"> </i><br>
									<span class="text-xs"></span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

		<div class="col-xl-3 col-md-6 mb-4">
				<a class="text-dark"  href="index.php?pag=frequencia" title="Abrir chamada">
					<div class="card <?php echo $classe_card ?> shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-3">
									<div class="text font-weight-bold  <?php echo $classe_card ?> text-uppercase">Relatório de Frequência</div>
								</div>
								<div class="col-auto" align="center">
								<i class="fa-solid fa-graduation-cap  fa-2x"
									<?php echo $classe_card ?>"  style="color: #005eff;"> </i><br>
									<span class="text-xs"></span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>


			<div class="col-xl-3 col-md-6 mb-4">
				<a class="text-dark"  href="index.php?pag=aniversariante" title="Abrir chamada">
					<div class="card <?php echo $classe_card ?> shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-3">
									<div class="text font-weight-bold  <?php echo $classe_card ?> text-uppercase">Relatório de Aniversáriantes</div>
								</div>
								<div class="col-auto" align="center">
								<i class="fa-solid fa-cake-candles fa-2x"
									<?php echo $classe_card ?>"  style="color: #005eff;"> </i><br>
									<span class="text-xs"></span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
</div>


<div class="row">

	<?php 




		$query= $pdo->query("SELECT * FROM turmas where id order by turma asc ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		

		
		for ($i=0; $i < count($res); $i++) { 
			foreach ($res[$i] as $key => $value) {
			}
			
			$id = $res[$i]['id'];
		    $id_turmas = $res[$i]['turma'];


		

		$alunos = $res2[0]['id_aluno'];


		$query = $pdo->query("SELECT * FROM matriculas where id_turma = '$id' ");
		$res_2 = $query->fetchAll(PDO::FETCH_ASSOC);

		$aluno_matriculados = @count($res_2);
		

		
		?>	

		<div class="col-xl-3 col-md-6 mb-4">
			<a class="text-dark" href="index.php?pag=<?php echo $pag ?>&funcao=infor&id=<?php echo $id ?>" title="Abrir Turma">
				<div class="card <?php echo $classe_card ?> shadow h-100 py-2">
					<div class="card-body">
						<div class="col-auto" align="center">
							<div class="font-weight-bold <?php echo $classe_card ?> text-uppercase fx-6"><?php echo $id_turmas ?></div>
								<div class="col">
									<div class="text text-secondary">Total de Alunos: <?php echo $aluno_matriculados?> </div>
								</div>
					  </div>
					</div>
				</div>
			</a>
		</div>

	<?php } ?>

</div>



	<div class="modal fade" id="infor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

			<?php $id4 = $_GET['id'];
                
				$query_usu = $pdo->query("SELECT * FROM turmas where id = '$id4'");
				$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
				$nome_turma = $res_usu[0]['turma']; ?>

                	<h5 class="modal-title"><?php echo $nome_turma ?></h5>   
                       <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                            <span aria-hidden="true">&times;</span></a>

            </div>
            <div class="container"></div>
            <div class="modal-body">

            <?php

                
				if(@$_GET['funcao'] == 'infor') {
				$id3 = $_GET['id'];

				$query_usu = $pdo->query("SELECT * FROM turmas where id = '$id3'");
				$res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
				$nome_turma = $res_usu[0]['turma'];


				$query = $pdo->query("SELECT * FROM alunos a left join matriculas m on m.id_aluno = a.id where id_turma = '$id3'");

				$res = $query->fetchAll(PDO::FETCH_ASSOC);
			    for ($i=0; $i < @count($res); $i++) { 
				foreach ($res[$i] as $key => $value) {
				}

				$id_aluno = $res[$i]['id_aluno'];
				$nomecompleto = $res[$i]['nomecompleto'];
				$aniversario2 = $res[$i]['aniversario'];


					$data_nasc = $aniversario2;
					$data = new DateTime($data_nasc);
					$resultado = $data->diff(new Datetime( date('Y-m-d')));
					$idade = $resultado->format('- %Y anos');

				
			
				?>
				
             

				<span><?php echo ($i+1).' - '.$nomecompleto?> <?php echo $idade?></span><br>
			
            	<?php } ?>

             <?php if( $id_aluno == ""){ ?>
				

				<div align="center" id="mensagem_excluir" class="">
				 Alunos não matriculados para essa turma!
				</div>
            
				<?php } ?>
          
           

			<?php }?>

			</div>

            <div class="modal-footer">	
            <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>">Fechar</a>
            </div>
        </div>
    </div>

	
</div>


<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "infor") {
    echo "<script>$('#infor').modal('show');</script>";
}


?>


