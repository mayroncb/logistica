<?php
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : "";

$editar = ($_SERVER['SCRIPT_NAME'] == '/controller/pedido_editar.php') ? true : FALSE;

require 'header.php';
require 'menu.php';
?>

<main role="main" class="container">

    <div class="starter-template">

        <?php if ($editar == true): ?>

            <form class="form-horizontal" action="/controller/pedido_salvar.php" method="post">
        <?php else: ?>
            <form class="form-horizontal" action="/controller/pedido_cadastrar.php" method="post">
        <?php endif; ?>

                <fieldset class="col-6 offset-3">

                    <!-- Form Name -->
                    <?php
                    if ($editar == true) {
                        echo "<legend>Editar Pedido</legend>";
                        echo '<input type="hidden" value="'.$id.'" name="id" />';
                    } else {
                        echo "<legend>Cadastro de Pedido</legend>";
                    }
                    ?>
                    <?php if ($msg != ''): ?>

                        <div class="alert alert-danger" role="alert">
                        <?php echo $msg; ?>
                        </div>

                    <?php endif; ?>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class=" control-label" for="num_pedido">Número do Pedido</label>  
                        <div class="">
                            <input id="num_pedido" name="num_pedido" type="text" placeholder="" value="<?php echo $num_pedido; ?>" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="data_pedido">Data do Pedido</label>  
                        <div class="">
                            <input id="data_pedido" name="data_pedido" type="date" placeholder="" value="<?php echo $data_pedido; ?>"class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class=" control-label" for="cliente">Cliente</label>  
                        <div class="">
                            <input id="cliente" name="cliente" type="text" placeholder="" value="<?php echo $cliente; ?>"class="form-control input-md">

                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class=" control-label" for="status">Status</label>
                        <div class="">
                            <?php
                                $vetor_status = array("Aberto", "Cancelado", "Emitido", "Entregue", "Novo");
                            ?>
                            <select id="status" name="status" class="form-control">
                                    <?php foreach ($vetor_status as $item): ?>
                                    
                                    <?php if ($status == $item): ?>
                                        <option value="<?php echo $item?>" selected="true"><?php echo $item?> </option>
                                    <?php else: ?>
                                        <option value="<?php echo $item?>"><?php echo $item?> </option>
                                    <?php endif; ?>
                                    <?php endforeach;?>
                            </select>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class=" control-label" for="observacoes">Observações</label>
                        <div class="">                     
                            <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class=" control-label" for="enviar"></label>
                        <div class="">
                            <button id="enviar" name="enviar" class="btn btn-success">Enviar</button>
                        </div>
                    </div>

                </fieldset>
            </form>


    </div>

</main><!-- /.container -->

<?php
require 'footer.php';
?>
