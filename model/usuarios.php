<?php

require 'db.php';
/**
 * Verifica se o login é válido
 * @param string $usuario
 * @param string $senha
 */
function login($usuario, $senha)
{
    $con = conectar();
    
    $sql = "SELECT * FROM usuarios
            WHERE usuario = '$usuario' AND senha='$senha'";
    echo $sql;
    $res = $con->query($sql);
    
    return $res->fetch();
}