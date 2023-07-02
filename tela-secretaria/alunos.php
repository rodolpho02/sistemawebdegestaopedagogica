

<?php 
$pag = "alunos";
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
    		<li class="active"><i class="fa-solid fa-graduation-cap"></i> - PÁGINA/CADASTRO DE ALUNOS </li>
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
                        <th>Nome de Perfil</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th>Funções</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM alunos order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                      
                    $imagem = $res[$i]['imagem'];
                    $nomecompleto = $res[$i]['nomecompleto'];
                    $nomesocial = $res[$i]['nomesocial'];
                    $aniversario = $res[$i]['aniversario'];
                    $genero = $res[$i]['genero'];
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

                    $celular_sem_simbolos = preg_replace('/[^0-9]/', '', $celular);
                    $celular_formatado = '(' . substr($celular_sem_simbolos, 0, 2) . ') ' . substr($celular_sem_simbolos, 2, 5) . '-' . substr($celular_sem_simbolos, 7);

                    $id = $res[$i]['id']; 
                     ?>

                    <tr>
                    <td> <a class='teste-foto'><?php echo $nomesocial ?><span class='teste-foto2'><img src="../img/alunos/<?php echo $imagem?>" class='teste-foto3' width="100" height="100" alt="<?php echo $nomesocial ?>" /></span></a></td>
                        <td><?php echo $celular_formatado ?></td>
                        <td><?php echo $email ?></td>                       

                        <td> 
                       
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=infor&id=<?php echo $id ?>" class='text-primary mr-1' title='Dados alunos'><i class="fa-solid fa-user"></i></a>
                       
                        <?php
                        $anos = 18;
                        $menoridade = date("Y-m-d", strtotime(date("Y-m-d") . "-$anos year"));
                        if ($aniversario > $menoridade) {
                            echo '<a target="_blank" href="../rel/fichadoaluno.php?id=' . $id . '" class="text-secondary mr-1" title="Ficha do Aluno(a) (Criança)"><i class="fa-solid fa-file-signature" style="color: pink;"></i></a>';
                        } else {
                            echo '<a target="_blank" href="../rel/fichadoaluno2.php?id=' . $id . '" class="text-secondary mr-1" title="Ficha do Aluno(a) (Adulto)"><i class="fa-solid fa-file-signature" style="color: #6495ED;"></i></a>';
                        }


                        $anos = 18;
                        $menoridade = date("Y-m-d", strtotime(date("Y-m-d") . "-$anos year"));
                        if ($aniversario > $menoridade) {
                            echo '<a target="_blank" href="../contratos/contrato.php?id=' . $id . '" class="text-secondary mr-1" title="Contrato de Matrícula (Criança)"><i class="fa-solid fa-file-signature" style="color: pink;"></i></a>';
                        } else {
                            echo '<a target="_blank" href="../contratos/contrato2.php?id=' . $id . '" class="text-secondary mr-1" title="Contrato de Matrícula (Adulto)"><i class="fa-solid fa-file-signature" style="color: #6495ED;"></i></a>';
                        }
                        ?>

<?php
                        $anos = 18;
                        $menoridade = date("Y-m-d", strtotime(date("Y-m-d") . "-$anos year"));
                        if ($aniversario > $menoridade) {
                            echo '<a target="_blank" href="../contratos/contratoimg.php?id=' . $id . '" class="text-secondary mr-1" title="Direito de Imagem  (Criança)"><i class="fa-solid fa-file-signature" style="color: pink;"></i></a>';
                        } else {
                            echo '<a target="_blank" href="../contratos/contratoimg2.php?id=' . $id . '" class="text-secondary mr-1" title="Direito de Imagem (Adulto)"><i class="fa-solid fa-file-signature" style="color: #6495ED;"></i></a>';
                        }
                        ?>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=editar&id=<?php echo $id ?>" class='text-primary mr-1' title='Editar Cadastro'><i class='fa-solid fa-edit'></i></a>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=deletar2&id=<?php echo $id ?>" class='text-danger mr-1' title='Excluir Cadastro'><i class='fa-solid fa-trash-alt'></i></a>
                       
                    
                        
                    
                    </td>
                    </tr>
<?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal"  id="modalDados" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Registro";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM alunos  WHERE id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $imagem_2 = $res[0]['imagem'];
                    $nomecompleto_2 = $res[0]['nomecompleto'];
                    $nomesocial_2 = $res[0]['nomesocial'];
                    $aniversario_2 = $res[0]['aniversario'];
                    $genero_7 = $res[0]['genero'];
                    $rg_2 = $res[0]['rg'];
                    $cpf_2 = $res[0]['cpf'];
                    $telefone_2 = $res[0]['telefone'];
                    $celular_2 = $res[0]['celular'];
                    $email_2 = $res[0]['email'];
                    $cep_2 = $res[0]['cep'];
                    $rua_2 = $res[0]['rua'];
                    $numero_2 = $res[0]['numero'];
                    $complemento_2 = $res[0]['complemento'];
                    $bairro_2 = $res[0]['bairro'];
                    $cidade_2 = $res[0]['cidade'];
                    $estado_2 = $res[0]['estado'];
                    $whatsapp_2 = $res[0]['whatsapp'];


                    
                    $escola_2 =  $res[0]['escola'];
                    $turmaescolar_2 = $res[0]['turmaescolar'];
                    $nivelescolar_2 = $res[0]['nivelescolar'];
                    $anoescolar_2 = $res[0]['anoescolar'];
                    $certidaonasc_2 = $res[0]['certidaonasc'];
                    $cpfresposanvel_2 = $res[0]['cpfresponsavel'];


                } else {
                    $titulo = "Registrar Alunos";

                }

                ?>

                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                                <span aria-hidden="true">&times;</span></a>
               </button>
    
      </div>
</br>



<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tabpanel" aria-controls="nav-home" aria-selected="true">Dados Pessoas</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Documentos</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contato</a>
    <a class="nav-item nav-link" id="nav-endereco-tab" data-toggle="tab" href="#nav-endereco" role="tab" aria-controls="nav-endereco" aria-selected="false">Endereço</a>
    </div>
</nav>

<form id="form" method="POST">  
    <div class="tab-content" id="form">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="modal-body">
                            <div class="form-group">
                                <label >*Nome de Perfil</label>
                                <input value="<?php echo @$nomesocial_2 ?>" type="text" 
                                class="form-control" id="nomesocial" 
                                name="nomesocial" placeholder="Nome de Perfil">
                            </div>        
                            
                    <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label >*Aniversário</label>
                                <input value="<?php echo @$aniversario_2 ?>" type="date" 
                                class="form-control" id="aniversario" 
                                 name="aniversario" placeholder="Aniversário">
                            </div>           
                        </div>
                        <div class="col-md-6">
                        <label >*Gênero </label>
                                <select name="genero" class="form-control" id="genero">
                                   <option <?php if(@$genero_7 == 'Masculino'){ ?> selected <?php } ?> value="Masculino">Masculuno</option>
                                   <option <?php if(@$genero_7 == 'Feminino'){ ?> selected <?php } ?> value="Feminino">Feminino</option>
							</select>    
                        </div>
                     </div>
                            <div class="form-group">
                                <label >Escola / Universidade</label>
                                <input value="<?php echo @$escola_2 ?>" type="text" 
                                class="form-control" id="escola" 
                                name="escola" placeholder="Escola ou Universidade">
                            </div>
                          
                  <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                                <label >*Nível</label>
                                <select name="nivelescolar" class="form-control" id="nivelescolar">
                                <option <?php if(@$nivelescolar_2 == 'Funtamental-I'){ ?> selected <?php } ?> value="Funtamental-I">Funtamental-I</option>
                                <option <?php if(@$nivelescolar_2 == 'Funtamental-II'){ ?> selected <?php } ?> value="Funtamental-II">Funtamental-II</option>
                                <option <?php if(@$nivelescolar_2 == 'Médio'){ ?> selected <?php } ?> value="Médio">Médio</option>
                                <option <?php if(@$nivelescolar_2 == 'Superior'){ ?> selected <?php } ?> value="Superior">Superior</option>
							</select>  
                        
                         </div>
                    </div>

                       <div class="col-md-3">
                            <div class="form-group">
                                <label >*Cursando</label>
                                <input value="<?php echo @$anoescolar_2 ?>" type="text" 
                                class="form-control" id="anoescolar" 
                                 name="anoescolar" placeholder="Ex: 2°">
                            </div>        
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Turma</label>
                                <input value="<?php echo @$turmaescolar_2 ?>" type="text" 
                                class="form-control" id="turmaescolar" 
                                 name="turmaescolar" placeholder="Ex: 1021">
                            </div>      
                        
                        </div>
                </div>                               
     </div>                  
 </div>       
                <div class="col-md-6">            
                <div class="modal-body">
                <div class="form-group">
                    <div class="form-group">
                        <h5>Inserir Foto</h5>
                        <input type="file" value="<?php echo @$imagem_2?>"  
                        class="form-control-file" id="imagem_2" name="imagem_2" onChange="carregarImg();">
                    </div>

                    <div id="divImgConta">
                        <?php if(@$imagem_2 != ""){ ?>
                                    <img src="../img/alunos/<?php echo $imagem_2?>" width="350"
                                     height="350" id="target">
                        <?php  }else{ ?>
                            <img src="../img/modelo/semfoto.jpg" width="350" height="350" id="target">
                        <?php } ?>
                    </div>
                </div>          
          </div>
         </div>
    </div>
  </div>
   

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        
  <div class="m-0 item">
  <div class="row">
                <div class="col-md-6">
                <div class="modal-body pr-0 ml-0">
                    <div class="form-group">
                        <label >*Nome Completo</label>
                        <input value="<?php echo @$nomecompleto_2 ?>" type="text" 
                        class="form-control" id="nomecompleto" 
                        name="nomecompleto" placeholder="Nome Completo">
                    </div>
                <div>

                    <div class="form-group">
                        <label >*RG</label>
                        <input value="<?php echo @$rg_2 ?>" type="text"
                         class="form-control" id="rg" 
                        name="rg" placeholder="*RG">
                    </div>
        
                    <div class="form-group">
                        <label >*CPF</label>
                        <input value="<?php echo @$cpf_2 ?>" type="text" 
                        class="form-control" id="cpf" 
                        name="cpf" placeholder="CPF">
                    </div> 

                    <div class="form-group">
                        <label >*Certidão de Nascimento</label>
                        <input value="<?php echo @$certidaonasc_2 ?>" type="text" 
                        class="form-control" id="certidaonasc" 
                        name="certidaonasc" placeholder="Certidão de Nascimento">
                    </div>

                    <div class="form-group">
                        <label >CPF do Responsável</label>
                        <input value="<?php echo @$cpfresposanvel_2 ?>" type="text" 
                        class="form-control" id="cpfresponsavel" 
                        name="cpfresponsavel" placeholder="CPF do Responsável">
                    </div>
              </div>
            
  </div>          
  </div>
  </div>          
  </div>
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            

  <div class="m-0 item">
  <div class="row">
                <div class="col-md-6">
                <div class="modal-body pr-0 ml-0">
                    <div class="form-group">
                        <label >Telefone</label>
                        <input value="<?php echo @$telefone_2 ?>" type="text" 
                        class="form-control" id="telefone" 
                        name="telefone" placeholder="Telefone">
                    </div>

                    <div class="form-group">
                        <label>*Celular</label>
                        <input value="<?php echo @$celular_2 ?>" type="text" 
                        class="form-control" id="celular" 
                        name="celular" placeholder="Celular">
                    </div>


                    <div class="form-group">
                        <label >*E-mail</label>
                        <input value="<?php echo @$email_2 ?>" type="text" 
                        class="form-control" id="email" 
                        name="email" placeholder="E-mail">
                    </div>

                    <div class="form-group">
                        <label >Whatsapp</label>
                        <input value="<?php echo @$whatsapp_2 ?>" type="text" 
                        class="form-control" id="whatsapp" 
                        name="whatsapp" placeholder="Whatsapp">
                    </div>           
              </div>
         
  </div>
  </div>          
  </div>
  </div>

  <div class="tab-pane fade" id="nav-endereco" role="tabpanel" aria-labelledby="nav-endereco-tab">
                
  
  <div class="row">
                <div class="col-md-6">
                    <div class="modal-body pr-0 ml-0">
                    <div class="form-group">
                        <label for= "cep" >CEP</label>
                        <input value="<?php echo @$cep_2 ?>" type="text" 
                        class="form-control" id="cep" 
                        name="cep" placeholder="CEP">
                    </div>

                    <div class="form-group">
                        <label for="rua">*Rua</label>
                        <input value="<?php echo @$rua_2 ?>" type="text"
                        class="form-control" id="rua" 
                        name="rua" placeholder="Rua">
                    </div>

                    <div class="form-group">
                        <label for="numero">*N°</label>
                        <input value="<?php echo @$numero_2 ?>" type="text"
                         class="form-control" id="numero" 
                        name="numero" placeholder="Número">
                    </div>

                    <div class="form-group">
                        <label or="complemento" >Complemento</label>
                        <input value="<?php echo @$complemento_2?>" type="text" 
                        class="form-control" id="complemento" 
                        name="complemento" placeholder="Complemento">
                    </div>
                        </div>
                        </div>

                <div class="col-md-6">
                <div class="modal-body  mr-3">
                    <div class="form-group">
                        <label for="bairro">*Bairro</label>
                        <input value="<?php echo @$bairro_2 ?>" type="text" 
                        class="form-control" id="bairro" 
                        name="bairro" placeholder="Bairro">
                    </div>
                    
                    <div class="form-group">
                        <label for="cidade">*Cidade</label>
                        <input value="<?php echo @$cidade_2?>" type="text" 
                        class="form-control" id="cidade" 
                        name="cidade" placeholder="Cidade">
                    </div>

                    <div class="form-group">
                        <label for="estado">*Estado</label>
                        <input value="<?php echo @$estado_2 ?>" type="text"
                         class="form-control" id="estado" 
                        name="estado" placeholder="Estado">
                    </div>
                    </div>
                    </div>
                  </div>
                

 </div>

            <small>
                <div id="mensagem">
                     </div>
            </small> 

    </div>


      <div class="modal-footer">
          <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
           
          <input value="<?php echo @$cpf_2 ?>" type="hidden" name="antigo" id="antigo">
          <input value="<?php echo @$email_2 ?>" type="hidden" name="antigo2" id="antigo2">
          <input value="<?php echo @$rg_2 ?>" type="hidden" name="antigo3" id="antigo3">
          <input value="<?php echo @$certidaonasc_2 ?>" type="hidden" name="antigo4" id="antigo4">


         
          <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Cancelar</a>
          <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
      </div>

        
    </div>
            </form>
  </div>
</div>
 </div>


<div class="modal fade" id="infor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                	<h5 class="modal-title">Dados do Aluno</h5>   
                       <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                            <span aria-hidden="true">&times;</span></a>

            </div>
            <div class="container"></div>
            <div class="modal-body">

            <?php

    if(@$_GET['funcao'] == 'infor') {
    $id3 = $_GET['id'];
    $query = $pdo->query("SELECT * FROM alunos where id = '$id3'");
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
          }
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
            <div class="modal-footer">	
            
            <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Fechar</a>
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
            
             $id4 = $_GET['id'];
             $query = $pdo->query("SELECT * FROM alunos where id = '$id4'");
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
    
                        
<div class="modal" id="deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Registro</h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                                <span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">
   

                <p>Confirma Exclusão de Cadastro?</p>

                <div align="center" id="mensagem_excluir" class="mensagem-vermelha  text-danger">

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
            </div>

<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script>$('#modalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "infor") {
    echo "<script>$('#infor').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "contrato") {
    echo "<script>$('#infor').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "deletar2") {
    echo "<script>$('#deletar').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "infor2") {
    echo "<script>$('#infor2').modal('show');</script>";
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


<script type='text/javascript'>
$(document).ready( function() {
    /* Executa a requisição quando o campo CEP perder o foco */
    $('#cep').blur(function(){
            /* Configura a requisição AJAX */
            $.ajax({
                 url : 'alunos/consultar_cep.php', /* URL que será chamada */ 
                 type : 'POST', /* Tipo da requisição */ 
                 data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                 dataType: 'json', /* Tipo de transmissão */
                 success: function(data){
                     if(data.sucesso == 1){
                         $('#rua').val(data.rua);
                         $('#bairro').val(data.bairro);
                         $('#cidade').val(data.cidade);
                         $('#estado').val(data.estado);
                         $('#numero').focus();
                     }
                 }
            });   
    return false;    
    })
 });
 </script>
