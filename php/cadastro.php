<?php
include("connection.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "INSERT INTO users (usuario, senha) VALUES ('$usuario','$senha')";

if ($conexao->query($sql) === TRUE) {
        echo "<script>
            alert('Usuário cadastrado com sucesso!');
            window.location.href = '../views/login.php';
          </script>";
} else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}