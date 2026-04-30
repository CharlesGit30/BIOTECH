<?php
$root = !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '/var/www/html';
include $root . "/config/config.php";

$totalLaudos = 0;
$ultimoLaudo = null;
$recentes = [];

$resultTotal = $conexao->query("SELECT COUNT(*) AS total FROM laudos");
if ($resultTotal) {
    $totalLaudos = $resultTotal->fetch_assoc()['total'];
}

$resultUltimo = $conexao->query("SELECT data_laudo FROM laudos ORDER BY data_laudo DESC LIMIT 1");
if ($resultUltimo && $ultimo = $resultUltimo->fetch_assoc()) {
    $ultimoLaudo = date('d/m/Y', strtotime($ultimo['data_laudo']));
}

$resultRecentes = $conexao->query("SELECT paciente, medico, exame, data_laudo FROM laudos ORDER BY data_laudo DESC LIMIT 5");
if ($resultRecentes) {
    while ($row = $resultRecentes->fetch_assoc()) {
        $recentes[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Relatórios</title>
    <link rel="stylesheet" href="/includes/style.css">
</head>
<body>
    <?php include $root . "/includes/header.php"; ?>

    <main class="page-layout relatorios-page">
        <section class="page-hero page-hero-small">
            <div class="hero-text">
                <span class="eyebrow">Relatórios</span>
                <h1>Visão rápida dos últimos resultados</h1>
                <p>Acompanhe a produção de laudos e os exames mais recentes em um painel limpo e direto.</p>
            </div>
            <div class="hero-actions">
                <a href="/processamento/listar.php" class="btn-secondary">Ir para laudos</a>
            </div>
        </section>

        <section class="dashboard-grid">
            <div class="summary-card">
                <h3>Total de laudos</h3>
                <p class="summary-number"><?= $totalLaudos ?></p>
            </div>
            <div class="summary-card">
                <h3>Último laudo</h3>
                <p class="summary-number"><?= $ultimoLaudo ?? 'Nenhum registrado' ?></p>
            </div>
            <div class="summary-card">
                <h3>Média mensal</h3>
                <p class="summary-number"><?= $totalLaudos ? round($totalLaudos / 12, 1) : '0' ?></p>
            </div>
        </section>

        <section class="table-card">
            <h2 class="section-title">Últimos laudos registrados</h2>
            <div class="table-responsive">
                <table class="laudos-table">
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Exame</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($recentes) === 0) : ?>
                            <tr><td colspan="4" class="empty-state">Nenhum laudo encontrado.</td></tr>
                        <?php else : ?>
                            <?php foreach ($recentes as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['paciente']) ?></td>
                                    <td><?= htmlspecialchars($row['medico']) ?></td>
                                    <td><?= htmlspecialchars($row['exame']) ?></td>
                                    <td><?= date('d/m/Y', strtotime($row['data_laudo'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <?php include $root . "/includes/footer.php"; ?>
</body>
</html>
