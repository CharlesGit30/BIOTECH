<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro -> BioTech</title>
    <link rel="stylesheet" href="../includes/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include "../includes/header.php";  ?>
    <?php include "../config.php"; ?>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $hash = password_hash($senha, PASSWORD_DEFAULT);

            $instrucao = $conexao->prepare("INSERT INTO responsaveis (nome, email,senha) VALUES (?, ?, ?)");
            $instrucao->bind_param('sss', $nome, $email, $hash);
            $instrucao->execute();

            header("Location: login.php");
            exit;
        }
    ?>    

<div class="cadastro">
    <h2>ACESSO RESTRITO</h2><br><br>
    <div class="logo"><img src="../visual/logo.png" alt="Logo da biotech"></div>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required class="c-input"><br>
        <input type="text" name="email" placeholder="Email" required class="c-input"><br>
        <input type="password" name="senha" placeholder="Senha" required class="c-input"><br>
        <button type="submit">Cadastrar</button>

        <a href="../visual/login.php" class="btn">Já tem uma conta? Faça login aqui.</a>
    </form>
</div>
    
<?php include "../includes/footer.php"; ?>
</body>
</html>