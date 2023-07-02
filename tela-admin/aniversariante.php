<?php 
$pag = "aniversariante";
require_once("../conexao.php"); 
@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_user'] == null || @$_SESSION['nivel_user'] != 'admin'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}
           ?>

          <form action="../rel/rel_aniversario.php" method="POST" target="_blank">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <b> Relatório de Aniversáriantes</b></h5>
                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
            </div>

                <div class="modal-body">

                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label >Mês</label>
                            <select class="form-control" name="status" >
                                <option value="">Todos</option>
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option> 
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

            </div>
            <hr>
        </form>