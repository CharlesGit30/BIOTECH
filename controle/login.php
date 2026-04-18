<?php 
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
 
    $seguranca = $conexao->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $seguranca->bind_param('s', $usuario);
    $seguranca->execute();
    $resultado = $seguranca->get_result();

    
}



?>
