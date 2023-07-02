<?php 
$pag = "disciplinas";
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
    		<li class="active"> <i class="fa-solid fa-pencil"></i> - PÁGINA/DISCIPLINAS </li>
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
                        <th>Disciplinas</th>
                        <th>Professor</th>
                        <th>Funções</th>
                    </tr>
                </thead>

                <tbody>

                   <?php 
                    
                   $query = $pdo->query("SELECT * FROM disciplinas order by id desc ");
                   $res = $query->fetchAll(PDO::FETCH_ASSOC);

                   for ($i=0; $i < count($res); $i++) { 
                      foreach ($res[$i] as $key => $value) {
                      }
                      
                    $materia = $res[$i]['materia'];
                    $id_professor = $res[$i]['id_professor'];
                    $obs = $res[$i]['obs'];
                    $id = $res[$i]['id'];                 

                   ?>
                        <?php 
                        $query_p = $pdo->query("SELECT * FROM professores where id = '$id_professor' ");
                        $res_p = $query_p->fetchAll(PDO::FETCH_ASSOC);
                        $id_prof = $res_p[0]['nomesocial'];
                        ?>
                    <tr>

                        <td><?php echo $materia ?></td>
                        <td><?php echo $id_prof ?></td>                      
    
                        <td>
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



<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php 
                if (@$_GET['funcao'] == 'editar') {
                    $titulo = "Editar Disciplina";
                    $id2 = $_GET['id'];
                    $id3 = $_GET['id'];

                    $query = $pdo->query("SELECT * FROM disciplinas where id = '" . $id2 . "' ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    $materias_2 = $res[0]['materia'];
                    $id_professor_2 = $res[0]['id_professor'];
                    $obs_2  = $res[0]['obs'];
                    $id_2 = $res[0]['id'];


                } else {
                    $titulo = "Inserir Disciplina";

                }
                

                ?>

                
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo ?></h5>
                <a type="button" class="close" href="index.php?pag=<?php echo $pag ?>">
                <span aria-hidden="true">&times;</span></a>

            </div>
            <form id="form" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label >Disciplina</label>
                        <input value="<?php echo @$materias_2 ?>" type="text" class="form-control" id="materia" name="materia" placeholder="Ex: Matématica ">
                    </div>

                    <div class="form-group">
                        <label >Professores</label>
                        <select name="id_professor" class="form-control" id="id_professor">
                        <?php 
                                $query = $pdo->query("SELECT * FROM professores order by id asc ");
                                $res_r = $query->fetchAll(PDO::FETCH_ASSOC);

                                for ($i=0; $i < @count($res_r); $i++) { 
                                    foreach ($res_r[$i] as $key => $value) {
                                    }
                                    $id_professor_reg = $res_r[$i]['id'];
                                    $professor_reg = $res_r[$i]['nomesocial'];
                                    
                                    ?>									
                                    <option <?php if(@$id_professor_2 == $id_professor_reg){ ?> selected <?php } ?> 
                                    value="<?php echo $id_professor_reg ?>"><?php echo $professor_reg ?></option>

                                <?php } ?>
					    </select>
                        
                    </div>

            <small>
                <div id="mensagem">

                </div>
            </small> 

        </div>

           <div class="modal-footer">

                <input value="<?php echo @$_GET['id'] ?>" type="hidden" name="txtid2" id="txtid2">
                <input value="<?php echo @$materias_2 ?>" type="hidden" name="antigo" id="antigo">
                <input value="<?php echo @$id_professor_2 ?>" type="hidden" name="antigo2" id="antigo2">

                
                <a type="button" class="btn btn-secondary" href="index.php?pag=<?php echo $pag ?>" >Cancelar</a>
                <button type="submit" name="btn-salvar" id="btn-salvar" class="btn btn-primary">Salvar</button>

             </div>

        </form>
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



