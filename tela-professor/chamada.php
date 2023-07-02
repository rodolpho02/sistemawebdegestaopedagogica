<?php 
$pag = "chamada";
@session_start();
$cpf_user = @$_SESSION['cpf_user'];
if(@$_SESSION['id_user'] == null || @$_SESSION['nivel_user'] != 'professor'){
    echo "<script language='javascript'> window.location='../index.php' </script>";


    require_once("../conexao.php");
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <form action="../rel/rel_freq_prof.php" method="POST" target="_blank">
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
                                        $query = $pdo->query("SELECT * FROM professores where cpf = '$cpf_user' ");
                                        $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                        $id_prof = $res[0]['id'];

                                        $query = $pdo->query ("SELECT * FROM disciplinas where id_professor = '$id_prof' ");
                                        $res_r = $query->fetchAll(PDO::FETCH_ASSOC);

                                        for ($i=0; $i < @count($res_r); $i++) { 
                                            foreach ($res_r[$i] as $key => $value) {
                                            }
                                            $id_disciplina_reg = $res_r[$i]['id'];
                                            $id_disciplina = $res_r[$i]['materia'];
                                            
                                            ?>									
                                            <option <?php if(@$id_disciplina_2 == $id_disciplina_reg){ ?> selected <?php } ?> 
                                            value="<?php echo $id_disciplina_reg ?>"><?php echo $id_disciplina ?></option>

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
