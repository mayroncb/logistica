
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

    </head>

    <body class="text-center">
        <form class="form-signin" action="controller/usuario_login.php" method="post">

            <h1 class="h3 mb-3 font-weight-normal">Por favor se logue</h1>
            
                <?php $msg = (isset($_GET['msg'])) ? $_GET['msg'] : ""; ?>
            
                        <?php if ($msg != ''): ?>

                        <div class="alert alert-danger" role="alert">
                            <?php echo $msg; ?>
                        </div>

                        <?php endif; ?>
            
            <label for="inputEmail" class="sr-only">Usuário</label>
            <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Manter logado
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
    </body>
</html>