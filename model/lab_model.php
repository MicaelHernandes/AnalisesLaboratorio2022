<?php

function login($usuario,$senha,$conexao){
    $query = "select * from usuarios_analistas where nome_Anali = '$usuario' and senha_Anali = '$senha'";
    $conect_resultado = mysqli_query($conexao,$query);
    
    return $conect_resultado;
}

function listaTudoOP($conexao){
    $query = "select * from ops order by cod_op desc";
    $resultado = mysqli_query($conexao,$query);
    return($resultado);
}

?>