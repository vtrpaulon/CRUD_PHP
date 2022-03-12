<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - CADASTRAR CLIENTES</title>
</head>
    <body>
        <a href="cadastrar.php">CADASTRAR</a>
        <a href="consultar.php">CONSULTAR</a>

        <h1>Cadastrar clientes</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="post" action="cadastrarADD.php">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome"><br><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu e-mail"><br><br>  

            <input type="submit" value="cadastrar">

        </form>        
    </body>
</html>