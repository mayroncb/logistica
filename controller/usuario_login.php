<?php

session_start();

require_once '../model/usuarios.php';

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$logado = login($usuario, $senha);

if($logado == false)
{
    header("Location: /login.php?msg=Usuário ou senha incorretos");
} else {
    $_SESSION["logado"] = $logado;
    header("Location: /index.php");
   
}
   