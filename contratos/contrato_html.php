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



$query_r = $pdo->query("SELECT * FROM responsaveis where cpf = '$cpfresposanvel_2'");
            $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
    
          $imagem_r = $res_r[0]['imagem'];
          $nomeresponsavel_r = $res_r[0]['nomeresponsavel'];
          $nomeMaiusculor_r = strtoupper($nomeresponsavel_r);
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
          
          
           ?>

 <!DOCTYPE html>
<html>
<head>
    <title>Contrado de matrícula para Crianças </title>
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

<h3>CONTRATO DE MATRÍCULA PARA MENORES DE IDADE</h3><br>
<!-- Restante do contrato -->
<p> Entre a <b> ASSOCIAÇÃO JESUS DE NAZARÉ </b> e o Aluno(a):
<b> <?php echo $nomeMaiusculo?></b>, neste ato representado por seu(a) responsável legal,  <b> <?php echo $nomeMaiusculor_r ?> </b>, portador(a) do  <b> CPF:  <?php echo $formattedCpf ?>  </b>, celebram o presente 
Contrato de Matrícula na modalidade gratuita, mediante as seguintes cláusulas e condições:</p>

<p>Cláusula 1: Objeto do Contrato <br>
1.1. A Instituição se compromete a oferecer serviços de reforço escolar ao Aluno, visando auxiliá-lo no desenvolvimento de suas
habilidades e conhecimentos educacionais.  </p>

<p> Cláusula 2: Responsabilidades da Instituição<br>
2.1. A Instituição se compromete a disponibilizar professores qualificados e materiais adequados para as atividades de reforço escolar.<br>
2.2. A Instituição deverá seguir um cronograma de aulas e atividades previamente estabelecido.  </p>

<p>Cláusula 3: Responsabilidades do Aluno<br>
3.1. O Aluno compromete-se a comparecer às aulas regularmente e pontualmente, seguindo as normas e horários estabelecidos pela Instituição.<br>
3.2. O Aluno deverá participar ativamente das atividades propostas, demonstrando empenho e dedicação no processo de aprendizagem.  </p>

<p>Cláusula 4: Rescisão do Contrato<br>
4.1. Em caso de descumprimento de qualquer cláusula deste contrato por parte do Aluno, a Instituição reserva-se o direito de rescindir o contrato.<br>
4.2. O Aluno pode solicitar o cancelamento da matrícula a qualquer momento, sem qualquer ônus ou restrição.</p>

<p>Cláusula 5: Disposições Gerais.<br>
5.1. Este contrato é regido pelas leis vigentes do país.<br>
5.2. Qualquer alteração neste contrato deverá ser feita por escrito e assinada por ambas as partes.</p>

<p>E, por estarem de acordo, as partes assinam o presente contrato em duas vias de igual teor, na presença de duas testemunhas.</p>
       
<hr>
        Por ser expressão da minha vontade, assino, consciente e espontaneamente, o presente documento de <b> AUTORIZAÇÃO </b> em 02 vias de igual teor e forma.<p>
       <br>

        <p><b>Assinaturas:</b><br><br></p>

        <p>___________________________________________________________________<br>
        ASSOCIAÇÃO JESUS DE NAZARÉ<br>
        06.279.076/0001-84<p><br>

        <p>___________________________________________________________________<br>
        <?php echo $nomeMaiusculor_r?> <br>
        <?php echo $formattedCpf ?></p>


        <hr><br><br>

        <p><b>Testemunhas:</b><br><br></p>
        <p>Nome:__________________________________________________________________ </p><br>
        <p>CPF:___________________________________________________________________ </p><br>

        <p>Nome:__________________________________________________________________  </p><br>
        <p>CPF:___________________________________________________________________ </p><br>

    </div>

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
