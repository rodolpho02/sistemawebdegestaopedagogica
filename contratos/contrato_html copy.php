<?php
require_once("../conexao.php"); 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));


$id = $_GET['id'];
echo $id;

$query = $pdo->query("SELECT * FROM alunos WHERE id = '" . $id . "' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$imagem_2 = $res[0]['imagem'];
$nomecompleto_2 = $res[0]['nomecompleto'];
$nomesocial_2 = $res[0]['nomesocial'];
$aniversario_2 = $res[0]['aniversario'];
$genero_2 = $res[0]['genero'];
$rg_2 = $res[0]['rg'];
$cpf_2 = $res[0]['cpf'];
$telefone_2 = $res[0]['telefone'];
$celular_2 = $res[0]['celular'];
$email_2 = $res[0]['email'];
$cep_2 = $res[0]['cep'];
$rua_2 = $res[0]['rua'];
$numero_2 = $res[0]['numero'];
$complemento_2 = $res[0]['complemento'];
$bairro_2 = $res[0]['bairro'];
$cidade_2 = $res[0]['cidade'];
$estado_2 = $res[0]['estado'];
$whatsapp_2 = $res[0]['whatsapp'];

$escola_2 =  $res[0]['escola'];
$turmaescolar_2 = $res[0]['turmaescolar'];
$nivelescolar_2 = $res[0]['nivelescolar'];
$anoescolar_2 = $res[0]['anoescolar'];
$certidaonasc_2 = $res[0]['certidaonasc'];
$cpfresposanvel_2 = $res[0]['cpfresponsavel'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contrato Escolar - Associação Jesus de Nazaré</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>

@page {
			margin: 0px;

		}
		
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.areaTotais{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			position:absolute;
			right:20;
		}

		.areaTotal{
			border : 0.5px solid #bcbcbc;
			padding: 15px;
			border-radius: 5px;
			margin-right:25px;
			margin-left:25px;
			background-color: #f9f9f9;
			margin-top:2px;
		}

        @media print {
            .print-button {
                display: none;
            }
            .footer-print {
                display: relative !important;
                page-break-after: always; /* Adiciona quebra de página antes do rodapé ao imprimir */
            page-break-inside: avoid; /* Evita que o rodapé seja dividido em várias páginas */
            }
       
       
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 980px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 10px;
        }

        address {
            font-style: normal;
            margin-top: 10px;
            color: #555;
            text-align: center;
        }

        main {
            margin-bottom: 40px;
            
        }

        h3 {
            color: #555;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
        }

        p {
            color: #333;
            line-height: 1.5;
            margin-bottom: 500px;
            text-align: justify;
        }

        .footer-print {
            display: block;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px; /* Altura do rodapé */
            background-color: #f2f2f2;
            text-align: center;
            padding-top: 15px;
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

        .date {
            text-align: right;
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
        }

        .print-button:hover {
            background-color: #555;
        }

        .signature-container {
            text-align: center;
            margin-top: 30px;
        }

        .responsavel-assinatura {
            margin: 0 auto;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="../img/logo-ajn.jpg" alt="Associação Jesus de Nazaré" width="150">
            <h1>Associação Jesus de Nazaré</h1>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

            <address>
                Endereço: Rua Nabor do Rego, 149 - Ramos - RJ<br>
                Telefone: (21) 3495-4183<br>
                Email: adm.ajn@gmail.com
            </address>
        </header>
        <p class="date"><small><?php echo $data_hoje; ?></small></p>
        <main>
            <h3>CONTRATO DE MATRÍCULA</h3>
            <p>Entre a Associação Jesus de Nazaré, localizada na cidade de <?php echo $cidade_2; ?>, 
            Estado de <?php echo $estado_2; ?>, representada por [nome do representante legal], CPF [CPF do representante legal], doravante denominada "Associação", e o aluno <?php echo $nomecompleto_2; ?>, CPF <?php echo $cpf_2; ?>, doravante denominado "Aluno", fica estabelecido o presente contrato escolar, sujeito às seguintes cláusulas:</p>
         
        <p> Lorem ipsum enim convallis laoreet adipiscing sagittis proin libero curae semper quisque diam, ut sollicitudin eget quis eu torquent dictumst leo in mauris. adipiscing quam non proin libero habitant rutrum lobortis aenean elementum amet, eros pulvinar nam sapien platea faucibus amet sodales placerat, purus tempus cras phasellus sociosqu nullam in maecenas ad. volutpat ac aliquam dictumst torquent ullamcorper viverra mauris pellentesque suspendisse, viverra cursus accumsan cras vivamus ornare nostra placerat, morbi class lectus ante dolor tempor euismod facilisis. blandit justo nullam egestas ornare rhoncus urna, nam mauris adipiscing sem malesuada ornare nullam, placerat nibh ut imperdiet dictumst. 

	Himenaeos arcu id tempor leo dolor tempus potenti fermentum elit, praesent facilisis etiam vestibulum sollicitudin vestibulum fames maecenas rhoncus, ut tellus mattis nunc tincidunt aliquam aenean commodo. lacinia iaculis dolor non bibendum fringilla feugiat risus ullamcorper ligula ultrices, amet enim taciti pulvinar iaculis velit porta rutrum tortor. lacus orci faucibus facilisis torquent varius sollicitudin, ut donec aptent habitant integer mi, rhoncus consequat nec cras quisque. vivamus dapibus facilisis cras aenean purus libero aenean laoreet, fermentum potenti litora sagittis neque et consectetur, sodales etiam gravida fusce justo lacus urna. odio porta hac praesent nisi class ipsum consectetur consequat tempor curabitur commodo, scelerisque aliquam eu vestibulum eget senectus torquent quis quisque maecenas, platea litora egestas aenean laoreet vehicula consectetur massa libero fames. 

	Pulvinar at massa aliquet pharetra mi, semper fringilla porttitor odio curae, aliquam vehicula vulputate torquent. litora hendrerit odio urna vulputate velit ipsum mi habitant vivamus, sit nunc mauris proin turpis viverra curabitur elit, senectus ultrices quisque auctor sodales dolor tortor purus. morbi nunc sit mauris quisque sollicitudin curabitur, tempus fermentum mauris fringilla sem eros purus, phasellus quis sollicitudin elementum lobortis. gravida quisque suscipit pellentesque aptent euismod sed commodo velit aptent dolor, dui quisque pellentesque quam amet cursus metus vitae nostra, sociosqu amet odio curabitur volutpat scelerisque aenean suscipit ipsum. taciti lacus quam dictum amet platea sem lobortis imperdiet, convallis condimentum non pellentesque dapibus lacinia convallis vehicula interdum, potenti velit tempor et cras lacus nunc. 

	Magna hac conubia tincidunt euismod ut eu congue sit sapien luctus taciti auctor, suscipit himenaeos venenatis semper tristique condimentum convallis adipiscing varius augue. est felis id odio blandit posuere volutpat lectus, nisl suscipit etiam aliquam sapien ligula, quisque id magna tristique sem pharetra. neque iaculis justo quisque sollicitudin praesent diam aliquet vel, lorem facilisis primis litora a est facilisis fringilla, consectetur curabitur rutrum volutpat imperdiet mollis sagittis. fusce turpis vehicula aliquet ut tortor amet suspendisse justo eu fames, lobortis praesent in quisque per ut vehicula lobortis mi. justo morbi gravida aptent praesent non cras dui, inceptos aliquam nullam netus aenean posuere, est morbi feugiat commodo aliquam cras. 

	Erat non vitae litora nullam eros sodales fames sodales imperdiet leo egestas sagittis, sit purus diam dictum dolor est aptent justo vulputate velit maecenas, per urna amet sagittis vitae sagittis commodo mi et urna torquent. himenaeos velit iaculis cubilia pellentesque vitae condimentum leo quisque quam, dui blandit senectus pulvinar potenti tempor praesent odio accumsan, augue conubia accumsan ad tristique diam donec gravida. 
    </p> 
            <!-- Restante do contrato -->
            <div class="signature-container">
                <br>
                <p class="responsavel-assinatura">________________________________________________</p>
                <h3 class="responsavel-assinatura">Assinatura do Responsável</h3>
            </div>
        </main>
    </div>

    <div class="footer-print">
        <div class="social-icons">
            <img src="../img/face.png" alt="Facebook">
            Associação Jesus de Nazaré
            <img src="../img/inst.png" alt="Instagram">
            associacaojesusdenazare
        </div>
        
        <img class="logo-ajn" src="../img/logo-ajn.jpg" alt="Associação Jesus de Nazaré">
        wwww.associacaojesusdenazare.org - @Todos os direitos reservados
    </div>

    <button class="print-button" onclick="window.print()">Imprimir</button>
</body>
</html>






