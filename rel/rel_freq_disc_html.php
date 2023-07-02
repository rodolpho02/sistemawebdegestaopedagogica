<?php 
require_once("../conexao.php"); 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];
$status = $_GET['status'];
$materia = $_GET['materia'];
$turma = $_GET['turma'];
$aluno = $_GET['aluno'];

$status_like = '%'.$status.'%';
$status_materia = '%'.$materia.'%';
$status_turma = '%'.$turma.'%';
$status_aluno = '%'.$aluno.'%';

$dataInicialF = implode('/', array_reverse(explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(explode('-', $dataFinal)));



if($status == 'Presenca'){
	$status_serv = 'Presenca ';
}else if($status == 'Falta'){
	$status_serv = 'Falta';

}else{
	$status_serv = '';
}


if($aluno == 'aluno'){
	$aluno_serv = 'aluno ';
}else{
	$aluno_serv = '';
}

if($materia == 'materia'){
	$materia_serv = 'materia ';
}else{
	$materia_serv = '';
}

if($turma == 'turma'){
	$turma_serv = 'turma ';
}else{
	$turma_serv = '';
}



if($dataInicial != $dataFinal){
	$apuracao = $dataInicialF. ' até '. $dataFinalF;
}else{
	$apuracao = $dataInicialF;
}


?> <!DOCTYPE html>
<html>
<head>
    <title>Relatório de Frequência</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>

@page {
            margin-top: 30px;
			margin-bottom: 30px;
			
		}


        @media print {
            .print-button {
                display: none;
            }
           
        }
    

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            margin-bottom: 50px;
            padding: 0;
        }

        .container {
            margin-top:20px;
           
        }

        .logo {
            margin-bottom: 20px;
            text-align: center;
        }

        .logo img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
            max-width: 100px;
            border-radius: 50%;
            border: 2px solid #333;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .date {
            font-size: 12px;
            text-align: right;
            margin-bottom: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }


        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: left;
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 10px;
        }

        .empty-result {
            text-align: center;
            font-size: 16px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        

        .footer { 
           
            
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px; /* Altura do rodapé */
            background-color: #f2f2f2;
            text-align: center;
            
            font-size: 14px;
            color: #888;
            border-top: 1px solid #ccc;
            
       }   

        .social-icons {
            margin-top: 20px;
            text-align: center;
        }

        .social-icons img {
            width: 20px;
            height: 20px;
            margin: 0 5px;
            vertical-align: middle;
        }

        .logo-ajn {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            vertical-align: middle;
        }

        .print-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            z-index: 100;
        }

        .print-button:hover {
            background-color: #555;
        }


       


        address {
            font-style: normal;
            margin-top: 10px;
            color: #555;
            text-align: center;
        }

        h3 {
            color: #555;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
        }

      
    </style>
</head>

<body>
    <div class="container report-page">
        <div class="logo">
            <img src="../img/logo-ajn.jpg" alt="Associação Jesus de Nazaré" width="150">
            <h1>Associação Jesus de Nazaré</h1>
            <address>
                Endereço: Rua Nabor do Rego, 149 - Ramos - RJ<br>
                Telefone: (21) 3495-4183<br>
                Email: adm.ajn@gmail.com
            </address>
        </div>
        <hr>
        <h3>RELATÓRIO DE FREQUÊNCIA</h3><br>

        <p class="date"><?php echo  mb_strtoupper($data_hoje); ?></p>
        
        <table class='table .table-print' width='100%'  cellspacing='0' cellpadding='3'>
            <tr>
                <th>Aluno</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Aula</th>
                <th>Status</th>
            </tr>
            <?php 
                $query = $pdo->query("SELECT * FROM chamada c left join aulas a on a.id = c.id_aula 
                where c.datachamada between '$dataInicial' and '$dataFinal' and a.id_disciplina LIKE '$status_materia' 
                and c.presenca LIKE '$status_like' and c.id_turma LIKE '$status_turma' and c.id_aluno LIKE '$status_aluno'");

                $res = $query->fetchAll(PDO::FETCH_ASSOC);

                if (empty($res)) {
                    ?>
                    <tr>
                        <td colspan="5">	
                            <h3>Não há dados para esta consulta!</h3>
                        </td>
                    </tr>
                    <?php	   
                } else {
                    foreach ($res as $row) {
                        $id_aluno = $row['id_aluno'];
                        $id_turma = $row['id_turma'];
                        $datachamada = $row['datachamada'];
                        $presenca = $row['presenca'];
                        $id_disciplina = $row['id_disciplina'];

                        $datachamada2 = implode('/', array_reverse(explode('-', $datachamada)));

                        $query_usu = $pdo->query("SELECT * FROM alunos where id = '$id_aluno'");
                        $res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
                        $nome_aluno = $res_usu[0]['nomecompleto'];

                        $query_usu = $pdo->query("SELECT * FROM turmas where id = '$id_turma'");
                        $res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
                        $nome_turma = $res_usu[0]['turma'];

                        $query_usu = $pdo->query("SELECT * FROM disciplinas where id = '$id_disciplina'");
                        $res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
                        $nome_materia = $res_usu[0]['materia'];
                        ?>

                        <tr>
                            <td><?php echo $nome_aluno ?></td>
                            <td><?php echo $nome_turma ?></td>
                            <td><?php echo $nome_materia ?></td>
                            <td><?php echo $datachamada2 ?></td>
                            <td><?php echo $presenca ?></td>
                        </tr>
                        <?php
                    }
                }
            ?>

        </table>
    </div>





    <!--<div class="footer">
        <div class="social-icons">
            <img src="../img/face.png" alt="Facebook">
            Associação Jesus de Nazaré
            <img src="../img/inst.png" alt="Instagram">
            associacaojesusdenazare
        </div>
        
        <img class="logo-ajn" src="../img/logo-ajn.jpg" alt="Associação Jesus de Nazaré">
        www.associacaojesusdenazare.org - © Todos os direitos reservados
    </div>--><hr>

    <button class="print-button" onclick="window.print()">Imprimir</button>
</body>
</html>

