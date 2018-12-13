<?php
/**
 * Efetua a conexão com o BD
 * @return \PDO
 */
function conectar() 
{
  
    $user = "root";
    $senha = "elaborata";

    $dsn = 'mysql:host=localhost;dbname=pedidos;port=3306';

    $pdo = new PDO($dsn, $user, $senha);

    return $pdo;
    
}
