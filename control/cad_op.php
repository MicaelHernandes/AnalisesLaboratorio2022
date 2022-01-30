<?php
session_start();
include_once('../model/conexao.php');
include_once('../model/lab_model.php');

$cod_op=$_POST['numeroop'];
$material=$_POST['material'];
$lote=$_POST['lote'];
$moinho=$_POST['moinho'];

if(ConfereOP($conexao,$cod_op)){
    $cad = cad_op($conexao, $cod_op, $material, $lote, $moinho);
    $_SESSION['op_suc'] = "";
    header('Location: ../view/painel.php');
    exit();
}else{
    $_SESSION['op_dupli'] = " ";
    header('Location: ../view/cad_op.php');
    exit();
}