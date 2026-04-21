<?php  
include '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $declaracao = $conexao->prepare("SELECT id, senha FROM responsavel WHERE usuario = ?");
    $declaracao->bind_param('s', $usuario);
    $declaracao->execute();

    $resultado = $declaracao->get_result();

    if ($resultado->num_rows === 1) {

        $dados = $resultado->fetch_assoc();

        if (password_verify($senha, $dados['senha'])) {

            $_SESSION['id_responsavel'] = $dados['id'];
            $_SESSION['nome_usuario'] = $usuario;

            header("Location: ../visual/dashboard.php");
            exit;

        } else {
            echo "Senha incorreta";
        }

    } else {
        echo "Usuário não encontrado";
    }

    $declaracao->close();
}
?>