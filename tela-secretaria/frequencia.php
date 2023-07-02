<?php 
$pag = "frequencia";
require_once("../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_user'] == null || @$_SESSION['nivel_user'] != 'secretaria'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}
           ?>


        <form action="../rel/rel_freq_disc.php" method="POST" target="_blank">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b> Relatório de Frequência</b></h5>
                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
            </div>
                <div class="modal-body">

                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label >Data Inicial</label>
                            <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control"  name="dataInicial" >
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label >Data Final</label>
                            <input value="<?php echo date('Y-m-d') ?>" type="date" class="form-control"  name="dataFinal" >
                        </div>


                    </div>

                    <div class="col-md-4">

                    <div class="form-group">
                        <label >Alunos</label>
                        <select name="aluno" class="form-control" id="aluno">
                            <option value="">Todas</option>

                            <?php 
                                $query5 = $pdo->query("SELECT * FROM  matriculas where id order by id_aluno asc");
                                $res5 = $query5->fetchAll(PDO::FETCH_ASSOC);

                                for ($i5=0; $i5 < @count($res5); $i5++) { 
                                    foreach ($res5[$i5] as $key => $value) {
                                    }

                                    $reg_aluno = $res5[$i5]['id_aluno'];

                                    $query6 = $pdo->query("SELECT * FROM alunos where id = $reg_aluno ");
                                    $res6 = $query6->fetchAll(PDO::FETCH_ASSOC);
                                    $id_aluno_reg = $res6[0]['nomecompleto'];


                                    ?>									
                                    <option <?php if(@$id_aluno_5 == $id_aluno_reg){ ?> selected <?php } ?> 
                                    value="<?php echo  $reg_aluno?>"><?php echo  $id_aluno_reg ?></option>

                                <?php } ?>
       
       
                        </select>
                        

                    </div>


                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label >Presenças</label>
                            <select class="form-control" name="status" >
                                <option value="">Todos</option>
                                <option value="Falta">Falta</option>
                                <option value="Presenca">Presença</option>
                               
                            </select>
                        </div>


                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label >Disciplinas</label>
                            <select name="materia" class="form-control" id="materia">
                                <option value="">Todas</option>

                                <?php 
                                $query4 = $pdo->query("SELECT * FROM  disciplinas where id order by materia asc");
                                $res4 = $query4->fetchAll(PDO::FETCH_ASSOC);

                                for ($i4=0; $i4 < @count($res4); $i4++) { 
                                    foreach ($res4[$i4] as $key => $value) {
                                    }
                                    $disciplina_reg = $res4[$i4]['id'];
                                    $id_disciplina_reg = $res4[$i4]['materia'];
                                    
                                    ?>									
                                    <option <?php if(@$id_disciplina_4 == $id_disciplina_reg){ ?> selected <?php } ?> 
                                    value="<?php echo  $disciplina_reg?>"><?php echo $id_disciplina_reg ?></option>

                                <?php } ?>
                               
                               
                            </select>
                            

                        </div>


                    </div>
                    


                    <div class="col-md-4">

                        <div class="form-group">
                            <label >Turmas</label>
                            <select name="turma" class="form-control" id="turma">
                                <option value="">Todas</option>
                                <?php 
                                $query3 = $pdo->query("SELECT * FROM turmas where id order by turma asc");
                                $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);

                                for ($i3=0; $i3 < @count($res3); $i3++) { 
                                    foreach ($res3[$i3] as $key => $value) {
                                    }
                                    $turma_reg = $res3[$i3]['id'];
                                    $id_turma_reg = $res3[$i3]['turma'];
                                    
                                    ?>									
                                    <option <?php if(@$id_turma_3 == $id_turma_reg){ ?> selected <?php } ?> 
                                    value="<?php echo $turma_reg?>"><?php echo $id_turma_reg ?></option>

                                <?php } ?>
                               
                               
                            </select>
                        </div>

                </div>     

            </div>
            

            <hr>
        </form>


    </div>
</div>
</div>
