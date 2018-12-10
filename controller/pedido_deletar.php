
        <?php
        
        require '../model/pedidos.php';
        
        $id = $_GET['id'];
        
        deletarPedido($id);
        
        ?>
