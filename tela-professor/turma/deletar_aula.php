<?php 
    require_once("../../conexao.php"); 

    $id_aula = $_POST['diaaula'];

    $pdo->query("DELETE FROM aulas WHERE id ='$id_aula'");
    $pdo->query("DELETE FROM chamada WHERE id_aula = '$id_aula'");

    echo 'Deletado!';

?>