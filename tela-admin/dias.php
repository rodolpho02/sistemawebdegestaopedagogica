<?php 
$pag = "dias";
include("../grades/salvar.php");
require_once("../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_user'] == null || @$_SESSION['nivel_user'] != 'admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}


?>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h1><small> </small></h1>
        <ol class="breadcrumb">
    		<li class="active"><i class="fa-solid fa-people-roof"></i> - PÁGINA/GRADE DE HORÁRIO </li>
		</ol>
    </div>

    <div class=" mb-3">
    <a type="button" class="btn-primary btn-sm ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo</a>
    <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo">Novo</a>
   </div>
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Dias</th>
                        <th>Turno</th>
                        <th>Funções</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM dias order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                      
                    $dia = $res[$i]['dia'];
                    $turno = $res[$i]['turno'];
                    $id = $res[$i]['id']; 
                     ?>

                    <tr>
                        <td><?php echo $dia ?></td>
                        <td><?php echo $turno ?></td>                     

                        <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=gerargrade&id=<?php echo $id ?>" class='text-success mr-1' title='Criar Grade de Horário'><i class='fa-solid fa-calendar-days'></i></a>
                        <a target="_blank" href="../rel/quadrodehorario.php?id=<?php echo $id ?>" class="text-secondary mr-1" title="Imprimir Quadro de Horário"><i class="fas fa-print" style="color: blue;"></i>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar2&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Dia da Semana'><i class='fa-solid fa-edit'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=deletar2&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Dia da Semana'><i class='fa-solid fa-trash-alt'></i></a>
                    </td>
                    </tr>
<?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <?php 
                if (@$_GET['funcao'] == 'editar2') {
                    $titulo = "Editar Registro";
                    $id5 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM dias where id = '" .$id5. "' ");
                    $res_2 = $query->fetchAll(PDO::FETCH_ASSOC);
                   
                    $turno_2  = $res_2[0]['turno'];
                    $dia_2 = $res_2[0]['dia'];
                    $id_2 = $res_2[0]['id'];

                } else {
                    $titulo = "Inserir Registro";

                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
                </button>
            </div>
            <form id="form" method="POST">
                <div class="modal-body">

                <div class="row">
                       <div class="col-md-6">
                       <div class="form-group">
                        <label >Dias da Semana </label>
                            <select name="dia" class="form-control" id="dia">
                            <option <?php if($dia_2 == 'Domingo'){ ?> selected <?php } ?> value="Domingo">Domingo</option>
                            <option <?php if($dia_2 == 'Segunda-feira'){ ?> selected <?php } ?> value="Segunda-feira">Segunda-feira</option>
                            <option <?php if($dia_2 == 'Terça-feira'){ ?> selected <?php } ?> value="Terça-feira">Terça-feira</option>
                            <option <?php if($dia_2 == 'Quarta-feira'){ ?> selected <?php } ?> value="Quarta-feira">Quarta-feira</option>
                            <option <?php if($dia_2 == 'Quinta-feira'){ ?> selected <?php } ?> value="Quinta-feira">Quinta-feira</option>
                            <option <?php if($dia_2 == 'Sexta-feira'){ ?> selected <?php } ?> value="Sexta-feira">Sexta-feira</option>
                            <option <?php if($dia_2 == 'Sabado'){ ?> selected <?php } ?> value="Sabado">Sabado</option>
						</select>
            </div>  
            </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label >Turno</label>
                            <select name="turno" class="form-control" id="turno">
                            <option <?php if($turno_2 == 'Manhã'){ ?> selected <?php } ?> value="Manhã">Manhã</option>
                            <option <?php if($turno_2 == 'Tarde'){ ?> selected <?php } ?> value="Tarde">Tarde</option>
                            <option <?php if($turno_2 == 'Noite'){ ?> selected <?php } ?> value="Noite">Noite</option>
						</select>         
                    </div>
                    </div>
           

                    </div>


            <small>
                <div id="mensagem">

                </div>
            </small> 


           <div class="modal-footer">

                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$dia_2 ?>" type="hidden" name="antigo" id="antigo">
                <input value="<?php echo @$turno_2 ?>" type="hidden" name="antigo2" id="antigo2">

                <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Cancelar</a>
                <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>


                </div>
             </div>
        </form>
     </div>
   </div>
</div>



<div class="modal" id="deletar2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
                </button>
            </div>
            <div class="modal-body">        

                <p> Deseja realmente excluir?</p>

                <div align="center" id="mensagem_excluir" class="mensagem-vermelha text-danger">

                </div>

            </div>
            <div class="modal-footer">
            <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Cancelar</a>
                <form method="post">

                    <input type="hidden" id="id"  name="id" value="<?php echo @$_GET['id'] ?>" required>

                    <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!----------------------------------------------------------------------------------------------------------------->



<div class="modal" id="gerargrade" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <?php

                $diast = $_GET['id'];
                $query = $pdo->query("SELECT * FROM dias where id = '" .$diast. "' ");
                $res_2 = $query->fetchAll(PDO::FETCH_ASSOC);
                   
                    $turno_2  = $res_2[0]['turno'];
                    $dia_2 = $res_2[0]['dia'];
                    ?>



                <h5 class="modal-title">Quadro de Horários - <?php echo $dia_2.' / '.$turno_2?></h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">


          <div class="container">
            <div class="row">

              
                <a type="button" class="btn-primary btn ml-3 d-none d-md-block" href="index.php?pag=<?php echo $pag?>&funcao=novo2&id=<?php echo $_GET['id'] ?>"> Inserir</a>
                <a type="button" class="btn-primary btn-sm ml-3 d-block d-sm-none" href="index.php?pag=<?php echo $pag ?>&funcao=novo2&id=<?php echo $_GET['id'] ?>">Inserir</a>
    
            </div>
            </div>



            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Primeiro Tempo:</th>
                        <th>Segundo Tempo:</th>
                        <th>Terceiro Tempo:</th>
                        <th>Quarto Tempo:</th>
                        <th>Funções</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                    $query = $pdo->query("SELECT * FROM grades where id_dia = '$_GET[id]' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    if(empty($res)){
                        ?>
                           <tr>
                              <td colspan="6">	
                              <div align="center">
                                  <h5> Quadro de horário Vazio!</h5>
                                <div>
                              </td>
                            <tr>
                            
                        <?php
                    } else {

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                    
                    $turma = $res[$i]['id_turma'];
                    $primeiro_tempo = $res[$i]['primeiro_tempo'];
                    $segundo_tempo = $res[$i]['segundo_tempo'];
                    $terceiro_tempo = $res[$i]['terceiro_tempo'];
                    $quarto_tempo = $res[$i]['quarto_tempo'];
                    $id_g = $res[$i]['id']; 
                    $dia = $res[$i]['id_dia'];

                    $pri_professor = $res[$i]['pri_professor'];
                    $seg_professor = $res[$i]['seg_professor'];
                    $ter_professor = $res[$i]['ter_professor'];
                    $quar_professor = $res[$i]['quar_professor'];
                   
                    ?>
                    
                    <?php 
                    $query_p = $pdo->query("SELECT * FROM disciplinas where id = '$primeiro_tempo' ");
                    $res_p = $query_p->fetchAll(PDO::FETCH_ASSOC);
                    $materia_p = $res_p[0]['materia'];
                    
                    $query_s = $pdo->query("SELECT * FROM disciplinas where id = '$segundo_tempo' ");
                    $res_s = $query_s->fetchAll(PDO::FETCH_ASSOC);
                    $materia_s = $res_s[0]['materia'];

                    $query_t = $pdo->query("SELECT * FROM disciplinas where id = '$terceiro_tempo' ");
                    $res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);
                    $materia_t = $res_t[0]['materia'];

                    $query_q = $pdo->query("SELECT * FROM disciplinas where id = '$quarto_tempo' ");
                    $res_q = $query_q->fetchAll(PDO::FETCH_ASSOC);
                    $materia_q = $res_q[0]['materia'];

                    $query_q = $pdo->query("SELECT * FROM turmas where id = '$turma ' ");
                    $res_q = $query_q->fetchAll(PDO::FETCH_ASSOC);
                    $turma_q = $res_q[0]['turma'];
                    
                    ?>

                    <tr>
                        <td><?php echo $turma_q ?></td> 
                        <td><?php echo $materia_p ?></td>
                        <td><?php echo $materia_s ?></td>
                        <td><?php echo $materia_t?></td>
                        <td><?php echo $materia_q ?></td> 
                    
                        <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar3&id=<?php echo $_GET['id'] ?>&id_turma=<?php echo $id_g ?>" 
                        class='text-primary mr-1'title='Editar Tempo'><i class='fa-solid fa-edit'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=deletar3&id=<?php echo $_GET['id']?>&id_turma=<?php echo $id_g ?>" 
                        class='text-danger mr-1'title='Excluir Tempo'><i class='fa-solid fa-trash-alt'></i></a>
                    </td>
                    </tr>
<?php } }?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <a target="_blank" href="../rel/quadrodehorario.php?id=<?php echo $diast ?>" class="btn btn-primary btn-sm" title="Imprimir Quadro de Horário" style="position: absolute; bottom: 10px; right: 10px;">
      <i class="fas fa-print"></i>
    </a>
  </div>

        
</div>
</div>
</div>
</div>



<div class="modal fade" id="modalDados2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar3') {
                    
                    $idgrade = $_GET['id_turma'];
                    $queryt = $pdo->query("SELECT * FROM turmas t left join grades g on g.id_turma = t.id 
                    where  g.id  =  '" .$idgrade. "' ");
                    $rest = $queryt->fetchAll(PDO::FETCH_ASSOC);

                    $turma2 = $rest[0]['turma'];
                      
                    $titulo = "Editar - $turma2  ";


                    $idturma = $_GET['id_turma'];
                    $query = $pdo->query("SELECT * FROM grades where id = '" . $idturma. "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $turma= $res[0]['id_turma'];
                    $primeito_tempo = $res[0]['primeiro_tempo'];
                    $segundo_tempo = $res[0]['segundo_tempo'];
                    $terceiro_tempo = $res[0]['terceiro_tempo'];
                    $quarto_tempo = $res[0]['quarto_tempo'];
                    $id = $res[0]['id'];
                    $id_g = $res[0]['id'];  
                  

                } else {
                    $titulo = "Inserir Registro";

                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>&funcao=gerargrade&id=<?php echo $_GET['id']?>">
                <span aria-hidden="true">&times;</span></a>
            
            </div>
            <form id="form2" method="POST">
                <div class="modal-body">

                <?php

            
                    $query_t = $pdo->query("SELECT * FROM turmas where id order by turma asc ");
                    $res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);

             
                    $query_f = $pdo->query("SELECT * FROM disciplinas order by materia asc ");
                    $res_f = $query_f->fetchAll(PDO::FETCH_ASSOC);
                    

                    ?>

                    <div class="form-group">
                    <label >Turmas Disponiveis</label>
                        <select name="id_turma" class="form-control" id="id_turma"> 
                        <?php    
                        for ($t=0; $t < count($res_t); $t++) { 
                        foreach ($res_t[$t] as $key => $value) {

                            $turma_reg = $res_t[$t]['turma'];
                            $turma_id= $res_t[$t]['id'];

                         }   ?>
                        <option <?php if(@$turma == $turma_id){ ?> selected <?php } ?> 
                        value="<?php echo $turma_id ?>"><?php echo $turma_reg ?></option>

                        <?php }?>
                        </select> 
                        
                    </div>

                    <div class="form-group">
                    <label >Primeiro tempo</label>
                        <select name="primeiro_tempo" name = "pri_professor" class="form-control" id="primeiro_tempo"> 
                        <?php    
                        for ($y=0; $y < count($res_f); $y++) { 
                        foreach ($res_f[$y] as $key => $value) {

                            $materia_reg_1 = $res_f[$y]['id'];
                            $nome_materia_reg_1 = $res_f[$y]['materia'];
                         
                         }   ?>
    
                        <option <?php if(@$primeito_tempo == $materia_reg_1){ ?> selected <?php } ?> 
                        value="<?php echo $materia_reg_1?>"><?php echo $nome_materia_reg_1?></option> 
                        
                        <?php }?>
                         
                    </select>
                       
                        
                    </div>

                    <div class="form-group">
                    <label >Segundo tempo</label>
                        <select name="segundo_tempo" class="form-control" id="segundo_tempo"> 
                        <?php    
                        for ($y=0; $y < count($res_f); $y++) { 
                        foreach ($res_f[$y] as $key => $value) {

                            $materia_reg_2 = $res_f[$y]['id'];
                            $nome_materia_reg_2 = $res_f[$y]['materia'];

                         }   ?>
                        <option <?php if(@$segundo_tempo == $materia_reg_2){ ?> selected <?php } ?> 
                        value="<?php echo $materia_reg_2 ?>"><?php echo $nome_materia_reg_2 ?></option>
                        
                        <?php }?>
                        
                         </select>
                         
                        
                    </div>

                    <div class="form-group">
                    <label >Quarto tempo</label>
                        <select name="terceiro_tempo" class="form-control" id="terceiro_tempo"> 
                        <?php    
                        for ($y=0; $y < count($res_f); $y++) { 
                        foreach ($res_f[$y] as $key => $value) {

                            $materia_reg_3 = $res_f[$y]['id'];
                            $nome_materia_reg_3 = $res_f[$y]['materia'];

                         }   ?>
                        <option <?php if(@$terceiro_tempo == $materia_reg_3){ ?> selected <?php } ?> 
                        value="<?php echo $materia_reg_3 ?>"><?php echo $nome_materia_reg_3 ?></option>
                        
                        <?php }?>

                         </select>
                       
                        
                    </div>


                    <div class="form-group">
                    <label >Quarto tempo</label>
                        <select name="quarto_tempo" class="form-control" id="quarto_tempo"> 
                        <?php    
                        for ($y=0; $y < count($res_f); $y++) { 
                        foreach ($res_f[$y] as $key => $value) {

                            $materia_reg_4 = $res_f[$y]['id'];
                            $nome_materia_reg_4 = $res_f[$y]['materia'];
                         }   ?>
                        <option <?php if(@$quarto_tempo == $materia_reg_4){ ?> selected <?php } ?> 
                        value="<?php echo $materia_reg_4 ?>"><?php echo $nome_materia_reg_4 ?></option>
                        
                        <?php }?>

                         </select>
                       
                        
                    </div>

              </div>
           

            <small>
                <div id="mensagem2"></div>
            </small> 


           <div class="modal-footer">


                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid3" id="txtid3"> <!-- id Grade -->
                <input value="<?php echo @$_GET['id_turma'] ?>" type="hidden" name="txtid4" id="txtid4"> <!-- id dia -->
                <input value="<?php echo @$_GET['id_g']?>" type="hidden" name="antigo" id="antigo">
                <input value="<?php echo @$turma ?>" type="hidden" name="antigo2" id="antigo2">
                
                
                <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>&funcao=gerargrade&id=<?php echo $_GET['id']?>" >Cancelar</a>
                <button type="submit" name="btn-salvar2" id="btn-salvar2" class="btn btn-primary">Salvar</button>


                </div>
             </div>
        </form>
     </div>
   </div>
</div>

<div class="modal" id="deletar3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>&funcao=gerargrade&id=<?php echo $_GET['id']?>">
                <span aria-hidden="true">&times;</span></a>
            
                </button>
            </div>
                 <div class="modal-body">

                <p class = "text-danger"><b>ATENÇÃO!!!</b> </p>
             
                <p class = "text-danger">  
                Ao excluir tempos de aula na Grade de Horário, isso pode afetar 
                as turmas que são visualizadas pelos professores.</p>

                <p> Deseja realmente excluir?</p>

                <div align="center" id="mensagem_excluir2" class="">

                </div>

            </div>
            <div class="modal-footer">
            <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>&funcao=gerargrade&id=<?php echo $_GET['id']?>" >Cancelar</a>
                <form method="post">

                    <input type="hidden" id="id2"  name="id2" value="<?php echo @$_GET['id_turma'] ?>" required>

                    <button type="button" id="btn-deletar2" name="btn-deletar2" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<?php

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo2") {
    echo "<script>$('#modalDados2').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar2") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar3") {
    echo "<script>$('#modalDados2').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "infor") {
    echo "<script>$('#infor').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "deletar2") {
    echo "<script>$('#deletar2').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "deletar3") {
    echo "<script>$('#deletar3').modal('show');</script>";
    
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "gerargrade") {
    echo "<script>$('#gerargrade').modal('show');</script>";  
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "inserirturma") {
    echo "<script>$('#gradeDados').modal('show');</script>";
}

?>


<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "<?=$pag?>";
        $('#btn-deletar').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/deletar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Deletado!') {


                        $('#btn-cancelar-excluir').click();
                        window.location = "index.php?pag=" + pag;
                    }

                    $('#mensagem_excluir').text(mensagem).addClass('mensagem-vermelha')



                },

            })
        })
    })
</script>

<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function () {
        var pag = "grades";
        $('#btn-deletar2').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/deletar2.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function (mensagem2) {

                    if (mensagem2.trim() === 'Deletado!') {

                        $('#btn-cancelar-excluir2').click();
                        window.location = "index.php?pag=dias&funcao=gerargrade&id=<?php echo $_GET['id'] ?>";
                    }

                    $('#mensagem_excluir2').text(mensagem2)



                },

            })
        })
    })
</script>


<!--Enviados dados para banco-->
<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/salvar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem').removeClass()

                if (mensagem.trim() == "Envido com sucesso!") {
                    
                    //$('#nome').val('');
                    //$('#cpf').val('');
                    $('#btn-fechar').click();
                    window.location = "index.php?pag="+pag;

                } else {

                    $('#mensagem').addClass('text-danger')
                }

                $('#mensagem').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>


<!--Enviados dados para banco-->
<script type="text/javascript">
    $("#form2").submit(function () {
        var pag = "grades";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/salvar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem2').removeClass()

                if (mensagem.trim() == "Envido com sucesso!") {
                  
                    $('#btn-fechar2').click();
                    window.location = "index.php?pag=dias&funcao=gerargrade&id=<?php echo $_GET['id'] ?>"

                } else {

                    $('#mensagem2').addClass('text-danger')
                }

                $('#mensagem2').text(mensagem)

            },

            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>




