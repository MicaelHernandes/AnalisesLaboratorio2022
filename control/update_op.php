<?php
session_start();
include_once('../model/conexao.php');
include_once('../model/lab_model.php');

$cod_op=$_POST['numeroop'];
$material=$_POST['material'];
$lote=$_POST['lote'];
$moinho=$_POST['moinho'];
$ultimocodigo = $_POST['ultimocodigo'];

$ops = atualiza_op($conexao, $cod_op, $material, $lote, $moinho, $ultimocodigo);

header('Location: ../view/painel.php');