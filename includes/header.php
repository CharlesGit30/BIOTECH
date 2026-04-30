<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<header class="site-header">
    <div class="logo">
        <a href="/index.php"><img src="/login/logo.png" alt="Logo BioTech"></a>
    </div>
    <nav class="navbar">
        <a href="/index.php">Início</a>
        <a href="/processamento/listar.php">Laudos</a>
        <a href="/medicamentos/lista.php">Medicamentos</a>
        <a href="/processamento/relatorios.php">Relatórios</a>
    </nav>
    <div class="header-icons">
        <a class="user-label" href="#">
            <?= isset($_SESSION['nome']) ? htmlspecialchars($_SESSION['nome']) : "<i class='bx bx-user'></i>" ?>
        </a>
        <a href="/login/sair.php"><i class='bx bx-log-out'></i></a>
    </div>
</header>
