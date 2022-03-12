<?php
    session_start();
    include_once("conexao.php");

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if(!empty($id)){
        $deletar = "DELETE FROM clientes WHERE id='$id'";
        $resultado_cliente = mysqli_query($conn, $deletar);
        if(mysqli_affected_rows($conn)){
            $_SESSION['msg'] = "<p style='color:green'>Cliente deletado com sucesso</p>";
            header("Location: consultar.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red'>Cliente não deletado, houve um erro.</p>";
            header("Location: consultar.php?id=$id");
        }
    }else{
        $_SESSION['msg'] = "<p style='color:red'>Cliente não deletado, é necessario selecionar um cliente.</p>";
        header("Location: consultar.php?id=$id");
    }



    


?>