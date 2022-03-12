<?php
    session_start();
    include_once("conexao.php");

    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $adiciona_cliente = "INSERT INTO clientes (nome, email, criado) VALUES ('$nome', '$email', NOW())";

    $resultado_clientes = mysqli_query($conn, $adiciona_cliente);

    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "<p style='color:green'>Usuario cadastrado com sucesso</p>";
        header("Location: consultar.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red'>Usuario não cadastrado</p>";
        header("Location: cadastrar.php");
    }
?>