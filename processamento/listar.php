<?php
$root = !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '/var/www/html';

include $root . "/config/config.php";

$resultado = $conexao->query("SELECT * FROM laudos ORDER BY data_laudo DESC");

if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Listar Laudos</title>
    <link rel="stylesheet" href="/includes/style.css">
</head>
<body>
    <?php include $root . "/includes/header.php"; ?>

    <main class="page-layout laudos-page">
        <section class="page-hero page-hero-small">
            <div class="hero-text">
                <span class="eyebrow">Laudos</span>
                <h1>Registro de exames</h1>
                <p>Veja todos os laudos, edite rapidamente ou exclua registros antigos com segurança.</p>
            </div>
            <div class="hero-actions">
                <a href="/processamento/criar.php" class="btn-primary">Novo laudo</a>
            </div>
        </section>


        <a href="/processamento/criar.php" class="novo-laudo">+ Novo Laudo</a>
    </section>

    <section class="laudos-card">
        <div class="table-responsive">
            <table class="laudos-table">
    <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Médico</th>
        <th>Exame</th>
        <th>Data do Laudo</th>
        <th>Diagnóstico</th>
        <th>Ações</th>
          
    </tr>
</div>


    <?php
        while ($row = $resultado->fetch_assoc()) :
    ?>

    <tr>
       <td class="id-col">#<?= $row['id'] ?></td>
         <td><?= htmlspecialchars($row['paciente']) ?></td>
         <td><?= htmlspecialchars($row['medico']) ?></td>
         <td><?= htmlspecialchars($row['exame']) ?></td>
         <td><?= date('d/m/Y', strtotime($row['data_laudo'])) ?></td>
         <td><?= htmlspecialchars($row['diagnostico']) ?></td>
         <td class="acoes-laudo">
         <a href="editar.php?id=<?= $row['id'] ?>" class="editar-laudo">Editar</a>
         <a href="excluir.php?id=<?= $row['id'] ?>" class="excluir-laudo" onclick="return confirm('Tem certeza que deseja excluir este laudo?')">Excluir</a>
        </td>
    </tr>
             <?php endwhile; ?>
           </table>

        <section class="table-card">
            <div class="table-responsive">
                <table class="laudos-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Exame</th>
                            <th>Data</th>
                            <th>Diagnóstico</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado->fetch_assoc()) : ?>
                        <tr>
                            <td class="id-col">#<?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['paciente']) ?></td>
                            <td><?= htmlspecialchars($row['medico']) ?></td>
                            <td><?= htmlspecialchars($row['exame']) ?></td>
                            <td><?= date('d/m/Y', strtotime($row['data_laudo'])) ?></td>
                            <td><?= htmlspecialchars($row['diagnostico']) ?></td>
                            <td class="acoes-laudo">
                                <a href="editar.php?id=<?= $row['id'] ?>" class="action-button edit-button">Editar</a>
                                <a href="excluir.php?id=<?= $row['id'] ?>" class="action-button delete-button" onclick="return confirm('Tem certeza que deseja excluir este laudo?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
>>>>>>> 8e7b95b75d4708ab156ca5caf9fedacb2e944250
            </div>
        </section>
    </main>

    <?php include $root . "/includes/footer.php"; ?>
</body>
</html>