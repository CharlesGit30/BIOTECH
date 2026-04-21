<!DOCTYPE html>
<html lang="en">
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

    <div class="login">
        <h2>ACESSO RESTRITO</h2>
        <div class="logo"><img src="" alt="Logo da biotech"></div>

        <form action="../processamento/autenticacao.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>

    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>