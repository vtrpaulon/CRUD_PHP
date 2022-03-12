<?php
    session_start();
    include_once("conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $ver_cliente = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado_clientes = mysqli_query($conn, $ver_cliente);
    $row_cliente = mysqli_fetch_assoc($resultado_clientes);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - ATUALIZAR CLIENTES</title>
    </head>
    <body>
        <a href="cadastrar.php">CADASTRAR</a>
        <a href="consultar.php">CONSULTAR</a>

        <h1>Atualizar cliente</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="post" action="editarADD.php">

            <input type="hidden" name="id" value="<?php echo $row_cliente['id']; ?>"><br><br>   

            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome" value="<?php echo $row_cliente['nome']; ?>"><br><br>
            
            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" value="<?php echo $row_cliente['email']; ?>"><br><br>   
            
            
            <input type="submit" value="editar">

        </form>        
    </body>
</html>