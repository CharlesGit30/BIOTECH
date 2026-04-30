<?php include '/login/auth.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioTech -> MenuPrincipal</title>
    <link rel="stylesheet" href="/includes/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include "/includes/header.php" ?>


    <section class="page-hero home-hero">
        <div class="hero-copy hero-copy-simple">
            <div class="hero-logo">
                <img src="/login/logo.png" alt="BioTech logo">
            </div>
            <div class="hero-actions">
                <a href="/processamento/criar.php" class="btn-primary">Criar Laudo</a>
                <a href="/processamento/listar.php" class="btn-secondary">Meus Laudos</a>
            </div>
        </div>
    </section>

    <div class="logos">
        <div class="logos-wrapper">
            <div class="logo"><img src="/includes/imagens/logo1.png" alt="Logo 1" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo2.png" alt="Logo 2" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo3.png" alt="Logo 3" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo4.png" alt="Logo 4" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo5.png" alt="Logo 5" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo1.png" alt="Logo 1" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo2.png" alt="Logo 2" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo3.png" alt="Logo 3" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo4.png" alt="Logo 4" width="150px"></div>
            <div class="logo"><img src="/includes/imagens/logo5.png" alt="Logo 5" width="150px"></div>

        </div>
    </div>

    <div class="container">
        <div class="criar-laudo">
            <div class="card">
                <h3>Criar Laudo</h3>
                <p>Emita um novo laudo médico de forma rápida e segura. Preenchimento intuitivo com validação automática.</p>
                <a href="/processamento/criar.php" class="btn-card">Novo Laudo</a>
            </div>
        </div>
        <div class="listar-laudo">
            <div class="card-2">
                <h3>Meus Laudos</h3>
                <p>Acesse todos os laudos já criados. Visualize, edite ou exporte seus registros com facilidade.</p>
                <a href="/processamento/listar.php" class="btn-card">Ver Laudos</a>
            </div>
        </div>
    </div>

    <div class="informacoes">

    </div>

    <?php include "/includes/footer.php"; ?>

</body>
</html>