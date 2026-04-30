<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$root = !empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '/var/www/html';
include $root . '/config/config.php';

$id = $_GET['id'];

$stmt = $conexao->prepare("SELECT * FROM laudos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$laudo = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $paciente = $_POST['paciente'];
    $medico = $_POST['medico'];
    $exame = $_POST['exame'];
    $data_laudo = $_POST['data_laudo'];
    $diagnostico = $_POST['diagnostico'];
    $observacao = $_POST['observacao'];

    $update = $conexao->prepare("UPDATE laudos SET paciente=?, medico=?, exame=?, data_laudo=?, diagnostico=?, observacao=? WHERE id=?");
    $update->bind_param("ssssssi", $paciente, $medico, $exame, $data_laudo, $diagnostico, $observacao, $id);
    $update->execute();

    header("Location: /processamento/listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOTECH -> Editar Laudo</title>
    <link rel="stylesheet" href="/includes/style.css">
</head>
<body>
    <?php include $root . "/includes/header.php"; ?>

    <main class="page-layout form-page">
        <section class="page-hero page-hero-small">
            <div class="hero-text">
                <span class="eyebrow">Editar</span>
                <h1>Atualizar informações do laudo</h1>
                <p>Faça ajustes rápidos no diagnóstico ou observações para manter seus registros sempre precisos.</p>
            </div>
            <div class="hero-actions">
                <a href="/processamento/listar.php" class="btn-secondary">Voltar à lista</a>
            </div>
        </section>

        <section class="formulario form-grid">
            <form method="POST">
                <div class="field-row">
                    <label for="paciente">Paciente</label>
                    <input type="text" id="paciente" name="paciente" value="<?= htmlspecialchars($laudo['paciente']) ?>" required>
                </div>
                <div class="field-row">
                    <label for="medico">Médico</label>
                    <input type="text" id="medico" name="medico" value="<?= htmlspecialchars($laudo['medico']) ?>" required>
                </div>
                <div class="field-row">
                    <label for="exame">Exame</label>
                    <input type="text" id="exame" name="exame" value="<?= htmlspecialchars($laudo['exame']) ?>" required>
                </div>
                <div class="field-row">
                    <label for="data_laudo">Data do exame</label>
                    <input type="date" id="data_laudo" name="data_laudo" value="<?= htmlspecialchars($laudo['data_laudo']) ?>" required>
                </div>
                <div class="field-row full-width">
                    <label for="diagnostico">Diagnóstico</label>
                    <textarea id="diagnostico" name="diagnostico" required><?= htmlspecialchars($laudo['diagnostico']) ?></textarea>
                </div>
                <div class="field-row full-width">
                    <label for="observacao">Observação</label>
                    <textarea id="observacao" name="observacao"><?= htmlspecialchars($laudo['observacao']) ?></textarea>
                </div>
                <button type="submit" class="btn-primary">Salvar alterações</button>
            </form>
        </section>
    </main>

    <?php include $root . "/includes/footer.php"; ?>
</body>
</html>

