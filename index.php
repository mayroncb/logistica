<?php
    require './model/pedidos.php';

    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';

    require 'header.php';
    require 'menu.php';
?>

<main role="main" class="container">

    <div class="starter-template">

        <h1>Últimos Pedidos</h1>

<?php if ($msg != ''): ?>
        <div class="alert alert-success" role="alert">
    <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form action="index.php" method="post">   
                    <div class="row">
                        <div class="input-group mb-3 col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Cliente</span>
                            </div>
                            <input type="text" class="form-control" name="cliente">
                        </div>

                        <div class="form-group col">
                            <select class="form-control" name="status">
                                <option value="">-- Selecione o Status --</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Cancelado">Cancelado</option>
                                <option value="Emitido">Emitido</option>
                            </select>
                        </div>

                        <div class="col">
                            <button class="btn btn-primary" type="submit">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Num Pedido</th>
                    <th>Cliente</th>
                    <th>Data do pedido</th>
                    <th>Status</th>
                    <th>Data Atualização</th>
                    <th>Usuário Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
<?php
$cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "";
$status = (isset($_POST['status'])) ? $_POST['status'] : "";

$pedidos = listaPedidos($cliente, $status);

foreach ($pedidos as $pedido) {
    echo "<tr>";
    echo "    <td>" . $pedido['num_pedido'] . "</td>";
    echo "    <td>" . $pedido['cliente'] . "</td>";
    echo "    <td>" . $pedido['data_pedido'] . "</td>";
    echo "    <td>" . $pedido['status'] . "</td>";
    echo "    <td>" . $pedido['data_atualizacao'] . "</td>";
    echo "    <td> xxx </td>";
    echo '    <td>';
    echo '<a class="btn btn-info" href="controller/pedido_editar.php?id=' . $pedido['id'] . '">[E]</a> ';
    echo '<a class="btn btn-danger" href="controller/pedido_deletar.php?id=' . $pedido['id'] . '">[X]</a> ';
    echo '</td>';
    echo "</tr>";
}
?>
            </tbody>

        </table>

    </div>

</main><!-- /.container -->

<?php
    require 'footer.php';
?>
