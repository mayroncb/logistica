<?php

function conectar() {
    $user = "root";
    $senha = "elaborata";

    $dsn = 'mysql:host=localhost;dbname=pedidos;port=3306';

    $pdo = new PDO($dsn, $user, $senha);
    
    return $pdo;
}

/**
 * Lista todos os pedidos pelo filtro aplicado
 * @param string $cliente
 * @param string $status
 * @return array
 */
function listaPedidos($cliente = '', $status = '') {
    
    $pdo = conectar();

    $filtro = "";

    if ($cliente != '') {
        $filtro = " WHERE cliente LIKE '$cliente%' ";
    }

    if ($status != '' && $filtro != "") {
        $filtro .= " AND status = '$status' ";
    } elseif ($status != '' && $filtro == "") {
        $filtro .= " WHERE status = '$status' ";
    }


    $sql = "SELECT * FROM pedidos $filtro ORDER BY data_atualizacao DESC";


    $res = $pdo->query($sql);

    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

    return $dados;
}

/**
 * Cadastra um novo pedido.
 * @param int $numero
 * @param string $cliente
 * @param string $data
 * @param string $status
 */
function cadastrarPedido($numero, $cliente, $data, $status) {
        
    $pdo = conectar();

    $sql = "INSERT INTO `pedidos` "
            . "(`id`, `num_pedido`, `cliente`, `data_pedido`, `status`, "
            . "`data_atualizacao`) "
            . "VALUES "
            . "(NULL, '$numero', '$cliente', '$data', '$status', NOW());";
    
    $total = $pdo->exec($sql);
    
    return $total;
}

function deletarPedido($id)
{
    $pdo = conectar();
    
    $sql = "DELETE FROM pedidos "
            . "WHERE id = $id";
    
    $total = $pdo->exec($sql);
    
    return $total;
         
}