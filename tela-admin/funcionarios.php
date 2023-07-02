<?php 
$pag = "funcionarios";
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
    		<li class="active"><i class="fa-solid fa-chalkboard-user"></i> - PÁGINA/CADASTRO DOS COLABORADORES </li>
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
                        <th>Nome Social</th>
                        <th>Celular</th>
                        <th>E-mail</th>
                        <th><div class="d-flex justify-content-center"> Funções</div></th>
                    </tr>
                </thead>

                <tbody>

                   <?php 

                   $query = $pdo->query("SELECT * FROM funcionarios order by id desc ");
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
                    $cargo = $res[$i]['cargo'];
                    $admissao = $res[$i]['admissao'];
                    $cep = $res[$i]['cep'];
                    $rua = $res[$i]['rua'];
                    $numero = $res[$i]['numero'];
                    $complemento = $res[$i]['complemento'];
                    $bairro = $res[$i]['bairro'];
                    $cidade = $res[$i]['cidade'];
                    $estado = $res[$i]['estado'];
                    $whatsapp = $res[$i]['whatsapp'];
                    $id = $res[$i]['id']; 

                    $celular_sem_simbolos = preg_replace('/[^0-9]/', '', $celular);
                    $celular_formatado = '(' . substr($celular_sem_simbolos, 0, 2) . ') ' . substr($celular_sem_simbolos, 2, 5) . '-' . substr($celular_sem_simbolos, 7);

                     ?>

                    <tr>
                    <td> <a class='teste-foto'><?php echo $nomesocial ?><span class='teste-foto2'><img src="../img/funcionarios/<?php echo $imagem?>" class='teste-foto3' width="100" height="100" alt="<?php echo $nomesocial ?>" /></span></a></td>
                        <td> <?php echo $celular_formatado ?></div></td>
                        <td><?php echo $email ?></td>                      

                        <td>
                        <a href="index.php?pag=<?php echo $pag ?>&funcao=infor&id=<?php echo $id ?>" class='text-primary mr-1' title='Dados Funcionário'><i class="fa-solid fa-user"></i></a>
                        <a target="_blank" href="../rel/fichadofuncionario.php?id=<?php echo $id ?>" class="text-secondary mr-1" title="Ficha do Funcionário"><i class="fa-solid fa-file-signature" style="color: #6495ED;"></i></a>
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
                    $titulo = "Editar do Funcionário";
                    $id2 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM funcionarios WHERE id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $imagem_2 = $res[0]['imagem'];
                    $nomecompleto_2 = $res[0]['nomecompleto'];
                    $nomesocial_2 = $res[0]['nomesocial'];
                    $aniversario_2 = $res[0]['aniversario'];
                    $genero_2 = $res[0]['genero'];
                    $rg_2 = $res[0]['rg'];
                    $cpf_2 = $res[0]['cpf'];
                    $telefone_2 = $res[0]['telefone'];
                    $celular_2 = $res[0]['celular'];
                    $email_2 = $res[0]['email'];
                    $cargo_2 = $res[0]['cargo'];
                    $admissao_2 = $res[0]['admissao'];
                    $cep_2 = $res[0]['cep'];
                    $rua_2 = $res[0]['rua'];
                    $numero_2 = $res[0]['numero'];
                    $complemento_2 = $res[0]['complemento'];
                    $bairro_2 = $res[0]['bairro'];
                    $cidade_2 = $res[0]['cidade'];
                    $estado_2 = $res[0]['estado'];
                    $whatsapp_2 = $res[0]['whatsapp'];

                    $query = $pdo->query("SELECT * FROM user WHERE cpf = '$cpf_2'");
                    $res = $query->fetch(PDO::FETCH_ASSOC);
                    
                    $nivel_2 = $res['nivel'];

                } else {
                    $titulo = "Registrar Funcionário";

                }

                ?>

                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>  
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                                <span aria-hidden="true">&times;</span></a>
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
                                <label >*Nome Social</label>
                                <input value="<?php echo @$nomesocial_2 ?>" type="text" 
                                class="form-control" id="nomesocial" 
                                name="nomesocial" placeholder="Nome Social">
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
                                   <option <?php if(@$genero_2 == 'Masculino'){ ?> selected <?php } ?> value="Masculino">Masculuno</option>
                                   <option <?php if(@$genero_2 == 'Feminino'){ ?> selected <?php } ?> value="Feminino">Feminino</option>
							</select> 
                        </div>
                     </div>

                     <div class="form-group">
                                <label>*Nível</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option <?php if ($nivel_2 == '') { echo 'selected'; } ?> value=''>Vazio</option>
                                    <option <?php if ($nivel_2 == 'secretaria') { echo 'selected'; } ?> value="secretaria">Secretária</option>
                                    <option 
                                
                            <?php if ($nivel_2 == 'admin') { echo 'selected'; } ?> value="admin">Administrador</option>
                                </select>
                            </div>


                           <!-- <div class="form-group">
                                <label>*Nível</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option //<?php// if (@$nivel_2 == '') { ?> selected <?php// } ?> value=''>Vazio</option>
                                    <option <?php// if (@$nivel_2 == 'secretaria') { ?> selected <?php //} ?> value="secretaria">Secretária</option>
                                    <option <?php //if (@$nivel_2 == 'admin') { ?> selected <?php //} ?>// value="admin">Administrador</option>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label >*Cargo</label>
                                <input value="<?php echo @$cargo_2 ?>" type="text"
                                 class="form-control" id="cargo" 
                                name="cargo" placeholder="Cargo">
                            </div>
   
                            <div class="form-group">
                                <label >Admissão</label>
                                <input value="<?php echo @$admissao_2 ?>" type="date" 
                                class="form-control" id="admissao" 
                                name="admissao" placeholder="Admissão">
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
                                    <img src="../img/funcionarios/<?php echo $imagem_2?>" width="350"
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
                        name="rg" placeholder="RG">
                    </div>
        
                    <div class="form-group">
                        <label >*CPF</label>
                        <input value="<?php echo @$cpf_2 ?>" type="text" 
                        class="form-control" id="cpf" 
                        name="cpf" placeholder="CPF">
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
                        <label >CEP</label>
                        <input value="<?php echo @$cep_2 ?>" type="text" 
                        class="form-control" id="cep" 
                        name="cep" placeholder="CEP">
                    </div>

                    <div class="form-group">
                        <label >*Rua</label>
                        <input value="<?php echo @$rua_2 ?>" type="text" 
                        class="form-control" id="rua" 
                        name="rua" placeholder="Rua">
                    </div>

                    <div class="form-group">
                        <label >*N°</label>
                        <input value="<?php echo @$numero_2 ?>" type="text"
                         class="form-control" id="numero" 
                        name="numero" placeholder="Número">
                    </div>

                    <div class="form-group">
                        <label >*Complemento</label>
                        <input value="<?php echo @$complemento_2?>" type="text" 
                        class="form-control" id="complemento" 
                        name="complemento" placeholder="Complemento">
                    </div>
                        </div>
                        </div>

                <div class="col-md-6">
                <div class="modal-body  pl-0">
                    <div class="form-group">
                        <label >*Bairro</label>
                        <input value="<?php echo @$bairro_2 ?>" type="text" 
                        class="form-control" id="bairro" 
                        name="bairro" placeholder="Bairro">
                    </div>
                    
                    <div class="form-group">
                        <label >*Cidade</label>
                        <input value="<?php echo @$cidade_2?>" type="text" 
                        class="form-control" id="cidade" 
                        name="cidade" placeholder="Cidade">
                    </div>

                    <div class="form-group">
                        <label >*Estado</label>
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

          <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Cancelar</a>
          <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
      </div>

        
    </div>
            </form>
  </div>
</div>
 </div>

<div class="modal fade" id="infor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dados do Funcionário</h5>
        <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
      </div>
      <div class="modal-body">
          <?php

         

          if(@$_GET['funcao'] == 'infor') {
          $id3 = $_GET['id'];

          $query = $pdo->query("SELECT * FROM funcionarios where id = '$id3'");
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
          $cargo_3 = $res[0]['cargo'];
          $admissao_3 = $res[0]['admissao'];
          $cep_3 = $res[0]['cep'];
          $rua_3 = $res[0]['rua'];
          $numero_3 = $res[0]['numero'];
          $complemento_3 = $res[0]['complemento'];
          $bairro_3 = $res[0]['bairro'];
          $cidade_3 = $res[0]['cidade'];
          $estado_3 = $res[0]['estado'];
          $whatsapp_3 = $res[0]['whatsapp'];

          $telefone_sem_simbolos = preg_replace('/[^0-9]/', '', $telefone_3);
          $telefone_formatado = '(' . substr($telefone_sem_simbolos, 0, 2) . ') ' . substr( $telefone_sem_simbolos, 2, 4) . '-' . substr( $telefone_sem_simbolos, 6);
                        
          $celular_sem_simbolos = preg_replace('/[^0-9]/', '', $celular_3);
          $celular_formatado = '(' . substr($celular_sem_simbolos, 0, 2) . ') ' . substr($celular_sem_simbolos, 2, 5) . '-' . substr($celular_sem_simbolos, 7);
  
  
          $whatsapp_sem_simbolos = preg_replace('/[^0-9]/', '', $whatsapp_3);
          $whatsapp_formatado = '(' . substr($whatsapp_sem_simbolos, 0, 2) . ') ' . substr($whatsapp_sem_simbolos, 2, 5) . '-' . substr($whatsapp_sem_simbolos, 7);
  
          $rg_sem_simbolo = preg_replace('/[^0-9]/', '', $rg_3);
          $rg_formatado = substr($rg_3, 0, 2) . '.' . substr($rg_sem_simbolo, 2, 3) . '.' . substr($rg_sem_simbolo, 5, 3) . '-' . substr($rg_sem_simbolo, 8);
  
          
          $cpf_formatado = substr_replace($cpf_3, '.', 3, 0);
          $cpf_formatado  = substr_replace($cpf_formatado , '.', 7, 0);
          $cpf_formatado  = substr_replace($cpf_formatado , '-', 11, 0);

          $converte_data = implode('/', array_reverse(explode('-',$aniversario_3)));
          $converte_data2 = implode('/', array_reverse(explode('-',$admissao_3)));
                 
          $data_nasc = $aniversario_3;
          $data = new DateTime($data_nasc);
          $resultado = $data->diff(new Datetime( date('Y-m-d')));
          $idade = $resultado->format('%Y anos');
    

          

          }
           ?>

           <span> Perfil: <?php echo $nomesocial_3?> </span><br>
           <span> Aniversário: <?php echo $converte_data?> </span><br>
           <span> Idade: <?php echo $idade?> </span><br>
           <span> Gênero: <?php echo $genero_3?> </span><br>
           <span> Cargo: <?php echo $cargo_3?> </span><br>
           <span> Admissão: <?php echo $converte_data2?> </span><br>
        <hr>
           <span> Nome: <?php echo $nomecompleto_3?> </span><br>
           <span> RG: <?php echo $rg_formatado?> </span><br>
           <span> CPF: <?php echo $cpf_formatado?> </span><br>
        <hr>
           <span> Telefone: <?php echo $telefone_formatado?> </span><br>
           <span> Celular: <?php echo $celular_formatado?> </span><br>
           <span> E-mail: <?php echo $email_3?> </span><br>
           <span> Whatsapp: <?php echo $whatsapp_formatado?> </span><br>
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
        <button type="button" class="btn btn-primary">Imprimir</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" id="deletar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir Cadastro</h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">

                <p>Confirma Exclusão de Cadastro?</p>

                <div align="center" id="mensagem_excluir" class="">

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

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "deletar2") {
    echo "<script>$('#deletar').modal('show');</script>";
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

                    $('#mensagem_excluir').text(mensagem)



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

<script type='text/javascript'>
$(document).ready( function() {
    /* Executa a requisição quando o campo CEP perder o foco */
    $('#cep').blur(function(){
            /* Configura a requisição AJAX */
            $.ajax({
                 url : 'funcionarios/consultar_cep.php', /* URL que será chamada */ 
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

