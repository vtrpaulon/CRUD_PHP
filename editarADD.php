<?php
    session_start();
    include_once("conexao.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $atualiza_cliente = "UPDATE clientes SET nome = '$nome', email = '$email', modificado = NOW() WHERE id = '$id'";

    $resultado_clientes = mysqli_query($conn, $atualiza_cliente);

    if(mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green'>Cliente atualizado com sucesso</p>";
        header("Location: consultar.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red'>Cliente não atualizado, houve um erro.</p>";
        header("Location: consultar.php?id=$id");
    }
?>