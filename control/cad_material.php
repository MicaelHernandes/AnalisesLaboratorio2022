<?php

include_once('../model/conexao.php');
include_once('../model/lab_model.php');

$contador = $_POST['contador'];
$malha= $_POST['malha'];
$minimo= $_POST['minimo'];
$maximo= $_POST['maximo'];
$codmaterial = $_POST['codmaterial'];
$nomematerial = $_POST['nomematerial'];

$resultado = cad_material($conexao, $malha, $minimo, $maximo, $codmaterial, $nomematerial, $contador);

if($resultado){
    session_start();
    $_SESSION['material_sucess'] = " ";
    header('Location: ../view/painel.php');
    exit();
}else{
    session_start();
    $_SESSION['material_dupli'] = " ";
    header('Location: ../view/cad_material.php');
    exit();
}

