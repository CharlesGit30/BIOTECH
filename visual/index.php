<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php session_start();
            if (!isset($_SESSION['medico_id'])) {
                header("Location: login.php");
            }
    ?>
    <h2>Olá Mundo, Bem Vindo <?=  $_SESSION['nome'] ?></h2>

    <a href="sair.php">Sair</a>
</body>
</html>