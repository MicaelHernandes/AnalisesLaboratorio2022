<?php
$usuario = "root";
$url = "localhost";
$senha = "";
$nomeBancoDados = "brasilminas_laboratorio";

$conexao = mysqli_connect($url,$usuario,$senha,$nomeBancoDados) or die ("Erro na conexão com o banco de dados, favor contactar o Gerenciador");

?>