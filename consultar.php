<?php
    session_start();
    include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - CONSULTAR CLIENTES</title>
    </head>
    <body>
        <a href="cadastrar.php">CADASTRAR</a>
        <a href="consultar.php">CONSULTAR</a>

        <h1>Consultar clientes</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
            //receber o numero da pagina
            $paginaAtual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($paginaAtual)) ? $paginaAtual : 1;

            //setar a quantidade de paginas
            $qtd_result_pg = 3;

            //calcular a quantidade total de paginas e inicio
            $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

            $ver_cliente = "SELECT * FROM clientes LIMIT $inicio, $qtd_result_pg";
            $ver_clientes = mysqli_query($conn, $ver_cliente);
            while($row_cliente = mysqli_fetch_assoc($ver_clientes)){
                echo "ID: " . $row_cliente['id'] . "<br>";
                echo "Nome: " . $row_cliente['nome'] . "<br>";
                echo "E-mail: " . $row_cliente['email'] . "<br>";
                echo "<a href='editar.php?id=" . $row_cliente['id'] . "'>Editar</a><br><hr><br>";
            }
            //paginacao - qtd de clientes
            $res_pg = "SELECT COUNT(id) AS num_clientes FROM clientes";
            $res_paginas = mysqli_query($conn, $res_pg);
            $row_pg = mysqli_fetch_assoc($res_paginas);
            
            //quantidade de paginas
            $qtd_paginas = ceil($row_pg['num_clientes'] / $qtd_result_pg);

            //Limitar a qtd de links de pagina
            $max_links = 2;
            echo "<a href='consultar.php?pagina=1'>Primeira</a>";
            
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){

                if($pag_ant >=1){
                    echo "<a href='consultar.php?pagina=$pag_ant'>$pag_ant</a>";
                }
            }
                    echo $pagina;

                    for($pag_pos = $pagina +1; $pag_pos <= $pagina + $max_links; $pag_pos++){
                        if($pag_pos <= $qtd_paginas){
                        echo "<a href='consultar.php?pagina=$pag_pos'>$pag_pos</a>"; 
                        }             
                    }

                    echo "<a href='consultar.php?pagina=$qtd_paginas'>Ultima</a>";
            ?>
    </body>
</html>