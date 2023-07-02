<?php 
require_once("../conexao.php"); 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));


$diast = $_GET['id'];
$query = $pdo->query("SELECT * FROM dias where id = '" .$diast. "' ");
$res_2 = $query->fetchAll(PDO::FETCH_ASSOC);

$turno_2  = $res_2[0]['turno'];
$dia_2 = $res_2[0]['dia'];



?> 

<!DOCTYPE html>
<html>
<head>
    <title>Quadro de Horário</title>
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

        <h3>QUADRO DE HORÁRIO <?php echo mb_strtoupper($dia_2); ?> / <?php echo mb_strtoupper($turno_2); ?> </h3><br>

        <p class="date"><?php echo  mb_strtoupper($data_hoje); ?></p>
        
                    <table class='table .table-print' width='100%'  cellspacing='0' cellpadding='3'>            
                               <tr>
                                    <th>Turma</th>
                                    <th>Primeiro Tempo</th>
                                    <th>Segundo Tempo</th>
                                    <th>Terceiro Tempo</th>
                                    <th>Quarto Tempo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = $pdo->query("SELECT * FROM grades where id_dia = '$_GET[id]' ");
                                    $res = $query->fetchAll(PDO::FETCH_ASSOC);
                                    if(empty($res)){
                                        ?>
                                        <tr>
                                            <td colspan="5">	
                                                <div align="center">
                                                    <h5>Quadro de horário Vazio!</h5>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    } else {
                                        for ($i=0; $i < count($res); $i++) { 
                                            foreach ($res[$i] as $key => $value) {
                                            }
                                            $turma = $res[$i]['id_turma'];
                                            $primeiro_tempo = $res[$i]['primeiro_tempo'];
                                            $segundo_tempo = $res[$i]['segundo_tempo'];
                                            $terceiro_tempo = $res[$i]['terceiro_tempo'];
                                            $quarto_tempo = $res[$i]['quarto_tempo'];
                                            $id = $res[$i]['id']; 
                                            $dia = $res[$i]['id_dia'];
                                            $pri_professor = $res[$i]['pri_professor'];
                                            $seg_professor = $res[$i]['seg_professor'];
                                            $ter_professor = $res[$i]['ter_professor'];
                                            $quar_professor = $res[$i]['quar_professor'];
                                            
                                            $query_p = $pdo->query("SELECT * FROM disciplinas where id = '$primeiro_tempo' ");
                                            $res_p = $query_p->fetchAll(PDO::FETCH_ASSOC);
                                            $materia_p = $res_p[0]['materia'];
                                            
                                            $query_s = $pdo->query("SELECT * FROM disciplinas where id = '$segundo_tempo' ");
                                            $res_s = $query_s->fetchAll(PDO::FETCH_ASSOC);
                                            $materia_s = $res_s[0]['materia'];
                    
                                            $query_t = $pdo->query("SELECT * FROM disciplinas where id = '$terceiro_tempo' ");
                                            $res_t = $query_t->fetchAll(PDO::FETCH_ASSOC);
                                            $materia_t = $res_t[0]['materia'];
                    
                                            $query_q = $pdo->query("SELECT * FROM disciplinas where id = '$quarto_tempo' ");
                                            $res_q = $query_q->fetchAll(PDO::FETCH_ASSOC);
                                            $materia_q = $res_q[0]['materia'];
                    
                                            $query_q = $pdo->query("SELECT * FROM turmas where id = '$turma ' ");
                                            $res_q = $query_q->fetchAll(PDO::FETCH_ASSOC);
                                            $turma_q = $res_q[0]['turma'];
                                ?>
                                <tr>
                                    <td><?php echo $turma_q ?></td> 
                                    <td><?php echo $materia_p ?></td>
                                    <td><?php echo $materia_s ?></td>
                                    <td><?php echo $materia_t?></td>
                                    <td><?php echo $materia_q ?></td> 
                                </tr>
                                <?php }} ?>
              
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



