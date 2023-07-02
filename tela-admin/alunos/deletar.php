<?php 
require_once("../../conexao.php"); 


    $id = $_POST['id'];

    $query = $pdo->query("SELECT * FROM alunos WHERE id = '$id'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

        $id2 = $res[0]['id'];
    
        $query_id = $pdo->query("SELECT * FROM matriculas WHERE id_aluno = '$id2'");
        $res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);
    
        if (!empty($res_id)) {


            $aluno_nome = $res[0]['nomecompleto']; // Obtém o nome do aluno

            echo 'Não é possível deletar o aluno(a) ' . $aluno_nome . ', 
            porque ele(a) está matriculado(a) em uma turma!';
            
            exit();

        } else {
        
            $pdo->query("DELETE FROM alunos WHERE id = '$id'");
            
            echo 'Deletado!';
        }
    
?>