<?php

require '../model/pedidos.php';

$id = $_GET['id'];

$pedido = carregarPedido($id);

$id = $pedido["id"];
$num_pedido = $pedido["num_pedido"];
$cliente = $pedido["cliente"];
$data_pedido = $pedido["data_pedido"];
$status = $pedido["status"];

$data_pedido = explode(" ", $data_pedido);
$data_pedido = $data_pedido[0];
       
require '../cadastro_pedido.php';




