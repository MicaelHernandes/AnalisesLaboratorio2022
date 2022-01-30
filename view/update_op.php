<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    session_start();
    include_once('../control/verifica_login.php');
    include_once('./links.php');
    include_once('../model/lab_model.php');
    include_once('../model/conexao.php');
    $cod_op = $_POST['cod_op'];
    function DadosOP($conexao, $cod_op)
    {
        $query = "select * from ops where cod_op = '{$cod_op}'";
        $resultado = mysqli_query($conexao, $query);
        return $resultado;
    }
    ?>
    <title>Atualizar "OP"</title>
</head>

<body>

    <?php
    require_once('./nav_bar.php');
    $ops = DadosOP($conexao,$cod_op);
    foreach($ops as $ordem){
    ?>
    <div class="container">
        <h1>Atualizar Ordem de produção "OP"</h1>
        <form action="../control/update_op.php" method="post">
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">Numero OP</label>
                <?php
                $numOps = consultaUltimaOP($conexao);
                if (mysqli_num_rows(consultaUltimaOP($conexao)) == 0) {
                ?>
                    <input type="text" class="form-control w-20" id="exampleFormControlInput1" placeholder="Ex: 2000" size="5" maxlength="5" name="numeroop">
                    <p class="text text-danger">Nenhuma op ainda foi registrada!</p>
                <?php

                } else {
                    foreach ($numOps as $op)
                ?>
                    <input type="text" class="form-control w-20" id="numeroop" placeholder="Ex: 2000" size="5" maxlength="5" value="<?= $ordem['cod_op']?>" name="numeroop">
                    <p class="text text-success">Ultimo registro de "OP" foi: <span class="text text-danger"><?= $op['cod_op'] ?></span></p>
                <?php
                }
                ?>


                <label for="exampleFormControlInput1">Material</label>
                <select class="form-select" aria-label="Default select example" name="material" required>
                    <option value="<?= $ordem['codMaterial']?> selected"><?= $ordem['codMaterial']?></option>
                    <?php
                    $dados = listaTudoMaterial($conexao);
                    if (mysqli_num_rows($dados) >= 1) {
                        foreach ($dados as $material) {
                    ?>
                            <option value="<?= $material['cod_material'] ?>"><?= $material['cod_material'] ?></option>
                        <?php
                        }
                    } else {
                        ?>
                        <script>
                            window.alert("Nenhum material cadastrado!! Cadastrar Material antes de uma 'OP'");
                            window.location = "../view/cad_material.php";
                        </script>
                    <?php
                    }
                    ?>
                </select>
                <label for="exampleFormControlInput1">Lote</label>
                <input type="text" name="lote" class="form-control w-20" id="exampleFormControlInput1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ex: 100220127" required value="<?= $ordem['Lote_op']?>">
                <label for="exampleFormControlInput1">Moinho</label>
                <input type="text" name="moinho" class="form-control w-20" id="exampleFormControlInput1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ex: 08" maxlength="2" required value="<?= $ordem['Maquina']?>">
            </div>
            <?php
    }
    ?>
    <div class="col">
        <button class="btn btn-primary" value="<?= $ordem['cod_op']?>" name="ultimocodigo">Atualizar</button>
    </div>
    </form>
    </div>
</body>

</html>