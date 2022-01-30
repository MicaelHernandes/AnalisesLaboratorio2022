<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #nomeMaterial{
            text-transform: uppercase;
        }
    </style>
    <script>
        let value = 1;

        function adicionaMalha() {
            let malhas = document.getElementById('material');
            let count = document.getElementById('contador').value = value;
            let contadormalhas = value += 1;
            malhas.innerHTML += ` 
            <div class="row" id="malhas">
            <div class='col-auto'>
                    <label for='exampleFormControlInput1' class='form-label'>#Malha ${contadormalhas}</label>
                    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Ex: 325' maxlength='3' size='3' name='malha[]'>
                </div>
                <div class='col-auto'>
                    <label for='exampleFormControlInput1' class='form-label'>Minimo ${contadormalhas}</label>
                    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Ex: 0,2' maxlength='5' size='5' name='minimo[]'>
                </div>
                <div class='col-auto'>
                    <label for='exampleFormControlInput1' class='form-label'>Maximo ${contadormalhas}</label>
                    <input type='text' class='form-control' id='exampleFormControlInput1' placeholder='Ex: 0,7' maxlength='5' size='5' name='maximo[]'>
                </div></div>`;

        }

        function finaliza() {
            document.getElementById('final').innerHTML += `<input style="visibility: hidden;" value="${value}" id="contador" name="contador">`
        }
    </script>
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
    if (isset($_SESSION['material_dupli'])) {
    ?>
    <div class="p-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Material já cadastrado!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        </div>
    <?php
    }
    unset($_SESSION['material_dupli']);
    ?>
    <div class="mb-3 p-5 m-5">

        <form action="../control/cad_material.php" method="post" class="row g-3">
            <div id="material" class="row">
                <p class="text text-danger">*Antes de prencher, escolha quantas malhas vai adicionar! o sistema limpa os dados quando clicado em <span class="text text-primary">"Adicionar malha"</span>*</p>
                <span><input style="visibility: hidden;" value="" id="contador" name="contador"></span>
                <div class="col-auto" style="text-transform: uppercase;">
                    <label for="exampleFormControlInput1" class="form-label">Codigo Material</label>
                    <input type="text" class="form-control w-30" id="exampleFormControlInput1" placeholder="Ex: 301" maxlength="5" size="5" name="codmaterial">
                </div>
                <div class="col-auto">
                    <label for="exampleFormControlInput1" class="form-label">NOME MATERIAL</label>
                    <input type="text" class="form-control" id="nomeMaterial" placeholder="Ex: ARGILA" name="nomematerial" required>
                </div>
                <div class="row p-1">
                    <span><button class="btn btn-primary" onclick="adicionaMalha()" type="button">Adicionar Malha</button></span>
                </div>
                <div class="row"></div>
                <div class="col-auto">
                    <label for="exampleFormControlInput1" class="form-label">#Malha 1</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 325" maxlength="3" size="3" name="malha[]" required>
                </div>
                <div class="col-auto">
                    <label for="exampleFormControlInput1" class="form-label">Minimo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 0,2" maxlength="5" size="5" name="minimo[]" required>
                </div>
                <div class="col-auto">
                    <label for="exampleFormControlInput1" class="form-label">Maximo</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: 0,7" maxlength="5" size="5" name="maximo[]" required>
                </div>
            </div>
            <div id="final"></div>
            <button class="btn btn-success" name="valor" id="valor" type="submit" onclick="finaliza()">Cadastrar</button>
        </form>

    </div>
</body>

</html>