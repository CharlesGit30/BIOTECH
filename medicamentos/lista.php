<?php
$root = !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '/var/www/html';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Medicamentos</title>
    <link rel="stylesheet" href="/includes/style.css">
</head>
<body>
    <?php include $root . "/includes/header.php"; ?>

    <main class="page-layout medicamentos-page">
        <section class="page-hero page-hero-small">
            <div class="hero-text">
                <span class="eyebrow">Medicamentos</span>
                <h1>Controle simples de estoque</h1>
                <p>Monitore entregas, validade e disponibilidade com uma página limpa e visual.</p>
            </div>
            <div class="hero-actions">
                <a href="/medicamentos/lista.php" class="btn-primary">Adicionar medicamento</a>
            </div>
        </section>

        <section class="table-card">
            <div class="table-responsive">
                <table class="laudos-table">
                    <thead>
                        <tr>
                            <th>Medicamento</th>
                            <th>Quantidade</th>
                            <th>Validade</th>
                            <th>Local</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Paracetamol 500 mg</td>
                            <td>120</td>
                            <td>15/08/2026</td>
                            <td>Prateleira A</td>
                            <td><span class="status-pill status-good">Em estoque</span></td>
                        </tr>
                        <tr>
                            <td>Dipirona 1 g</td>
                            <td>54</td>
                            <td>22/09/2026</td>
                            <td>Prateleira B</td>
                            <td><span class="status-pill status-warning">Estoque baixo</span></td>
                        </tr>
                        <tr>
                            <td>Amoxicilina 500 mg</td>
                            <td>20</td>
                            <td>10/06/2026</td>
                            <td>Geladeira</td>
                            <td><span class="status-pill status-good">Pronto</span></td>
                        </tr>
                        <tr>
                            <td>Insulina NPH</td>
                            <td>8</td>
                            <td>05/07/2026</td>
                            <td>Geladeira</td>
                            <td><span class="status-pill status-alert">Vencimento próximo</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <?php include $root . "/includes/footer.php"; ?>
</body>
</html>
