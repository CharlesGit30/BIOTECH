<?php
include 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    $acao = $conexao->prepare("SELECT * FROM medicos WHERE email = ?");

    if (!$acao) {
        die("Erro: " . $conexao->error);
    }

    $acao->bind_param('s', $email);
    $acao->execute();

    $medico = $acao->get_result()->fetch_assoc();

    if ($medico && password_verify($senha, $medico['senha'])) {
        $_SESSION['medico_id'] = $medico['id'];
        $_SESSION['nome'] = $medico['nome'];

        header("Location: index.php");
        exit;
    } else {
        echo "Login inválido";
    }
}
?>

<form method="POST">
    <input type="text" name="email" placeholder="Email"><br>
    <input type="password" name="senha" placeholder="Senha"><br>
    <button type="submit">Login</button>
</form>