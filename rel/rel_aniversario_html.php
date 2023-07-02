<?php 


require_once("../conexao.php"); 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

$turma = $_GET['turma'];
$status = $_GET['status'];

$status_mes = '%'.$status.'%';
$status_turma = '%'.$turma.'%';

if($status == '01'){
	$status_serv = '01';

}else if($status == '02'){
	$status_serv = '02';

}else if($status == '03'){
	$status_serv = '03';

}else if($status == '04'){
	$status_serv = '04';

}else if($status == '05'){
	$status_serv = '05';

}else if($status == '06'){
	$status_serv = '06';

}else if($status == '07'){
	$status_serv = '07';

}else if($status == '08'){
	$status_serv = '08';

}else if($status == '09'){
	$status_serv = '09';

}else if($status == '10'){
	$status_serv = '10';

}else if($status == '11'){
	$status_serv = '11';

}else if($status == '12'){
	$status_serv = '12';

}else{
	$status_serv = '';
}

if($turma == 'turma'){
	$turma_serv = 'turma ';
}else{
	$turma_serv = '';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Aniversariantes</title>
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
    <div class="container">
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
        <h3>RELATÓRIO DE ANIVERSÁRIANTES</h3><br>

        <p class="date"><?php echo  mb_strtoupper($data_hoje); ?></p>

        <?php 
        $query = $pdo->query("SELECT * FROM alunos a LEFT JOIN matriculas m ON m.id_aluno = a.id 
        WHERE a.aniversario LIKE '_____%$status_mes%___' AND m.id_turma LIKE '$status_turma' ");

        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        if (empty($res)) {
            echo ' <table class="table">
                            <th>Aluno</th>
                            <th>Turma</th>
                            <th>Aniversário</th>
                            <th>Idade</th>
            <tr>
              <td colspan="4">
              <h3>Nenhum aniversáriante do mês encontrado!</h3>;
              </td>
              </tr>
              </table>';
                } else {
            echo '<table class="table">
                    <tr>
                        <th>Aluno</th>
                        <th>Turma</th>
                        <th>Aniversário</th>
                        <th>Idade</th>
                    </tr>';

            foreach ($res as $row) {
                $id_aluno = $row['id_aluno'];
                $id_turma = $row['id_turma'];
                $nome_aluno = $row['nomecompleto'];
                $aniversario2 = $row['aniversario'];

                $data_nasc = $aniversario2;
                $data = new DateTime($data_nasc);
                $resultado = $data->diff(new Datetime(date('Y-m-d')));
                $idade = $resultado->format('%Y anos');

                $aniversario2 = implode('/', array_reverse(explode('-', $aniversario2)));

                $query_usu = $pdo->query("SELECT * FROM turmas WHERE id = '$id_turma'");
                $res_usu = $query_usu->fetchAll(PDO::FETCH_ASSOC);
                $nome_turma = $res_usu[0]['turma'];

                echo '<tr>
                        <td>' . $nome_aluno . '</td>
                        <td>' . $nome_turma . '</td>
                        <td>' . $aniversario2 . '</td>
                        <td>' . $idade . '</td>
                    </tr>';
            }

            echo '</table>';
        }
        ?>
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




