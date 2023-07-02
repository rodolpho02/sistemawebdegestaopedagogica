<?php
require_once("../conexao.php"); 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));


$id = $_GET['id'];

$query = $pdo->query("SELECT * FROM alunos WHERE id = '" . $id . "' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$imagem_2 = $res[0]['imagem'];

$nomecompleto_2 = $res[0]['nomecompleto'];


$nomeMaiusculo = strtoupper($nomecompleto_2 );
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

$formattedCpf = substr_replace($cpfresposanvel_2, '.', 3, 0);
$formattedCpf = substr_replace($formattedCpf, '.', 7, 0);
$formattedCpf = substr_replace($formattedCpf, '-', 11, 0);

$converte_data_2 = implode('/', array_reverse(explode('-',$aniversario_2)));



$query_r = $pdo->query("SELECT * FROM responsaveis where cpf = '$cpfresposanvel_2'");
            $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
    
          $imagem_r = $res_r[0]['imagem'];
          $nomeresponsavel_r = $res_r[0]['nomeresponsavel'];
          $nomeMaiusculo_r = strtoupper($nomeresponsavel_r );
          $nomesocial_r = $res_r[0]['nomesocial'];
          $escolaridade_r = $res_r[0]['escolaridade'];
          $profissao_r = $res_r[0]['profissao'];
          $aniversario_r = $res_r[0]['aniversario'];
          $genero_r = $res_r[0]['genero'];
          $rg_r = $res_r[0]['rg'];
          $cpf_r = $res_r[0]['cpf'];
          $telefone_r = $res_r[0]['telefone'];
          $celular_r = $res_r[0]['celular'];
          $email_r = $res_r[0]['email'];
          $nomerecado_r = $res_r[0]['nomerecado'];
          $parentesco_r = $res_r[0]['parentesco'];
          $celular2_r = $res_r[0]['celular2'];
          $cep_r = $res_r[0]['cep'];
          $rua_r = $res_r[0]['rua'];
          $numero_r = $res_r[0]['numero'];
          $complemento_r = $res_r[0]['complemento'];
          $bairro_r = $res_r[0]['bairro'];
          $cidade_r = $res_r[0]['cidade'];
          $estado_r = $res_r[0]['estado'];
          $whatsapp_r = $res_r[0]['whatsapp'];


          $converte_data_3 = implode('/', array_reverse(explode('-',$aniversario_r)));
                 
          $data_nasc_2 = $aniversario_r;
          $data_2 = new DateTime($data_nasc_2);
          $resultado2 = $data_2->diff(new Datetime( date('Y-m-d')));
          $idade_2 = $resultado2->format('%Y anos');



          $cep_2 = "$cep_2"; // Substitua "$cep_2" pelo valor real da sua variável
          $cep_2 = preg_replace('/\D/', '', $cep_2);
          $cep_formatado_r = number_format($cep_2, 0, ',', '.');
        

        $rg_r = preg_replace('/\D/', '', $rg_r);
        $digito = substr($rg_r, -1);
        $numero = substr($rg_r, 0, -1);
        $rg_formatado_r = substr($numero, 0, 2) . '.' . substr($numero, 2, 3) . '.' . substr($numero, 5) . '-' . $digito;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Direito de Imagem para Crianças</title>
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

        p {
        
            text-align: justify;
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

        <p class="date"><?php echo $data_hoje; ?></p>

        <h3>DIREITO DE IMAGEM PARA CRIANÇAS</h3><br>
            <!-- Restante do contrato -->

            <p>Eu, <b> <?php echo $nomeresponsavel_r?> </b>, domiciliado (a) em: <b> <?php echo $rua_r ?> </b> , nº: <b><?php echo $numero_r ?></b>, bairro: <b><?php echo $bairro_r ?></b>, Município: <b><?php echo $cidade_r?>, </b> / Estado: <b><?php echo $estado_r ?></b>, 
            CEP <b><?php echo $cep_formatado_r ?></b>, portador(a) do RG nº <b><?php echo  $rg_formatado_r ?></b> e do CPF nº : <b><?php echo  $formattedCpf ?></b>, com o seguinte telefone para contato <b><?php echo  $celular_r ?></b>,
             mãe / pai / responsável legal de <b> <?php echo $nomecompleto_2 ?> </b>, data de nascimento:<b> <?php echo $converte_data_2 ?></b>, sexo: <b> <?php echo $genero_2 ?></b>, 
            AUTORIZO, a título gratuito e definitivo, o uso da imagem e/ou voz da criança/adolescente, por mim representado, neste ato, para todos os fins em Direito admiti-dos, constantes em fotos, gravações de voz e/ou imagem, documentos, relatórios, entrevistas, e quaisquer outros similares, além de premiações nacionais e internacionais 
            dos projetos/programas promovidos pela <b>ASSOCIAÇÃO JESUS DE NAZARÉ – AJN</b>, a fim de divulgar e/ou promover em qualquer meio de comunicação social, os serviços prestados
            pela referida instituição.<p>

           <p> A<b> ASSOCIAÇÃO JESUS DE NAZARÉ - AJN </b> tem autorização dada por mim para edição e montagem de fotos, gravações de voz e filmagens, reproduzindo-as sempre que entender necessárias,
             desde que sejam respeitados os princípios da Moral e da Ética cristã, condições que, se mantidas, são/serão suficientes para mim e para aquele (a) que represento para não provocar nenhuma espécie de reclamação a título de direitos conexos à imagem ou a qualquer outro.</p>
            <hr>

    </p>

        Por ser expressão da minha vontade, assino, consciente e espontaneamente, o presente documento de <b> AUTORIZAÇÃO </b> em 02 vias de igual teor e forma.<p>
       <br>

        <p>Assinaturas:<br><br></p>

        <p>___________________________________________________________________<br>
        ASSOCIAÇÃO JESUS DE NAZARÉ<br>
        06.279.076/0001-84<p><br>

        <p>___________________________________________________________________<br>
        <?php echo $nomeMaiusculo_r ?> <br>
        <?php echo $formattedCpf ?></p>

        </main>

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