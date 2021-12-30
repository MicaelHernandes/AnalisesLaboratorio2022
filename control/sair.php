<?php 

session_start();

unset($_SESSION['id_usuario']);
unset($_SESSION['usuario']);
unset($_SESSION['nivel']);
header('Location: ../view/index.php');
exit();

?>