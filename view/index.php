<?php
 session_start();
 isset($_SESSION['usuario'])?header('Location: ./painel.php'):$pagina = " ";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <title>Laboratorio BM</title>
</head>

<body>
    <div class="container">
        <div class="mb-3 m-5 p-5">
            <h1>Análises Laboratorio 2022</h1>
            <?php 
           
            if(isset($_SESSION['nao-autenticado'])){
            ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    Usuario ou senha invalidos!
                    Tente Novamente ou entre em contato com o TI!
                </div>
            </div>
            <?php 
            }
            unset($_SESSION['nao-autenticado']);
            ?>
            <form action="../control/login.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text"><img src="./img/user.png" alt="user icon" width="15px"></span>
                    <input class="form-control" id="username" name="username" placeholder="Usuario" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><img src="./img/password.png" alt="password icon" width="15px"></span>
                    <input class="form-control" id="password" name="password" placeholder="Senha" required>
                    <span class="input-group-text">
                        <img src="./img/olho.png" width="15px" alt="icon" id="togglePassword">
                    </span>
                </div>
                <button class="btn btn-success">Entrar</button>
            </form>
        </div>
    </div>
</body>
<script src="./js/script.js"></script>

</html>



<?php
/*include_once('nav_bar.php');*/
?>