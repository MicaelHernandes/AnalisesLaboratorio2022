<?php
if(isset($_SESSION['usuario'],$_SESSION['id_usuario'])){
    $sessao = "OK";
}else{
    header('Location: ../view/index.php');
}

?>