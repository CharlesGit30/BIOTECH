<?php 
include '../config/config.php';  
include  '../includes/header.php';
session_start();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    $acao = $conexao->prepare("SELECT * FROM medicos WHERE email = ?");

    $acao->bind_param('s', $email);
    $acao->execute();

    $resultado = $acao->get_result();

    if ($resultado->num_rows > 0) {
        $medico = $resultado->fetch_assoc();

        if (password_verify($senha, $medico['senha'])) {
            $_SESSION['medico_id'] = $medico['id'];
            $_SESSION['nome'] = $medico['nome'];

            header("Location: ../index.php");
            exit;
        }
    }

    echo "Login inválido";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioTech ->Login</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>

<div class="formulario">
<form method="POST">
<input type="text" name="email" placeholder="Email" required><br>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <button type="submit">Login</button>
</form>
</div>
</body>
</html>



