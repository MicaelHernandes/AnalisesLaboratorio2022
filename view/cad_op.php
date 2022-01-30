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
    ?>
    <title>Cadastrar "OP"</title>
</head>

<body>

    <?php
    if (isset($_SESSION['op_dupli'])) {
    ?>

        <script>
            window.alert("Código da op já esta cadastrado!! Favor usar código valido!!")
        </script>

    <?php
        unset($_SESSION['op_dupli']);
    }
    require_once('./nav_bar.php');
    ?>
    <div class="container">
        <h1>Cadastrar Ordem de produção "OP"</h1>
        <form action="../control/cad_op.php" method="post">
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
                    <input type="text" class="form-control w-20" id="numeroop" placeholder="Ex: 2000" size="5" maxlength="5" value="<?= $op['cod_op'] + 1 ?>" name="numeroop">
                    <p class="text text-success">Ultimo registro de "OP" foi: <span class="text text-danger"><?= $op['cod_op'] ?></span></p>
                <?php
                }
                ?>


                <label for="exampleFormControlInput1">Material</label>
                <select class="form-select" aria-label="Default select example" name="material" required>
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
                <input type="text" name="lote" class="form-control w-20" id="exampleFormControlInput1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ex: 100220127" required>
                <label for="exampleFormControlInput1">Moinho</label>
                <input type="text" name="moinho" class="form-control w-20" id="exampleFormControlInput1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Ex: 08" maxlength="2" required>
            </div>
            <div class="col">
                <button class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>