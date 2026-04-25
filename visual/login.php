<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login -> Biotech</title>
    <link rel="stylesheet" href="../includes/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php  include '../includes/header.php'; ?>

    <?php 
        include '../config.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

           $instrucao = $conexao->prepare("SELECT * FROM responsaveis WHERE email = ?");

            $instrucao->bind_param('s', $email);
            $instrucao->execute();
            
            $resultado = $instrucao->get_result();
            $usuario = $resultado->fetch_assoc();

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION["usuario_id"] = $usuario["id"];
                $_SESSION["usuario_nome"] = $usuario["nome"];

                header("Location: ../visual/dashboard.php");
                exit;
            } else {
                echo "Email ou Senha Invalidos!";
            }

        }
    ?>

    <div class="login">
        <h2>ACESSO RESTRITO</h2>
        <div class="logo"><img src="../visual/logo.png" alt="Logo da biotech"></div>

        <form method="POST">
            <input type="text" name="email" placeholder="email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>

            <a href="../visual/cadastro.php" class="btn">Não tem uma conta? Cadastre-se aqui.</a>
        </form>

    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>