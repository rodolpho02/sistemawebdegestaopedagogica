<?php 
@session_start();
require_once("../conexao.php");

    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "funcionarios";
    $menu2 = "professores";
    $menu3 = "alunos";
    $menu4 = "responsaveis";
    $menu5 = "turmas";
   // $menu6 = "salas";
    $menu7 = "disciplinas";
    $menu8= "dias";
    $menu9 = "frequencia";
    $menu10 = "aniversariante";
    $menu11 = "matriculados";


$SESSION = @$_SESSION['id_user'];

$query = $pdo->query("SELECT * FROM user WHERE id = '$SESSION'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_perfil = @$res[0]['nomesocial'];
$cpf_perfil = @$res[0]['cpf'];
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
                
                    <div class="sidebar-brand-text mx-3">Secretária</div> 
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider ">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Gestão de Pessoas
                </div>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-users"></i>
                        <span>Colaboradores</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Cadastro:</h6>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu1 ?>">Colaboradores</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu2 ?>">Professores</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                     <i class="fas fa-home"></i>
                     <span>Alunos</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Cadastro:</h6>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu3?>">Alunos</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu4 ?>">Responsáveis</a>

                        </div>
                    </div>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Gestão de Turmas
                </div>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span>  Planejamento</span>
                    </a>
                    <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Cadastrar:</h6>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu5 ?>">Turmas</a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu7 ?>">Disciplinas</a>
                        </div>
                    </div>
                </li>

                

                <!-- Divider -->
                <hr class="sidebar-divider">



                <!-- Heading -->
                <div class="sidebar-heading">
                    Gestão de Relatórios
                </div>



                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users"></i>
                    <span> Relatório</span>
                    </a>
                    <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Gerar:</h6>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu9 ?>">Frequêcia </a>
                            <a class="collapse-item" href="index.php?pag=<?php echo $menu10 ?>">Aniversáriantes</a>
                        </div>
                    </div>
                </li>

                

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Gestão de Horário
                </div>



                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pag=<?php echo $menu8 ?>">
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
                        
                        } else if (@$pag==$menu1) {
                        @include_once(@$menu1.".php");
                        
                        } else if (@$pag==$menu2) {
                        @include_once(@$menu2.".php");

                         } else if (@$pag==$menu3) {
                        include_once(@$menu3.".php");

                        } else if (@$pag==$menu4) {
                        @include_once(@$menu4.".php");

                        } else if (@$pag==$menu5) {
                        @include_once(@$menu5.".php");

                        } else if (@$pag==$menu7) {
                        @include_once(@$menu7.".php");

                        } else if (@$pag==$menu8) {
                        @include_once(@$menu8.".php"); 

                        } else if (@$pag==$menu9) {
                        @include_once(@$menu9.".php");

                        } else if (@$pag==$menu10) {
                        @include_once(@$menu10.".php"); 

                         } else if (@$pag==$menu11) {
                        @include_once(@$menu11.".php"); 

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
</html>