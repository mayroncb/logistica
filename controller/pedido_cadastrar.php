
        <?php
        
        require '../model/pedidos.php';
        
        $num_pedido = $_POST['num_pedido'];
        $data_pedido = $_POST['data_pedido'];
        $cliente = $_POST['cliente'];
        $status = $_POST['status'];
        $observacoes = $_POST['observacoes'];
        
        if (trim($num_pedido) == '')
        {
            
            $erro = "O número do pedido é obrigatório!";
           
        }
        
        if (trim($data_pedido) == '')
        {
            
            $erro = "A data está em um formato inválido!";
           
        }
        
        if (trim($cliente) == '')
        {
            
            $erro = "O cliente é obrigatório!";
           
        }
        
        if(isset($erro) )
        {
            header("Location: ../cadastro_pedido.php?msg=".$erro);
        } else {
            //gravar no banco
            $num = cadastrarPedido($num_pedido, $cliente, $data_pedido, $status);
            $msg = "Pedido cadastrado com sucesso.";
            header("Location: ../index.php?msg=".$msg);
        }
?>