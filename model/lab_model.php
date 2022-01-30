<?php

function login($usuario, $senha, $conexao)
{
    $query = "select * from usuarios_analistas where nome_Anali = '$usuario' and senha_Anali = '$senha'";
    $conect_resultado = mysqli_query($conexao, $query);

    return $conect_resultado;
}

function listaTudoOP($conexao)
{
    $query = "select * from ops order by cod_op desc";
    $resultado = mysqli_query($conexao, $query);
    return ($resultado);
}

function listaTudoMaterial($conexao)
{
    $query = "select * from material";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}
function consultaUltimaOP($conexao)
{
    $query = 'select cod_op from ops order by cod_op desc limit 1';
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}
function ConfereOP($conexao, $cod_op)
{
    if ($cod_op == "") {
        return true;
    } else {
        $query = "select cod_op from ops where cod_op = {$cod_op}";
        $resultado = mysqli_query($conexao, $query);
        if (mysqli_num_rows($resultado) >= 1) {
            return false;
        } else {
            return true;
        }
    }

}
function atualiza_op($conexao, $cod_op, $material, $lote, $moinho, $ultimocodigo)
{
    $query = "update ops SET cod_op = '$cod_op', Lote_op = '$lote', codMaterial = '$material', Maquina = '$moinho' WHERE (cod_op = '$ultimocodigo')";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}

function cad_op($conexao, $cod_op, $material, $lote, $moinho)
{
    if ($cod_op == "") {
        $query = "insert into ops(Lote_op,codMaterial,Maquina) values ('{$lote}', '{$material}','$moinho')";
        $resultado = mysqli_query($conexao, $query);
    } else {
        $query = "insert into ops values ('{$cod_op}','{$lote}', '{$material}','$moinho')";
        $resultado = mysqli_query($conexao, $query);
    }
    return true;
}

function cad_material($conexao, $malha, $minimo, $maximo, $codmaterial, $nomematerial, $contador)
{
    $linhas = mysqli_query($conexao, "select * from material where cod_material='{$codmaterial}'");
    if (mysqli_num_rows($linhas) >= 1) {
        return false;
    } else {
        $query = "insert into material values('{$codmaterial}','{$nomematerial}');";
        $resultado = mysqli_query($conexao, $query);

        for ($max = 0; $max < $contador; $max++) {
            $query = "insert into material_malha(cod_material,numMalha,min_malha,max_malha) values('{$codmaterial}','{$malha[$max]}','{$minimo[$max]}','{$maximo[$max]}');";
            $resultado = mysqli_query($conexao, $query);
        }

        return true;
    }
}
