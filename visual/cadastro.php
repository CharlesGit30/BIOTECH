<?php
include 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // 🔐 Gerar hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $acao = $conexao->prepare("INSERT INTO medicos (nome, email, senha) VALUES (?, ?, ?)");
    $acao->bind_param('sss', $nome, $email, $senhaHash);

    if ($acao->execute()) {
        echo "Médico Cadastrado";
    } else {
        echo "Erro ao Cadastrar";
    }
}
?>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome"><br>

    <input type="text" name="email" placeholder="Email"><br>

    <input type="password" name="senha" placeholder="Senha"><br>

    <button type="submit">Cadastrar</button>
</form>