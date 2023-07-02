<?php 
$pag = "turmas";
require_once("../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_user'] == null || @$_SESSION['nivel_user'] != 'secretaria'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}


?>

<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h1><small> </small></h1>
        <ol class="breadcrumb">
    		<li class="active"><i class="fa-solid fa-people-group"></i> - PÁGINA/TURMAS </li>
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
                        <th>Turmas</th>
                        <th>Turnos</th>
                        <th>Horário</th>
                        <th>Funções</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM turmas order by turma asc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                      
                    $turma = $res[$i]['turma'];
                    $turno = $res[$i]['turno'];
                    $obs = $res[$i]['obs'];
                    $id = $res[$i]['id']; 
                     ?>

                    <tr>
                        <td><?php echo $turma ?></td>
                        <td><?php echo $turno ?></td>
                        <td><?php echo $obs ?></td>                        

                        <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=inseriraluno2&id=<?php echo $id ?>" class='text-secodary mr-1' title='Matrcícular Aluno'><i class="fa-solid fa-user-plus"></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=addaluno2&id_turma=<?php echo $id?>" class='text-primary mr-1' title='Alunos Matriculados'><i class="fa-solid fa-rectangle-list"></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Turma'><i class='fa-solid fa-edit'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=deletar2&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Cadastro'><i class='fa-solid fa-trash-alt'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=incluirdisciplinas&id=<?php echo $id ?>" class='text-danger mr-1' title='Cadastro de Disciplinas'><i class="fa-solid fa-calendar-lines-pen"></i></a>
                       
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
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Turma";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM turmas where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $turma_2 = $res[0]['turma'];
                    $turno_2 = $res[0]['turno'];
                    $obs_2  = $res[0]['obs'];
                    $id_2 = $res[0]['id'];


                } else {
                    $titulo = "Inserir Registro";

                }


                ?>
                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>

            </div>
            <form id="form" method="POST">
                <div class="modal-body">
                      


                <div class="row">
                       <div class="col-md-6">
                    <div class="form-group">
                        <label >Turma</label>
                        <input value="<?php echo @$turma_2 ?>" type="text" class="form-control" id="turma" name="turma" placeholder="Ex: Turma D ">
                    </div>
            </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        <label >Turno </label>
                            <select name="turno" class="form-control" id="turno">
                            <option <?php if($turno_2 == 'Manhã'){ ?> selected <?php } ?> value="Manhã">Manhã</option>
                            <option <?php if($turno_2 == 'Tarde'){ ?> selected <?php } ?> value="Tarde">Tarde</option>
                            <option <?php if($turno_2 == 'Noite'){ ?> selected <?php } ?> value="Noite">Noite</option>
							</select>         
                    </div>
            </div>
            </div>
                    <div class="form-group">
                        <label >Hoarário</label>
                        <input value="<?php echo @$obs_2?>" type="text" class="form-control" id="obs" name="obs" placeholder="Ex: Das __h às __horas.">
                    </div>

            <small>
                <div id="mensagem">

                </div>
            </small> 

        </div>

           <div class="modal-footer">

                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$turma_2 ?>" type="hidden" name="antigo" id="antigo">

               
                <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Cancelar</a>
                <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

             </div>

        </form>
     </div>
   </div>
</div>


<div class="modal" id="inseriraluno" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">

                <?php
                        $id3 = $_GET['id'];

                    $query_t = $pdo->query("SELECT * FROM turmas where id = '" . $id3. "' ");
                    $res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);

                    $turmat = $res_t[0]['turma'];

                    ?>

            <div class="modal-header">
                <h5 class="modal-title">Matricular Aluno - <?php echo $turmat ?> </h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">


                <!-- DataTales Example -->
<div class="card shadow mb-4">

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Informações</th>
                    <th>Funções</th>
                </tr>
            </thead>

            <tbody>

               <?php 


               $query = $pdo->query("SELECT * FROM alunos a where a.id not in (select id_aluno from matriculas)
                order by id desc ");

               $res = $query->fetchAll(PDO::FETCH_ASSOC);

               for ($i=0; $i < count($res); $i++) { 
                  foreach ($res[$i] as $key => $value) {
                  }
                  
                $imagem = $res[$i]['imagem'];
                $nomecompleto = $res[$i]['nomecompleto'];
                $nomesocial = $res[$i]['nomesocial'];
                $aniversario = $res[$i]['aniversario'];
                $rg = $res[$i]['rg'];
                $cpf = $res[$i]['cpf'];
                $telefone = $res[$i]['telefone'];
                $celular = $res[$i]['celular'];
                $email = $res[$i]['email'];
                $cep = $res[$i]['cep'];
                $rua = $res[$i]['rua'];
                $numero = $res[$i]['numero'];
                $complemento = $res[$i]['complemento'];
                $bairro = $res[$i]['bairro'];
                $cidade = $res[$i]['cidade'];
                $estado = $res[$i]['estado'];
                $whatsapp = $res[$i]['whatsapp'];


                $escola =  $res[$i]['escola'];
                $turmaescolar = $res[$i]['turmaescolar'];
                $nivelescolar= $res[$i]['nivelescolar'];
                $anoescolar = $res[$i]['anoescolar'];
                $certidaonasc = $res[$i]['certidaonasc'];
                $cpfresponsavel = $res[$i]['cpfresponsavel'];

        $converte_data = implode('/', array_reverse(explode('-',$aniversario_3)));
                 
          $data_nasc = $aniversario;
          $data = new DateTime($data_nasc);
          $resultado = $data->diff(new Datetime( date('Y-m-d')));
          $idade = $resultado->format('%Y anos');
          $id_al = $res[$i]['id']; 
                    
                 ?>


                
                <tr>    
                    
                   <td>Nome: <?php echo $nomesocial ?><br/>
                    Idade: <?php echo $idade ?> <br/>
                    Cursando: <?php echo $anoescolar?> <br /> 
                    Nivel: <?php echo $nivelescolar?> <br />
                   </td>  

                   <td><div class="d-flex justify-content-center"> 
                       <img src="../img/alunos/<?php echo $imagem?>" width="60" height="60">
                   </div>

                    <hr>
                   <div class="d-flex justify-content-center"> 
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=addaluno&id_turma=<?php echo $_GET['id']?>&id_al=<?php echo $id_al ?>" class='text-primary mr-2' title='Adicionar Aluno'><i class="fa-solid fa-circle-check"></i></a>
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=infor2&id_turma=<?php echo $_GET['id']?>&id_al=<?php echo $id_al ?>" class='text-primary mr-2' title='Dados do Aluno'><i class="fa-solid fa-user"></i></a>
                   </div>
                    
                </td> </div>

                
                </tr>
<?php } ?>


            </tbody>
        </table>
       </div>
   </div>
</div>

                

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="infor2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                	<h5 class="modal-title">Dados do Aluno</h5>              
                    <a href="javascript:void(0)" onClick="history.go(-1); return false;"><i class="fa-solid fa-circle-arrow-left"></i></a>
                     
            </div>
            <div class="container"></div>
            <div class="modal-body">

            <?php
        
            $query = $pdo->query("SELECT * FROM alunos where id = '$_GET[id_al]'");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
        
            
              $imagem_3 = $res[0]['imagem'];
              $nomecompleto_3 = $res[0]['nomecompleto'];
              $nomesocial_3 = $res[0]['nomesocial'];
              $aniversario_3 = $res[0]['aniversario'];
              $genero_3 = $res[0]['genero'];
              $rg_3 = $res[0]['rg'];
              $cpf_3 = $res[0]['cpf'];
              $telefone_3 = $res[0]['telefone'];
              $celular_3 = $res[0]['celular'];
              $email_3 = $res[0]['email'];
              $cep_3 = $res[0]['cep'];
              $rua_3 = $res[0]['rua'];
              $numero_3 = $res[0]['numero'];
              $complemento_3 = $res[0]['complemento'];
              $bairro_3 = $res[0]['bairro'];
              $cidade_3 = $res[0]['cidade'];
              $estado_3 = $res[0]['estado'];
              $whatsapp_3 = $res[0]['whatsapp'];
    
              $escola_3 =  $res[0]['escola'];
              $turmaescolar_3 = $res[0]['turmaescolar'];
              $nivelescolar_3 = $res[0]['nivelescolar'];
              $anoescolar_3 = $res[0]['anoescolar'];
              $certidaonasc_3 = $res[0]['certidaonasc'];
              $cpfresposanvel_3 = $res[0]['cpfresponsavel'];
    
    
              $telefone_sem_simbolos = preg_replace('/[^0-9]/', '', $telefone_3);
              $telefone_formatado_aluno = '(' . substr($telefone_sem_simbolos, 0, 2) . ') ' . substr( $telefone_sem_simbolos, 2, 4) . '-' . substr( $telefone_sem_simbolos, 6);
              
                               
              $celular_sem_simbolos = preg_replace('/[^0-9]/', '', $celular_3);
              $celular_formatado_aluno = '(' . substr($celular_sem_simbolos, 0, 2) . ') ' . substr($celular_sem_simbolos, 2, 5) . '-' . substr($celular_sem_simbolos, 7);
      
      
              $whatsapp_sem_simbolos = preg_replace('/[^0-9]/', '', $whatsapp_3);
              $whatsapp_formatado_aluno = '(' . substr($whatsapp_sem_simbolos, 0, 2) . ') ' . substr($whatsapp_sem_simbolos, 2, 5) . '-' . substr($whatsapp_sem_simbolos, 7);
      
              $rg_sem_simbolo = preg_replace('/[^0-9]/', '', $rg_3);
              $rg_formatado_aluno = substr($rg_3, 0, 2) . '.' . substr($rg_sem_simbolo, 2, 3) . '.' . substr($rg_sem_simbolo, 5, 3) . '-' . substr($rg_sem_simbolo, 8);
             
              $cpf_formatado_aluno = substr_replace($cpf_3, '.', 3, 0);
              $cpf_formatado_aluno  = substr_replace($cpf_formatado_aluno , '.', 7, 0);
              $cpf_formatado_aluno  = substr_replace($cpf_formatado_aluno , '-', 11, 0);
      
    
          
              $converte_data = implode('/', array_reverse(explode('-',$aniversario_3)));
                     
              $data_nasc = $aniversario_3;
              $data = new DateTime($data_nasc);
              $resultado = $data->diff(new Datetime( date('Y-m-d')));
              $idade = $resultado->format('%Y anos');
              
               ?>
    
               <span> Aluno: <?php echo $nomesocial_3?> </span><br>
               <span> Aniversário: <?php echo $converte_data?> </span><br>
               <span> Gênero: <?php echo $genero_3?> </span><br>
               <span> Idade: <?php echo $idade?> </span><br>
               <span> Escola: <?php echo $escola_3?> </span><br>
               <span> Nível: <?php echo $nivelescolar_3?> </span><br>
               <span> Cursando: <?php echo $anoescolar_3?></span><br>
               <span> Turma: <?php echo $turmaescolar_3?> </span><br>
    
            <hr>
               <span> Nome: <?php echo $nomecompleto_3?> </span><br>
               <span> RG: <?php echo $rg_formatado_aluno?> </span><br>
               <span> CPF: <?php echo $cpf_formatado_aluno?> </span><br>
               <span> CN: <?php echo $certidaonasc_3?> </span><br>
            <hr>
               <span> Telefone: <?php echo $telefone_formatado_aluno?> </span><br>
               <span> Celular: <?php echo $celular_formatado_aluno?> </span><br>
               <span> E-mail: <?php echo $email_3?> </span><br>
               <span> Whatsapp: <?php echo $whatsapp_formatado_aluno?> </span><br>
            <hr>
               <span> CEP: <?php echo $cep_3?> </span><br>
               <span> Rua: <?php echo $rua_3?> </span><br>
               <span> N°: <?php echo $numero_3?> </span><br>
               <span> Comeplemento: <?php echo $complemento_3?> </span><br>
               <span> Bairro: <?php echo $bairro_3?> </span><br>
               <span> Cidade: <?php echo $cidade_3?> </span><br>
               <span> Estado: <?php echo $estado_3?> </span>                       


            </div>
            <div class="modal-footer">	<a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>

            <?php if ($cpfresposanvel_3 != "" ){ ?>
	         <a  data-toggle="modal" href="#myModal2" class="btn btn-primary">Ver Responsável</a>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade rotate" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Dados do Reponsável</h5>
        
            
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="container"></div>
            <div class="modal-body">
            <?php
            
            $query = $pdo->query("SELECT * FROM alunos where id = '$_GET[id_al]'");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
             $responsavel_4= $res[0]['cpfresponsavel'];

            $query_r = $pdo->query("SELECT * FROM responsaveis where cpf = '$responsavel_4'");
            $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
    
            $imagem_r = $res_r[0]['imagem'];
          $nomeresponsavel_r = $res_r[0]['nomeresponsavel'];
          $nomesocial_r = $res_r[0]['nomesocial'];
          $escolaridade_r = $res_r[0]['escolaridade'];
          $profissao_r = $res_r[0]['profissao'];
          $aniversario_r = $res_r[0]['aniversario'];
          $genero_r = $res_r[0]['genero'];
          $rg_r = $res_r[0]['rg'];
          $cpf_r = $res_r[0]['cpf'];
          $telefone_r = $res_r[0]['telefone'];
          $celular_r = $res_r[0]['celular'];
          $email_r = $res_r[0]['email'];
          $nomerecado_r = $res_r[0]['nomerecado'];
          $parentesco_r = $res_r[0]['parentesco'];
          $celular2_r = $res_r[0]['celular2'];
          $cep_r = $res_r[0]['cep'];
          $rua_r = $res_r[0]['rua'];
          $numero_r = $res_r[0]['numero'];
          $complemento_r = $res_r[0]['complemento'];
          $bairro_r = $res_r[0]['bairro'];
          $cidade_r = $res_r[0]['cidade'];
          $estado_r = $res_r[0]['estado'];
          $whatsapp_r = $res_r[0]['whatsapp'];


          $telefone_sem_simbolos = preg_replace('/[^0-9]/', '', $telefone_r);
        $telefone_formatado = '(' . substr($telefone_sem_simbolos, 0, 2) . ') ' . substr( $telefone_sem_simbolos, 2, 4) . '-' . substr( $telefone_sem_simbolos, 6);
        
        $celular_sem_simbolos2 = preg_replace('/[^0-9]/', '', $celular2_r);

        if (strlen($celular_sem_simbolos2) === 11) {
            $celular_formatado2 = '(' . substr($celular_sem_simbolos2, 0, 2) . ') ' . substr($celular_sem_simbolos2, 2, 5) . '-' . substr($celular_sem_simbolos2, 7);
        } elseif (strlen($celular_sem_simbolos2) === 10) {
            $celular_formatado2 = '(' . substr($celular_sem_simbolos2, 0, 2) . ') ' . substr($celular_sem_simbolos2, 2, 4) . '-' . substr($celular_sem_simbolos2, 6);
        } else {
            $celular_formatado2 = '() -';
            
        }
                
        $celular_sem_simbolos = preg_replace('/[^0-9]/', '', $celular_r);
        $celular_formatado = '(' . substr($celular_sem_simbolos, 0, 2) . ') ' . substr($celular_sem_simbolos, 2, 5) . '-' . substr($celular_sem_simbolos, 7);


        $whatsapp_sem_simbolos = preg_replace('/[^0-9]/', '', $whatsapp_r);
        $whatsapp_formatado = '(' . substr($whatsapp_sem_simbolos, 0, 2) . ') ' . substr($whatsapp_sem_simbolos, 2, 5) . '-' . substr($whatsapp_sem_simbolos, 7);

        $rg_sem_simbolo = preg_replace('/[^0-9]/', '', $rg_r);
        $rg_formatado = substr($rg_r, 0, 2) . '.' . substr($rg_sem_simbolo, 2, 3) . '.' . substr($rg_sem_simbolo, 5, 3) . '-' . substr($rg_sem_simbolo, 8);
        $cpf_formatado_resp = substr_replace($cpf_r, '.', 3, 0);
        $cpf_formatado_resp  = substr_replace($cpf_formatado_resp , '.', 7, 0);
        $cpf_formatado_resp  = substr_replace($cpf_formatado_resp , '-', 11, 0);



          $converte_data_3 = implode('/', array_reverse(explode('-',$aniversario_r)));
                 
          $data_nasc_2 = $aniversario_r;
          $data_2 = new DateTime($data_nasc_2);
          $resultado2 = $data_2->diff(new Datetime( date('Y-m-d')));
          $idade_2 = $resultado2->format('%Y anos');
          
          
           ?>

           <span> Perfil: <?php echo $nomesocial_r?> </span><br>
           <span> Aniversário: <?php echo $converte_data_3?> </span><br>
           <span> idade: <?php echo $idade_2?> </span><br>
           <span> Gênero: <?php echo $genero_r?> </span><br>
           <span> Escolaridade: <?php echo $escolaridade_r?> </span><br>
           <span> Profissão: <?php echo $profissao_r?></span><br>
    
        <hr>
           <span> Nome: <?php echo $nomeresponsavel_r?> </span><br>
           <span> RG: <?php echo $rg_formatado?> </span><br>
           <span> CPF: <?php echo $cpf_formatado_resp?> </span><br>

        <hr>
           <span> Telefone: <?php echo $telefone_formatado?> </span><br>
           <span> Celular: <?php echo $celular_formatado?> </span><br>
           <span> E-mail: <?php echo $email_r?> </span><br>
           <span> Whatsapp: <?php echo $whatsapp_formatado?> </span><br>
           <span> Contado para Recado: <?php echo $nomerecado_r?> </span><br>
           <span> Parentesco: <?php echo $parentesco_r?> </span><br>
           <span> Celular: <?php echo $celular_formatado2?> </span><br>

        <hr>
           <span> CEP: <?php echo $cep_r?> </span><br>
           <span> Rua: <?php echo $rua_r?> </span><br>
           <span> N°: <?php echo $numero_r?> </span><br>
           <span> Comeplemento: <?php echo $complemento_r?> </span><br>
           <span> Bairro: <?php echo $bairro_r?> </span><br>
           <span> Cidade: <?php echo $cidade_r?> </span><br>
           <span> Estado: <?php echo $estado_r?> </span>



           </div>
        <div class="modal-footer">	<a href="#" data-dismiss="modal" class="btn btn-secondary">Fechar</a>

            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="modal" id="matriculados" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

            <?php
                        $id3 = $_GET['id_turma'];

                    $query_t = $pdo->query("SELECT * FROM turmas where id = '" . $id3. "' ");
                    $res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);

                    $turmat = $res_t[0]['turma'];

                    ?>

                <h5 class="modal-title">Alunos Matriculados - <?php echo $turmat ?> </h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
<div class="card shadow mb-4">

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Matriculados</th>
                    <th>Funções</th>
                </tr>
            </thead>

            <tbody>

               <?php 
                    $query_f = $pdo->query("SELECT * FROM matriculas where id_turma = '$_GET[id_turma]'");
                    $res_f = $query_f->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res_f); $i++) { 
                    foreach ($res_f[$i] as $key => $value) {
                    }


                    $id_aluno = $res_f[$i]['id_aluno'];
                    $id_matricula = $res_f[$i]['id'];



                    $query_r = $pdo->query("SELECT * FROM alunos where id = '" . $id_aluno . "'");
                    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

                    
                    $nomecompleto = $res_r[0]['nomecompleto'];
                    $imagem = $res_r[0]['imagem'];

                ?>

                <tr>    
                    
                   <td>
                    <a class='teste-foto'><?php echo $nomecompleto ?><span class='teste-foto2'><img src="../img/alunos/<?php echo $imagem?>" class='teste-foto3' width="100" height="100" alt="<?php echo $nomecompleto ?>" /></span></a>
                   </td>  
                   <td>
                   <div class="d-flex justify-content-center"> 
                       <a href="index.php?pag=<?php echo $pag ?>&funcao=excluir_matriculado&id_matricula=<?php echo $id_matricula?>
                       &id_turma=<?php echo $_GET['id_turma']?>" class='text-danger' title='Remover Aluno'><i class="fa-solid fa-user-minus"></i></a>
                    </div>
                    </td> 
                </div>          
                </tr>
<?php } ?>


            </tbody>
        </table>
       </div>
   </div>
</div>
            
            </div>
        </div>
    </div>
</div>

        

 <div class="modal" id="deletar3" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Cadastro</h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">

                <p>Confirma Exclusão de Cadastro?</p>

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



<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "infor2") {
    echo "<script>$('#infor2').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "infor") {
    echo "<script>$('#infor').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "deletar2") {
    echo "<script>$('#deletar3').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "inseriraluno2") {
    echo "<script>$('#inseriraluno').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "voltar") {
    echo "<script>$('#inseriraluno').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "inseriraluno2") {
    echo "<script>$('#addalunos').modal('show');</script>";
    
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "addaluno") {

    $id = $_GET['id_turma'];
    $id_aluno = $_GET['id_al'];

    $query_r = $pdo->query("SELECT * FROM matriculas where id_turma = '$id' and id_aluno = '$id_aluno'");
    $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);

    if(@count($res_r) == 0  ){
    $res = $pdo->query("INSERT INTO matriculas SET id_turma = '$id', id_aluno = '$id_aluno', 
    data_matri = curDate()");
    }

    echo "<script>window.location='index.php?pag=$pag&funcao=inseriraluno2&id=$id';</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "addaluno2") {
    echo"<script>$('#matriculados').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir_matriculado") {

    $id_matricula = $_GET['id_matricula'];
    $id_turma = $_GET['id_turma'];
   
   
    $res = $pdo->query("DELETE from matriculas WHERE id = '$id_matricula'");

    echo "<script>window.location='index.php?pag=$pag&id_turma=$id_turma&funcao=excluir_matriculado2';</script>";
    
   
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir_matriculado2") {
    echo"<script>$('#matriculados').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "incluirdisciplinas") {
    echo"<script>$('#incluirdisciplinas').modal('show');</script>";
}


?>


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

<!--excluir dados-->
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

                    $('#mensagem_excluir').text(mensagem).addClass('mensagem-vermelha');



                },

            })
        })
    })
</script>



<!--SCRIPT PARA CARREGAR IMAGEM -->
<script type="text/javascript">

    function carregarImg() {

        var target = document.getElementById('target');
        var file = document.querySelector("input[type=file]").files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);


        } else {
            target.src = "";
        }
    }

</script>





<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').dataTable({
            "ordering": false
        })

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable2').dataTable({
            "ordering": false
        })

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable3').dataTable({
            "ordering": false
        })

    });
</script>



<script>
$(document).ready(function () {
    $('#openBtn').click(function () {
        $('#myModal').modal()
    });

    $('.modal')
        .on({
            'show.bs.modal': function() {
                var idx = $('.modal:visible').length;
                $(this).css('z-index', 1040 + (10 * idx));
            },
            'shown.bs.modal': function() {
                var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
                $('.modal-backdrop').not('.stacked')
                .css('z-index', 1039 + (10 * idx))
                .addClass('stacked');
            },
            'hidden.bs.modal': function() {
                if ($('.modal:visible').length > 0) {
                    // restore the modal-open class to the body element, so that scrolling works
                    // properly after de-stacking a modal.
                    setTimeout(function() {
                        $(document.body).addClass('modal-open');
                    }, 0);
                }
            }
        });
});
</script>

<script>

