<?php 

@session_start();
$pag = "turma";
$cpf_user = @$_SESSION['cpf_user'];
require_once("../conexao.php");
$id_turma = $_GET['id'];

$query = $pdo->query("SELECT * FROM professores WHERE cpf = '$cpf_user'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_prof = $res[0]['id'];

$query = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id_turma' AND 
    (pri_professor = '$id_prof' OR seg_professor = '$id_prof' OR ter_professor = '$id_prof' OR
    quar_professor = '$id_prof') GROUP BY id_turma");

$res = $query->fetchAll(PDO::FETCH_ASSOC);
for ($i = 0; $i < count($res); $i++) { 
    foreach ($res[$i] as $key => $value) {
    }

    $id_turma2 = $res[$i]['id_turma'];
    $primeiro_tempo = $res[$i]['primeiro_tempo'];
    $segundo_tempo =  $res[$i]['segundo_tempo'];
    $terceiro_tempo = $res[$i]['terceiro_tempo'];
    $quarto_tempo = $res[$i]['quarto_tempo'];
}

$query_resp = $pdo->query ("SELECT * FROM disciplinas WHERE id IN ('$primeiro_tempo', '$segundo_tempo', '$terceiro_tempo', '$quarto_tempo') 
AND id_professor = '$id_prof'");
$res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);

$disciplinas_ids = array_column($res_resp, 'id');
$id_disciplina3 = implode(',', $disciplinas_ids);

$query = $pdo->query("SELECT * FROM matriculas WHERE id_turma = '$id_turma'");
$res_2 = $query->fetchAll(PDO::FETCH_ASSOC);
$aluno_matriculados = count($res_2);

$query = $pdo->query("SELECT * FROM aulas WHERE id_turma = '$id_turma2' AND id_disciplina IN ($id_disciplina3)");
$res_3 = $query->fetchAll(PDO::FETCH_ASSOC);
$total_aulas = count($res_3);


?>


<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-dark"  href="index.php?pag=turma&funcao=chamadas&id=<?php echo $id_turma?> "title="Abrir chamada">
            <div class="card <?php echo $classe_card ?> shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="text font-weight-bold  <?php echo $classe_card ?> text-uppercase">fazer chamada</div>
                            <div class="text text-secondary">Alunos: <?php echo $aluno_matriculados?> </div>
                        </div>
                        <div class="col-auto" align="center">
                        <i class="fa-solid fa-graduation-cap  fa-2x 
                            <?php echo $classe_card ?>"  style="color: #005eff;"> </i><br>
                            <span class="text-xs"></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>



    <div class="col-xl-3 col-md-6 mb-4">
        <a class="text-dark"  href="index.php?pag=turma&funcao=aulas&id=<?php echo $id_turma?> "title="Abrir Aulas">
            <div class="card <?php echo $classe_card ?> shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="text font-weight-bold  <?php echo $classe_card ?> text-uppercase">Cadastrar Aula</div>
                            <div class="text text-secondary">Aulas: <?php echo $total_aulas ?></div>
                        </div>
                        <div class="col-auto" align="center">
                        <i class="fa-solid fa-chalkboard-user fa-2x  <?php echo $classe_card ?>" style="color: #005eff;"></i><br>
                            <span class="text-xs"></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
 </div>

 
 <div class="modal" id="chamadas" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Chamada</h5>

        <div align ="right" class="box-search">
        <input type="search2" class="form-control" placeholder="Burcar: 'Data'" id="pesquisar2">
        <a onclick="searchData2()"></a> </div>

        <div> 
        <a type="button" class="close" href="index.php?pag=turma&id=<?php echo $id_turma ?>">
                            <span aria-hidden="true">&times;</span></a> </div>
      </div>
      
      <div class="modal-body"> 
       
        
            
        <?php



       if(!empty($_GET['search2']))
    {
        $data2 = $_GET['search2'];
        
        $data_aula2 = implode('-', array_reverse(explode('/', $data2)));

        $id_turma = $_GET['id'];

        $query = $pdo->query("SELECT * FROM professores WHERE cpf = '$cpf_user'");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $id_prof = $res[0]['id'];
        
        $query = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id_turma' AND 
            (pri_professor = '$id_prof' OR seg_professor = '$id_prof' OR ter_professor = '$id_prof' OR
            quar_professor = '$id_prof') GROUP BY id_turma");
        
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        for ($i = 0; $i < count($res); $i++) { 
            foreach ($res[$i] as $key => $value) {
            }
        
            $id_turma2 = $res[$i]['id_turma'];
            $primeiro_tempo = $res[$i]['primeiro_tempo'];
            $segundo_tempo =  $res[$i]['segundo_tempo'];
            $terceiro_tempo = $res[$i]['terceiro_tempo'];
            $quarto_tempo = $res[$i]['quarto_tempo'];
        }
        
        $query_resp = $pdo->query ("SELECT * FROM disciplinas WHERE id IN ('$primeiro_tempo', '$segundo_tempo', '$terceiro_tempo', '$quarto_tempo') 
        AND id_professor = '$id_prof'");
        $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
        
        $disciplinas_ids = array_column($res_resp, 'id');
        $id_disciplina3 = implode(',', $disciplinas_ids);
        
        $query = $pdo->query("SELECT * FROM aulas WHERE  dataaula LIKE '%$data_aula2%' and id_turma = '$id_turma' AND id_disciplina 
        IN ($id_disciplina3)  ORDER BY dataaula desc");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($res); $i++) { 
            foreach ($res[$i] as $key => $value) {
            }

                    $id_aula = $res[$i]['id'];
                    $titulo_aula = $res[$i]['titulo_aula'];
                    $descricao= $res[$i]['descricao'];
                    $id_disciplina= $res[$i]['id_disciplina'];
                    $dataaula= $res[$i]['dataaula'];


                    $query2 = $pdo->query("SELECT * FROM disciplinas WHERE id = '$id_disciplina' ");
                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                    $id_disciplina2 = $res2[0]['materia'];   
                    
                     $data_aula = implode('/', array_reverse(explode('-', $dataaula)));

                        $query3 = $pdo->query("SELECT * FROM matriculas WHERE id_turma = '$id_turma'");
                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);

                        $total_matriculados = count($res3);


                        $query2 = $pdo->query("SELECT * FROM chamada WHERE id_aula = '$id_aula'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);


                        if (count($res2) > 0) {
                            $id_alunos = count($res2);
                            $total_presencas = 0;
                        
                            foreach ($res2 as $chamada) {
                                if ($chamada['presenca'] == 'Presenca' or 'Falta') {
                                    $total_presencas++;
                                }
                            }
                        
                            if ($total_presencas == $total_matriculados) {
                                $status_chamada = 'Totalmente realizada';
                            } elseif ($total_presencas > 0) {
                                $status_chamada = 'Parcialmente realizada';
                            } else {
                                $status_chamada = 'Não realizada';
                            }
                        }  else {
                        $status_chamada = 'Não realizada';
                    }


                        echo ' Data: ' . $data_aula . ' - '. $id_disciplina2 . ' | 
                        <a href="index.php?pag=turma&id='.$id_turma.'&funcao=chamadasaulas&id_turma='.$id_turma.'&id_aula='.$id_aula.'" 
                        title="Fazer Chamada"  > <i class="fa-solid fa-file-circle-plus text-primary"></i> </i></a> - ' .$status_chamada.'<hr>';
    
    }}
    else   {  

      
                        $id_turma = $_GET['id'];

                        $query = $pdo->query("SELECT * FROM professores WHERE cpf = '$cpf_user'");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $id_prof = $res[0]['id'];
                        
                        $query = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id_turma' AND 
                            (pri_professor = '$id_prof' OR seg_professor = '$id_prof' OR ter_professor = '$id_prof' OR
                            quar_professor = '$id_prof') GROUP BY id_turma");
                        
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }
                        
                            $id_turma2 = $res[$i]['id_turma'];
                            $primeiro_tempo = $res[$i]['primeiro_tempo'];
                            $segundo_tempo =  $res[$i]['segundo_tempo'];
                            $terceiro_tempo = $res[$i]['terceiro_tempo'];
                            $quarto_tempo = $res[$i]['quarto_tempo'];
                        }
                        
                        $query_resp = $pdo->query ("SELECT * FROM disciplinas WHERE id IN ('$primeiro_tempo', '$segundo_tempo', '$terceiro_tempo', '$quarto_tempo') 
                        AND id_professor = '$id_prof'");
                        $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
                        
                        $disciplinas_ids = array_column($res_resp, 'id');
                        $id_disciplina3 = implode(',', $disciplinas_ids);
                        
                        
                        $query = $pdo->query("SELECT * FROM aulas WHERE id_turma = '$id_turma' AND id_disciplina 
                        IN ($id_disciplina3) ORDER BY dataaula desc");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }

                        $id_aula = $res[$i]['id'];
                        $titulo_aula = $res[$i]['titulo_aula'];
                        $descricao= $res[$i]['descricao'];
                        $id_disciplina= $res[$i]['id_disciplina'];
                        $dataaula = $res[$i]['dataaula'];

                   
                        $query2 = $pdo->query("SELECT * FROM disciplinas WHERE id = '$id_disciplina' ");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                        $id_disciplina2 = $res2[0]['materia'];

                        $data_aula = implode('/', array_reverse(explode('-', $dataaula)));

                        $query3 = $pdo->query("SELECT * FROM matriculas WHERE id_turma = '$id_turma'");
                        $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);

                        $total_matriculados = count($res3);


                        $query2 = $pdo->query("SELECT * FROM chamada WHERE id_aula = '$id_aula'");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                                                         
                        if (count($res2) > 0) {
                            $id_alunos = count($res2);
                            $total_presencas = 0;
                        
                            foreach ($res2 as $chamada) {
                                if ($chamada['presenca'] == 'Presenca' or 'Falta') {
                                    $total_presencas++;
                                }
                            }
                        
                            if ($total_presencas >= $total_matriculados) {
                                $status_chamada = 'Totalmente realizada';
                            } elseif ($total_presencas > 0) {
                                $status_chamada = 'Parcialmente realizada';
                            } else {
                                $status_chamada = 'Não realizada';
                            }
                        }  else {
                        $status_chamada = 'Não realizada';
                    }
                        echo ' Data: ' . $data_aula . ' - '. $id_disciplina2 . ' | 
                        <a href="index.php?pag=turma&id='.$id_turma.'&funcao=chamadasaulas&id_turma='.$id_turma.'&id_aula='.$id_aula.'" 
                        title="Fazer Chamada"  > <i class="fa-solid fa-file-circle-plus text-primary"></i> </i></a> - ' .$status_chamada.'<hr>';
                    }}
                    ?>
                    </div>


      </div>
      
      <div align="center" id="mensagem" class="">

      </div>


      
    </div>

  </div>
</div>
</div>




<!-- DataTales Example -->
<div class="modal" id="chamadasaulas" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Fazer Chamada</h5>
                <a type="button" class="close" href="index.php?pag=turma&funcao=chamadas&id=<?php echo $id_turma?>"
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
                            <th>Alunos</th>
                            <th>P</th>
                            <th>F</th>
                            <th>Status</th>

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
                       <a href="index.php?pag=turma&id=<?php echo $_GET['id']?>&funcao=realizarchamada&id_turma=<?php echo $_GET['id_turma']?>&id_aula=<?php echo $_GET['id_aula']?>&id_aluno=<?php echo $id_aluno?>" 
                       class='text-primary' title='Presença'><i class="fa-solid fa-user-check"></i></a>
                     </td> 

                     <td>
                       <a href="index.php?pag=turma&id=<?php echo $_GET['id']?>&funcao=realizarchamada2&id_turma=<?php echo $_GET['id_turma']?>&id_aula=<?php echo $_GET['id_aula']?>&id_aluno=<?php echo $id_aluno?>" 
                       class='text-danger' title='Falta'> <i class="fa-solid fa-user-check"></i></a>
                     </td> 
                       
                      <td>
                      <?php

                        $query2 = $pdo->query("SELECT * FROM chamada WHERE id_turma = '$_GET[id_turma]' 
                        and id_aluno = $id_aluno and id_aula ='$_GET[id_aula]'");
                        $res2 = $query2 -> fetchALL(PDO::FETCH_ASSOC);
                        $presenca2 = $res2[0]['presenca'];

                         if($presenca2 != "" ) {?>

                        <?php echo $presenca2 ?>

                        <?php } ?>
                         
                     </td> 

                </div>

                
                </tr>
<?php }?>


            </tbody>
        </table>
       </div>
   </div>
</div>
            
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-aulas" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Cadastro de Aula </h5>

        <div align ="right" class="box-search">
        <input type="search" class="form-control" placeholder="Burcar: 'Data'" id="pesquisar">
        <a onclick="searchData()"></a> </div>

        <div>
         <a type="button" class="close" href="index.php?pag=turma&id=<?php echo $id_turma ?>">
                            <span aria-hidden="true">&times;</span></a>
    </div>
      </div>
      
      <div class="modal-body">

        <div class="row">
 
          <div class="col-md-4">

            <form id="form" method="POST" class="mt-2">

            <div class="form-group">

                <select name="id_disciplina" class="form-control" id="id_disciplina">
               
                <?php
$query = $pdo->query("SELECT * FROM professores WHERE cpf = '$cpf_user'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_prof = $res[0]['id'];

$query = $pdo->query("
    SELECT disciplinas.id, disciplinas.materia 
    FROM disciplinas 
    INNER JOIN grades ON (
        disciplinas.id IN (grades.primeiro_tempo, grades.segundo_tempo, grades.terceiro_tempo, grades.quarto_tempo) 
        AND grades.id_turma = '$id_turma' 
        AND (
            (grades.pri_professor = '$id_prof' AND disciplinas.id = grades.primeiro_tempo)
            OR (grades.seg_professor = '$id_prof' AND disciplinas.id = grades.segundo_tempo)
            OR (grades.ter_professor = '$id_prof' AND disciplinas.id = grades.terceiro_tempo)
            OR (grades.quar_professor = '$id_prof' AND disciplinas.id = grades.quarto_tempo)
        )
    )
    WHERE disciplinas.id_professor = '$id_prof'
");
$res_r = $query->fetchAll(PDO::FETCH_ASSOC);

$disciplinas = array(); // Array para armazenar os nomes das disciplinas

for ($i = 0; $i < count($res_r); $i++) { 
    $id_disciplina_reg = $res_r[$i]['id'];
    $id_disciplina = $res_r[$i]['materia'];

    // Verifica se o nome da disciplina já existe no array
    if (!in_array($id_disciplina, $disciplinas)) {
        $disciplinas[] = $id_disciplina; // Adiciona o nome da disciplina ao array
        ?>									
        <option <?php if (@$id_disciplina_2 == $id_disciplina_reg) { ?> selected <?php } ?> 
        value="<?php echo $id_disciplina_reg ?>"><?php echo $id_disciplina ?></option>
    <?php }
}
?>
</select>

                </select>
                </div> 

              <div class="form-group">
               <input type="text" class="form-control" id="titulo_aula"
                name="titulo_aula" placeholder="Nome da Aula">
             </div>

             <div class="form-group">
             <input  type="date"  class="form-control" id="dataaula" 
             name="dataaula" placeholder="Data da Aula">
             </div>       

             <!--<div class="form-group">
               <textarea placeholder="Descrição" class="form-control"
                id="descricao" name="descricao"></textarea>  
             </div> -->

             <hr>

             <div align="right">
              <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>
            </div><br>

            <input type="hidden" name="id_turma" value="<?php echo $_GET['id'] ?>">

          </form>
        </div>

        <div class="col-md-8">      
            
        <?php

       if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        
        $data_aula2 = implode('-', array_reverse(explode('/', $data)));


                $id_turma = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM professores WHERE cpf = '$cpf_user'");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    $id_prof = $res[0]['id'];
                    
                    $query = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id_turma' AND 
                        (pri_professor = '$id_prof' OR seg_professor = '$id_prof' OR ter_professor = '$id_prof' OR
                        quar_professor = '$id_prof') GROUP BY id_turma");
                    
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }
                    
                        $id_turma2 = $res[$i]['id_turma'];
                        $primeiro_tempo = $res[$i]['primeiro_tempo'];
                        $segundo_tempo =  $res[$i]['segundo_tempo'];
                        $terceiro_tempo = $res[$i]['terceiro_tempo'];
                        $quarto_tempo = $res[$i]['quarto_tempo'];
                    }
                    
                    $query_resp = $pdo->query ("SELECT * FROM disciplinas WHERE id IN ('$primeiro_tempo', '$segundo_tempo', '$terceiro_tempo', '$quarto_tempo') 
                    AND id_professor = '$id_prof'");
                    $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
                    
                    $disciplinas_ids = array_column($res_resp, 'id');
                    $id_disciplina3 = implode(',', $disciplinas_ids);
                    
                    $query = $pdo->query("SELECT * FROM aulas WHERE  dataaula LIKE '%$data_aula2%' and id_turma = '$id_turma' AND id_disciplina 
                    IN ($id_disciplina3)  ORDER BY dataaula desc");


                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                    for ($i=0; $i < count($res); $i++) { 
                    foreach ($res[$i] as $key => $value) {
                    }

                            $id_aula = $res[$i]['id'];
                            $titulo_aula = $res[$i]['titulo_aula'];
                            $descricao= $res[$i]['descricao'];
                            $id_disciplina= $res[$i]['id_disciplina'];
                            $dataaula= $res[$i]['dataaula'];


                            $query2 = $pdo->query("SELECT * FROM disciplinas WHERE id = '$id_disciplina' ");
                            $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                            $id_disciplina2 = $res2[0]['materia'];   
                            
                            $data_aula = implode('/', array_reverse(explode('-', $dataaula)));

                    
                            
                    
                            
                    echo 'Data: ' .$data_aula. ' - '. $id_disciplina2 . ' - '. $titulo_aula . 
                    '<a onclick="deletarAula('.$id_aula.')" title="deletar">
                        <i class="far fa-trash-alt text-danger ml-2"> </i></a> <hr>' ;

    
    
    }}
    else   {


                        $id_turma = $_GET['id'];

                        $query = $pdo->query("SELECT * FROM professores WHERE cpf = '$cpf_user'");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        $id_prof = $res[0]['id'];
                        
                        $query = $pdo->query("SELECT * FROM grades WHERE id_turma = '$id_turma' AND 
                            (pri_professor = '$id_prof' OR seg_professor = '$id_prof' OR ter_professor = '$id_prof' OR
                            quar_professor = '$id_prof') GROUP BY id_turma");
                        
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < count($res); $i++) { 
                            foreach ($res[$i] as $key => $value) {
                            }
                        
                            $id_turma2 = $res[$i]['id_turma'];
                            $primeiro_tempo = $res[$i]['primeiro_tempo'];
                            $segundo_tempo =  $res[$i]['segundo_tempo'];
                            $terceiro_tempo = $res[$i]['terceiro_tempo'];
                            $quarto_tempo = $res[$i]['quarto_tempo'];
                        }
                        
                        $query_resp = $pdo->query ("SELECT * FROM disciplinas WHERE id IN ('$primeiro_tempo', '$segundo_tempo', '$terceiro_tempo', '$quarto_tempo') 
                        AND id_professor = '$id_prof'");
                        $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
                        
                        $disciplinas_ids = array_column($res_resp, 'id');
                        $id_disciplina3 = implode(',', $disciplinas_ids);
                        
                        
                        $query = $pdo->query("SELECT * FROM aulas WHERE id_turma = '$id_turma' AND id_disciplina 
                        IN ($id_disciplina3) ORDER BY dataaula desc");
                        $res = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < count($res); $i++) { 
                        foreach ($res[$i] as $key => $value) {
                        }


                        $id_aula = $res[$i]['id'];
                        $titulo_aula = $res[$i]['titulo_aula'];
                        $descricao= $res[$i]['descricao'];
                        $id_disciplina= $res[$i]['id_disciplina'];
                        $dataaula= $res[$i]['dataaula'];

                        $query2 = $pdo->query("SELECT * FROM disciplinas WHERE id = '$id_disciplina' ");
                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);

                        $id_disciplina2 = $res2[0]['materia'];

                        $data_aula = implode('/', array_reverse(explode('-', $dataaula)));


                        echo 'Data: ' . $data_aula . ' - '. $id_disciplina2 . ' - '. $titulo_aula . '<a onclick="deletarAula('.$id_aula.')" 
                        title="deletar"> <i class="far fa-trash-alt text-danger ml-2"> </i></a> <hr>' ;


                        
                    }}
                    ?>
                    </di>

      
    </div>
                                        </div>
                                        
                                        <div align="center" id="mensagem2" class="">

                                        </div>


  </div>
</div>
</div>


<?php
if (@$_GET["funcao"] != null && @$_GET["funcao"] == "aulas") {
    echo "<script>$('#modal-aulas').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "chamadas") {
    echo "<script>$('#chamadas').modal('show');</script>";
}


if (@$_GET["funcao"] != null && @$_GET["funcao"] == "chamadasaulas") {
    echo "<script>$('#chamadasaulas').modal('show');</script>";
}



if (@$_GET["funcao"] != null && @$_GET["funcao"] == "realizarchamada") {

    $id_aluno_t = $_GET['id_aluno'];
    $id_turma_t = $_GET['id_turma'];
    $id_aula_t  = $_GET['id_aula'];
    
    
    $query = $pdo->query("SELECT * FROM chamada WHERE id_aluno = '$id_aluno_t' and id_turma = '$id_turma_t' and  id_aula = '$id_aula_t' ");
    
    
    $res_t = $query->fetchAll(PDO::FETCH_ASSOC);
     if(@count ( $res_t )>0){
        $id_t = $res_t[0]['id'];
        $pdo->query(" UPDATE chamada SET presenca = 'Presenca' WHERE id = $id_t ");
    
    }else{
     $pdo->query("INSERT INTO chamada SET id_aluno = '$id_aluno_t', id_turma = 
    '$id_turma_t', id_aula = '$id_aula_t', presenca = 'Presenca', datachamada = curDate()");
    
    }

    echo "<script>window.location='index.php?pag=$pag&id=$id_turma_t&funcao=chamadasaulas&id_turma=$id_turma_t&id_aula=$id_aula_t&id_aluno=$id_aluno_t';</script>";

}
    

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "realizarchamada2") {

    $id_aluno_t = $_GET['id_aluno'];
    $id_turma_t = $_GET['id_turma'];
    $id_aula_t  = $_GET['id_aula'];
    
    
    $query = $pdo->query("SELECT * FROM chamada WHERE id_aluno = '$id_aluno_t' and id_turma = '$id_turma_t' and  id_aula = '$id_aula_t' ");
    
    
    $res_t = $query->fetchAll(PDO::FETCH_ASSOC);
     if(@count ( $res_t )>0){
        $id_t = $res_t[0]['id'];
        $pdo->query(" UPDATE chamada SET presenca = 'Falta' WHERE id = $id_t ");
    
    }else{
     $pdo->query("INSERT INTO chamada SET id_aluno = '$id_aluno_t', id_turma = 
    '$id_turma_t', id_aula = '$id_aula_t', presenca = 'Falta', datachamada = curDate()");
    
    }

    echo "<script>window.location='index.php?pag=$pag&id=$id_turma_t&funcao=chamadasaulas&id_turma=$id_turma_t&id_aula=$id_aula_t&id_aluno=$id_aluno_t';</script>";

}
    


    
    ?>


<script type="text/javascript">
    $("#form").submit(function () {
        var pag = "<?=$pag?>";
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: pag + "/salvar_aula.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem2').removeClass()

                if (mensagem.trim() == "Envido com sucesso!") {
                    
                    $('#btn-fechar').click();
                    window.location = "index.php?pag=turma&funcao=aulas&id="+ <?php echo $id_turma?>;

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


<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
    function deletarAula(diaaula){
        event.preventDefault();
        var pag = "<?=$pag?>";
    

            $.ajax({
                url: pag + "/deletar_aula.php",
                method: "post",
                data: {diaaula},
                dataType: "text",
                success: function (mensagem) {

                    if (mensagem.trim() === 'Deletado!') {
   
                    window.location = "index.php?pag=turma&funcao=aulas&id="+ <?php echo $id_turma?>;
                    
                    }



                },

            })
    }
</script>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = "index.php?pag=turma&funcao=aulas&id="+
        <?php echo $id_turma?>+"&search="+search.value;
        
    }
</script>



<script>
    var search2 = document.getElementById('pesquisar2');

    search2.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData2();
        }
    });

    function searchData2()
    {
        window.location = "index.php?pag=turma&funcao=chamadas&id="+
        <?php echo $id_turma?>+"&search2="+search2.value;
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable3').dataTable({
            "ordering": false
        })

    });
</script>