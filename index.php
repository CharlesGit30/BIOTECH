<?php include '../biotech/login/auth.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioTech -> MenuPrincipal</title>
    <link rel="stylesheet" href="../biotech/includes/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include "../biotech/includes/header.php" ?>


    <div class="inicio">
        <div class="inicio-img">
            <img src="../biotech/includes/imagens/banner.jpg" alt="Banner">
            <div class="inicio-text">
                <h2>BIOTECH</h2>
                <p>Seu app reúne laudos digitais e controle de estoque em um único lugar, para que a equipe médica emita diagnósticos em segundos enquanto a farmácia acompanha cada comprimido que entra e sai, sem planilhas e sem sustos no fim do mês.</p>
                <a href="#" class="btn-cta">Começar Agora</a>
            </div>
        </div>
    </div>

    <div class="logos">
        <div class="logos-wrapper">
            <div class="logo"><img src="../biotech/includes/imagens/logo1.png" alt="Logo 1" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo2.png" alt="Logo 2" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo3.png" alt="Logo 3" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo4.png" alt="Logo 4" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo5.png" alt="Logo 5" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo1.png" alt="Logo 1" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo2.png" alt="Logo 2" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo3.png" alt="Logo 3" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo4.png" alt="Logo 4" width="150px"></div>
            <div class="logo"><img src="../biotech/includes/imagens/logo5.png" alt="Logo 5" width="150px"></div>

        </div>
    </div>

    <div class="container">
        <div class="criar-laudo">
            <div class="card">
                <h3>Criar Laudo</h3>
                <p>Emita um novo laudo médico de forma rápida e segura. Preenchimento intuitivo com validação automática.</p>
                <a href="../biotech/processamento/criar.php" class="btn-card">Novo Laudo</a>
            </div>
        </div>
        <div class="listar-laudo">
            <div class="card-2">
                <h3>Meus Laudos</h3>
                <p>Acesse todos os laudos já criados. Visualize, edite ou exporte seus registros com facilidade.</p>
                <a href="../biotech/processamento/listar.php" class="btn-card">Ver Laudos</a>
            </div>
        </div>
    </div>

    <div class="informacoes">

    </div>

    <?php include "../biotech/includes/footer.php"; ?>

</body>
</html>