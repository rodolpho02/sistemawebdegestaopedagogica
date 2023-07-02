<?php 

@session_start();
require_once("../conexao.php"); 


    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "home";
    $menu3 = "dias";
 

    $SESSION = @$_SESSION['id_user'];

    $query = $pdo->query("SELECT * FROM user WHERE id = '$SESSION'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $nome_perfil = @$res[0]['nomesocial'];
    $cpf_user = @$res[0]['cpf'];
    $email_perfil = @$res[0]['email'];
    $senha_perfil = @$res[0]['senha'];
    $id_perfil = @$res[0]['id'];

 ?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Associação Jesus de Nazaré">

        <title>Associação Jesus de Nazaré</title>

        <!-- Custom fonts for this template-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/sb-admin-2.css" rel="stylesheet">
       
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


        <!-- Fontawesome JavaScript -->
        <script src="https://kit.fontawesome.com/7e58f571da.js" crossorigin="anonymous"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Icon -->
         <link rel="shortcut icon" href="../img/logo-200.ico" type="image/x-icon">
         <link rel="icon" href="../img/logo-200.ico" type="image/x-icon">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                
                    <div class="sidebar-brand-text mx-3">PROFESSORES</div> 
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider ">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Acesso: <?php echo $nome_perfil ?>
                </div>

                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>Turmas</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header"> Gestão do Professor</h6>


                            <?php 

                                $query = $pdo->query("SELECT * FROM professores where cpf = '$cpf_user' ");
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                $id_prof = $res[0]['id'];
                                $nome_prof = $res[0]['nomesocial'];

                          
                                $query = $pdo->query("SELECT * FROM grades g left join turmas t on t.id = g.id_turma where g.pri_professor = '$id_prof' 
                                or g.seg_professor = '$id_prof' or g.ter_professor = '$id_prof' or
                                g.quar_professor = '$id_prof' GROUP BY id_turma order by t.turma asc ");
                                
                                $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                for ($i=0; $i < count($res); $i++) { 
                                    foreach ($res[$i] as $key => $value) {
                                    }

                                    $id_turma = $res[$i]['id_turma'];

                                    

                                    $query_resp = $pdo->query("SELECT * FROM disciplinas where id_professor = '$id_prof' ");
                                    $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);
                                    

                                    $nome_disc = $res_resp[0]['materia'];


                                    $query_resp = $pdo->query("SELECT * FROM turmas where id = '$id_turma' ");
                                    $res_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);

                                    $nome_turma = $res_resp[0]['turma'];

                    
                            ?>	

                            <a class="collapse-item" href="index.php?pag=turma&id=<?php echo $id_turma?>"> <?php echo $nome_turma?> </a>
                        
                                        <?php }?>
                        </div>
                    </div>
                </li>

  
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Quadro de Horários
                </div>



                <!-- Nav Item - Charts -->
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pag=<?php echo $menu3 ?>">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Quadro de horário </span></a>
                </li>

                <!-- Nav Item - Tables -->
              

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                    

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                    

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <Button class="btn btn-link  text-white" title='Editar Perfil'><?php echo $nome_perfil?></Button>
                                   <img class="img-profile rounded-circle" src="../img/logo-ajn.jpg" width="60" height="60" > 
                            </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"  title='Editar Perfil'>
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#ModalPerfil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                        Editar Perfil
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <?php if (@$pag == null) { 
                        @include_once("home.php"); 
                        
                        } else if (@$pag==$menu3) {
                        @include_once(@$menu3.".php");
               
                        } else if (@$pag=='turma') {
                        @include_once("turma.php");
               
                        } else {
                        @include_once("home.php");
                        }
                        ?>  

                    </div>

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!--  Modal Perfil-->
        <div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <form id="form-teste" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                           <!-- <div class="row">
                               <div class="col-md-6 col-sm-12">  -->
                                    <div class="form-group">
                                        <label >Nome Social</label>
                                        <input value="<?php echo $nome_perfil?>" type="text" class="form-control" id="nome_perfil" name="nome_perfil" placeholder="Nome Social">
                                    </div>

                                    <div class="form-group">
                                        <label >Email</label>
                                        <input value="<?php echo $email_perfil?>" type="email" class="form-control" id="email_perfil" name="email_perfil" placeholder="Email">
                                    </div>

                                    <div class="form-group">
                                        <label >Senha</label>
                                        <input value="<?php echo $senha_perfil?>" type="password" class="form-control" id="senha_perfil" name="senha_perfil" placeholder="Senha">
                                    </div>
                                </div>
                        
                            <small>
                                <div id="mensagem-perfil" class="mr-4">

                                </div>
                            </small>



                           <!--</div>-->
                        <div class="modal-footer">



                            <input value="<?php echo $id_perfil ?>" type="hidden" name="id_perf" id="id_perf">
                            <input value="<?php echo $email_perfil ?>" type="hidden" name="antigo_perfil" id="antigo_perfil">
                   
                            <button type="button" id="btn-fechar-perfil" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="btn-salvar-perfil" id="btn-salvar-perfil" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        


        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="../js/mascaras.js"></script>

        

    </body>


    <!--AJAX PARA INSERÇÃO E EDIÇÃO DOS DADOS COM IMAGEM -->
     <script type="text/javascript">
    $("#form-teste").submit(function () {
       
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url:"editarperfil.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {

                $('#mensagem-perfil').removeClass()

                if (mensagem.trim() == "Enviado com sucesso!") {

                    $('#btn-fechar-perfil').click();
                    window.location = "index.php";

                } else {

                    $('#mensagem-perfil').addClass('text-danger')
                }

                $('#mensagem-perfil').text(mensagem)

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
