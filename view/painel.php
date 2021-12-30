<?php
session_start();
require_once('../control/verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('../view/links.php'); ?>
    <title>Bem vindo, <?php echo $_SESSION['usuario'];
                        $home = ""; ?></title>
</head>

<body>
    <?php
    require_once('../view/nav_bar.php');
    require_once('../model/conexao.php');
    require_once('../model/lab_model.php');

    $ops = listaTudoOP($conexao);
    ?>
    <div class="mb-3 p-5 m-5">
        <?php
        if (mysqli_num_rows($ops) == 0) {
        ?>
            <div class="mb-3 p-5 m-5">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Sem Ordens de Produção Cadastradas "OPs"</h4>
                    <?php
                    if ($_SESSION['nivel'] == 00) {
                    ?>
                        <button class="btn btn-primary">Cadastrar</button>
                </div>
            <?php
                    }
                } else {
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Lóte</th>
                        <th scope="col">Material</th>
                        <th scope="col">Máquina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ops as $op) {
                    ?>
                        <tr>
                            <th scope="row"><?= $op['cod_op'] ?></th>
                            <td><?= $op['Lote_op'] ?></td>
                            <td><?= $op['codMaterial'] ?></td>
                            <td><?= $op['Maquina'] ?></td>
                            <td><button class="btn btn-success">Acessar</button>
                                <?php if ($_SESSION['nivel'] == "00") { ?>
                                    <form action="" method="post">
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    (ADM)Atualizar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Atualizar Ordem de produção : <span class="text text-success"><?= $op['cod_op'] ?></span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../control/atualiza_op.php" method="get">
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Código</label>
                                                        <input type="number" class="form-control" name="cod_op" id="recipient-name" readonly value="<?= $op['cod_op'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Lóte</label>
                                                        <input type="text" class="form-control" id="recipient-name" value="<?= $op['Lote_op'] ?>" size="9" maxlength="9" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Material</label>
                                                        <input type="text" class="form-control" id="recipient-name" value="<?= $op['codMaterial'] ?>" size="3" maxlength="3" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">Máquina</label>
                                                        <input type="text" class="form-control" id="recipient-name" value="<?= $op['Maquina'] ?>" size="2" maxlength="2" required>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    <input type="submit" value="Atualizar" class="btn btn-primary">
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    (ADM)Apagar
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Apagar Ordem de produção!!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente apagar a ordem de produção: <span class="text text-danger"> <?= $op['cod_op'] ?></span>
                                                <p class="text text-danger">Esse processo não tem como ser revertido!! Tenha certeza de sua decisão!!!</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <button class="btn btn-danger">(ADM)Apagar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
                }

        ?>
            </div>

</body>

</html>