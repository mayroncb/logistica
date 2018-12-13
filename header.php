<?php 

    session_start();
    
    if (isset($_SESSION['logado']) == false)
    {
        header("Location: /login.php");
    }
    


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de logistica</title>
        <link href="/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>