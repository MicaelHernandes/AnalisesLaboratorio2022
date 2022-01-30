<!-- Começo do Menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../view/painel.php">Laboratorio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($home) == false) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../view/painel.php">inicio</a>
                    </li>
                <?php
                }
                if ($_SESSION['nivel'] == "00" || $_SESSION['nivel'] == "3") { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">(ADM)Listar Análises</a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastrar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Análise</a></li>
                        <?php if ($_SESSION['nivel'] == "00") { ?>
                            <li><a class="dropdown-item" href="./cad_material.php">(ADM) "Material"</a></li>
                            <li><a class="dropdown-item" href="./cad_op.php">(ADM) "OP"</a></li>
                            <li><a class="dropdown-item" href="#">(ADM) Usuario</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text text-danger" href="../control/sair.php">Sair</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="OP/Material/Lote" aria-label="OP/Material/Lote">
                <button class="btn btn-outline-success" type="submit">Procurar</button>
            </form>
        </div>
    </div>
</nav>
<!-- Fim do Menu -->