<?php
$root = !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '/var/www/html';

include $root . "/config/config.php";
include $root . "/includes/header.php";

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
    <?php include "../includes/header.php"; ?>
<main class="laudos-page">

    <section class="laudos-header">
        <div>
            <span class="laudos-subtitle">Gestão de laudos</span>
            <h2>Lista de Laudos</h2>
            <p>Visualize, edite ou exclua os laudos cadastrados no sistema.</p>
        </div>

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
            </div>
        </section>
    </main>
    
 <?php include $root . "/includes/footer.php"; ?>
 </body>
</html>