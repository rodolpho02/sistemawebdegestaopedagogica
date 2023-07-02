<?php 
require_once("../conexao.php"); 
@session_start();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = strtoupper(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ficha do Responsável</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        /* Estilos para a ficha do aluno */
       
       
        @page {
            margin-top: 20px;
			margin-bottom: 20px;
			
		}

        @media print {
            .print-button {
                display: none;
            }
           
        }

        .content-wrapper {
            margin-top: 50px;
            margin-bottom: 200px;
    }
        
        .ficha-aluno {
        width: 595px;
        height: 842px;
        margin: 0 auto;
        border: none;
        }



        .ficha-aluno table {
            width: 100%;
        }

        .ficha-aluno th,
        .ficha-aluno td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .ficha-aluno th {
            background-color: #f2f2f2;
        }



      

        .conteiner-principal {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    margin-bottom: 0px;
}

.conteiner1 {
    width: 25%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 0px;
}

.conteiner {
    width: 75%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 0px;
}

.logo img {
    width: 100px;
    border-radius: 50%;
    border: 2px solid #333;
    text-align: center;
    flex: 3;
}

.foto img {
            
            width: 120px;
            height: 140px;
            border: 1px solid #ccc;
            margin-bottom: -20px;
            flex: 1;
        }
   

        
        body {
            font-family: Arial, sans-serif;
            margin-bottom: 50px;
        }


         .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
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

        table {
        margin-top: 20px; /* Espaçamento superior desejado */
        }

       .date {
            font-size: 12px;
            text-align: right;
            margin-bottom: 10px;
        }

        
        address {
            font-style: normal;
            margin-top: 8px;
            color: #555;
            text-align: center;
            display: Flex;
        }

      

    </style>
</head>
<body>
<div class="content-wrapper">
    <?php
    $id = $_GET['id'];
    $query = $pdo->query("SELECT * FROM responsaveis where id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($res); $i++) { 
        foreach ($res[$i] as $key => $value) {
        }

        $imagem = $res[$i]['imagem'];
        $nomeresponsavel = $res[$i]['nomeresponsavel'];
        $nomesocial = $res[$i]['nomesocial'];
        $escolaridade = $res[$i]['escolaridade'];
        $profissao = $res[$i]['profissao'];
        $aniversario = $res[$i]['aniversario'];
        $genero = $res[$i]['genero'];
        $rg = $res[$i]['rg'];
        $cpf = $res[$i]['cpf'];
        $telefone = $res[$i]['telefone'];
        $celular = $res[$i]['celular'];
        $email = $res[$i]['email'];

        $nomerecado = $res[$i]['nomerecado'];
        $parentesco = $res[$i]['parentesco'];
        $celular2 = $res[$i]['celular2'];

        $cep = $res[$i]['cep'];
        $rua = $res[$i]['rua'];
        $numero = $res[$i]['numero'];
        $complemento = $res[$i]['complemento'];
        $bairro = $res[$i]['bairro'];
        $cidade = $res[$i]['cidade'];
        $estado = $res[$i]['estado'];
        $whatsapp = $res[$i]['whatsapp'];


        $telefone_sem_simbolos = preg_replace('/[^0-9]/', '', $telefone);
        $telefone_formatado = '(' . substr($telefone_sem_simbolos, 0, 2) . ') ' . substr( $telefone_sem_simbolos, 2, 4) . '-' . substr( $telefone_sem_simbolos, 6);
        
        $celular_sem_simbolos2 = preg_replace('/[^0-9]/', '', $celular2);

        if (strlen($celular_sem_simbolos2) === 11) {
            $celular_formatado2 = '(' . substr($celular_sem_simbolos2, 0, 2) . ') ' . substr($celular_sem_simbolos2, 2, 5) . '-' . substr($celular_sem_simbolos2, 7);
        } elseif (strlen($celular_sem_simbolos2) === 10) {
            $celular_formatado2 = '(' . substr($celular_sem_simbolos2, 0, 2) . ') ' . substr($celular_sem_simbolos2, 2, 4) . '-' . substr($celular_sem_simbolos2, 6);
        } else {
            $celular_formatado2 = '() -';
            
        }
                
        $celular_sem_simbolos = preg_replace('/[^0-9]/', '', $celular);
        $celular_formatado = '(' . substr($celular_sem_simbolos, 0, 2) . ') ' . substr($celular_sem_simbolos, 2, 5) . '-' . substr($celular_sem_simbolos, 7);


        $whatsapp_sem_simbolos = preg_replace('/[^0-9]/', '', $whatsapp);
        $whatsapp_formatado = '(' . substr($whatsapp_sem_simbolos, 0, 2) . ') ' . substr($whatsapp_sem_simbolos, 2, 5) . '-' . substr($whatsapp_sem_simbolos, 7);

        $rg_sem_simbolo = preg_replace('/[^0-9]/', '', $rg);
        $rg_formatado = substr($rg, 0, 2) . '.' . substr($rg_sem_simbolo, 2, 3) . '.' . substr($rg_sem_simbolo, 5, 3) . '-' . substr($rg_sem_simbolo, 8);

        $cpf_formatado_resp = substr_replace($cpf, '.', 3, 0);
        $cpf_formatado_resp  = substr_replace($cpf_formatado_resp , '.', 7, 0);
        $cpf_formatado_resp  = substr_replace($cpf_formatado_resp , '-', 11, 0);


        $aniversario = $res[$i]['aniversario'];
        $aniversario_formatado = date('d/m/Y', strtotime($aniversario));

    ?>

    <div class="ficha-aluno">
        <div class="conteiner-principal">
            <div class="conteiner1">
            <div class="foto" >
                <?php if ($imagem) { ?>
                    <img src="../img/responsaveis/<?php echo $imagem;?>" alt="Foto do Aluno">
                <?php } ?>
                </div>
            </div>
            <div class="conteiner">
                <div class="logo">
                    <img src="../img/logo-ajn.jpg" alt="Associação Jesus de Nazaré">
                </div>
                <div class="logo-text">
                    <h3>Associação Jesus de Nazaré</h3>
                    <address>
                        Endereço: Rua Nabor do Rego, 149 - Ramos - RJ<br>
                        Telefone: (21) 3495-4183<br>
                        Email: adm.ajn@gmail.com
                    </address>
                </div>

            </div>
        </div>
 
        <p class="date"><?php echo  mb_strtoupper($data_hoje); ?></p>
        <table>
            <tr>
                <th colspan="2" style="text-align: center; text-transform: uppercase;">Ficha do Aluno</th>
            </tr>
            <tr>
                <td colspan="2">Nome: <?php echo $nomeresponsavel; ?></td>
            </tr>
            <th colspan="2">Informações Pessoais</th>
            <tr>
                
                <td>Aniversário: <?php echo $aniversario_formatado; ?></td>
                <td>Gênero: <?php echo $genero; ?></td>
            </tr>
            <tr>
                <td>CPF: <?php echo $cpf_formatado_resp ?></td>
                <td>RG: <?php echo $rg_formatado; ?></td>
            </tr>
            <tr>
                <td>Celular: <?php echo $celular_formatado; ?></td>
                <td>Telefone: <?php echo $telefone_formatado; ?></td>
            </tr>
            <tr>
                <td>WhatsApp: <?php echo $whatsapp_formatado; ?></td>
                <td>Email: <?php echo $email; ?></td>
            </tr>
            <tr>
                <td>Profissão: <?php echo $profissao; ?></td>
                <td>Escolaridade: <?php echo $escolaridade; ?></td>
            </tr>
            <tr>
                <th colspan="2">Endereço</th>
            </tr>
            <tr>
                <td>CEP: <?php echo $cep; ?></td>
                <td>Rua: <?php echo $rua; ?></td>
            </tr>
            <tr>
                <td>Número: <?php echo $numero; ?></td>
                <td>Complemento: <?php echo $complemento; ?></td>
            </tr>
            <tr>
                <td>Bairro: <?php echo $bairro; ?></td>
                <td>Cidade: <?php echo $cidade; ?></td>
            </tr>
            <tr>
                <td colspan="2">Estado: <?php echo $estado; ?></td>
            </tr>
            <tr>
                <th colspan="2">Contato para Recado</th>
            </tr>
            <tr>
                <td>Nome: <?php echo $nomerecado; ?></td>
                <td>Parentesco: <?php echo  $parentesco ?></td>
            </tr>  
            <tr>
                <td colspan="2">Contato: <?php echo $celular_formatado2 ?></td>
                
            </tr>
        </table>
    </div>

    <button class="print-button" onclick="window.print()">Imprimir</button>


    <?php } ?>
  </div>
</body>
</html>
