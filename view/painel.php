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
    if (isset($_SESSION['op_suc'])) {
        ?>
    
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> "OP" foi cadastrada com sucesso!
                <button type="button" class="close btn bnt-primary" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
        <?php
            unset($_SESSION['op_suc']);
        }
    if (isset($_SESSION['material_sucess'])) {
    ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> Material foi cadastrado com sucesso!
            <button type="button" class="close btn bnt-primary" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
        unset($_SESSION['material_sucess']);
    }

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
                                    <td><form action="../view/update_op.php" method="post"><button class="btn btn-primary" value = "<?= $op['cod_op'] ?>" name="cod_op">Atualizar</button></form></td>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <!-- Botão para acionar modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo">
                                        Apagar
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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