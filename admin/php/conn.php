<?php 

    try {
        $conexao = new pdo('mysql:host=localhost; dbname=agendamento', 'root', '');

    }catch (PDOException $e) {
        
        echo $e->getMessage();

    }

?>