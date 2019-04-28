<?php
$hostname = "db";
$user = "root";
$password = "root";
$database = "lojaze";
$conexao = mysqli_connect($hostname, $user, $password, $database);/* Estabelece a conexão */

if(!$conexao)
{
    echo "Falha na conexão com o BD!";/* Exibe uma mensagem de erro caso a conexão falhe */
}


?>