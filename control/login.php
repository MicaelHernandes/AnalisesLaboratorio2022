<?php
require_once('../model/conexao.php');
require_once('../model/lab_model.php');
session_start();

$usuario = $_POST['username'];
$senha = $_POST['password'];

$login = login($usuario,$senha,$conexao);

if(mysqli_num_rows($login) ==0){
    $_SESSION['nao-autenticado'] = "";
    header('Location: ../view/index.php');
    exit();
}else{
    foreach($login as $resultado){
        $_SESSION['id_usuario'] = $resultado['id_anali'];
        $_SESSION['usuario'] = $resultado['nome_Anali'];
        $_SESSION['nivel'] = $resultado['perMissao'];

        header('Location: ../view/painel.php');
        exit();

    }
}


?>