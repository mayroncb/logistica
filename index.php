<?php

    require './model/pedidos.php';
    
    $msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de logistica</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       
    <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
      <a class="navbar-brand" href="#">Logistica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="cadastro_pedido.php">Cadastrar Novo</a>
          </li>
                    
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

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
    
        $cliente = (isset($_POST['cliente']))? $_POST['cliente'] : ""; 
        $status = (isset($_POST['status'])) ? $_POST['status'] : "";

        $pedidos = listaPedidos($cliente, $status);
        
        foreach ($pedidos as $pedido)
        {
                echo "<tr>";
                echo "    <td>". $pedido['num_pedido'] ."</td>";
                echo "    <td>". $pedido['cliente'] ."</td>";
                echo "    <td>". $pedido['data_pedido'] ."</td>";
                echo "    <td>". $pedido['status'] ."</td>";
                echo "    <td>". $pedido['data_atualizacao'] ."</td>";
                echo "    <td> xxx </td>";
                echo '    <td><a href="controller/pedido_deletar.php?id='.$pedido['id'].'">[X]</a> </td>';
                echo "</tr>";
        }
?>
            </tbody>
            
        </table>
        
      </div>

    </main><!-- /.container -->
        
    </body>
</html>
