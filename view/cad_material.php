<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    session_start();
    include_once('../control/verifica_login.php');
    include_once('./links.php');
    ?>
    <title>Cadastrar Material</title>
</head>

<body>
    <?php
    include_once('./nav_bar.php');
    ?>
    <div class="mb-3 p-5 m-5">
        <form action="" method="post" class="row g-3">
            <div class="row">
                <label for="exampleFormControlInput1" class="form-label">Codigo Material</label>
                <input type="text" class="form-control w-30" id="exampleFormControlInput1" placeholder="Ex: 301" maxlength="3" size="3">
            </div>
            <div class="col-auto">
                <label for="exampleFormControlInput1" class="form-label">Malha</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 325" maxlength="3" size="3">
            </div>
            <div class="col-auto">
                <label for="exampleFormControlInput1" class="form-label">Minimo</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 0,2" maxlength="5" size="5">
            </div>
            <div class="col-auto">
                <label for="exampleFormControlInput1" class="form-label">Maximo</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 0,7" maxlength="5" size="5">
            </div>
            <div class="row p-1">
                <span><button class="btn btn-primary" onclick="adiciona_malha()">Adicionar Malha</button></span>
            </div>
        </form>
    </div>
</body>
<script src="./js/malhas.js"></script>
</html>