<?php
include("connection.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM users WHERE usuario = '$usuario'";

$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    echo "<script>
            alert('Login realizado com sucesso!');
            window.location.href = '../views/podcasts.php';
          </script>";
} else {
    echo "<script>
            alert('Usuario não encontrado!');
            window.location.href = '../views/login.php'
          </script>";
}